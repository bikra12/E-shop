@extends('LoginMaster')

@section('content')
    <style>
        /* Base */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }

        /* Search Bar */
        .search-wrapper {
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }

        .search-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .search-input {
            padding: 10px;
            width: 400px;
            border-radius: 5px 0 0 5px;
            border: 1px solid #ccc;
        }

        .search-btn {
            padding: 10px 15px;
            border-radius: 0 5px 5px 0;
        }

        /* Sidebar */
        .btn-outline-secondary {
            background: #f6f6f6;
            border: 1px solid #ddd;
            color: #333;
        }

        /* Content */
        h5,
        p {
            text-align: center;
        }

        /* For larger screens */
        @media screen and (min-width: 992px) {
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 80vh;
            }
        }
    </style>


    <div class="main-container">

        <div class="search-wrapper">
            <form action="{{ route('search') }}" method="get" class="search-form">
                <input type="text" class="search-input" placeholder="Search products, brands and more..." name="query">
                <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="container mt-50">

            <div class="row">


                <!-- sidebar + content -->
                <section class="">
                    <div class="container">
                        <div class="row">
                            <!-- sidebar -->
                            <div class="col-lg-3">
                                <!-- Toggle button -->
                                <button class="btn btn-outline-secondary mb-3 w-100 d-lg-none" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span>Show filter</span>
                                </button>
                                <!-- Collapsible wrapper -->
                                <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button text-dark bg-light" type="button"
                                                    data-mdb-toggle="collapse" data-mdb-target="#panelsStayOpen-collapseOne"
                                                    aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                    Related items
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne">
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
                                                            <label class="form-check-label"
                                                                for="flexCheckChecked1">Mercedes</label>
                                                            <span class="badge badge-secondary float-end">120</span>
                                                        </div>
                                                        <!-- Checked checkbox -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckChecked2" checked />
                                                            <label class="form-check-label"
                                                                for="flexCheckChecked2">Toyota</label>
                                                            <span class="badge badge-secondary float-end">15</span>
                                                        </div>
                                                        <!-- Checked checkbox -->
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexCheckChecked3" checked />
                                                            <label class="form-check-label"
                                                                for="flexCheckChecked3">Mitsubishi</label>
                                                            <span class="badge badge-secondary float-end">35</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button text-dark bg-light" type="button"
                                                    data-mdb-toggle="collapse"
                                                    data-mdb-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                                    aria-controls="panelsStayOpen-collapseThree">
                                                    Price
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseThree"
                                                class="accordion-collapse collapse show" aria-labelledby="headingThree">
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
                                                                <input type="number" id="typeNumber"
                                                                    class="form-control" />
                                                                <label class="form-label" for="typeNumber">$0</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">
                                                                Max
                                                            </p>
                                                            <div class="form-outline">
                                                                <input type="number" id="typeNumber"
                                                                    class="form-control" />
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
                                                    data-mdb-toggle="collapse"
                                                    data-mdb-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                                    aria-controls="panelsStayOpen-collapseFour">
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
                                </div>
                            </div>

                            <!-- sidebar end -->


                            <!-- content -->
                            <div class="col-lg-9">
                                <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                                    <strong class="d-block py-2">32 Items found </strong>
                                    <div class="ms-auto">
                                        <select class="form-select d-inline-block w-auto border pt-1">
                                            <option value="0">Best match</option>
                                            <option value="1">Recommended</option>
                                            <option value="2">High rated</option>
                                            <option value="3">Randomly</option>
                                        </select>
                                        <div class="btn-group shadow-0 border">
                                            <a href="#" class="btn btn-light" title="List view">
                                                <i class="fa fa-bars fa-lg"></i>
                                            </a>
                                            <a href="#" class="btn btn-light active" title="Grid view">
                                                <i class="fa fa-th fa-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </header>
                            </div>

                            {{-- <!-- content -->
                                    <div class="col-lg-9">

                                        <div class="row">
                                            @foreach ($products as $product)
                                                <div class="col-md-4 col-sm-6 mb-4">
                                                    <div class="bg-image hover-overlay ripple rounded ripple-surface">
                                                        <picture>
                                                            <source srcset="{{ $product->webp_image_url }}" type="image/webp">
                                                            <img src="{{ $product->image_url }}" class="w-100"
                                                                alt="{{ $product->name }}">
                                                        </picture>
                                                        <a href="{{ route('product.view', $product->id) }}" target="_blank">
                                                            <div class="mask"></div>
                                                        </a>
                                                    </div>
                                                    <h5 class="mt-2">{{ $product->name }}</h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div> --}}
                            <!-- content end -->

                            <div class="container mt-4">

                                <div class="col-lg-">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-md-12 mb-4">
                                                <div class="card shadow-0 border rounded-3">
                                                    <a href="{{ route('viewproduct', $product->slug) }}">
                                                        <div class="card-body">
                                                            <div class="row g-0">
                                                                <!-- Product Image -->
                                                                <div
                                                                    class="col-xl-3 col-md-4 d-flex justify-content-center">
                                                                    <div
                                                                        class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0">
                                                                        <picture>
                                                                            <img src="{{ asset('assets/uploads/product/' . $product->images->first()->filename) }}"class="w-100"
                                                                                alt="{{ $product->name }}">
                                                                            {{-- <source srcset="{{ $product->webp_image_url }}" type="image/webp"> --}}
                                                                            {{-- <img src="{{ $product->image_url }}" class="w-100" alt="{{ $product->name }}"> --}}
                                                                        </picture>
                                                                        <a
                                                                            href="{{ route('product.view', $product->id) }}">
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
                                                                            ${{ $product->selling_price }}
                                                                        </h4>
                                                                        <!-- Assuming you have an old_price attribute for discounted products -->
                                                                        @if ($product->original_price)
                                                                            <span
                                                                                class="text-danger"><s>${{ $product->original_price }}</s></span>
                                                                        @endif
                                                                    </div>
                                                                    <h6 class="text-success">Free shipping</h6>
                                                                    <div class="mt-4">
                                                                        <button class="btn btn-primary shadow-0"
                                                                            type="button">Buy this</button>
                                                                        <a href="#!"
                                                                            class="btn btn-light border px-2 pt-2 icon-hover"><i
                                                                                class="fas fa-heart fa-lg px-1"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            </section>
        </div>
    @endsection
