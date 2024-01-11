@extends('admin/dashboard')

@section('content')
    <style>
        .sclist,
        .sclistt {
            list-style: none;
        }

        .sclist li,
        .sclistt li {
            margin-bottom: 5px;
        }
    </style>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header bg-primary text-white" style="display: flex; justify-content: space-between; align-items: center;">
                        <h3>All Categories</h3>
                        <a href="{{ route('dashboard') }}" class="fa fa-hand-o-left fa-2x text-white" style="margin-left: auto;"></a>
                    </div>
                    
                    
                    

                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Picture</th>
                                    <th>Sub category</th>
                                    <th>Category Name</th>
                                    <th>Product</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory->id }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/subcategory/'.$subcategory->image ) }}" class="featurette-image img-fluid mx-auto" width="100">
                                        </td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->categories->name }}</td>

                                       
                                        <td>-</td>
                                        <td>
                                            <a href="{{ route('subcategory.edit',$subcategory->id) }}"  class="fa fa-pencil-square-o fa-lg"></a>
                                            {{-- <a href="{{ route('destroy',$product->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
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
