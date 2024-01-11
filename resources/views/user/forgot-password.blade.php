@extends('layout/layout')

@section('space-work')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif



<form action="{{ route('password.forgotpost') }}" method="post">
    @csrf
    <input type="email" name="email" required placeholder="Your Email Address">
    <button type="submit">Send Reset Link</button>
</form>


@endsection 
{{-- 
@extends('layout/layout')

@section('space-work')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Success message after sending password reset link -->
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('password.forgotpost') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required placeholder="Your Email Address" class="form-control">

            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Send Reset Link</button>
    </form>

@endsection
