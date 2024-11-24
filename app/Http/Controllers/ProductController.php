<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RecentlyViewed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        // Lấy danh sách tất cả sản phẩm
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function show(Product $product, Request $request)
    {
        // Ghi nhận sản phẩm đã xem
        if (Auth::check()) {
            RecentlyViewed::updateOrCreate(
                ['user_id' => Auth::id(), 'product_id' => $product->id],
                ['user_id' => Auth::id(), 'product_id' => $product->id]
            );
        }
    
        // Lưu sản phẩm vào session
        $recentlyViewed = session()->get('recently_viewed', []);
        $recentlyViewed[$product->id] = $product;
        session()->put('recently_viewed', $recentlyViewed);
    
        // Truyền sản phẩm đã xem vào view
        return view('products.show', [
            'product' => $product,
            'recentlyViewed' => session('recently_viewed')
        ]);
    }
    

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->paginate(10);
        return view('products.search', compact('products', 'query'));
    }



    public function showCategory($categorySlug)
    {
        // Tìm danh mục dựa trên slug
        $category = \App\Models\Category::where('slug', $categorySlug)->first();
    
        // Kiểm tra nếu danh mục tồn tại
        if (!$category) {
            return abort(404); // Trả về lỗi nếu không tìm thấy danh mục
        }
    
        // Lấy các sản phẩm thuộc danh mục này
        $products = Product::where('category_id', $category->id)->get();
    
        // Trả về view với các sản phẩm
        return view('products.category', compact('products', 'category'));
    }
    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Lấy danh mục để hiển thị trong select
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        // Xử lý cập nhật ảnh nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ (nếu cần)
            if ($product->image && \Storage::exists($product->image)) {
                \Storage::delete($product->image);
            }

            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }
}
    
 

    
    


