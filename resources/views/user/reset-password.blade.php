{{-- @extends('layout/layout')

@section('space-work')

<form action="{{  route('password.update') }}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" required placeholder="Your Email Address">
    <input type="password" name="password" required placeholder="New Password">
    <input type="password" name="password_confirmation" required placeholder="Confirm New Password">
    <button type="submit">Reset Password</button>
</form>

@endsection --}}


@extends('layout/layout')

@section('space-work')
    <p>Hello,</p>
    <p>Click on the link below to reset your password:</p>
    <a href="{{ route('password.reset',  ['token' => $token, 'body' => $body]) }}">Click here to reset your password</a>
    <p>If you did not request a password reset, please ignore this email.</p>
@endsection
{{-- @extends('layout/layout')

@section('space-work')
    <p>Hello,</p>
    <p>Click on the link below to reset your password:</p>
    <a href="{{ $action_link }}">Click here to reset your password</a>
    <p>If you did not request a password reset, please ignore this email.</p>
@endsection --}}
