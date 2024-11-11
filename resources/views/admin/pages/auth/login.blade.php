
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$titlePage}}</title>
    <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/auth.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<body>
    @include('admin/mixins/alert')
    <div class="wrapper">
        <div class="box-login">
            <h2>Login</h2>
            <form action="/admin/auth/login" method="POST">
                <div class="input-box">
                    <i class='bx bxs-envelope'></i>
                    <input type="email" name='email' required>
                    <label for="#">Email</label>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt' ></i>
                    <input type="password" name='password' required>
                    <label for="#">Password</label>
                </div>
                <div class="remember-forgot">
                    <label for=""><input type="checkbox" name="" id="">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button class="btn-login" type="submit">Login</button>
                @csrf
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <!-- AdminLTE App -->
    <script src="/template/admin/dist/js/adminlte.min.js"></script>
    <script src="{{asset('admin/js/script.js')}}"></script>
</body>
</html>