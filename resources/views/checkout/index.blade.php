@extends('LoginMaster')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <style>
        /* Add your styles here */
        .container {
            margin-top: 50px;
        }

        .checkout-form label {
            font-weight: bold;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .table th, .table td {
            text-align: center;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
            color: #fff;
        }
    </style>


    <form action="{{ route('place-order') }}" method="POST">
        @csrf
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4">Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="phoneno">Phone No</label>
                                    <input type="text" class="form-control" id="phoneno" name="phoneno" placeholder="Phone No" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="address2">Address 2</label>
                                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Address 2">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="pincode">Pin code</label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pin code" required>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6> Order Details</h6>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</h5>
                                            <td>{{ $item->quantity }}</h5>
                                            <td>{{ $item->product->selling_price }}</h5>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <h6 class="px-2">Grand Total <span></span></h6> --}}
                            <button type="submit" class="btn btn-success w-100 ">Place Order</button>
                            {{-- <button type="button" class="btn btn-primary w-100 mt-3" >Pay With paypal</button> --}}
                            {{-- <div id="paypal-button-container" style="max-width:1000px;"></div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
{{-- 
@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=Aa9FK-KjVy_oA38uLEiEqjiYaOLab3o9qc9rQk3BzAKd7_oz6cCNgjXcNyUrqVatnE6Wv7EkAtNvVNDU"></script>

@endsection --}}
