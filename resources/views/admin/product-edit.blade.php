@extends('admin.dashboard')

@section('content')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        h3.mb-4 {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .form-control,
        select.form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 16px;
        }

        .form-control:focus,
        select.form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        label {
            font-weight: 600;
            color: #333;
            display: block;
            margin-bottom: 10px;
        }

        .row {
            margin-bottom: 25px;
        }

        input[type="submit"],
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }

        input[type="submit"]:hover,
        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        img {
            max-width: 180px;
            border: 3px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        img:hover {
            transform: scale(1.1);
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-container {
            background-color: #f9f9f9;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }
    </style>
    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div  style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Edit Product</h3>
        <a href="{{ route('dashboard') }}" class="fa fa-hand-o-left fa-2x text-black" style="margin-left: auto;"></a>
    </div>

    <div>
        <form action="{{ route('update', $products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="row mt-3">
            <div class="col-md-2">
                <label for="">Sub Category </label>
            </div>
            <div class="col-md-4">
                <select     >
                    <option value="">{{ $products->subcategories->name }} </option>
                    
                </select>
            </div>
        </div> --}}
            <div class="row mt-3">
                <div class="col-md-2">
                    <label for="">Sub Category </label>
                </div>
                <div class="col-md-4">
                    <select name="subcategory_id" class="form-control" style="border: 1px solid;">
                        <option value="">none </option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }} </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="">product name</label>
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder=" product name" id="" class="form-control" name="name"
                        value="{{ $products->name }}" autofocus>
                </div>
                {{-- @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror --}}
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="">product Slug</label>
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder=" product Slug" id="" class="form-control" name="slug"
                        value="{{ $products->slug }}" required autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="">Decription</label>
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder=" description" id="" class="form-control" name="description"
                        value="{{ $products->description }}" required autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="">original price</label>
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder=" original price" id="" class="form-control"
                        name="original_price" value="{{ $products->original_price }}" required autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="">selling price</label>
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder=" selling price" id="" class="form-control"
                        name="selling_price" value="{{ $products->selling_price }}" required autofocus>
                </div>
            </div>


            <div class="row">
                <div class="col-md-2">
                    <label for="">Tax</label>
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder=" taxes" id="" class="form-control" name="tax"
                        value="{{ $products->tax }}" required autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="">Quantity</label>
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder=" Quantity" id="" class="form-control" name="qty"
                        value="{{ $products->qty }}" required autofocus>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <label for="">Status</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" {{ $products->status == '1' ? 'checked' : '' }} name="status">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="">Trending</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" {{ $products->trending == '1' ? 'checked' : '' }} name="trending">
                </div>
            </div>

            {{-- <div class="row">
            <div class="col-md-2">
                <label for="">meta Title</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" meta_title" id="" class="form-control" name="meta_title"  value="{{ $products->meta_title }}"
                required autofocus>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">meta_keywords</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" meta_keywords" id="" class="form-control" name="meta_keywords"  value="{{ $products->meta_keywords }}"
                required autofocus>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">meta_description</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" meta_description" id="" class="form-control" name="meta_description"  value="{{ $products->meta_description }}"
                required autofocus>
            </div>
        </div> --}}
            {{--         
        @if ($products->image)
        <img src=" {{ asset('assets/uploads/product/'.$products->image ) }}" alt="">
        @endif
        <div class="form-group">
            <label>Image:</label>
            <input type="file" name="image" class="form-control" >
        </div> --}}
            {{-- <!-- Product Image -->
    <div class="form-group row">
        <label for="image" class="col-md-2 col-form-label">Image</label>
        <div class="col-md-6">
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
    </div> --}}

            <!-- Product Images -->
            @foreach ($products->images as $image)
                <img src="{{ asset('assets/uploads/product/' . $image->filename) }}" alt="Product Image">
            @endforeach
            <div class="col-md-6">
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
            </div>

            <div>
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
