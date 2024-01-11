@extends('LoginMaster')
@section('content')
    <style>
        <style>

        /* Base styling */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F8FAFC;
        }

        .container {
            width: 100%;
            max-width: 480px;
            margin: 8% auto;
            padding: 30px 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        /* Form Heading */
        h2 {
            font-weight: 500;
            margin-bottom: 20px;
        }

        /* Form label */
        label {
            font-size: 16px;
            color: #4A4A4A;
        }

        /* Form input fields */
        .form-control {
            padding: 10px 15px;
            border: 1px solid #E1E8ED;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #64B5F6;
            outline: none;
        }

        /* Error message */
        .text-danger {
            margin-top: 5px;
            font-size: 14px;
        }

        /* Success Alert */
        .alert.alert-success {
            color: #155724;
            background-color: #D4EDDA;
            border-color: #C3E6CB;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Submit button */
        .btn {
            padding: 10px 30px;
            font-size: 17px;
            border-radius: 8px;
        }

        .btn.btn-primary {
            background-color: #4285F4;
            border: none;
        }

        .btn.btn-primary:hover {
            background-color: #357ABD;
        }
    </style>
    <!-- Success message after sending password reset link -->
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container">
        <form action="{{ route('main.password.forgotpost') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required placeholder="Your Email Address"
                    class="form-control">

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Send Reset Link</button>
        </form>
    </div>
@endsection
