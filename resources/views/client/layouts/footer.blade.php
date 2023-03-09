<!-- Footer -->
<footer>
    <div class="bg2 p-t-40 p-b-25" style="background-color: #065234">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <a href="{{route('client.home')}}">
                            <img class="max-s-full" src="{{$settings->logo}}" alt="LOGO">
                        </a>
                    </div>

                    <div>
                        <p class="f1-s-1 cl11 p-b-16">
                            {!!$settings->about!!}
                        </p>

                        <div class="p-t-15">
                            <p class="f1-s-1 cl11 p-b-16">Liên hệ qua: </p>
                            <a href="{{$settings->facebook_contact}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8"
                                target="_blank">
                                <span class="fab fa-facebook-f"></span>
                            </a>

                            <a href="{{$settings->instagram_contact}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8"
                                target="_blank">
                                <span class="fab fa-instagram"></span>
                            </a>

                            <a href="{{$settings->youtube_channnel}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8"
                                target="_blank">
                                <span class="fab fa-youtube"></span>
                            </a>

                            <a href="mailto:{{$settings->email}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fa fa-envelope"></span>
                            </a>

                            <a href="callto:{{$settings->phone}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fa fa-phone"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="background-color: #065234">
        <div class="container size-h-4 flex-c-c p-tb-15">
            <span class="f1-s-1 cl0 txt-center">
                &copy;<script>
                    document.write(new Date().getFullYear());
                </script>

                <a href="https://colorlib.com" class="f1-s-1 cl10 hov-link1">Colorlib.</a>

                All rights reserved.
            </span>
        </div>
    </div>
</footer>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <span class="fas fa-angle-up"></span>
    </span>
</div>