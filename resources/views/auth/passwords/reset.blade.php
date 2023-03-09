<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <title>Đặt lại mật khẩu</title>
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
                    Đặt lại mật khẩu
                </span>
            </div>
        </div>
    </div>

    <!-- Page heading -->
    <div class="container p-t-4 p-b-40 text-center">
        <h2 class="f1-l-1 cl2">
            Đặt lại mật khẩu
        </h2>
    </div>

    <!-- Content -->
    <section class="bg0 p-b-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8 p-b-80">
                    <div class="p-r-10 p-r-0-sr991">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <input id="email" type="email"
                                class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20 @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                readonly>

                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input id="password" type="password"
                                class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20 @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input id="password-confirm" type="password"
                                class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20"
                                name="password_confirmation" required autocomplete="new-password">



                            <div class="text-center">
                                <button class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20">
                                    Cập nhật mật khẩu
                                </button>
                            </div>
                        </form>
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