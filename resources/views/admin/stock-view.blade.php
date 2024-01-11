@extends('admin/dashboard')

@section('content')

<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f8fafc;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    table th, table td {
        vertical-align: middle;
    }

    .btn-danger {
        background-color: #e74c3c;
        border-color: #e74c3c;
    }

    .btn-danger:hover {
        background-color: #d62c1a;
        border-color: #d62c1a;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="mb-0">Stock</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th>Product</th>
                                {{-- <th>Color</th>
                                <th>Size</th> --}}
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $stock)
                            <tr>
                                <td>{{ $stock->product->name }}</td>
                                {{-- <td>{{ $stock->color->name }}</td>
                                <td>{{ $stock->size->name }}</td> --}}
                                <td>{{ $stock->quantity_available }}</td>
                                <td>
                                    <form action="{{ route('products.decreaseStock', $stock->product_id) }}" method="post" class="d-flex justify-content-center">
                                        @csrf
                                        <div class="input-group w-75">
                                            <input type="number" name="quantity" class="form-control" placeholder="Decrease Quantity">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-danger">Decrease</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- 
                            <td>
                                <form action="{{ route('products.decreaseStock', $stock->product_id) }}" method="post">
                                    @csrf
                                    <input type="number" name="quantity" placeholder="Decrease Quantity">
                                    <button type="submit">Decrease</button>
                                </form>
                            </td> --}}
           