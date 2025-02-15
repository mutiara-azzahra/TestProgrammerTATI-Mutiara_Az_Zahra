<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Log Pemda X</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>E-Log Harian</b> Pemda X</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3" id="myAlert">
                    <div class="row">
                        <i class="fas fa-info-circle p-1"></i><p>{{ $message }}</p>            
                    </div>
                </div>
                @elseif ($message = Session::get('danger'))
                <div class="alert alert-danger mt-3" id="myAlert">
                    <div class="row">
                        <i class="fas fa-info-circle p-1"></i><p>{{ $message }}</p>      
                    </div>
                </div>
                @endif

                <form action="" method="POST">
                @csrf
                <input type="hidden" name="_method" value="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" id="username" placeholder="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="float-right">
                            <div class="col-12">
                                <input type="checkbox" onclick="myPassword()" class="mr-1">Tampilkan Password
                            </div>
                        </div>
                        <div class="float-left">
                            <div class="button justify-content-center">
                                <a href="{{ route('register') }}" class="mx-auto ml-2" style="width: 50px">Buat akun baru</a>
                            </div>
                        </div>     
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="button justify-content-center">
                            <button type="submit" class="btn btn-primary mx-auto d-block mt-2">Masuk</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center pt-5">
            Jl. Bersama No. 1 RT. 36 RW. 03<br>
            Telp. (0511) 44xxxx, 44xxxx<br>
            Fax. (0511) 33xxxx<br>
            Surabaya, Jawa Timur<br>
        </div>
    </div>

<!-- jQuery -->
<script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dist/js/adminlte.min.js')}} "></script>

<script>

      // Password toggle
      function myPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

</script>
</body>
</html>