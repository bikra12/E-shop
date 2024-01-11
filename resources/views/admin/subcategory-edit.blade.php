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
    {{-- @if ($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
@endif --}}
    <div class="container">
        <div class="card-header "
            style="display: flex; justify-content: space-between; align-items: center;">
            <h3>Subcategory Edit </h3>
            <a href="{{ route('dashboard') }}" class="fa fa-hand-o-left fa-2x text-black" style="margin-left: auto;"></a>
        </div>

        
        <form action="{{ route('subcategory.update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf


            <!-- Category -->
            <div class="form-group row">
                <label for="category_id" class="col-md-2 col-form-label"> Category</label>
                <div class="col-md-6">
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">None</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }} </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- Subategory name -->
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="name">SubCategory name</label>
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="subategory" id="name" class="form-control" name="name"
                        value="{{ $subcategory->name }}" required autofocus>
                </div>
            </div>
            <!-- Other rows can be added similarly -->
            <!-- Subategory Slug -->
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Subategory Slug</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Subategory Slug"
                        value="{{ $subcategory->slug }}" required>
                </div>
            </div>

            <!-- Subategory Description -->
            <div class="form-group row">
                <label for="description" class="col-md-2 col-form-label">Description</label>
                <div class="col-md-6">
                    <textarea class="form-control" id="description" name="description" value="{{ $subcategory->description }}"
                        placeholder="Description" rows="3" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="">Status</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" {{ $subcategory->status == '1' ? 'checked' : '' }} name="status">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="">Popular</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" {{ $subcategory->popular == '1' ? 'checked' : '' }} name="popular">
                </div>
            </div>
            <!-- Subategory Image -->
            <div class="form-group row">
                <label for="image" class="col-md-2 col-form-label">Image</label>
                <img src="{{ asset('assets/uploads/subcategory/' . $subcategory->image) }}"
                    class="featurette-image img-fluid mx-auto" width="100">
                <div class="col-md-6">
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
