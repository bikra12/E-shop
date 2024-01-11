@extends('LoginMaster')

@section('content')
    <style> 00
        /* Global Resets */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .container-fluid {
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
        }

  

        /* Sidebar Filters */
        .btn-outline-secondary {

            padding: 12px 20px;
        }

        .accordion-button {
            font-weight: bold;
            padding: 12px 20px;
        }

        .accordion-collapse {
            border-top: 1px solid #ddd;
            padding: 10px 20px;
        }

        .list-unstyled {
            padding: 10px 0;
        }

        .list-unstyled li {
            padding: 10px 0;
        }

        .form-check-label {
            margin-right: 10px;
        }

        /* Product Listing */
        .card {

            overflow: hidden;


        }

        .bg-image img {
            border-radius: 10px;
        }

        .card-body {
            padding: 15px;
        }

        .card h5 {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .text-success {
            font-weight: bold;
            font-size: 14px;
        }

        .btn-light.icon-hover:hover {
            background-color: #f5f5f5;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-light.icon-hover {
            padding: 8px 12px;
        }
    </style>
    <div class="container-fluid p-0">

       

        <div class="row no-gutters mt-0">

            <!-- Sidebar Filters -->
            <div class="col-lg-3 d-block d-lg-none mb-3">
                <button class="btn btn-outline-secondary w-100" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent">
                    Show filter
                </button>
            </div>

            <div class="col-lg-3">
                <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
                    <!-- Filter sections will go here -->
                    <!-- Collapsible wrapper -->
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Related items
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                <div class="accordion-body">
                                    <ul class="list-unstyled">
                                        <li><a href="#" class="text-dark">Electronics </a></li>
                                        <li><a href="#" class="text-dark">Home items </a></li>
                                        <li><a href="#" class="text-dark">Books, Magazines </a></li>
                                        <li><a href="#" class="text-dark">Men's clothing </a></li>
                                        <li><a href="#" class="text-dark">Interiors items </a></li>
                                        <li><a href="#" class="text-dark">Underwears </a></li>
                                        <li><a href="#" class="text-dark">Shoes for men </a></li>
                                        <li><a href="#" class="text-dark">Accessories </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bootstrap JS libraries -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>

                    <div class="accordion" id="accordionPanelsStayOpenExample">
                       
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button text-dark bg-light" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#panelsStayOpen-collapseTwo"
                                    aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                    Brands
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                aria-labelledby="headingTwo">
                                <div class="accordion-body">
                                    <div>
                                        <!-- Checked checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked1" checked />
                                            <label class="form-check-label" for="flexCheckChecked1">Mercedes</label>
                                            <span class="badge badge-secondary float-end">120</span>
                                        </div>
                                        <!-- Checked checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked2" checked />
                                            <label class="form-check-label" for="flexCheckChecked2">Toyota</label>
                                            <span class="badge badge-secondary float-end">15</span>
                                        </div>
                                        <!-- Checked checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked3" checked />
                                            <label class="form-check-label" for="flexCheckChecked3">Mitsubishi</label>
                                            <span class="badge badge-secondary float-end">35</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button text-dark bg-light" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#panelsStayOpen-collapseThree"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    Price
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                                aria-labelledby="headingThree">
                                <div class="accordion-body">
                                    <div class="range">
                                        <input type="range" class="form-range" id="customRange1" />
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <p class="mb-0">
                                                Min
                                            </p>
                                            <div class="form-outline">
                                                <input type="number" id="typeNumber" class="form-control" />
                                                <label class="form-label" for="typeNumber">$0</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">
                                                Max
                                            </p>
                                            <div class="form-outline">
                                                <input type="number" id="typeNumber" class="form-control" />
                                                <label class="form-label" for="typeNumber">$1,0000</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="btn btn-white w-100 border border-secondary">apply</button>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button text-dark bg-light" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#panelsStayOpen-collapseFour"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                    Size
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show"
                                aria-labelledby="headingThree">
                                <div class="accordion-body">
                                    <input type="checkbox" class="btn-check border justify-content-center"
                                        id="btn-check1" checked autocomplete="off" />
                                    <label class="btn btn-white mb-1 px-1" style="width: 60px;"
                                        for="btn-check1">XS</label>
                                    <input type="checkbox" class="btn-check border justify-content-center"
                                        id="btn-check2" checked autocomplete="off" />
                                    <label class="btn btn-white mb-1 px-1" style="width: 60px;"
                                        for="btn-check2">SM</label>
                                    <input type="checkbox" class="btn-check border justify-content-center"
                                        id="btn-check3" checked autocomplete="off" />
                                    <label class="btn btn-white mb-1 px-1" style="width: 60px;"
                                        for="btn-check3">LG</label>
                                    <input type="checkbox" class="btn-check border justify-content-center"
                                        id="btn-check4" checked autocomplete="off" />
                                    <label class="btn btn-white mb-1 px-1" style="width: 60px;"
                                        for="btn-check4">XXL</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Use Bootstrap's accordion component -->
                    <script></script>
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                    <strong>32 Items found</strong>
                    <div class="d-flex align-items-center">
                        <select class="form-select border mr-2">
                            <option value="0">Best match</option>
                            <!-- other options -->
                        </select>
                        <div class="btn-group">
                            <a href="#" class="btn btn-light"><i class="fa fa-bars fa-lg"></i></a>
                            <a href="#" class="btn btn-light active"><i class="fa fa-th fa-lg"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Loop through products -->
                    @foreach ($products as $product)
                        <div class="col-md-12 col-sm-6 mb-0">
                            <!-- Product card -->
                            <a href="{{ route('viewproduct', $product->slug) }}">

                                <div class="card shadow-0 border rounded-3">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <!-- Product Image -->
                                            <div class="col-xl-3 col-md-4 d-flex justify-content-center">
                                                <div
                                                    class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0">
                                                    <picture>
                                                        <img src="{{ asset('assets/uploads/product/' . $product->images->first()->filename) }}"class="w-100"
                                                            alt="{{ $product->name }}">
                                                        {{-- <source srcset="{{ $product->webp_image_url }}" type="image/webp"> --}}
                                                        {{-- <img src="{{ $product->image_url }}" class="w-100" alt="{{ $product->name }}"> --}}
                                                    </picture>
                                                    <a href="{{ route('product.view', $product->id) }}">
                                                        <div class="hover-overlay">
                                                            <div class="mask"
                                                                style="background-color: rgba(253, 253, 253, 0.15);">
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- Product Details -->
                                            <div class="col-xl-6 col-md-5 col-sm-7">
                                                <h5>{{ $product->name }}</h5>
                                                {{-- <div class="d-flex flex-row">
                                                <!-- Assuming you have ratings and order count for the product -->
                                                <div class="text-warning mb-1 me-2">
                                                    <!-- Loop for ratings. Adjust accordingly based on your rating system -->
                                                    @for ($i = 0; $i < floor($product->rating); $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @if ($product->rating - floor($product->rating) > 0)
                                                        <i class="fas fa-star-half-alt"></i>
                                                    @endif
                                                    <span class="ms-1">{{ $product->rating }}</span>
                                                </div>
                                                <span class="text-muted">{{ $product->order_count }} orders</span>
                                            </div> --}}
                                                <p class="text mb-4 mb-md-0">
                                                    {{ $product->description }}
                                                </p>
                                            </div>

                                            <!-- Price and Buttons -->
                                            <div class="col-xl-3 col-md-3 col-sm-5">
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <h4 class="mb-1 me-1">
                                                        Rs {{ $product->selling_price }}
                                                    </h4>
                                                    <!-- Assuming you have an old_price attribute for discounted products -->
                                                    @if ($product->original_price)
                                                        <span class="text-danger"><s>Rs
                                                                {{ $product->original_price }}</s></span>
                                                    @endif
                                                </div>
                                                <h6 class="text-success">Free shipping</h6>
                                                {{-- <div class="mt-4">
                                                    <button class="btn btn-primary shadow-0" type="button">Buy
                                                        this</button>
                                                    <a href="#!" class="btn btn-light border px-2 pt-2 icon-hover"><i
                                                            class="fas fa-heart fa-lg px-1"></i></a>
                                                </div> --}}
                                                <a href="{{ route('cart.view') }}">
                                                    <button type="submit" class="btn btn-warning shadow-0">
                                                        <i class="me-1 fa fa-shopping-basket"></i> Buy now
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
