<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SawadeeShop</title>
    <link rel="icon" href="assets/img/homepage/logoSS.png">

    <link rel="stylesheet" href="assets/css/homepage.css">
    <link rel="stylesheet" href="assets/css/app.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-body-light" style="padding: 0 !important">
        <div class="container">
            <a class="navbar-brand text-decoration-none text-black" href="{{ route('homepage') }}">
                <h1 class="text-logo"><img src="assets/img/homepage/logoSS.png" width="150"></h1>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/show">Shop</a>
                    </li>
                </ul>
                <div class="slicing-color"></div>
                @if (Route::has('login'))
                    @auth
                        <a class="btn btn-light" href="{{ route('logout') }}">
                            <img src="assets/img/homepage/icons8-login-50.png" width="20" height="20">
                            Logout
                        </a>
                    @else
                        <a class="btn btn-light" href="/login">
                            <img src="assets/img/homepage/icons8-login-50.png" width="20" height="20">
                            LogIn
                        </a>
                        @if (Route::has('register'))
                            <a class="btn btn-light" href="/register">
                                <img src="assets/img/homepage/icons8-login-50.png" width="20" height="20">
                                Daftar
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
        </div>
    </nav>

    <div style="background-color: #f6f7fb">
        <div class="container">
            <div class="row">
                <div class="content1" id="content1">
                    <div class="col-7">
                        <h1>
                        Are you having trouble finding things? <span>Don't worry,</span> now you've found the solution!
                        </h1>
                        <p>Welcome to <b>SawadeeShop</b> the home of unlimited online shopping! Explore the widest range of quality products and options to fulfill all your needs, only here. Discover an unparalleled shopping experience with our excellent service and competitive prices. Enjoy your shopping journey!</p>
                        <div class="flex-button-content1">
                           <a href="/show" class="button1"> <button class="comic-button">Let's Shop!</button> </a>
                            <!-- <a class="btn btn-dark" href="/show">Let's Shop!</a> -->
                        </div>
                    </div>

                    <div class="col-5">
                        <img class="homepik" src="assets/img/homepage/homepik-removebg.png">
                    </div>
                </div>
<!-- 
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-inline">
                        <div class="m-3">
                            <h1 class="text-center">{{$products->count()}}</h1>
                            <small>Produk</small>
                        </div>
                        <div class="m-3">
                            <h1 class="text-center">{{$user->count()}}</h1>
                            <small>Pengguna</small>
                        </div>
                        <div class="m-3">
                            <h1 class="text-center">{{$category->count()}}</h1>
                            <small>Kategori</small>
                        </div>
                    </div>
                </div> -->

                <div class="content3" id="content3">
                    <div class="flex-content3">
                        <div class="image-absolute">
                            <img class="circle-shapes1" src="assets/img/homepage/circle-shapes.png" width="200px"
                                style="margin: 0 0 0 0;">
                            <img class="circle-shapes2" src="assets/img/homepage/circle-shapes.png" width="300px"
                                style="margin: 0 0 0 1000px;">
                            <img class="hexagon" src="assets/img/homepage/hexagon-shapes.png" width="300px"
                                style="margin: 140px 0 0 440px;">
                            <img class="line" src="assets/img/homepage/line-shapes.png" width="350px"
                                style="margin: 390px 0 0 -30px;">
                        </div>
                        <div class="image-content3">
                            <img src="assets/img/homepage/onlshop.png">
                        </div>
                        <div class="text-content3">
                            <h5>SawadeeShop</h5>
                            <h2>the world's number 1 marketplace to fulfill your needs!</h2>
                            <p>So, what are you waiting for? Let's go shopping at SawadeeShop to make your life much easier and practical, you will feel a shopping experience that will never be forgotten.</p>
                        </div>
                    </div>
                </div>

                <div class="content4" id="content4">
                    <h5>Product</h5>
                    <h2>NEW & HOT ITEMS</h2>
                    <div class="multiple-items">
                        @foreach($products as $product)
                        <div class="card">
                            <img class="card-img-top" style="padding: 20px; height: 300px;" src="{{ asset('storage/images/'. $product->thumb_img) }}" alt="">

                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{route('detail.product', $product->id)}}" class="button2" style="color: black; width: 100%;"><button class="btn2"> Lihat Detail </button></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="content5 d-flex" id="content5">
                    <div class="col-5 left">
                        <h5>Get to know us</h5>
                        <h2>Frequently Asked Questions</h2>
                    </div>
                    <div class="col-7 right">
                        <button class="collapsible">What is SawadeeShop ?
                        </button>
                        <div class="content">
                            <p>SawadeeShop is a one-stop destination for all your online shopping needs. Here, we bring you carefully curated collections from various categories, ranging from the latest technology to trendy lifestyle products. Quality is our cornerstone, and every product we offer has undergone rigorous selection to ensure its excellence and reliability. Our responsive customer service is ready to help you every step of the way, from product information to fast and secure delivery. Enjoy seamless shopping at SawadeeShop, where customer satisfaction is our top priority.</p>
                        </div>

                        <button class="collapsible">What's in the SawadeeShop ?</button>
                        <div class="content">
                            <p>At SawadeeShop, you will find a one-stop solution for all your shopping needs. From the latest technology, stylish fashion, functional home appliances, to a diverse collection of hobby supplies, we present a wide selection that meets the needs of every customer. With meticulous and diverse product curation, we are committed to being the ultimate destination that fulfills your diverse needs in one convenient and easy-to-reach place.
                            </p>
                        </div>

                        <button class="collapsible">How to search for the right items in SawadeeShop ?</button>
                        <div class="content">
                            <p>You can easily search for the right item on SawadeeShop through our search feature. Simply type in the brand, model or type of item you are looking for, and we will display relevant results. Alternatively, you can also explore our product categories to find suitable options.</p>
                        </div>

                        <button class="collapsible">How about the shipping ? </button>
                        <div class="content">
                            <p>We work with trusted shipping partners to ensure your items arrive quickly and safely. We offer shipping options that you can select during checkout. Our delivery range covers a wide area, so you can enjoy delivery services to almost any location.
                            </p>
                        </div>

                        <button class="collapsible">How is the purchasing process at SH ?</button>
                        <div class="content">
                            <p>The buying process at SawadeeShop is very very simple. Once you've selected the spare parts you want to buy, add them to your shopping cart. After that, follow the checkout steps, enter your shipping details, and complete the payment. Once payment is complete, your order will be processed and shipped to the address you provided.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="icon-sosmed">
            <div style="width: 50px; height: 50px; background-color: white; border-radius: 40px;">
                <img src="assets/img/homepage/instagram.svg" width="25px" style="margin-top: 12px;">
            </div>
            <div style="width: 50px; background-color: white; border-radius: 40px;">
                <img src="assets/img/homepage/envelope.svg" width="25px" style="margin-top: 12px;">
            </div>
            <div style="width: 50px; background-color: white; border-radius: 40px;">
                <img src="assets/img/homepage/telephone.svg" width="25px" style="margin-top: 12px;">
            </div>
        </div>
        <p class="alamat">Sawadeeshop is everyone's life saver</p>
    </footer>

    <!--Jquery-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!--Bootstrap-->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script type="text/javascript" src="assets/vendor/slick/slick.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        function myFunction() {
            var x = document.getElementById("navbarNav");
            var button = document.getElementById("btn");
            if (x.className === "collapse navbar-collapse") {
                x.className += " responsive";
                button.style.display = "block";
            } else {
                x.className = "collapse navbar-collapse";
            }
        }
    </script>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>

    <script>
        $(document).on('click', '.navbar-collapse.in', function(e) {
            if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
                $(this).collapse('hide');
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.multiple-items').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            centerMode: true,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 430,
                        settings: {
                            slidesToShow: 1,
                            centerMode: false,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>
