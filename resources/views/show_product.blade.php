<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SawadeeShop</title>
    <link rel="icon" href="./assets/img/logoSS.png">

    <!--Bootstrap Css-->
    <link rel="stylesheet" href="{{asset('./assets/vendor/bootstrap/css/bootstrap.min.css')}}" />

    <!--Slick CSS-->
    <link rel="stylesheet" href="{{asset('./assets/vendor/slick/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('./assets/vendor/slick/slick-theme.css')}}" />

    <!--App Css-->
    <link rel="stylesheet" href="{{asset('./assets/css/app.css')}}" />

    <!--Main CSS-->
    <link rel="stylesheet" href="{{asset('./assets/css/main.css')}}" />
</head>

<body>
    <style>
        .dropdown-toggle::after {
            content: none !important;
        }
    </style>

    <div id="app">
        <div id="navbar" class="fixed-top">
            <div class="container">
                <div class="navbar-wrapper">
                    <div class="leftSideNavbar">
                        <div class="logo-brand">
                            <a href="{{ route('homepage') }}" class="text-black text-decoration-none">
                                <h1 class="ps-3 pe-3"><img src="{{asset('./assets/img/logoSS.png')}}" width="150"></h1>
                            </a>
                        </div>
                        <!-- <div class="searchMenu">
                            <form action="">
                                <div class="input-group">
                                    <div class="form-outline">
                                        <input type="search" id="form1" class="form-control" />
                                        <label class="form-label" for="form1">Search</label>
                                    </div>
                                    <button type="button" class="buttonSearch button button-primary">
                                        <img src="./assets/img/icon/search_icon.svg" alt="" />
                                    </button>
                                </div>
                            </form>
                        </div> -->
                    </div>

                    <div class="rightSideNavbar">
                        @if (Auth::check())
                            <div class="afterLogin align-items-center">
                                <li class="nav-item navbar-dropdown dropdown-user dropdown profileWrapper icon"
                                    style="list-style: none;">
                                    <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        @if (is_null($user['image_profile']))
                                            <div class="avatar avatar-online">
                                                <img src="{{asset('../../assets/img/avatars/1.png')}}" alt=""
                                                    class="w-px-40 h-auto rounded-circle">
                                            </div>
                                        @else
                                            <div class="avatar avatar-online">
                                                <img src="{{ asset('assets/img/' . Auth::user()->image_profile) }}"
                                                    alt="" class="w-px-40 h-auto rounded-circle">
                                            </div>
                                        @endif
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="d-flex">
                                                    <!-- <div class="flex-shrink-0 me-3">
                                                        @if (is_null($user['image_profile']))
                                                            <div class="avatar avatar-online">
                                                                <img src="./assets/img/avatars/1.png" alt=""
                                                                    class="w-px-40 h-auto rounded-circle">
                                                            </div>
                                                        @else
                                                        <div class="avatar avatar-online">
                                                                <img src="{{ asset('assets/img/' . Auth::user()->image_profile) }}"
                                                                    alt="" class="w-px-40 h-auto rounded-circle">
                                                            </div>
                                                        @endif
                                                    </div> -->
                                                    <div class="flex-grow-1">
                                                        <span
                                                            class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                        <small class="text-muted">{{ Auth::user()->role }}</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/profile">
                                                <i class="bx bx-user me-2"></i>
                                                <span class="align-middle">My Profile</span>
                                            </a>
                                        </li>
                                        @if (Auth::check())
                                            @if (Auth::user()->role == 'admin')
                                                <li>
                                                    <a class="dropdown-item" href="/dashboard">
                                                        <i class="bx bx-user me-2"></i>
                                                        <span class="align-middle">Admin Dashboard</span>
                                                    </a>
                                                </li>
                                            @else
                                            @endif
                                        @endif
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                {{-- <div class="cartWrapper">
                                    <a href="/cart" class="cart icon">
                                        <img src="{{asset('./assets/img/icon/shopping-cart_icon.svg')}}" alt="">
                                        <div class="totalItem">0</div>
                                    </a>
                                </div> --}}
                            </div>
                        @endif

                        <div class="beforeLogin">
                            <div class="buttonWrapper">
                                @if (Route::has('login'))
                                    @auth
                                        <div></div>
                                    @else
                                        <a href="/login" class="button" style="color: #629BBA;">Login</a>
                                        <a href="/register" class="button" style="color: #629BBA;">Register</a>
                                    @endauth
                                @endif
                            </div>

                            <div class="cartWrapper">
                                <a href="/cart" class="cart icon">
                                    <img src="{{asset('./assets/img/icon/shopping-cart_icon.svg')}}" alt="" />
                                    <div class="totalItem" style="background-color: #629BBA; color: white;">0</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="mainContent" style="margin-top: 150px">
        <div class="container">
            <div class="row line">
                <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                    <div class="categoriesContainer">
                        <h4>Category List</h4>
                        <div class="wrapperCategories row">
                            @foreach ($categories as $category)
                                <div class="col-12 col-sm-6 col-md-3 col-lg-12">
                                    <a href="/show/category/{{$category->id}}" class="categoriesPlant">
                                        <div class="imagesCategories">
                                            <img src="{{ asset('storage/images/' . $category->thumb_img) }}"
                                                alt="">
                                        </div>
                                        <p class="nameCategories">
                                            {{ $category->name }}
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="bestOfferContainer">
                        <a href="#" class="header-line">
                            <img src="{{asset('./assets/img/icon/icons8-product-26.png')}}" alt=""/>
                            <p class="ms-2">Product Recomendation</p>
                        </a>
                        <div class="bestOfferProduct">
                            @if(count($products) >= 0)
                                @foreach ($products as $bestProduct)
                                    <a href="{{ route('detail.product', $bestProduct->id) }}" class="product">
                                        <div class="imagesProduct">
                                            <img src="{{ asset('storage/images/' . $bestProduct->thumb_img) }}"
                                                width="250px" alt="">
                                        </div>

                                        <div class="infoProduct">
                                            <p class="nameProduct">
                                                {{ $bestProduct->name }}
                                            </p>
                                            <p class="price">Rp. {{ number_format($bestProduct->price, 0, ',', '.') }}
                                            </p>
                                            <div class="discountDetail" >
                                                <div class="discountValue" style="background-color: #629BBA; color: white;">
                                                    {{ $bestProduct->category->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapperProduct line">
            <div class="container pb-5">
                <a href="#" class="header-line">
                    <img src="./assets/img/icon/icons8-open-end-wrench-100.png" alt="" />
                    <p>All Product</p>
                </a>

                <div class="row">
                    @foreach ($product as $item)
                        <div class="col-6 col-lg-3">
                            <a href="{{ route('detail.product', $item->id) }}" class="product">
                                <div class="imagesProduct">
                                    <img src="{{ asset('storage/images/' . $item->thumb_img) }}" width="250px"
                                        alt="">
                                </div>
                                <div class="infoProduct">
                                    <p class="nameProduct">
                                        {{ $item->name }}
                                    </p>
                                    <p class="price">Rp. {{ number_format($item->price, 0, ',', '.') }}</p>
                                    <div class="discountDetail">
                                        <div class="discountValue" style="background-color: #629BBA; color: white;">{{ $item->category->name }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--Vendor-->
    <!--Jquery-->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <!--Bootstrap-->
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--Slick Js-->
    <script src="./assets/vendor/slick/slick.min.js"></script>
    <script src="./assets/vendor/slick/slick.js"></script>

    <script>
        $(".wrapperBanner").slick({
            Infinity: true,
            centerMode: true,
            centerPadding: "120px",
            slidesToShow: 1,
            arrows: false,
            dots: true,
            appendDots: $(".slick-slider-dots"),

            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        centerPadding: "100px",
                    },
                },
                {
                    breakpoint: 992,
                    settings: {
                        centerPadding: "60px",
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        centerPadding: "40px",
                    },
                },
                {
                    breakpoint: 576,
                    settings: {
                        centerPadding: "40px",
                    },
                },
                {
                    breakpoint: 475,
                    settings: {
                        centerMode: false,
                    },
                },
            ],
        });
    </script>

    <script>
        $(".bestOfferProduct").slick({
            dots: false,
            infinite: false,
            arrows: false,
            speed: 300,
            slidesToShow: 3.2,
            slidesToScroll: 3,

				responsive: [
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 2.2,
							slidesToScroll: 2,
						},
					},
				],
			});
		</script>
	
		
	<script>
        $(document).ready(function() {
            // Mengambil data dari localStorage saat halaman dimuat
            var cartData = JSON.parse(localStorage.getItem('cartData')) || [];
    
            function updateTotalItem() {
                var totalItem = cartData.length;
                $('.totalItem').text(totalItem);
            }
    
            // Fungsi untuk menghasilkan elemen HTML untuk setiap item dalam data keranjang
            function generateCartItemHTML(item, index) {
                return `
                <div class="product-list">
                    <div class="form-check checkbox-select checkbox-item">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                    <div class="product-detail">
                        <div class="image-product">
                            <img src="${item.imageSrc}" alt="">
                        </div>
                        <div class="wrapper-info-product">
                            <div class="name-price-product">
                                <h5>${item.productName}</h5>
                                <p>Rp. <span class="price" data-price="${item.totalPrice}" data-index="${index}">${item.totalPrice}</span></p>
                            </div>
                            <p class="price-per-plant">Rp. <span class="price-plant">${item.price}</span>/Produk</p>
                            <div class="action-cart">
                                <div class="quantity-product">
                                    <button class="quantity-count quantity-count--minus" data-action="minus" type="button" data-index="${index}">-</button>
                                    <input class="product-quantity" type="number" name="product-quantity" min="0" max="10" value="${item.quantity}" data-index="${index}">
                                    <button class="quantity-count quantity-count--add" data-action="add" type="button" data-index="${index}">+</button>
                                </div>
                                <button class="delete-cart-button" data-index="${index}">
                                    <img src="./assets/img/icon/trash-delete-icon.svg" alt="">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }
    
            // Fungsi untuk mengupdate total price
            function updateTotalPrice() {
                var totalPrice = 0;
                for (var i = 0; i < cartData.length; i++) {
                    totalPrice += cartData[i].totalPrice;
                }
                $('.value-total-fix').text('Rp. ' + totalPrice);
            }
    
            // Fungsi untuk mengupdate harga total per item
            function updateItemTotalPrice(index) {
                var item = cartData[index];
                var priceElement = $('.price[data-index="' + index + '"]');
                priceElement.text(item.totalPrice);
                priceElement.attr('data-price', item.totalPrice);
            }
    
            // Fungsi untuk menghapus item dari keranjang berdasarkan index
            function deleteCartItem(index) {
                cartData.splice(index, 1);
                localStorage.setItem('cartData', JSON.stringify(cartData));
                $('.body-cart').empty(); // Menghapus elemen HTML sebelum memperbarui
                updateCartItems(); // Memperbarui tampilan keranjang setelah menghapus item
                updateTotalPrice(); // Memperbarui total price
                updateTotalItem();
            }
    
            // Fungsi untuk memperbarui quantity item dalam keranjang
            function updateCartItemQuantity(index, quantity) {
                cartData[index].quantity = quantity;
                cartData[index].totalPrice = quantity * cartData[index].price; // Mengupdate totalPrice
                localStorage.setItem('cartData', JSON.stringify(cartData));
                updateTotalPrice(); // Memperbarui total price
                updateItemTotalPrice(index); // Memperbarui harga total per item
            }
    
            // Menambahkan elemen HTML untuk setiap item dalam data keranjang
            function updateCartItems() {
                var cartContainer = $('.body-cart');
                for (var i = 0; i < cartData.length; i++) {
                    var itemHTML = generateCartItemHTML(cartData[i], i);
                    cartContainer.append(itemHTML);
                }
            }
    
            // Menangani klik tombol minus dan plus
            $('.body-cart').on('click', '.quantity-count', function() {
                var action = $(this).data('action');
                var index = $(this).data('index');
                var quantityInput = $('.product-quantity[data-index="' + index + '"]');
                var quantity = parseInt(quantityInput.val());
                if (action === 'minus' && quantity > 0) {
                    quantityInput.val(quantity - 1);
                    updateCartItemQuantity(index, quantity - 1);
                } else if (action === 'add' && quantity < 10) {
                    quantityInput.val(quantity + 1);
                    updateCartItemQuantity(index, quantity + 1);
                }
            });
    
            // Menangani klik tombol hapus
            $('.body-cart').on('click', '.delete-cart-button', function() {
                var index = $(this).data('index');
                deleteCartItem(index);
            });
    
            updateCartItems(); // Memperbarui tampilan keranjang saat halaman dimuat
            updateTotalPrice(); // Memperbarui total price saat halaman dimuat
            updateTotalItem();
        });
    </script>
</body>

</html>
