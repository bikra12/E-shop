{{-- @extends('layout/layout')

@section('space-work')

    <form action="{{ route('password.update',['token' => $token, 'email' => $request->email]) }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label>Email:
            <input type="email" name="email" value="{{ $email }}" readonly>
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
