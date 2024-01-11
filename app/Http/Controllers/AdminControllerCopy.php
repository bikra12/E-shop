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
        return view('admin.add-category', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        // Add request validation logic here

        if ($request->category_id) {
            $scategory = new Subcategory;
            $scategory->name = $request->name;
            $scategory->category_id = $request->category_id;
            $scategory->save();
        } else {
            $category = new Category;
            $category->name = $request->name;
            $category->save();
        }

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
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->withErrors(['error' => 'Category not found.']);
        }

        $categories = Category::all();  // Fetch all categories

        return view('admin.category-edit', compact('category', 'categories')); // Pass the $categories variable
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
        

        // if ($request->subcategory_id) {
        //     $product = new Product;
        //     $product->name = $request->name;
        //     $product->price = $request->price;
        //     $product->subcategory_id = $request->subcategory_id;
        //     $product->save();
        // } else {
        //     $scategory = new Subcategory;
        //     $scategory->name = $request->name;
        //     $scategory->category_id = $request->category_id;
        //     $scategory->save();
        // }


        // $imageName = time().'.'.$request->image->extension();  
        // $request->image->move(public_path('images'), $imageName);
      

    // Generate the slug from the product name
    $slug = Str::slug($request->name, '-');

    // Ensure the slug is unique by appending a number if needed
    $count = 2;
    while (Product::where('slug', $slug)->exists()) {
        $slug = Str::slug($request->name, '-') . '-' . $count++;
    }

        $products = new Product();
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $ext;
        //     $file->move('assets/uploads/product', $filename);
        //     $products->image = $filename;
        // } else {
        //     // If no image is uploaded, we can save a default placeholder or leave it null.
        //     // If you want to save the Unsplash URL in the database:
        //     $products->image = 'https://source.unsplash.com/100x100/?food';
        //     // Or leave it as null if you prefer to handle it in the view:
        //     // $products->image = null;
        // }

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
        // $products->meta_title = $request->meta_title;
        // $products->meta_keywords = $request->meta_keywords;
        // $products->meta_description = $request->meta_description;

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


        return redirect('/admin/product/view');
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
    // public function productedit($id)
    // {
    //     if (!empty($id)) {
    //         $products = Product::where('id', $id)->first();
    //         return view('admin.product-edit', compact('products'));
    //     }
    // }


    // public function update($id, Request $request)
    // {
    //     $products = Product::find($id);


    //     if ($request->hasFile('image')) {

    //         $path = 'assets/uploads/product/'.$products->image;
    //         if (File::exists($path)) {
    //             File::delete($path);
    //         }

    //         $file = $request->file('image');
    //         $ext = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $ext;
    //         $file->move('assets/uploads/product', $filename);
    //         $products->image = $filename;
    //     }
    //     // $products->subcategory_id = $request->subcategory_id;
    //     $products->name = $request->name;
    //     $products->description = $request->description;
    //     $products->original_price = $request->original_price;
    //     $products->selling_price = $request->selling_price;
    //     $products->tax = $request->tax;
    //     $products->qty = $request->qty;
    //     $products->status = $request->input('status') == TRUE ? '1' : '0';
    //     $products->trending = $request->input('trending') == TRUE ? '1' : '0';
    //     $products->meta_title = $request->meta_title;
    //     $products->meta_keywords = $request->meta_keywords;
    //     $products->meta_description = $request->meta_description;

    //     $products->update();


    //     return redirect('/admin/product/view');
    // }


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

        // // Handle main image
        // if ($request->hasFile('image')) {
        //     // Delete old main image
        //     $path = 'assets/uploads/product/' . $product->image;
        //     if (File::exists($path)) {
        //         File::delete($path);
        //     }

        //     // Save the new main image
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $ext;
        //     $file->move('assets/uploads/product', $filename);
        //     $product->image = $filename;
        // }

        // Handle the multiple images
        if ($request->hasFile('images')) {
            // Delete old images associated with the product
            foreach ($product->images as $oldImage) {
                $oldPath = 'assets/uploads/product/' . $oldImage->filename;
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
                $oldImage->delete(); // Deleting from the database
            }

            // Now, save new images
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
        // $product->meta_title = $request->meta_title;
        // $product->meta_keywords = $request->meta_keywords;
        // $product->meta_description = $request->meta_description;

        $product->save();

        return redirect('/admin/product/view')->with('status', "Product updated successfully");
    }



    // public function destroy($id)
    // {

    //     $products = Product::find($id);

    //     $path = 'assets/uploads/product/' . $products->image;


    //     if (File::exists($path)) {
    //         File::delete($path);
    //     }
    //     $products->delete();
    //     return redirect('/admin/product/view')->with('status', "product update successfully");
    // }


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
