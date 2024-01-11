@extends('LoginMaster')

@section('content')
    <style>
        /* Base styling */
        body {
            font-family: 'Nunito', sans-serif;
            /* A soft and modern font */
            background-color: #F6F8FB;
            /* Neutral light background */
        }

        .container {
            padding: 50px 0;
        }

        /* Card styling */
        .card.bg-glass {
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        /* Headings & Text */
        h3.fw-normal {
            font-weight: 600;
            /* Making the title slightly bold for emphasis */
            color: #34435E;
            /* A calm dark blue */
        }

        /* Form fields */
        .form-outline .form-control {
            border: 1px solid #E3E6EC;
            border-radius: 10px;
            /* Giving a slight curve for modern aesthetic */
            height: 45px;
            transition: border-color 0.3s ease;
            /* Smooth transition for focus effect */
        }

        .form-outline .form-control:focus {
            border-color: #667EEA;
            /* Highlight color when focused */
            box-shadow: none;
            /* Removing any default shadow */
        }

        /* Error messages */
        .text-danger {
            font-size: 14px;
            margin-top: 0.25rem;
            color: #E53E3E;
            /* Red color for better visibility */
        }

        /* Button */
        .btn-primary {
            background-color: #667EEA;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #5A67D8;
        }

        /* Responsive grid layout for the name fields */
        @media screen and (max-width: 768px) {
            .row>div {
                margin-bottom: 20px;
            }
        }
    </style>

    <!-- Section: Design Block -->


    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-0">
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">

                        <form action="{{ route('register') }}" method="POST">
                            @csrf

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up now</h3>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" placeholder="First Name" id="first_name" class="form-control"
                                            name="first_name" required autofocus>
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" placeholder="Last Name" id="last_name" class="form-control"
                                            name="last_name" required autofocus>
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>


                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" placeholder="Enter Confirm Password" id="password"
                                    class="form-control" name="password_confirmation" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Sign up
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section: Design Block -->
@endsection
