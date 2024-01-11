<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use App\Models\ProductImage;

use App\Models\Product_stock;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // public $name;
    // public $category_id;
    //
    public function dashboard()
    {
        // $categories = Category::all();

        return view('admin.dashboard');
        //$categories = Category::with('subcategories.products')->get();
        //  return view('admin.dashboard');
    }

    public function create()
    {
        $categories = Category::all();
        // return view('admin.add-category', ['categories' => $categories]);
        return view('admin.add-category', compact('categories'));
    }
    public function store(Request $request)
    {
        // Add request validation logic here 
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            // 'status' => 'required|in:0,1',
            // 'popular' => 'required|in:0,1'
        ]);

        // Generate the slug from the product name
        $slug = Str::slug($request->name, '-');
        // Ensure the slug is unique by appending a number if needed
        $count = 2;
        while (Product::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->name, '-') . '-' . $count++;
        }


        $category = new Category;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        } else {
            $category->image = 'https://source.unsplash.com/100x100/?food';
        }
        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->save();

        return redirect('/admin/categoryview');
    }

    public function categoryview()
    {
        $categories = Category::all();

        return view('admin.category-view', compact('categories'));
        //$categories = Category::with('subcategories.products')->get();
        //  return view('admin.dashboard');
    }

    public function categoryedit($id)
    {
        $category = category::find($id);

        if (!$category) {
            return redirect()->back()->withErrors(['error' => 'subcategory not found.']);
        }

        return view('admin.category-edit', compact('category')); // Pass the $categories variable
    }

    public function categoryupdate($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);

        $category = category::find($id);

        if ($request->hasFile('image')) {

            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }
        // Generate the slug from the updated product name
        $slug = Str::slug($request->name, '-');
        // Ensure the slug remains unique
        $count = 2;
        while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = Str::slug($request->name, '-') . '-' . $count++;
        }

        // Update product details
        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->save();
        // return view('admin.subcategory-view');
        return redirect('/admin/categoryview')->with('status', 'category updated successfully');
    }



    public function subcategorycreate()
    {
        $categories = Category::all();
        return view('admin.add-subcategory', ['categories' => $categories]);
    }
    public function subcategorystore(Request $request)
    {
        // Add request validation logic here
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',

        ]);

        // Generate the slug from the product name
        $slug = Str::slug($request->name, '-');
        // Ensure the slug is unique by appending a number if needed
        $count = 2;
        while (Product::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->name, '-') . '-' . $count++;
        }

        $scategory = new Subcategory;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/subcategory', $filename);
            $scategory->image = $filename;
        } else {
            $scategory->image = 'https://source.unsplash.com/100x100/?food';
        }

        $scategory->category_id = $request->category_id;
        $scategory->name = $request->name;
        $scategory->slug = $slug;
        $scategory->description = $request->description;
        $scategory->status = $request->input('status') == TRUE ? '1' : '0';
        $scategory->popular = $request->input('popular') == TRUE ? '1' : '0';
        $scategory->save();


        return redirect('/admin/subcategoryview');
    }

    public function subcategoryview()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategory-view', compact('subcategories'));
    }


    public function subcategoryedit($id)
    {
        $subcategory = Subcategory::find($id);

        if (!$subcategory) {
            return redirect()->back()->withErrors(['error' => 'subcategory not found.']);
        }

        $categories = category::all();  // Fetch all categories

        return view('admin.subcategory-edit', compact('subcategory', 'categories')); // Pass the $categories variable
    }

    public function subcategoryupdate($id, Request $request)
    {
        // Add request validation logic here
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',


        ]);

        $subcategory = Subcategory::find($id);

        if ($request->hasFile('image')) {

            $path = 'assets/uploads/subcategory/' . $subcategory->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/subcategory', $filename);
            $subcategory->image = $filename;
        }
        // Generate the slug from the updated product name
        $slug = Str::slug($request->name, '-');
        // Ensure the slug remains unique
        $count = 2;
        while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = Str::slug($request->name, '-') . '-' . $count++;
        }

        // Update product details
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = $slug;
        $subcategory->description = $request->description;
        $subcategory->status = $request->input('status') == TRUE ? '1' : '0';
        $subcategory->popular = $request->input('popular') == TRUE ? '1' : '0';

        $subcategory->save();
        // return view('admin.subcategory-view');
        return redirect('/admin/subcategoryview')->with('status', 'Subcategory updated successfully');
    }




    public function productcreate()
    {
        $subcategories = Subcategory::all();
        return view('admin.add-product', ['subcategories' => $subcategories]);
    }
    public function productstore(Request $request)
    {
        // Add request validation logic here
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'qty' => 'required',
            'tax' => 'required',
            'subcategory_id' => 'required|integer|exists:subcategories,id',
            'images' => 'required',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

            // Add other validation rules as necessary
        ]);

        // Generate the slug from the product name
        $slug = Str::slug($request->name, '-');
        // Ensure the slug is unique by appending a number if needed
        $count = 2;
        while (Product::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->name, '-') . '-' . $count++;
        }

        $products = new Product();
        $products->subcategory_id = $request->subcategory_id;
        $products->name = $request->name;
        $products->slug = $slug;
        $products->description = $request->description;
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;
        $products->tax = $request->tax;
        $products->qty = $request->qty;
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->save();


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/uploads/product'), $filename);

                // Store in product_images table
                $productImage = new ProductImage();
                $productImage->product_id = $products->id; // <-- This line should set the product_id.
                $productImage->filename = $filename;
                $productImage->save();
            }
        }
        return redirect('/admin/product/view')->with('success', 'Product successfully added!');

    }


    public function productview()
    {
        // $products = Product::all();
        $products = Product::paginate(5);
        return view('admin.product-view', compact('products'));
    }


    public function productedit($id)
    {
        $products = Product::find($id);
        $subcategories = Subcategory::all();
        return view('admin.product-edit', compact('products', 'subcategories'));
    }



    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'qty' => 'required',
            'tax' => 'required',
            'subcategory_id' => 'required|integer|exists:subcategories,id',
            // 'images' => 'required',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

            // Add other validation rules as necessary
        ]);
        $product = Product::find($id);

        // Handle the multiple images
        if ($request->hasFile('images')) {
            // Delete old images associated with the product
            foreach ($product->images as $oldImage) {
                $oldPath = 'assets/uploads/product/' . $oldImage->filename;
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
                $oldImage->delete();
            }

            // Save new images
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/uploads/product'), $filename);

                // Store in product_images table
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->filename = $filename;
                $productImage->save();
            }
        }

        // Generate the slug from the updated product name
        $slug = Str::slug($request->name, '-');
        // Ensure the slug remains unique
        $count = 2;
        while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = Str::slug($request->name, '-') . '-' . $count++;
        }


        // Update product details
        $product->subcategory_id = $request->subcategory_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->tax = $request->tax;
        $product->qty = $request->qty;
        $product->status = $request->input('status') == TRUE ? '1' : '0';
        $product->trending = $request->input('trending') == TRUE ? '1' : '0';
        $product->save();

        return redirect('/admin/product/view')->with('status', "Product updated successfully");
    }





    public function destroy($id)
    {
        $product = Product::find($id);

        // Delete main image
        $path = 'assets/uploads/product/' . $product->image;
        if (File::exists($path)) {
            File::delete($path);
        }

        // Delete other images associated with the product
        foreach ($product->images as $image) {
            $imagePath = 'assets/uploads/product/' . $image->filename;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->delete(); // Deleting from the database
        }

        $product->delete();

        return redirect('/admin/product/view')->with('status', "Product deleted successfully");
    }








    public function stockcreate()
    {
        $products = Product::all();


        return view('admin.add-stock', compact('products'));
    }

    public function stockstore(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity_available' => 'required|integer|min:0',
        ]);

        // Find existing stock entry
        $stock = Product_stock::where('product_id', $validated['product_id'])->first();

        if ($stock) {
            // Update existing stock quantity
            $stock->increment('quantity_available', $validated['quantity_available']);
        } else {
            // Create a new stock entry
            Product_stock::create($validated);
        }

        return redirect()->route('stock.view')->with('success', 'Stock updated successfully');
    }

    public function stockview()
    {
        $stocks =  Product_stock::with('product')->get();

        return view('admin.stock-view', compact('stocks'));
    }


    public function decreaseStock(Request $request, $productId)
    {
        $quantityToDecrease = $request->input('quantity');
        $stock = Product_stock::where('product_id', $productId)->first();

        if (!$stock || $stock->quantity_available < $quantityToDecrease) {
            return back()->with('error', 'Not enough stock or stock not found.');
        }

        $stock->decrement('quantity_available', $quantityToDecrease);
        return back()->with('success', 'Stock decreased successfully.');
    }
}
