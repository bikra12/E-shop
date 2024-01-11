@extends('LoginMaster')

@section('content')
<style>
    /* Base styling */
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #E9EBEF;
    }

    .container {
        width: 100%;
        max-width: 500px;
        margin: 7% auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    /* Form styling */
    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: 600;
        color: #555;
        margin-top: 20px;
    }

    input {
        padding: 10px 15px;
        margin-top: 5px;
        border: 1px solid #D1D5DB;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
    }

    input:focus {
        border-color: #677BC4;
        outline: none;
    }

    /* Button styling */
    button {
        margin-top: 25px;
        padding: 10px 20px;
        background-color: #677BC4;
        color: #FFF;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 17px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #5666A9;
    }
</style>
    <div class="container">
        <form action="{{ route('main.password.update', ['token' => $token, 'email' => $email]) }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <label>Email:
                <input type="email" name="email" value="{{ $email }}">
            </label>
            <label>New Password:
                <input type="password" name="password" required>
            </label>
            <label>Confirm New Password:
                <input type="password" name="password_confirmation" required>
            </label>
            <button type="submit">Reset Password</button>
        </form>
    </div>
@endsection









{{-- @extends('LoginMaster')

@section('content')
    <form action="{{ route('main.password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label>Email:
            <input type="email" name="email" required>
        </label>
        <label>New Password:
            <input type="password" name="password" required>
        </label>
        <label>Confirm New Password:
            <input type="password" name="password_confirmation" required>
        </label>
        <button type="submit">Reset Password</button>
    </form>
@endsection --}}
