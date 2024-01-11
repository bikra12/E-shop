@extends('LoginMaster')

@section('content')
    <style>
        /* Add this to your CSS file or style section */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .price-details {
            font-size: 16px;
        }

        .item-details,
        .discount-details,
        .delivery-details,
        .total-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* Align items vertically in the middle */
            margin-bottom: 10px;
        }

        .amount {
            font-weight: bold;
        }

        hr {
            border-top: 1px solid #dee2e6;
            margin: 1rem 0;
        }
    </style>
    <div class="container mt-5">
        <div style="margin-bottom: 1.5rem; background-color: #f8f9fa; padding: 15px; border-radius: 8px;">
            <!-- Your content goes here -->
            <h2 class="mb-4">My Cart</h2>
        </div>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @php $total = 0; $totalDiscount = 0; @endphp

        @if (count($items) > 0)
            <div class="row">
                <!-- List of items column -->
                <div class="col-md-8">
                    @foreach ($items as $item)
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        @if ($item->product->images->isNotEmpty())
                                            <img src="{{ asset('assets/uploads/product/' . $item->product->images->first()->filename) }}"
                                                alt="Product Image" class="img-fluid rounded">
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">{{ $item->product->name }}</h5>
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <span class="original-price" style="text-decoration: line-through; margin-right: 8px; color: rgb(125, 132, 125); ">
                                                ₹{{ $item->product->original_price }}
                                            </span>
                                            <h5 class="card-title">
                                                ₹{{ $item->product->selling_price }}
                                            </h5>
                                        </div>

                                        <label>Quantity:</label>
                                        <div class="input-group mb-1">
                                            <button type="button" class="btn-decrement">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" name="quantity"
                                                class="form-control text-center border border-secondary quantity-input"
                                                data-price="{{ $item->product->selling_price }}"
                                                data-original-price="{{ $item->product->original_price }}"
                                                data-item-id="{{ $item->id }}"
                                                value="{{ $item->quantity }}" />
                                            <button type="button" class="btn-increment">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-danger btn-sm">Remove</a>
                                </div>
                            </div>
                        </div>
                        @php
                            $discountAmount = $item->product->original_price - $item->product->selling_price;
                            $totalDiscount += $discountAmount * $item->quantity;
                        @endphp
                    @endforeach
                </div>

                <!-- Loop through each item in the cart -->
                <div class="col-md-4">
                    <div class="card bg-light p-4 rounded">
                        <h4 class="mb-3">PRICE DETAILS</h4>
                        <hr class="my-3">
                        <div class="price-details">
                            <div class="item-details">
                                <h6>Price</h6>
                                <h6 class="amount" id="totalPrice">₹{{ $total }}</h6>
                            </div>

                            <!-- Calculate and display the discount -->
                            {{-- <div class="discount-details">
                                <h6>Discount</h6>
                                <h6 class="amount" style="color: rgb(66, 165, 66);" id="totalDiscountAmount">− ₹{{ $totalDiscount }}</h6>
                            </div> --}}

                            <!-- Add other details like delivery charges, etc. -->
                            <div class="delivery-details">
                                <h6>Delivery Charges</h6>
                                <h6 class="amount">
                                    <s> ₹40 </s>
                                    <span style="color: rgb(66, 165, 66);">Free</span>
                                </h6>
                            </div>

                            <hr class="my-3">
                            <div class="total-details">
                                <h4>Total Amount</h4>
                                <h4 class="mb-0"><span id="totalAmount">{{ $total }}</span></h4>
                            </div>

                            <div>
                                <p>You will save ₹<span id="overallSavings">{{ $totalDiscount + 40 }}</span> on this order</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-left: 80%;">
                    <!-- Link to the 'checkout' route with a styled button -->
                    <a href="{{ route('checkout') }}" class="btn btn-warning shadow-0 mt-2 mb-5 ">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        @else
            <div
                style="text-align: center; padding: 20px; border: 2px solid #ddd; border-radius: 10px; max-width: 1600px; margin: 0 auto; background-color: rgb(245, 245, 245); margin-top: 1rem; margin-bottom: 2rem;">
                <img src="https://source.unsplash.com/440x200/?laptop," alt="Wonderful Image"
                    style="width: 150px; height: 150px; margin-bottom: 15px;">
                <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
                <p style="color: #888;">Explore our products and find something you love.</p>
                <a href="{{ url('home') }}" class="btn btn-outline-primary">Continue Shopping</a>
            </div>
        @endif
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
    $(document).ready(function () {
        // This function updates the total price and discount amount
        function updateTotalPrice() {
            let total = 0;
            let totalDiscount = 0;

            $('.quantity-input').each(function () {
                let qty = parseInt($(this).val()) || 0;
                let price = parseFloat($(this).data('price')) || 0;
                let originalPrice = parseFloat($(this).data('original-price')) || 0;

                // Update the original price based on quantity
                let discountedPrice = price - originalPrice;
                if (qty > 1) {
                    originalPrice += discountedPrice;
                    $(this).data('original-price', originalPrice);
                }

                total += qty * price;

                // Calculate the discount for each item and update the display
                let discountAmount = originalPrice * qty;
                totalDiscount += discountAmount;

                let itemId = $(this).data('item-id');
                $('#discountAmount' + itemId).text('− ₹' + discountAmount.toFixed(2));
                $('#totalPrice' + itemId).text((qty * price).toFixed(2));
                $('#discountSave' + itemId).text((totalDiscount + 40).toFixed(2));
            });

            // Update the total price
            $("#totalPrice").text('₹' + total.toFixed(2));
            $("#totalAmount").text('₹' + total.toFixed(2));


            // Update the total discount amount
            $("#totalDiscountAmount").text('− ₹' + totalDiscount.toFixed(2));
        }

        // Update the total price right after the page loads
        updateTotalPrice();

        // Handle the minus (-) button click
        $('.btn-decrement').click(function () {
            let quantityInput = $(this).next('input');
            let currentValue = parseInt(quantityInput.val()) || 1;
            if (currentValue > 1) {
                quantityInput.val(currentValue - 1);
                updateTotalPrice();
            }
        });

        // Handle the plus (+) button click
        $('.btn-increment').click(function () {
            let quantityInput = $(this).prev('input');
            let currentValue = parseInt(quantityInput.val()) || 1;
            quantityInput.val(currentValue + 1);
            updateTotalPrice();
        });
    });
</script>
