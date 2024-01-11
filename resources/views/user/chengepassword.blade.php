@extends('loginMaster') <!-- Assuming you have a master layout that includes Bootstrap -->

@section('title', 'My Profile')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>{{ Auth::user()->first_name }}'s Profile</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            {{-- Uncomment if you want to display the user's email and join date
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ Auth::user()->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>Joined:</strong> {{ Auth::user()->created_at->format('M d, Y') }}
                        </li>
                        --}}
                            <li class="list-group-item">
                                <a href="{{ route('profile.edit',$user->id) }}" class="btn btn-block btn-secondary">Edit Profile</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('password') }}" class="btn btn-block btn-warning">Change Password</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('order.user') }}" class="btn btn-block btn-info">My Orders</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="btn btn-block btn-light border">Wishlist</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('logout') }}" class="btn btn-block btn-danger">Logout</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4>Chenge Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('password.change') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="oldPasswordInput" class="form-label">Old Password</label>
                                    <input name="old_password" type="password"
                                        class="form-control @error('old_password') is-invalid @enderror"
                                        id="oldPasswordInput" placeholder="Old Password">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="newPasswordInput" class="form-label">New Password</label>
                                    <input name="new_password" type="password"
                                        class="form-control @error('new_password') is-invalid @enderror"
                                        id="newPasswordInput" placeholder="New Password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                    <input name="new_password_confirmation" type="password" class="form-control"
                                        id="confirmNewPasswordInput" placeholder="Confirm New Password">
                                </div>

                            </div>

                            <div class="card-footer">
                                <button class="btn btn-success">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
