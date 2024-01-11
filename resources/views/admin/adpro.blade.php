@extends('layout/layout')

@section('space-work')


<h3 class="mb-4">product</h3>

    <form action="{{route('product.store')}}" method="POST"  enctype="multipart/form-data">
        @csrf
   

        <div class="row mt-3">
            <div class="col-md-2">
                <label for="">Sub Category </label>
            </div>
            <div class="col-md-4">
                <select name="subcategory_id"  class="form-control" style="border: 1px solid;" >
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
                required autofocus>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">Decription</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" description" id="" class="form-control" name="description"
                required autofocus>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">original price</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" original price" id="" class="form-control" name="original_price"
                required autofocus>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">selling price</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" selling price" id="" class="form-control" name="selling_price"
                required autofocus>
            </div>
        </div>

        <div class="form-group">
            <label>Image:</label>
            <input type="file" name="image" class="form-control" >
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">Tax</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" taxes" id="" class="form-control" name="tax"
                required autofocus>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">Quantity</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" Quantity" id="" class="form-control" name="qty"
                required autofocus>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-2">
                <label for="">Status</label>
            </div>
            <div class="col-md-4">
                <input type="checkbox"  name="status">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">Trending</label>
            </div>
            <div class="col-md-4">
                <input type="checkbox"  name="trending">
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label for="">meta Title</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" meta_title" id="" class="form-control" name="meta_title"
                required autofocus>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">meta_keywords</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" meta_keywords" id="" class="form-control" name="meta_keywords"
                required autofocus>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">meta_description</label>
            </div>
            <div class="col-md-4">
                <input type="text" placeholder=" meta_description" id="" class="form-control" name="meta_description"
                required autofocus>
            </div>
        </div>

        <input type="submit" value="Submit" class="btn btn-primary">
    </form>

@endsection