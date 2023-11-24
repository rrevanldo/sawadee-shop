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
    <link rel="stylesheet" href="./assets/css/checkout.css">
</head>

<body>

    <div id="app">
        <div id="navbar" class="fixed-top">
            <div class="container">
                <div class="navbar-wrapper">
                    <div class="leftSideNavbar">
                        <div class="text-logo">
                            <a href="/show" class="text-dark text-decoration-none">
                                <h1 class="me-3"><img src="../../assets/img/logoSS.png" width="160px"></h1>
                            </a>
                        </div>
                    </div>

                    <div class="rightSideNavbar">
                        <div class="beforeLogin">
                            <div class="buttonWrapper">
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ route('logout') }}"
                                            class="button btn-outline-info">Logout</a>
                                    @else
                                        <a href="/login" class="button btn-outline-info">Login</a>
                                        @if (Route::has('register'))
                                            <a href="/register" class="button btn-outline-info">Register</a>
                                        @endif
                                    @endauth
                                @endif
                            </div>
                            <div class="cartWrapper">
                                <a href="/cart" class="cart icon">
                                    <img src="../../assets/img/icon/shopping-cart_icon.svg" alt="">
                                    <div class="totalItem" style="background-color: #629BBA; color: white;">0</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="mainContent">
            <div class="container">
                <div class="checkout-container first-line card">
                    <h4>Checkout Information</h4>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-personalData-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-personalData" type="button" role="tab"
                            aria-controls="nav-personalData" aria-selected="true">Data</button>
                        <button class="nav-link" id="nav-paymentConfirmation-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-paymentConfirmation" type="button" role="tab"
                            aria-controls="nav-paymentConfirmation" aria-selected="false">Payment Confirmation</button>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-personalData" role="tabpanel"
                            aria-labelledby="nav-personalData-tab">
                            <form action="" method="" enctype="multipart/form-data" id="customerForm">
                                <h5 class="titleForm">Personal Information</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="firstName" class="form-label">Name</label>
                                            <input type="text" value="{{ Auth::user()->name }}" name="name"
                                                class="form-control" id="firstName">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">Phone Number</label>
                                            <input type="number" value="{{ Auth::user()->phone }}" name="phone"
                                                class="form-control" id="phone">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label class="form-label">Address</label>
                                            <input type="text" value="{{ Auth::user()->adress }}" name="adress"
                                                class="form-control" id="address">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ Auth::user()->email }}"
                                                class="form-control" id="email">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="username" class="form-label">Your Product</label>
                                        <textarea style="margin-top: 0;" class="form-control product" name="product" readonly></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="username" class="form-label">Price</label>
                                        <input class="form-control price" name="price" id="price" readonly />
                                    </div>
                                    <div class="col-6" style="display: none;">
                                        <label for="username" class="form-label">Product Picture</label>
                                        <input class="form-control image-product" name="image-product" readonly />
                                    </div>
                                    <div class="col-12"></div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <a href="/cart" class="button1 text-decoration-none" style="border-radius: 20px;"><button class="btn1">Cancel</button></a>
                                    <button type="submit" class="button2"
                                        onclick="displayCustomerDetails()">Confirm</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade paymentConfirmation" id="nav-paymentConfirmation" role="tabpanel"
                            aria-labelledby="nav-paymentConfirmation-tab">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="detail-customer">
                                        <p class="email"></p>
                                        <h5 class="name-customer"></h5>
                                        <p class="number-phone"></p>
                                        <p class="address"></p>
                                    </div>

                                    <div class="shipping-detail">
                                        <h5>Your Items</h5>
                                        <p>Please make sure you order the correct item !!</p>

                                        <div class="wrapper-item">
                                            <div class="item">
                                                <div class="images-item">
                                                    <img src="./assets/img/images_plant_example.png" alt="">
                                                </div>
                                                <div class="detail-item">
                                                    <h5>Kabel Fleksibel untuk Handphone Samsung</h5>
                                                    <h6>Rp. 27.000</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="wrapper-summary">
                                        <form action="">
                                            <div class="card">
                                                <h4>Details</h4>
                                                <div class="detail-summary">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between mb-2">
                                                        <p class="bold-text">Total</p>
                                                        <p class="bold-text value-total">Rp. 0</p>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <button
                                                        class="btn3 button-primary w-100 d-flex align-items-center justify-content-center"
                                                        type="button" id="dropdownMenuButton1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Choose Payment Method
                                                        <ion-icon class="ms-2" name="chevron-down-outline">
                                                        </ion-icon>

                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <button type="button"
                                                            class="dropdown-item d-flex justify-content-between"
                                                            data-bs-toggle="modal" data-bs-target="#modalDanaMethode">
                                                            <p>Transfer</p>
                                                        </button>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Dana-->
    <div class="modal fade nextStepModalManualPayment" id="modalDanaMethode" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center back-modal">
                        <div class="me-2 d-flex align-items-center" data-bs-target="#modalDanaTransfer"
                            data-bs-toggle="modal">
                            <ion-icon name="chevron-back-outline"></ion-icon>
                        </div>
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Transfer</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="card mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="thint-text">Total Bill</p>
                            <p class="primary-text" id="total">0</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-head">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="bold-text">Rupiah</p>
                                <img src="./assets/img/icon/currency-dollar.png" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Transfer to <span class="bold-text">+62 851-5740-8085</span> in the name of Nono</li>
                                <li>Make sure the transfer is successful</li>
                                <li>Please screenshot the proof of transfer or payment</li>
                                <li>Upload evidence in the bottom column and submit</li>
                            </ul>
                        </div>
                    </div>

                    <form action="{{ route('pembayaran') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p>Upload transfer receipt</p>
                        <div class="form-input">
                            <input type="file" name="bukti_pembayaran" class="form-control">
                        </div>
                        <div style="display: none;">
                            <div class="col-6">
                                <div class="form-input">
                                    <label for="firstName" class="form-label">Name</label>
                                    <input type="text" value="{{ Auth::user()->name }}" name="name"
                                        class="form-control" id="firstName">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-input">Phone Number</label>
                                    <input type="number" value="{{ Auth::user()->phone }}" name="phone"
                                        class="form-control" id="phone">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-input">
                                    <label class="form-label">Address</label>
                                    <input type="text" value="{{ Auth::user()->adress }}" name="adress"
                                        class="form-control" id="address">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-input">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}"
                                        class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="username" class="form-label">Your Product</label>
                                <textarea style="margin-top: 0;" class="form-control product" name="product" readonly></textarea>
                            </div>
                            <div class="col-6">
                                <label for="username" class="form-label">Price</label>
                                <input class="form-control price" name="price" readonly />
                            </div>
                            <div class="col-6" style="display: none;">
                                <label for="username" class="form-label">Image Product</label>
                                <input class="form-control image-product" name="image-product" readonly />
                            </div>
                        </div>
                        <button type="submit" id="submitButton" class="button button-primary w-100">Submit Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Euro - Manual transfer-->
    <div class="modal fade nextStepModalManualPayment" id="euroManualTransfer" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center back-modal">
                        <div class="me-2 d-flex align-items-center" data-bs-target="#modalManualTransfer"
                            data-bs-toggle="modal">
                            <ion-icon name="chevron-back-outline"></ion-icon>
                        </div>
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Manual Transfer</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="card mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="thint-text">Total Bill</p>
                            <p class="primary-text">$270</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-head">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="bold-text">Euro</p>
                                <img src="./assets/img/icon/currency-euro.png" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Transfer to account number 038576846 in the name of Ajat Supriana.</li>
                                <li>Make sure the transfer is successful.</li>
                                <li>Screenshot of proof of transfer.</li>
                                <li>Submit Proof of Transfer below.</li>
                            </ul>
                        </div>
                    </div>

                    <form action="">
                        <div class="proof-payment ">
                            <p>upload transfer receipt</p>
                            <input type="file" id="proofFile">
                            <label for="proofFile">
                                <div class="card">
                                    <ion-icon name="cloud-upload-outline"></ion-icon>
                                </div>
                            </label>

                            <button type="submit" class="button button-primary w-100">Submit Payment</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#modalManualTransfer" data-bs-toggle="modal">Back to first</button>
                    </div> -->
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
    <!--ion icon-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        $(document).ready(function() {
            var cartData = JSON.parse(localStorage.getItem('cartData')) || [];

            function generateProductText() {
                var productText = '';
                for (var i = 0; i < cartData.length; i++) {
                    productText += `${cartData[i].productName} (Jumlah: ${cartData[i].quantity}),\n`;
                }
                return productText;
            }

            function getProductImage(index) {
                return cartData[index].imageSrc;
            }

            function getProductPrice(index) {
                var totalPrice = cartData[index].totalPrice;

                // Cek apakah ada lebih dari satu totalPrice
                if (cartData.length > 1) {
                    var combinedTotalPrice = calculateCombinedTotalPrice();
                    return combinedTotalPrice
                .toLocaleString(); // Memformat total harga kombinasi dengan format angka
                } else {
                    return totalPrice.toLocaleString(); // Memformat total harga produk dengan format angka
                }
            }

            // Fungsi untuk menghitung total harga kombinasi
            function calculateCombinedTotalPrice() {
                var combinedTotalPrice = 0;
                for (var i = 0; i < cartData.length; i++) {
                    combinedTotalPrice += cartData[i].totalPrice;
                }
                return combinedTotalPrice;
            }

            var productText = generateProductText();
            $('.form-control.product').val(productText);

            var imageProductInput = $('.form-control.image-product');
            var priceInput = $('.form-control.price');

            // Mendapatkan gambar dan harga produk pertama dalam keranjang
            var firstProductImage = getProductImage(0);
            var firstProductPrice = getProductPrice(0);

            // Menetapkan nilai gambar dan harga produk pertama ke input yang sesuai
            imageProductInput.val(firstProductImage);
            priceInput.val('Rp. ' + firstProductPrice);

            function calculateTotalBill() {
                var totalBill = 0;
                for (var i = 0; i < cartData.length; i++) {
                    totalBill += cartData[i].totalPrice;
                }
                return totalBill;
            }

            function updateTotalBill() {
                var totalBill = calculateTotalBill();
                $('#total').text('Rp. ' + totalBill);
            }

            updateTotalBill();
        });
    </script>


    <script>
        $(document).ready(function() {
            var cartData = JSON.parse(localStorage.getItem('cartData')) || [];

            function generateCartItemHTML(item, index) {
                var formattedTotalPrice = item.totalPrice
            .toLocaleString(); // Memformat total harga dengan format angka
                return `
    <div class="wrapper-item">
      <div class="item">
        <div class="images-item">
          <img src="${item.imageSrc}" alt="">
        </div>
        <div class="detail-item">
          <h5>${item.productName}</h5>
          <h6>Rp. ${formattedTotalPrice}</h6>
        </div>
      </div>
    </div>
  `;
            }

            function calculateTotalPrice() {
                var totalPrice = 0;
                for (var i = 0; i < cartData.length; i++) {
                    totalPrice += cartData[i].totalPrice;
                }
                var formattedTotalPrice = totalPrice.toLocaleString(); // Memformat total harga dengan format angka
                return formattedTotalPrice;
            }


            function updateCartItems() {
                var cartContainer = $('.wrapper-item');
                cartContainer.empty(); // Menghapus elemen HTML sebelum memperbarui
                for (var i = 0; i < cartData.length; i++) {
                    var itemHTML = generateCartItemHTML(cartData[i], i);
                    cartContainer.append(itemHTML);
                }
            }

            function updateTotalPrice() {
                var totalPrice = calculateTotalPrice();
                $('.value-total').text('Rp. ' + totalPrice.toLocaleString());
            }

            updateCartItems();
            updateTotalPrice();
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

            // Fungsi untuk menghapus data di localStorage
            function clearCartData() {
                localStorage.removeItem('cartData');
            }

            // Mendapatkan tombol submit berdasarkan ID
            var submitButton = document.getElementById('submitButton');

            // Menjalankan fungsi displayCustomerDetails saat tombol submit ditekan
            submitButton.addEventListener('click', function(event) {
                clearCartData(); // Menghapus data di localStorage
            });

            updateCartItems(); // Memperbarui tampilan keranjang saat halaman dimuat
            updateTotalPrice(); // Memperbarui total price saat halaman dimuat
            updateTotalItem();
        });
    </script>

    <script>
        // Fungsi untuk mengambil nilai formulir dan menampilkan hasilnya
        function displayCustomerDetails() {
            var name = document.getElementById("firstName").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;
            // Menampilkan hasil dalam elemen dengan kelas "detail-customer"
            document.querySelector(".detail-customer .email").textContent = email;
            document.querySelector(".detail-customer .name-customer").textContent = name;
            document.querySelector(".detail-customer .number-phone").textContent = phone;
            document.querySelector(".detail-customer .address").textContent = address;
        }

        var formSubmitted = false;

        // Menjalankan fungsi displayCustomerDetails saat formulir dikirim
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();
            displayCustomerDetails();
            formSubmitted = true;
            setTimeout(redirectToPaymentConfirmation,
            200); // Tambahkan penanganan waktu tunggu (200ms) sebelum memicu perpindahan tab
        });

        function redirectToPaymentConfirmation() {
            var paymentConfirmationTab = document.getElementById("nav-paymentConfirmation-tab");
            paymentConfirmationTab.click();
        }

        // Memeriksa jika tab "Payment Confirmation" diakses secara manual
        var paymentConfirmationTab = document.getElementById("nav-paymentConfirmation-tab");
        var detailCustomer = document.querySelector(".detail-customer");

        paymentConfirmationTab.addEventListener("click", function(event) {
            if (!formSubmitted) {
                event.preventDefault();
                var dataTab = document.getElementById("nav-personalData-tab");
                dataTab.click();
                location.href = location.href;
                alert("Silakan submit formulir terlebih dahulu sebelum mengakses halaman pembayaran!");
            }
        });
    </script>



</html>
