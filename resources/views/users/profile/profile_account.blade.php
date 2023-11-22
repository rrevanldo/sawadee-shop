<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SH E-Commerce</title>

    <!--Bootstrap Css-->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/vendor/bootstrap/icons-1.7.2/font/bootstrap-icons.css">

    <!--Slick CSS-->
    <link rel="stylesheet" href="./assets/vendor/slick/slick.css">
    <link rel="stylesheet" href="./assets/vendor/slick/slick-theme.css">

    <!--App Css-->
    <link rel="stylesheet" href="./assets/css/app.css">

    <!--CSS Profile-->
    <link rel="stylesheet" href="./assets/css/profile.css">
</head>

<body>
    <style>
        .dropdown-toggle::after {
            content: none !important;
        }
    </style>

    <div id="app">
        <div id="mainContent">
            <div class="container">
                <div class="profileContainer first-line">
                    <div class="row">
                        <div class="col-12 col-lg-4 col-xl-3 mb-4 mb-lg-0">
                            <div class="card card-user-menu">
                                <div class="user-detail">
                                    <img src="./assets/faces/1.jpg" alt="">
                                    <p class="name-user">{{ Auth::user()->name }}</p>
                                </div>
                                <div class="menu-profile">
                                    <a href="{{route('homepage')}}" class="menu">
                                        <ion-icon name="home"></ion-icon>
                                        Beranda
                                    </a>
                                    <a href="#" class="menu">
                                        <ion-icon name="person"></ion-icon>
                                        Setting Profil
                                    </a>
                                    @if(Auth::user()->role == 'user')
                                    <a href="#" class="menu">
                                        <ion-icon name="cart"></ion-icon>
                                        Riwayat Transaksi
                                    </a>
                                    @else
                                    @endif
                                    <a href="{{ route('logout') }}" class="menu logout">
                                        <ion-icon name="log-out"></ion-icon>
                                        Keluar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 col-xl-9">
                            <div class="card profile-data">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-profileData-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profileData" type="button" role="tab"
                                        aria-controls="nav-profileData" aria-selected="true">Setting Profil</button>
                                        @if(Auth::user()->role == 'user')
                                    <button class="nav-link" id="nav-securitySetting-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-securitySetting" type="button" role="tab"
                                        aria-controls="nav-securitySetting" aria-selected="false">Riwayat Transaksi</button>
                                        @else
                                        @endif
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-profileData" role="tabpanel"
                                        aria-labelledby="nav-profileData-tab">
                                        <div class="row">
                                            <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                                                <div class="profile-images-wrapper">
                                                    <div class="profile-image">
                                                        <img src="./assets/faces/1.jpg" alt="">
                                                    </div>
                                                    <div class="button-change-image">
                                                        <a href="#"
                                                            class="button button-outline-primary w-100">Ganti Profil</a>
                                                    </div>
                                                    <p class="info">File besar: maksimal 4.000.000 byte (4 MB). file yang diizinkan: .extensionJPG .JPEG .PNG</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <div class="biodata-user">
                                                    <h5 class="title-data-user">Profil Kamu</h5>
                                                    <div class="table-data-user">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="label">Nama</td>
                                                                    <td class="value">{{ Auth::user()->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">Nomor Telepon</td>
                                                                    <td class="value">{{ Auth::user()->phone }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">Email</td>
                                                                    <td class="value">{{ Auth::user()->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">Status</td>
                                                                    <td class="value">{{ Auth::user()->role }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="address-user">
                                                    <h5 class="title-data-user">Alamat Kamu</h5>
                                                    <p>{{ Auth::user()->adress }}</p>
                                                </div>
                                                <div class="edit-data-modal py-2 pt-3 d-flex justify-content-end">
                                                    <button type="button" class="button button-text"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#changeDataProfileUser">
                                                        Ganti Data Profil
                                                    </button>
                                                    <div class="modal fade" id="changeDataProfileUser"
                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                        tabindex="-1" aria-labelledby="changeDataProfileUserLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="changeDataProfileUserLabel">Ubah Profil
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('profile.change') }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')

                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-input">
                                                                                    <label for="phoneNumber"
                                                                                        class="form-label">Nama</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="name"
                                                                                        name="name"
                                                                                        value="{{ Auth::user()->name }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-input">
                                                                                    <label for="phoneNumber"
                                                                                        class="form-label">Nomor Telepon</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="phoneNumber"
                                                                                        name="phone"
                                                                                        value="{{ Auth::user()->phone }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-input">
                                                                                    <label for="email"
                                                                                        class="form-label">Email</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="email"
                                                                                        name="email"
                                                                                        value="{{ Auth::user()->email }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-input">
                                                                                    <label for="address"
                                                                                        class="form-label">Alamat</label>
                                                                                    <textarea name="adress" id="address" cols="30" rows="5" class="form-control"
                                                                                        >{{Auth::user()->adress}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-3">
                                                                            <div
                                                                                class="col-12 d-flex justify-content-end">
                                                                                <button
                                                                                    class="button button-outline-primary"
                                                                                    type="submit">Ubah Profil</button>
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
                                    <div class="tab-pane fade" id="nav-securitySetting" role="tabpanel"
                                        aria-labelledby="nav-securitySetting-tab">
                                        <div class="row change-password">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Produk</th>
                                                        <th scope="col">Harga</th>
                                                        <th scope="col">Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Paket 3 (ukuran 2 X 3)</td>
                                                        <td>Rp. 20.000,00</td>
                                                        <td>31 April 2023</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Charger Hp (xiomi)</td>
                                                        <td>Rp.50.000,00</td>
                                                        <td>20 Januari 2023</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>cassing Hp (Samsung)</td>
                                                        <td>Rp. 10.000,00</td>
                                                        <td>23 Februari 2022</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
    <!--Ion Icon-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        $(".togglePassword").click(function() {
            $(this).children().toggleClass("bi-eye-slash-fill");
            input = $(this).parent().find("input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

</html>
