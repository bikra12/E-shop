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
                        <a href="{{ route('profile.edit',$user->id) }}" class="btn btn-block btn-secondary">
                            <i class="fas fa-user-edit"></i> Edit Profile
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('password') }}" class="btn btn-block btn-warning">
                            <i class="fas fa-key"></i> Change Password
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('order.user') }}" class="btn btn-block btn-info">
                            <i class="fas fa-box"></i> My Orders
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="btn btn-block btn-light border">
                            <i class="fas fa-heart"></i> Wishlist
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('logout') }}" class="btn btn-block btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                    
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4>Profile Edit</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update',$user->id) }}" method="post">
                        @csrf
                
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" value="{{$user->first_name ?? ''}}"  class="form-control">
                        </div>
                
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name"  value="{{$user->last_name ?? ''}}" class="form-control">
                        </div>
                
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"  value="{{$user->email ?? ''}}" class="form-control">
                        </div>
                
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
                
            </div>
        </div>
        
    </div>
</div>

@endsection
