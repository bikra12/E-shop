{{-- @extends('admin.dashboard')

@section('content')
<h3 class="mb-4">Category</h3>

    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-2">
                <label for="">Category name</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" Category" id="" class="form-control" name="name"
                required autofocus>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <label for="">Sub Category of</label>
            </div>
            <div class="col-md-4">
                <select name="category_id"  class="form-control" style="border: 1px solid;" wire:model="category_id">
                    <option value="">No subcategory </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }} </option>
                    @endforeach
                  
                </select>
            </div>
        </div>
        {{-- @foreach ($categories as $category)
        <div class="category">
            <h2>{{ $category->name }}</h2>
            @foreach ($category->subcategories as $subcategory)
                <div class="subcategory">
                    <h3>{{ $subcategory->name }}</h3>
                    <ul>
                        @foreach ($subcategory->products as $product)
                            <li>{{ $product->name }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    @endforeach --}}
{{-- <input type="submit" value="Submit" class="btn btn-primary">
    </form>

@endsection --}}



@extends('admin.dashboard')

@section('content')
    <style>
        /* Typography */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        h3 {
            font-weight: 600;
            margin-bottom: 30px;
            color: #495057;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 10px;
            font-size: 16px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: #ffffff;
            border-radius: 5px;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Container */
        .container {
            padding: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .row {
            margin-bottom: 20px;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAzElEQVRIDbXBAQEAAAABIP7PzgpVQFEUxT4NgkAikWg0Go1Go9FoNBoNxTAMg0AgEAgEAoFAIBAIBALBMKoD60W/4m+LYZjLgjD/vwPjMZ/PaDSa6oEPyOfz4xgGv99PMZlMYRiGaaCZTEN4t9sFGo1m2traTACoVqvIZDLQarWIxWLC5/Ohef7S09OzOBwOLCwsYBzHsLGxgePxcOLECYRCIer1euRyOXQ6HZimwe12a2trrK6uYjabodFovqscnU7HsHk8HsrlMqRSKTI5OTn9IzQaTebn51mNRuR2u4kzHA5H1Ot1kslkxGIx5PP55PP5VBQNwzD0er1kMpmc1VoEAoFAIBAIBAKBQCAQCARhGHa73RDsFjMwWK2DAAAAAElFTkSuQmCC') no-repeat 98% center;
            background-color: #fff;
            border: 1px solid #ced4da;
        }
    </style>

    <div class="container">
        <div  style="display: flex; justify-content: space-between; align-items: center;">
            <h3>Add Category</h3>
            <a href="{{ route('dashboard') }}" class="fa fa-hand-o-left fa-2x text-black" style="margin-left: auto;"></a>
        </div>


        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="name">Category name</label>
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder="Category" id="name" class="form-control" name="name" required
                        autofocus>
                </div>
            </div>

            <!-- Other rows can be added similarly -->
            <!-- Product Slug -->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Category Slug</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Category Slug"
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
            <div class="form-group row">
                <label for="">Status</label>
                <div class="col-md-3">
                    <input type="checkbox" name="status">
                </div>

                <label for="">popular</label>
                <div class="col-md-3">
                    <input type="checkbox" name="popular">
                </div>
            </div>

            <!-- Product Image -->
            <div class="form-group row">
                <label for="image" class="col-md-2 col-form-label">Image</label>
                <div class="col-md-6">
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
