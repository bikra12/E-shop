@extends('LoginMaster')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <style>
        .thumbnail-image {
            width: 60px;
            height: 60px;
            cursor: pointer;
        }

        .main-image {
            width: 100%;
            max-height: 100vh;
            object-fit: contain;
            display: none;
        }

        .product-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 18px;
            color: #28a745;
            /* Green color for the price */
            margin-bottom: 10px;
        }

        .original-price {
            font-size: 16px;
            color: #dc3545;
            /* Red color for the original price */
            text-decoration: line-through;
            margin-right: 10px;
        }

        .product-description {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .quantity-label {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            margin-right: 10px;
        }

        .buy-now-btn {
            background-color: #ffc107;
            /* Yellow color for the Buy Now button */
            color: #000;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .add-to-cart-btn {
            background-color: #007bff;
            /* Blue color for the Add to Cart button */
            color: #fff;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .save-btn {
            background-color: #6c757d;
            /* Gray color for the Save button */
            color: #fff;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .custom-description {
            margin-top: 1.5rem;
            /* Adjust margin-top as needed */
            padding: 1rem;
            /* Adjust padding as needed */
            color: #555;
            /* Set the default text color */

            /* Hover effect */
            transition: color 0.3s ease;
        }

        .custom-description:hover {
            color: #030303;
            /* Set the hover text color */
        }
    </style>
    <!-- content -->
    {{-- <a href="{{ route('cart.view') }}" class="btn btn-primary shadow-0" style="margin-left: 80%;"> <i
            class="me-1 fa fa-shopping-basket"></i> View
        cart </a> --}}

    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="mb-3 d-flex justify-content-center" style="padding: 20px; margin: 10px;">
                        <a data-fslightbox="mygalley" class="" target="_blank" data-type="image"
                            href="{{ asset('assets/uploads/product/' . $products->images->first()->filename) }}">
                            <img style="max-width: 120%; max-height: 120vh; margin: auto;"
                                src="{{ asset('assets/uploads/product/' . $products->images->first()->filename) }}"
                                alt="Product Image"
                                class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">
                        </a>
                    </div>


                    <div class="d-flex justify-content-center mb-3">
                        @foreach ($products->images as $image)
                            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                                href="{{ asset('assets/uploads/product/' . $image->filename) }}" class="item-thumb">
                                <img width="90" height="90" class="rounded-2"
                                    src="{{ asset('assets/uploads/product/' . $image->filename) }}" />
                            </a>
                        @endforeach

                    </div>
                    <!-- thumbs-wrap.// -->
                    <!-- gallery-wrap .end// -->
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h2 class="title text-dark">
                            {{ $products->name }}
                        </h2>


                        <div class="d-flex flex-row align-items-center mb-1">
                            <h1 class="mb-1 me-2">
                                ₹{{ $products->selling_price }}
                            </h1>
                            <!-- Assuming you have an old_price attribute for discounted products -->
                            <span class="text-danger"><s> ₹{{ $products->original_price }}</s></span>
                        </div>



                        <div class="mt-6 custom-description">
                            <strong>Description</strong>
                            <div>{{ $products->description }}</div>
                        </div>


                    </Div>

                    {{-- <div class="row">
                                    <dt class="col-3">Type:</dt>
                                    <dd class="col-9">Regular</dd>

                                    <dt class="col-3">Color</dt>
                                    <dd class="col-9">Brown</dd>

                                    <dt class="col-3">Material</dt>
                                    <dd class="col-9">Cotton, Jeans</dd>

                                    <dt class="col-3">Brand</dt>
                                    <dd class="col-9">Reebook</dd>
                                </div> --}}



                    {{-- <div class="row mb-4">
                                    <div class="col-md-4 col-6">
                                        <label class="mb-2">Size</label>
                                        <select class="form-select border border-secondary" style="height: 35px;">
                                        <option>Small</option>
                                        <option>Medium</option>
                                        <option>Large</option>
                                        </select>
                                    </div> --}}
                    <!-- col.// -->
                    {{-- <div class="col-md-4 col-6 mb-3">
                            <label class="mb-2 d-block">Quantity</label>
                            <div class="input-group mb-3" style="width: 170px;">
                                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="text" class="form-control text-center border border-secondary"
                                    placeholder="1" aria-label="Example text with button addon"
                                    aria-describedby="button-addon1" />
                                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2"
                                    data-mdb-ripple-color="dark">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> --}}


                    <div class="col-md-4 col-6 mb-3">
                        <label class="mb-2 d-block">Quantity</label>
                        <div class="input-group mb-3" style="width: 170px;">
                            <button type="button" class="btn btn-white border border-secondary px-3" id="button-addon1">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- Ensure the quantity input has a name so it can be sent with the form -->
                            <input type="number" name="quantity" class="form-control text-center border border-secondary"
                                value="1" />
                            <button type="button" class="btn btn-white border border-secondary px-3" id="button-addon2">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div>
                        <form action="{{ route('cart.buy', $products->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-warning shadow-0">
                                <i class="me-1 fa fa-shopping-basket"></i> Buy now
                            </button>
                        </form>
                    
                        <form action="{{ route('cart.add', $products->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-primary shadow-0">
                                <i class="me-1 fa fa-shopping-basket"></i> Add to cart
                            </button>
                        </form>
                    
                        <a href="{{ route('cart.view') }}" class="btn btn-light border border-secondary py-2 icon-hover px-3 d-inline-block">
                            <i class="me-1 fa fa-heart fa-lg"></i> Save
                        </a>
                    </div>
                    
            </div>
            </main>
        </div>
        </div>
    </section>
    <!-- content -->
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
    $(document).ready(function() {
        // Handle the minus (-) button click
        $('#button-addon1').click(function() {
            let quantityInput = $(this).next('input');
            let currentValue = parseInt(quantityInput.val()) || 0; // Ensure it's an integer
            if (currentValue > 0) { // Prevent negative values
                quantityInput.val(currentValue - 1);
            }
        });

        // Handle the plus (+) button click
        $('#button-addon2').click(function() {
            let quantityInput = $(this).prev('input');
            let currentValue = parseInt(quantityInput.val()) || 0; // Ensure it's an integer
            quantityInput.val(currentValue + 1);
        });
    });
</script>
{{-- <script>
  $(document).ready(function() {
    // Handle the minus (-) button click
    $('.btn-decrement').click(function() {
        let quantityInput = $(this).next('input');
        let currentValue = parseInt(quantityInput.val()) || 0; 
        if (currentValue > 0) {
            quantityInput.val(currentValue - 1);
        }
    });

    // Handle the plus (+) button click
    $('.btn-increment').click(function() {
        let quantityInput = $(this).prev('input');
        let currentValue = parseInt(quantityInput.val()) || 0; 
        quantityInput.val(currentValue + 1);
    });
});

</script> --}}
