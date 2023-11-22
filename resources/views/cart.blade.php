<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SawadeeShop</title>
    <link rel="icon" href="./assets/img/logoSS.png"">
    <!--Bootstrap Css-->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">

    <!--Slick CSS-->
    <link rel="stylesheet" href="./assets/vendor/slick/slick.css">
    <link rel="stylesheet" href="./assets/vendor/slick/slick-theme.css">

    <!--App Css-->
    <link rel="stylesheet" href="./assets/css/app.css">

    <!--CSS Assets this page-->
    <link rel="stylesheet" href="./assets/css/cart.css">
</head>
<body>

    <div id="app">
        <div id="navbar" class="fixed-top">
            <div class="container">
                <div class="navbar-wrapper">
                    <div class="leftSideNavbar">
                        <div class="text-logo">
                            <a href="/show" class="text-decoration-none text-dark">
                                <h1 class="me-3"><img src="../../assets/img/logoSS.png" width="150px"></h1>
                            </a>
                        </div>
                    </div>

                    <div class="rightSideNavbar">
                        <div class="beforeLogin">
                            <div class="buttonWrapper">
                                @if (Route::has('login'))
                                        @auth
                                            <a href="{{route('logout')}}" class="button button btn-outline-info">Logout</a>
                                        @else
                                            <a href="/login" class="button button btn-outline-info">Login</a>
                                            @if (Route::has('register'))
                                            <a href="/register" class="button button btn-outline-info">Register</a>
                                            @endif
                                        @endauth
                                @endif
                            </div>
                            <div class="cartWrapper">
                                <a href="/cart" class="cart icon">
                                    <img src="./assets/img/icon/shopping-cart_icon.svg" alt="">
                                    <div class="totalItem" style="background-color: #AEDEFC; color: black;">0</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="mainContent">
            <div class="container">
               <div class="row first-line">
                   <div class="col-12 col-lg-8 col-xl-9">
                   <div class="wrapperButton mb-4">
                     <a class="btn" href="/show"
                            style="width: 100px; margin: -20px 0 10px 0; color: black;">Back</a>
                    </div>           
                        <div class="card">      
                            <h3>Your Cart</h3>
                            @if (Route::has('login'))
                                    @auth
                                    <div class="alert alert-success" role="alert">
                                        <div class="icon-alert">
                                            <img src="./assets/img/icon/alert-icon.svg" alt="">
                                        </div>
                                        You have logged in, you can now order items according to your needs.
                                    </div>
                                    @else
                                    <div class="alert alert-danger" role="alert">
                                        <div class="icon-alert">
                                            <img src="./assets/img/icon/alert-icon.svg" alt="">
                                        </div>
                                        Sorry, please login so you can order something at SawadeeShop!!!
                                    </div>
                                @endauth
                            @endif
                            <div class="cart-container">
                                <div class="head-cart">
                                    <div class="form-check checkbox-select">
                                        <input class="form-check-input checkbox-all" type="checkbox" value="" id="chooseAllCheckbox">
                                        <label class="form-check-label" for="chooseAllCheckbox">
                                            Select All
                                        </label>
                                    </div>
                                    <div class="delete-button delete-all">
                                        <button class="delete-cart-button delete-all-button">
                                            <img src="./assets/img/icon/trash-delete-icon.svg" alt="">
                                            Delete All
                                        </button>
                                    </div>
                                </div>
                                <div class="body-cart">
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="col-12 col-lg-4 col-xl-3">
                        <div class="wrapper-delivery">
                            <div class="card">
                                <h4>Shipping</h4>
                                
                                <div class="total-fix">
                                    <p>Total</p>
                                    <p class="value-total-fix">Rp. 0</p>
                                </div>
                                <div class="wrapperButton mb-4">
                             @if (Route::has('login'))
                                @auth
                                    <a href="/checkout" class="button w-100 text-decoration-none" style="background-color: #AEDEFC; color: black;">
                                        Checkout
                                    </a>
                                @else
                                <a href="/login" class="button w-100 text-decoration-none" style="background-color: #AEDEFC; color: black;">
                                    Login and Checkout
                                </a>
                                @endauth
                            @endif
                                </div>
                            </div>
                        </div>
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
            $('.checkbox-all').click(function() {
                $('.checkbox-item').toggleClass('show');
            });
            $('.checkbox-all').click(function() {
                $('.delete-all').toggleClass('show');
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
                    <div class="product-detail">
                        <div class="image-product">
                            <img src="${item.imageSrc}" alt="">
                        </div>
                        <div class="wrapper-info-product">
                            <div class="name-price-product">
                                <h5>${item.productName}</h5>
                                <p>Rp. <span class="price" data-price="${item.totalPrice}" data-index="${index}">${item.totalPrice}</span></p>
                            </div>
                            <p class="price-per-plant">Rp. <span class="price-plant">${item.price}</span>/Product</p>
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
        $('.value-total-fix').text('Rp. ' + totalPrice.toLocaleString()); // Memformat total harga dengan format angka
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
            location.reload();
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

        $('.checkbox-all').change(function() {
            var isChecked = $(this).is(':checked');
            $('.checkbox-item').prop('checked', isChecked);
        });

        $('.body-cart').on('change', '.checkbox-item', function() {
            var totalItems = $('.checkbox-item').length;
            var checkedItems = $('.checkbox-item:checked').length;
            var isAllChecked = (totalItems === checkedItems);
            $('.checkbox-all').prop('checked', isAllChecked);
        });

        $('.delete-all-button').click(function() {
    if (confirm('Are you sure you want to delete all items?')) {
        localStorage.removeItem('cartData');
        location.reload();
    }
});

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