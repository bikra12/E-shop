@extends('LoginMaster')
{{-- <style>
    .alert-success {
        color: #8d9c4c;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 10px;
        border-radius: 5px;
    }
</style>
@if (session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Okay',
            width: 600,
            padding: '3em',
            background: '#fff',
            backdrop: `
                        rgba(0,0,123,0.4)
                        center left
                        no-repeat
                    `
        });
    </script>
@endif --}}
{{-- 
@section('title')
    My Order
@endsection --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tracking No.</th>
                            <th>Status</th>
                            <th>Total price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->tracking_no }}</td>
                                <td>{{ $item->status =='0' ? 'pending' :'completed' }}</td>
                                <td>{{ $item->totalprice }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
