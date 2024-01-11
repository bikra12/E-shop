

@extends('admin/dashboard')

@section('content')

<style>
    /* Reset and Fonts */
    body {
        font-family: 'Noto Sans', sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }

    nav svg {
        height: 20px;
    }

    nav .hidden {
        display: block !important;
    }

    /* Container */
    .container {
        max-width: 1200px;
        margin: 40px auto;
        background-color: #fff;
        border-radius: 10px;
        padding: 20px 40px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    /* Panel */
    .panel {
        border: none;
    }

    .panel-heading {
        background-color: #007bff;
        padding: 10px 15px;
        border-radius: 5px 5px 0 0;
        color: #fff;
    }

    h3 {
        font-weight: 600;
        margin-bottom: 20px;
    }

    /* Table styles */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 123, 255, 0.05);
    }

    .table {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table th, .table td {
        padding: 15px 20px;
    }

    .table th {
        background-color: #f5f5f5;
    }

    .table td {
        background-color: #fff;
    }

    /* Button styles */
    .btn {
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
    }

    .btn-danger {
        background-color: #d9534f;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }

    .btn-sm:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    }
</style>



<div>
    <div class="container" style="paddding:30px 0;">
        <div class="col-md-12">
            {{-- <div>
              {{-- <button>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                </button> --}}
               
              
            <div class="panel panel-default">
                <div class="panle-heading">
                    <div  style="display: flex; justify-content: space-between; align-items: center;">
                        <h3>All Products</h3>
                        <a href="{{ route('dashboard') }}" class="fa fa-hand-o-left fa-2x text-black" style="margin-left: auto;"></a>
                    </div>
                    
                </div>
                    
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th> Subcategory</th>
                                <th>Pic</th>
                                
                                <th>Products Name</th>
                                {{-- <th>Description</th> --}}
                                <th>Original price</th>
                                <th>Selling price</th>
                                
                                {{-- <th>quentity</th> --}}
                                {{-- <th>Tax</th> --}}
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>

                                <td>{{ $product->subcategories->name }}</td>
                                
                                    {{-- @if($product->image)
                                       
                                        <img src="{{ asset('assets/uploads/product/'.$product->image ) }}" class="featurette-image img-fluid mx-auto" width="100">
                                    @else
                                        <img src="https://source.unsplash.com/50x50/?electronic" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="50">
                                        
                                    @endif --}}
                                    {{-- @foreach($product->images as $image)
                                    <img src="{{ asset('assets/uploads/product/' . $image->filename) }}" alt="Product Image"class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="50">
                                    @endforeach
                                     --}}
                                     <td>
                                        @if($product->images->isNotEmpty())
                                            <img src="{{ asset('assets/uploads/product/' . $product->images->first()->filename) }}" alt="Product Image" class="featurette-image img-fluid mx-auto" width="110">
                                        @else
                                            {{-- <img src="https://source.unsplash.com/50x50/?product" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="50"> --}}
                                        @endif
                                    </td>
                                    
                                </td> 
                                <td>{{ $product->name }}</td> 
                                <td>{{ $product->original_price }}</td> 
                                <td>{{ $product->selling_price }}</td> 
                                
                                {{-- <td>{{ $product->qty }}</td>  --}}
                                {{-- <td>{{ $product->tax }}</td>  --}}
                                <td>{{ $product->status }}</td> 
                                <td>
                                    <a href="{{ route('edit', $product->id) }}" class="fa fa-pencil-square-o fa-lg"></a>
                                    <a href="{{ route('destroy', $product->id) }}" class="fa fa-trash-o fa-lg"></a>
                                </td>
                                

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Add the pagination links here -->
                {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection