<?php

namespace App\Http\Controllers;

use App\helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class HomeController extends Controller
{
    public function index()
    {
        $featured_product = Product::where('trending', 1)->take(15)->get();
        $featured_category = Category::all();
        // $products = Product::all();
        $featured_subcategory = Subcategory::all();
        return view('homepage.indexbt', compact('featured_product', 'featured_category', 'featured_subcategory'));

        // return view('homepage.indexbt',compact('products'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")->get();
        $categories = Category::where('name', 'like', "%$query%")->get();
        $subcategories = Subcategory::where('name', 'like', "%$query%")->get();
        return view('homepage.search', compact('products', 'categories', 'subcategories'));
    }


    public function viewsubcategory($slug)
    {
        if (Subcategory::where('slug', $slug)->exists()) {


            $subcategory = Subcategory::where('slug', $slug)->first();
            // $products = Product::where('subcategory->id', $subcategory->id)->get();
            $products = Product::where('subcategory_id', $subcategory->id)->get();


            return view('homepage.search', compact('products', 'subcategory'));
        } else {
            return view('homepage.indexbt');
        }
    }

    public function viewproduct($slug)
    {
        if (Product::where('slug', $slug)->exists()) {

            $products = Product::where('slug', $slug)->first();

            return view('homepage.product-show', compact('products'));
        } else {
            return view('homepage.indexbt');
        }
    }

    public function getCategoriesWithSubcategories()
    {
        $featured_category = Category::get();
        return view('homepage.indexbt', compact('featured_category'));
    }







    public function about()
    {
        $data = "This is my first helper function";
        return Helper::test($data);
        return view('homepage.about');
    }
}
