<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SawadeeShop</title>
    <link rel="icon" href="../../assets/img/logoSS.png">
    <!--Bootstrap Css-->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">

    <!--Slick CSS-->
    <link rel="stylesheet" href="../../assets/vendor/slick/slick.css">
    <link rel="stylesheet" href="../../assets/vendor/slick/slick-theme.css">

    <!--App Css-->
    <link rel="stylesheet" href="../../assets/css/app.css">

    <!--CSS Assets this page-->
    <link rel="stylesheet" href="../../assets/css/detailProduct.css">
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
                            <a href="/show" class="text-black text-decoration-none">
                             <img src="../../assets/img/logoSS.png" width="150px">
                            </a>
                        </div>
                    </div>

                    <div class="rightSideNavbar">
                        @if (Auth::check())
                            <div class="afterLogin align-items-center">
                                <li class="nav-item navbar-dropdown dropdown-user dropdown profileWrapper icon"
                                    style="list-style: none;">
                                    <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        @if (is_null($user['image_profile']))
                                            <div class="avatar avatar-online">
                                                <img src="../../assets/img/avatars/1.png" alt=""
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
                                                    <div class="flex-shrink-0 me-3">
                                                        @if (is_null($user['image_profile']))
                                                            <div class="avatar avatar-online">
                                                                <img src="./assets/img/avatars/1.png" alt=""
                                                                    class="w-px-40 h-auto rounded-circle">
                                                            </div>
                                                        @else
                                                            <div class="avatar avatar-online">
                                                                <img src="{{ asset('assets/img/' . Auth::user()->image_profile) }}"
                                                                    alt=""
                                                                    class="w-px-40 h-auto rounded-circle">
                                                            </div>
                                                        @endif
                                                    </div>
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
                                            <a class="dropdown-item" href="{{ route('profile') }}">
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
                                <div class="cartWrapper">
                                    <a href="/cart" class="cart icon">
                                        <img src="../../assets/img/icon/shopping-cart_icon.svg" alt="">
                                        <div class="totalItem" style="background-color: #AEDEFC; color: black;">0</div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="beforeLogin">
                                <div class="buttonWrapper">
                                    <a href="{{ route('login.page') }}"
                                        class="button btn-outline-info">Login</a>
                                    <a href="{{ route('register.page') }}" class="button btn-outline-info">Register</a>
                                </div>

                                <div class="cartWrapper">
                                    <a href="/cart" class="cart icon">
                                        <img src="../../assets/img/icon/shopping-cart_icon.svg" alt="" />
                                        <div class="totalItem" style="background-color: #AEDEFC; color: black;">0</div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div id="mainContent">
            <div class="container">
                <div class="row first-line">
                    <div class="col-12 col-lg-8 col-xl-9">
                        <a class="btn" href="/show"
                            style="width: 100px; margin: -20px 0 10px 0;">Back</a>
                        <div class="card">
                            <div class="wrapperDetailProduct row">
                                <div class="col-12 col-lg-5">
                                    <div class="wrapper-image-product">
                                        <div class="view-Images">
                                            <div class="images-product">
                                                <img class="product-image"
                                                    src="{{ asset('storage/images/' . $product->thumb_img) }}"
                                                    alt="">
                                            </div>
                                            <div class="images-product">
                                                <img src="{{ asset('storage/images/' . $product->thumb_img) }}"
                                                    alt="">
                                            </div>
                                            <div class="images-product">
                                                <img src="{{ asset('storage/images/' . $product->thumb_img) }}"
                                                    alt="">
                                            </div>
                                            <div class="images-product">
                                                <img src="{{ asset('storage/images/' . $product->thumb_img) }}"
                                                    alt="">
                                            </div>
                                            <div class="images-product">
                                                <img src="{{ asset('storage/images/' . $product->thumb_img) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="nav-images">
                                            <div class="images-nav">
                                                <img src="{{ asset('storage/images/' . $product->thumb_img) }}"
                                                    alt="">
                                            </div>
                                            <div class="images-nav">
                                                <img src="{{ asset('storage/images/' . $product->thumb_img) }}"
                                                    alt="">
                                            </div>
                                            <div class="images-nav">
                                                <img src="{{ asset('storage/images/' . $product->thumb_img) }}"
                                                    alt="">
                                            </div>
                                            <div class="images-nav">
                                                <img src="{{ asset('storage/images/' . $product->thumb_img) }}"
                                                    alt="">
                                            </div>
                                            <div class="images-nav">
                                                <img src="{{ asset('storage/images/' . $product->thumb_img) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="wrapper-detail-product">
                                        <h3 class="name" data-name="{{ $product->name }}">
                                            {{ $product->name }}</h3>
                                        <div class="price-product">
                                            <p id="price">Rp.
                                                {{ number_format($product->price, 0, ',', '.') }}<span>/Product</span>
                                            </p>
                                        </div>
                                        <div class="wrapper-quantity-product">
                                            <p>Number of Orders</p>
                                            <div class="quantity-product">
                                                <button class="quantity-count quantity-count--minus"
                                                    data-action="minus" type="button">-</button>
                                                <input class="product-quantity" type="number"
                                                    name="product-quantity" min="0" max="10"
                                                    value="1">
                                                <button class="quantity-count quantity-count--add" data-action="add"
                                                    type="button">+</button>
                                            </div>
                                            <p class="info">Min. order : 1 Product</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="descripsi-product">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-detail-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-detail" type="button" role="tab"
                                        aria-controls="nav-detail" aria-selected="true">Detail</button>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-detail" role="tabpanel"
                                        aria-labelledby="nav-detail-tab">
                                        <p>Product Name : <span class="primary-text">{{ $product->name }}</span></p>
                                        <p>Category : <span class="primary-text">{{ $product->category->name }}</span>
                                        </p>
                                        <div class="desc-section">
                                            <p>Description :</p>
                                            <p class="text-desc">
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-3">
                        <div class="wrapper-summary">
                            <div class="card">
                                <h4>Total Order</h4>
                                <div class="detail-summary">
                                    <div class="total-order">
                                        <p>Number of Orders</p>
                                        <p><span>1</span> Product</p>
                                    </div>
                                    <div class="total-price">
                                        <p>Price</p>
                                        <p>Rp. <span>0</span></p>
                                    </div>
                                </div>
                                <button id="add-to-cart" class="button w-100" style="background-color: #AEDEFC">
                                    <img src="../../assets/img/icon/shopping-cart_icon.svg" alt="">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!--Vendor-->
    <!--Jquery-->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <!--Bootstrap-->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--Slick Js-->
    <script src="../../assets/vendor/slick/slick.min.js"></script>
    <script src="../../assets/vendor/slick/slick.js"></script>

    <!--Slick Images Product-->
        <script>
             $('.view-Images').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                adaptiveHeight: true,
                infinite: false,
                useTransform: true,
                speed: 400,
                asNavFor: '.nav-images',
                cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
            });

            $('.nav-images')
                .on('init', function(event, slick) {
                    $('.nav-images .slick-slide.slick-current').addClass('is-active');
                })
                .slick({
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    dots: false,
                    focusOnSelect: false,
                    infinite: false,
                    asNavFor: '.view-Images',
                });

            $('.view-Images').on('afterChange', function(event, slick, currentSlide) {
                $('.nav-images').slick('slickGoTo', currentSlide);
                var currrentNavSlideElem = '.nav-images .slick-slide[data-slick-index="' + currentSlide + '"]';
                $('.nav-images .slick-slide.is-active').removeClass('is-active');
                $(currrentNavSlideElem).addClass('is-active');
            });

            $('.nav-images').on('click', '.slick-slide', function(event) {
                event.preventDefault();
                var goToSingleSlide = $(this).data('slick-index');

                $('.view-Images').slick('slickGoTo', goToSingleSlide);
            });
        </script>

        <!--Quantity Input-->
<script>
            var QtyInput = (function () {
            var $qtyInputs = $(".quantity-product");

            if (!$qtyInputs.length) {
                return;
            }

            var $inputs = $qtyInputs.find(".product-quantity");
            var $countBtn = $qtyInputs.find(".quantity-count");
            var qtyMin = parseInt($inputs.attr("min"));
            var qtyMax = parseInt($inputs.attr("max"));

            $inputs.change(function () {
                var $this = $(this);
                var $minusBtn = $this.siblings(".quantity-count--minus");
                var $addBtn = $this.siblings(".quantity-count--add");
                var qty = parseInt($this.val());

                if (isNaN(qty) || qty <= qtyMin) {
                    $this.val(qtyMin);
                    $minusBtn.attr("disabled", true);
                } else {
                    $minusBtn.attr("disabled", false);
                    
                    if(qty >= qtyMax){
                        $this.val(qtyMax);
                        $addBtn.attr('disabled', true);
                    } else {
                        $this.val(qty);
                        $addBtn.attr('disabled', false);
                    }
                }
            });

            $countBtn.click(function () {
                var operator = this.dataset.action;
                var $this = $(this);
                var $input = $this.siblings(".product-quantity");
                var qty = parseInt($input.val());

                if (operator == "add") {
                    qty += 1;
                    if (qty >= qtyMin + 1) {
                        $this.siblings(".quantity-count--minus").attr("disabled", false);
                    }

                    if (qty >= qtyMax) {
                        $this.attr("disabled", true);
                    }
                } else {
                    qty = qty <= qtyMin ? qtyMin : (qty -= 1);
                    
                    if (qty == qtyMin) {
                        $this.attr("disabled", true);
                    }

                    if (qty < qtyMax) {
                        $this.siblings(".quantity-count--add").attr("disabled", false);
                    }
                }

                $input.val(qty);
            });
        })();

        </script>

    <script>
    function updateSummary() {
    var quantity = parseInt($('.product-quantity').val());
    var price = parseInt($('#price').text().replace(/[^0-9]/g, ''));
    var totalPrice = quantity * price;

    $('.total-order span').text(quantity);
    $('.total-price span').text(totalPrice.toLocaleString()); // Memformat total harga dengan format angka
    }

    $('.quantity-count--add').click(function() {
    var quantityInput = $(this).siblings('.product-quantity');
    var maxQuantity = parseInt(quantityInput.attr('max'));
    var currentQuantity = parseInt(quantityInput.val());
    if (currentQuantity < maxQuantity) {
        currentQuantity += 0;
        quantityInput.val(currentQuantity);
        updateSummary();
    }
    });

    $('.quantity-count--minus').click(function() {
    var quantityInput = $(this).siblings('.product-quantity');
    var minQuantity = parseInt(quantityInput.attr('min'));
    var currentQuantity = parseInt(quantityInput.val());
    if (currentQuantity > minQuantity) {
        currentQuantity -= 0;
        quantityInput.val(currentQuantity);
        updateSummary();
    }
    });

    $('#add-to-cart').click(function() {
    var quantity = parseInt($('.product-quantity').val());
    var price = parseInt($('#price').text().replace(/[^0-9]/g, ''));
    var totalPrice = quantity * price;
    var productName = $('.name').data('name'); // Mengambil nama produk
    var imageSrc = $('.product-image').attr('src');

    // Mengambil data yang sudah ada dalam localStorage (jika ada)
    var cartData = JSON.parse(localStorage.getItem('cartData')) || [];

    // Menambahkan data baru ke dalam array
    var newData = {
        quantity: quantity,
        totalPrice: totalPrice,
        productName: productName,
        price: price,
        imageSrc: imageSrc
    };
    cartData.push(newData);

    // Menyimpan data ke localStorage sebagai string
    localStorage.setItem('cartData', JSON.stringify(cartData));

    // Tampilkan pesan sukses atau lakukan tindakan lainnya
    alert('Produk telah ditambahkan ke keranjang.');
    location.reload(); // Lakukan refresh halaman

    // Bersihkan nilai jumlah order dan update summary
    $('.product-quantity').val(0);
    updateSummary();
    });


$(document).ready(function() {
    // Mengambil data dari localStorage saat halaman dimuat
    var cartData = JSON.parse(localStorage.getItem('cartData')) || [];

    if (cartData.length > 0) {
        var lastData = cartData[cartData.length - 1];
        // Mengisi nilai jumlah order, total harga, dan nama produk dari data terakhir
        $('.product-quantity').val(lastData.quantity);
        $('.total-order span').text(lastData.quantity);

        var price = parseInt($('#price').text().replace(/[^0-9]/g, ''));
        $('.total-price span').text((price * lastData.quantity).toLocaleString());

        $('.name-product').text(lastData.productName);
        $('.images.product').text(lastData.imageSrc);
    } else {
        updateSummary();
    }
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
