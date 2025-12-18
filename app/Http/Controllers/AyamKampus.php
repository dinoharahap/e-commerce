<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class AyamKampus extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index()
    {
        return view('home');
    }

    public function menu()
    {
        $menus = Menu::all();
        return view('menu.semua', compact('menus'));
    }

    public function ayam()
    {
        $menus = Menu::where('kategori', 'ayam')->get();
        return view('menu.ayamgeprek', compact('menus'));
    }

    public function minuman()
    {
        $menus = Menu::where('kategori', 'minuman')->get();
        return view('menu.minuman', compact('menus'));
    }

    public function paket()
    {
        $menus = Menu::where('kategori', 'paket')->get();
        return view('menu.paket', compact('menus'));
    }

    public function promo()
    {
        return view('promo');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    // CART
    public function cartIndex()
    {
        $cart = session()->get('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['harga'] * $item['qty']);
        $biaya_pengiriman = 5000;
        $total = $subtotal + $biaya_pengiriman;

        return view('cart.index', compact('cart', 'subtotal', 'biaya_pengiriman', 'total'));
    }

    public function cartAdd(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += 1;
        } else {
            $cart[$id] = [
                'id' => $menu->id,
                'nama' => $menu->nama,
                'harga' => $menu->harga,
                'gambar' => $menu->gambar,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Item berhasil ditambahkan ke keranjang'
            ]);
        }

        return redirect()->back()->with('success', 'Item ditambahkan ke keranjang');
    }

    public function cartUpdate(Request $request, $id)
    {
        $request->validate(['qty' => 'required|integer|min:1']);

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['qty'] = (int) $request->qty;
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function cartRemove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    // CHECKOUT
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // ubah dari login.view
        }

        $cartItems = session()->get('cart', []);
        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong');
        }

        $subtotal = collect($cartItems)->sum(fn($item) => $item['harga'] * $item['qty']);
        $biaya_pengiriman = 5000;
        $total = $subtotal + $biaya_pengiriman;

        return view('checkout', compact('cartItems', 'subtotal', 'biaya_pengiriman', 'total'));
    }

    public function prosesCheckout(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Harus login'], 401);
        }

        $validated = $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong'], 400);
        }

        $subtotal = collect($cart)->sum(fn($item) => $item['harga'] * $item['qty']);
        $ongkos_kirim = 5000;
        $total = $subtotal + $ongkos_kirim;

        // Generate order ID unik
        $order_id = 'ORD-' . time() . '-' . Auth::id();

        // Buat order
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_id' => $order_id,
            'subtotal' => $subtotal,
            'ongkos_kirim' => $ongkos_kirim,
            'total' => $total,
            'status' => 'pending',
            'nama_penerima' => $validated['nama_penerima'],
            'no_hp' => $validated['no_hp'],
            'alamat' => $validated['alamat'],
            'catatan' => $validated['catatan'] ?? null,
            'tanggal' => now(),
        ]);

        // Simpan items ke order_items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'qty' => $item['qty'],
                'harga' => $item['harga'],
            ]);
        }

        // Siapkan data Midtrans
        $items = [];
        foreach ($cart as $item) {
            $items[] = [
                'id' => $item['id'],
                'price' => (int) $item['harga'],
                'quantity' => $item['qty'],
                'name' => $item['nama'],
            ];
        }

        $items[] = [
            'id' => 'ongkos_kirim',
            'price' => (int) $ongkos_kirim,
            'quantity' => 1,
            'name' => 'Ongkos Kirim',
        ];

        $transactionDetails = [
            'order_id' => $order_id,
            'gross_amount' => (int) $total,
        ];

        $customerDetails = [
            'first_name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone' => $validated['no_hp'],
        ];

        $payload = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details' => $items,
        ];

        try {
            $snapToken = Snap::getSnapToken($payload);

            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'order_id' => $order->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function paymentCallback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed !== $request->signature_key) {
            return response()->json(['success' => false, 'message' => 'Invalid signature'], 403);
        }

        $order = Order::where('order_id', $request->order_id)->first();

        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Order not found'], 404);
        }

        if ($request->transaction_status === 'capture' || $request->transaction_status === 'settlement') {
            $order->update(['status' => 'paid', 'payment_method' => $request->payment_type]);
            session()->forget('cart');
        } elseif ($request->transaction_status === 'pending') {
            $order->update(['status' => 'pending']);
        } elseif (in_array($request->transaction_status, ['deny', 'cancel', 'expire'])) {
            $order->update(['status' => 'expired']);
        }

        return response()->json(['success' => true]);
    }

    public function orderStatus($orderId)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // ubah dari login.view
        }

        $order = Order::find($orderId);

        if (!$order || $order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('order-status', compact('order'));
    }

    public function orderHistory()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $orders = Order::with(['items.menu'])
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('orders.history', compact('orders'));
    }
}