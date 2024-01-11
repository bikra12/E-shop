{{-- @extends('admin.dashboard')

@section('content')

<form action="{{ route('stock.store') }}" method="post">
    @csrf
    <select name="product_id">
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>

    {{-- <select name="color_id">
        @foreach($colors as $color)
            <option value="{{ $color->id }}">{{ $color->name }}</option>
        @endforeach
    </select>

    <select name="size_id">
        @foreach($sizes as $size)
            <option value="{{ $size->id }}">{{ $size->name }}</option>
        @endforeach
    </select> --}}

    {{-- <input type="number" name="quantity_available" placeholder="Quantity">
    <button type="submit">Add Stock</button>
</form>
@endsection --}}

@extends('admin.dashboard')

@section('content')

<style>
    body {
        background-color: #f5f7f9;
    }

    .custom-form-container {
        background: #ffffff;
        padding: 30px 40px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .btn-custom {
        background-color: #3498db;
        color: #ffffff;
        border: none;
    }

    .btn-custom:hover {
        background-color: #2980b9;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="custom-form-container">
                <h3 class="mb-4">Add Stock</h3>
                <form action="{{ route('stock.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label>Product</label>
                        <select name="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Uncomment when ready to use colors & sizes -->
                    {{-- 
                    <div class="form-group">
                        <label>Color</label>
                        <select name="color_id" class="form-control">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Size</label>
                        <select name="size_id" class="form-control">
                            @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    --}}

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity_available" placeholder="Quantity" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-custom btn-block">Add Stock</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
