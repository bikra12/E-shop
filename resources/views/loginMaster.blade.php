<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> NewProject</title>

    @include('loginLayouts.header')
    @include('loginLayouts.cssLink')
</head>

<body>

    @yield('content')

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}'
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            let errorMessage = "";

            @foreach ($errors->all() as $error)
                errorMessage += "{{ $error }}" + "\n";
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage
            });
        </script>
    @endif

    @include('loginLayouts.footer')
    @include('loginLayouts.jsLink')

    @yield('scripts')

</body>

</html>
