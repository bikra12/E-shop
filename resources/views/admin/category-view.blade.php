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

                <!-- Uncomment if you want the Add category button -->
                <!--
                <div class="mb-3">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Add category</a>
                </div>
                -->

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
                                    <th>Category Name</th>
                                    <th>Sub category</th>
                                    <th>Product</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/category/'.$category->image ) }}" class="featurette-image img-fluid mx-auto" width="100">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <ul class="sclist">
                                                @foreach ($category->subcategories as $scategory)
                                                    <li><i class="fa fa-caret-right"></i> {{ $scategory->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="sclistt">
                                                @foreach ($category->subcategories as $scategory)
                                                    @foreach ($scategory->products as $product)
                                                        <li><i class="fa fa-caret-right"></i> {{ $product->name }}</li>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <!-- Action buttons can be added here. Example: -->
                                            <!--
                                        {{-- <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                                        -->
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="fa fa-pencil-square-o fa-lg"></a>
                                            {{-- <a href="{{ route('category.destroy',$category->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No categories available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
