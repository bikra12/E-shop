@extends('admin.dashboard')

@section('content')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 900px;
            margin: 60px auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h3 {
            font-weight: 600;
            text-align: center;
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #e1e1e1;
            border-radius: 4px;
            background: #fdfdfd;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(0, 58, 123, 0.2);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin-bottom: 30px;
        }
    </style>

    
    {{-- <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Add Products</h3>
        <a href="{{ route('dashboard') }}" class="fa fa-hand-o-left fa-2x text-black" style="margin-left: auto;"></a>
    </div>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Sub Category -->
        <div class="form-group row">
            <label for="subcategory_id" class="col-md-2 col-form-label">Sub Category</label>
            <div class="col-md-6">
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    <option value="">None</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }} </option>
                    @endforeach
                </select>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Product Name -->
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Product Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name"
                    required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- Product Slug -->
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Product Slug</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Product Slug"
                    required>
            </div>
        </div>

        <!-- Product Description -->
        <div class="form-group row">
            <label for="description" class="col-md-2 col-form-label">Description</label>
            <div class="col-md-6">
                <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3" required></textarea>


            </div>
        </div>

        <!-- Product Prices -->
        <div class="form-group row">
            <label for="original_price" class="col-md-2 col-form-label">Original Price</label>
            <div class="col-md-3">
                <input type="number" class="form-control" id="original_price" name="original_price"
                    placeholder="Original Price" required>
            </div>

            <label for="selling_price" class="col-md-2 col-form-label">Selling Price</label>
            <div class="col-md-3">
                <input type="number" class="form-control" id="selling_price" name="selling_price"
                    placeholder="Selling Price" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="tax" class="col-md-2 col-form-label">Tax</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="tax" name="tax" placeholder=" Tax" required>
            </div>

            <label for="qty" class="col-md-2 col-form-label"> Quantity</label>
            <div class="col-md-3">
                <input type="number" class="form-control" id="qty" name="qty" placeholder=" Quantity" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="">Status</label>
            <div class="col-md-3">
                <input type="checkbox" name="status">
            </div>

            <label for="">Trending</label>
            <div class="col-md-3">
                <input type="checkbox" name="trending">
            </div>
        </div>


        {{-- 
    <div class="form-group row">
        <label for="meta_title" class="col-md-2 col-form-label">Meta Title</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder=" meta_title" required>
        </div>

        <label for="meta_keywords" class="col-md-2 col-form-label"> Meta Title</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder=" meta_keywords" required>
        </div>

    </div>

    <div class="form-group row">
        <label for="meta_description" class="col-md-2 col-form-label">meta_description</label>
        <div class="col-md-6">
            <textarea class="form-control" id="meta_description" name="meta_description" placeholder="meta_description" rows="3" required></textarea>
        </div>
    </div> --}}


        {{-- <!-- Product Image -->
    <div class="form-group row">
        <label for="image" class="col-md-2 col-form-label">Image</label>
        <div class="col-md-6">
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
    </div> --}}

        <!-- Product Images -->
        <div class="form-group row">
            <label for="images" class="col-md-2 col-form-label">Images</label>
            <div class="col-md-6">
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
            </div>
        </div>



        <div class="form-group row">
            <div class="col-md-8 offset-md-2">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </div>
    </form>
@endsection
