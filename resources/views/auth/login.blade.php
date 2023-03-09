<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="client/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="client/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="client/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="client/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="client/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="client/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="client/css/util.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="client/css/main.css">
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{route('client.home')}}" class="breadcrumb-item f1-s-3 cl9">
                    Trang chủ
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    Đăng nhập
                </span>
            </div>
        </div>
    </div>

    <!-- Page heading -->
    <div class="container p-t-4 p-b-40 text-center">
        <h2 class="f1-l-1 cl2">
            Đăng nhập
        </h2>
    </div>

    <!-- Content -->
    <section class="bg0 p-b-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8 p-b-80">
                    <div class="p-r-10 p-r-0-sr991">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="email"
                                name="email" placeholder="Địa chỉ email" value="{{ old('email') }}" autofocus required>
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="password"
                                name="password" placeholder="Mật khẩu" required>
                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="form-check" style="margin-left: 20px">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                    old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkbox-signin">Ghi nhớ tôi</label>
                            </div>

                            <div class="text-center">
                                <button class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20">
                                    Đăng nhập
                                </button>
                            </div>
                        </form>

                        <div class="mt-3 text-center">
                            <p>Chưa có tài khoản <a href="{{route('register')}}"> bấm vào đây</a> để đăng kí tài khoản</p>
                            <p>Nếu bạn quên mật khẩu <a href="{{ route('password.request') }}" autocomplete="email">bấm vào đây</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--===============================================================================================-->
    <script src="client/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="client/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="client/vendor/bootstrap/js/popper.js"></script>
    <script src="client/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="client/js/main.js"></script>

</body>

</html>