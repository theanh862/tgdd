<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderDetail;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
    
  
    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id); // Lấy sản phẩm từ ID

        // Kiểm tra xem giỏ hàng có sẵn hay không
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        // Cập nhật lại giỏ hàng trong session
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index');
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->input('quantity');
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index');
    }


    public function placeOrder(Request $request)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
    
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }
    
        // Tính tổng giá trị đơn hàng
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['quantity'] * $item['price'];
        }
    
        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);
    
        // Lưu chi tiết đơn hàng
        foreach ($cart as $productId => $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
    
        // Xóa giỏ hàng khỏi session
        session()->forget('cart');
    
        return redirect()->route('cart.index')->with('success', 'Đặt hàng thành công! Đơn hàng của bạn đang được xử lý.');
    }
    




public function addToCart(Request $request, $id)
    {
        // Lấy sản phẩm từ cơ sở dữ liệu
        $product = Product::findOrFail($id);

        // Lấy giỏ hàng hiện tại từ session
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

}
