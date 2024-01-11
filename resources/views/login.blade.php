@extends('homeMaster')

@section('content')
    <style>
        /* Base styling */
        body {
            font-family: 'Poppins', sans-serif;
            /* Modern Sans-serif Font */
            background-color: #edf2f7;
            /* Neutral background color */
        }

        .container {
            padding: 50px 0;
        }

        /* Card styling */
        .card.bg-glass {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        /* Headings & Text */
        h5.fw-normal {
            font-weight: 500;
            color: #2d3748;
            /* Darker tone for more contrast */
        }

        .small.text-muted {
            font-size: 14px;
            color: #718096;
        }

        /* Input fields */
        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            height: 45px;
        }

        .form-control:focus {
            border-color: #a0aec0;
            box-shadow: none;
        }

        /* Error messages */
        .text-danger {
            font-size: 14px;
        }

        /* Button */
        .btn-primary {
            background-color: #667eea;
            /* Primary blue color */
            border: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #5a67d8;
            /* Slightly darker shade of blue on hover */
        }

        /* Link styling */
        a {
            transition: all 0.3s ease;
        }

        a:hover {
            text-decoration: underline;
            /* Underline on hover to indicate it's clickable */
        }

        /* Checkbox */
        .form-check label {
            font-size: 14px;
            color: #4a5568;
            /* Dark gray tone */
        }
    </style>
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-0">
        <div class="row justify-content-center">
            <div class="col-lg-6  mb-5 mb-lg-0 position-relative">
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">

                        <form method="POST" action="{{ route('loginpost') }}">
                            @csrf

                            <h5 class="fw-normal mb-4" style="letter-spacing: 1px;">Sign into your account</h5>

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

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Login
                            </button>

                            <a class="small text-muted" href="{{ route('main.password') }}">Forgot password?</a>

                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                    href="{{ route('load.register') }}" style="color: #393f81;">Register here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
