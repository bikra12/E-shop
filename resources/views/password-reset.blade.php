{{-- @extends('LoginMaster')

@section('content')
    <p>Hello,</p>
    <p>Click on the link below to reset your password:</p>
    <a href="{{ route('main.password.reset', ['token' => $token, 'body' => $body]) }}">Click here to reset your password</a>
    <p>If you did not request a password reset, please ignore this email.</p>
@endsection --}}

<h3>
<a href="{{ route('main.password.reset', ['token' => $token]) }}">Click here to reset your password</a>
</h3>
    <p>Hello,</p>
    {!! $body !!}
    <p>If you did not request a password reset, please ignore this email.</p>

