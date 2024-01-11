<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <!-- SweetAlert2 CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <style>
        #wrapper.d-flex {
            min-height: 100vh;
        }
    
        #sidebar {
            width: 280px;
            height: 1000px;
            background-color: rgb(10, 10, 10);
            color: rgb(249, 243, 243); /* Font color for regular text */
            padding-top: 20px;
            padding-left: 20px;
        }
        
        #sidebar a {
            color: rgb(252, 241, 241); /* Font color for links */
        }
    
        #sidebar.hidden {
            margin-left: -250px;
        }
    
        #content {
            flex: 1;
        }
    </style>
    

    <title>Hello, world!</title>
  </head>
  <body>
    <div class=" d-flex align-items-stretch  " >
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-success">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <h3><a href="#" class="logo">Dashboard</a></h3>
            <ul class="list-unstyled components mb-5" >

                @if(auth()->user()->role == 1)
                {{-- @if(auth()->check() && auth()->user()->role == 1) --}}

                    <li>
                        <a href="{{ route('superAdminUsers') }}"><span class="fa fa-users mr-3"></span> Users</a>
                    </li>
                    <li>
                        <a href="{{ route('manageRole') }}"><span class="fa fa-user-tag mr-3"></span> Manage Role</a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('logout') }}"><span class="fa fa-sign-out-alt mr-3"></span> Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            @yield('space-work')
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>


      <!-- SweetAlert2 JS -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

      <script>
          @if(session('success'))
              Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: '{{ session('success') }}',
              });
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
      </script>
  </body>
</html>
