<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    //
     public function index()
     {
         // Lấy danh sách sản phẩm khuyến mãi online
         $products = Product::all();
         // Lấy sản phẩm đã xem từ session
         $recentlyViewed = session()->get('recently_viewed', []);
 
         // Truyền biến vào view
         return view('index', compact('recentlyViewed', 'products'));
     }
}
