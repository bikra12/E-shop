@extends('homeMaster')

@section('content')
    <style>
        /* Global Styles */

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
        }




        /* Carousel Styles */
        .carousel-inner img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            padding: 10px;
        }

        /* Product Styles */
        .product-card,
        .product {
            border: 1px solid #f0f0f0;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s;
            background: #fff;
        }

        .product-card:hover,
        .product:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
        }
        .product-image {
    width: 100%; /* Set the desired width */
    height: auto; /* Maintain aspect ratio */
    max-height: 150px; /* Set the maximum height as needed */
    object-fit: cover; /* Ensure the image covers the container */
}

        .product img,
        .product-card img {
            width: 100px;
            height: 150px;
            object-fit: cover;
        }

        .product-card-body,
        .product {
            padding: 15px;
            text-align: center;
        }

        .product-name,
        .product-card-title {
            font-size: 1.1em;
            font-weight: 600;
            color: #555;
            margin: 10px 0;
        }

        .product-price,
        .product-card-price {
            color: #E91E63;
            font-size: 1.2em;
        }

        .owl-carousel {
            margin-top: 10px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        /* Main styling for the entire row of categories */
        .category-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;

            gap: 20px;
            /* Spaces between categories */
        }

        .category {
            position: relative;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .subcategories {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #e0e6e5;
            border: 1px solid #d2cfcf;
            border-radius: 5px;
            width: 300px;
            z-index: 1;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            display: none;
            padding: 10px;
            font-size: 14px;
            /* Smaller font for subcategories */
            color: #777;
        }

        .category:hover .subcategories {
            display: block;
        }



        .category:hover {
            background-color: #f9f9f9;
            /* Light gray background on hover */
        }

        /* Styling for category image */
        .featurette-image {
            max-width: 100%;
            /* Ensures the image doesn't overflow the category box */
            border-radius: 5px;
        }

        /* Styling for category name */
        .category-name {
            font-size: 18px;
            /* Adjust font size based on your needs */
            color: #333;
            /* Dark gray text color */
            margin-bottom: 10px;
            /* Space between the category name and subcategories */
        }

        .img-fluid {
            width: 90%;
            height: 100;
        }
        .custom-subcategory {
    margin-bottom: 1rem; /* Adjust margin-bottom as needed */
    /* Additional styling if necessary */
}

    </style>

  

<div class="category-row mt-3 mb-3">
    @foreach ($featured_category as $category)
        <div class="category p-1">
            <img src="{{ asset('assets/uploads/category/' . $category->image) }}"
                class="featurette-image img-fluid mx-auto" alt="{{ $category->name }}" width="30">
            <h4 class="category-name mt-2">{{ $category->name }}</h4>
            <div class="subcategories hidden">
                @foreach ($category->subcategories as $subcategory)
                <div class="subcategory custom-subcategory">
                    <a href="{{ route('viewsubcategory', $subcategory->slug) }}">
                        <p class="mb-1">{{ $subcategory->name }}</p>
                    </a>
                </div>
            @endforeach
            
            </div>
        </div>
    @endforeach
</div>



    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://source.unsplash.com/1400x250/?ecomerce,banner" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-black">well come to E-shop</h2>
                        <p class="text-black">Technology news,Devlopment and Trends </p>
                        {{-- <button class="btn btn-danger">Technology</button>
            <button class="btn btn-light">Devlopment</button>
            <button class="btn btn-success">Trends</button> --}}
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/1400x250/?camera,," class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-black">well come </h2>
                        <p class="text-black">Technology news,Devlopment and Trends </p>
                        {{-- <button class="btn btn-danger">Technology</button>
            <button class="btn btn-light">Devlopment</button>
            <button class="btn btn-success">Trends</button> --}}
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="https://source.unsplash.com/1400x200/?laptop," class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2text-black>well come to Best coding blog</h2>
                            <ptext-black>Technology news,Devlopment and Trends </p>
                                {{-- <button class="btn btn-danger">Technology</button>
              <button class="btn btn-light">Devlopment</button>
              <button class="btn btn-success">Trends</button> --}}
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    {{-- 
                    <!-- Trending Products -->
                    <div class="py-5">
                    <h4 class="mb-4">Trending Product</h4>
                    <div class="row">
                        @foreach ($featured_product as $product)
                        <div class="col-md-3 mb-4">
                            <div class="product-card">             
                                <div class="product-card-body">
                                    <img src="{{ asset('assets/uploads/product/' . $product->images->first()->filename) }}" alt="Product Image" class="featurette-image img-fluid mx-auto">
                                    <h6 class="product-card-title">{{ $product->name }}</h6>
                                    <p class="product-card-price">${{ $product->selling_price }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div> --}}
    <!-- Trending Products -->
    <div class="py-3">
        <h4 class="mb-0">TRENDING PRODUCTS</h4>
        <div class="owl-carousel owl-theme">
            @foreach ($featured_product as $product)
                <div class="item">
                    <a href="{{ route('viewproduct', $product->slug) }}">
                        <div class="product-card">
                            <div class="product-card-body">
                                <img src="{{ asset('assets/uploads/product/' . $product->images->first()->filename) }}"
                                    alt="Product Image" class="img-fluid product-image">
                                <h6 class="product-card-title">{{ $product->name }}</h6>
                                <p class="product-card-price">Rs {{ $product->selling_price }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    

    <!-- Trending categry -->
    <div class="py-3">
        <h4 class="mb-0">TRENDING CATEGORY</h4>
        <div class="owl-carousel owl-theme">
            @foreach ($featured_subcategory as $subcategory)
                <div class="item">
                    <a href="{{ route('viewsubcategory', $subcategory->slug) }}">
                        {{-- <a href="{{ url('view-subcategory/' . $subcategory->slug) }}"> --}}
                        <div class="product-card">
                            <div class="product-card-body">
                                <img src="{{ asset('assets/uploads/subcategory/' . $subcategory->image) }}">
                                <h6 class="product-card-title">{{ $subcategory->name }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    {{-- <!-- All Products -->
    <section>
        <h3 class="mb-4">All products</h3>
        <div class="products">
            @foreach ($products as $product)
                <div class="product">
                    <img src="{{ asset('assets/uploads/product/' . $product->images->first()->filename) }}"
                        alt="Product Image" class="w-100">
                    <h4 class="product-name">{{ $product->name }}</h4>
                    <p class="product-price">Price: {{ $product->selling_price }}</p>
                </div>
            @endforeach
        </div>
    </section> --}}
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const categories = document.querySelectorAll('.category');

        categories.forEach(function(category) {
            category.addEventListener('click', function() {
                const subcategories = this.querySelector('.subcategories');
                subcategories.classList.toggle('hidden');
            });
        });
    });
</script>
<!-- Your Custom JS -->
<script>
    $('input[name="query"]').on('keyup', function() {
        let query = $(this).val();
        // Call your server to get search results
        $.get('/searchResults?query=' + query, function(data) {
            // Display your data, maybe in a dropdown below the search bar
        });
    });
</script>
@section('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });
    </script>
@endsection
