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
    <link rel="stylesheet" href="./assets/css/history-transaksi.css">
</head>

<body>

    <div id="app">
        <div id="navbar" class="fixed-top">
            <div class="container">
                <div class="navbar-wrapper">
                    <div class="leftSideNavbar">
                        <div class="logo-text">
                            <a href="/show" class="text-decoration-none">
                                <h1 class="text-black me-3">SH</h1>
                            </a>
                        </div>
                    </div>

                    <div class="rightSideNavbar">
                        <div class="afterLogin">
                            <div class="cartWrapper">
                                <a href="/cart" class="cart icon">
                                    <img src="./assets/img/icon/shopping-cart_icon.svg" alt="">
                                    <div class="totalItem">0</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="mainContent">
            <div class="container">
                <div class="first-line">
                    <div class="row">
                        <div class="col-12 col-lg-4 col-xl-3 mb-4 mb-lg-0">
                            <div class="card card-user-menu">
                                <div class="user-detail">
                                    <img src="./assets/faces/1.jpg" alt="">
                                    <p class="name-user">{{Auth::user()->name}}</p>
                                </div>
                                <div class="menu-profile">
                                    <a href="/profile" class="menu">
                                        <ion-icon name="person"></ion-icon>
                                        Akun
                                    </a>
                                    <a href="/history" class="menu">
                                        <ion-icon name="cart"></ion-icon>
                                        Riwayat Transaksi
                                    </a>
                                    <a href="{{route('logout')}}" class="menu logout">
                                        <ion-icon name="log-out"></ion-icon>
                                        Keluar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 col-xl-9">
                            <div class="card">
                                <div class="history-container">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-All-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-All" type="button" role="tab" aria-controls="nav-All"
                                            aria-selected="true">Semua Transaksi</button>
                                        <button class="nav-link" id="nav-done-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-done" type="button" role="tab" aria-controls="nav-done"
                                            aria-selected="false">Selesai</button>
                                        <button class="nav-link" id="nav-pengiriman-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-pengiriman" type="button" role="tab" aria-controls="nav-pengiriman"
                                            aria-selected="false">Konfirmasi Penerimaan</button>
                                        <button class="nav-link" id="nav-proccess-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-proccess" type="button" role="tab"
                                            aria-controls="nav-proccess" aria-selected="false">Sedang Proses</button>
                                        <button class="nav-link" id="nav-failed-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-failed" type="button" role="tab"
                                            aria-controls="nav-failed" aria-selected="false">Gagal</button>
                                    </div>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-All" role="tabpanel"
                                            aria-labelledby="nav-All-tab">
                                        @foreach($history as $histories)
                                            @if($histories->email == Auth::user()->email)
                                            <div class="history-item">
                                                <div class="head-item">
                                                    <div class="icon">
                                                        <img src="./assets/img/icon/icon-history-transaksi.svg" alt="">
                                                    </div>
                                                    <div class="date">{{$histories->updated_at}}</div>
                                                    @if($histories['status'] == 1)
                                                    <div class="status success">Selesai</div>
                                                    @elseif($histories['status'] == 2)
                                                    <div class="status danger">Gagal</div>
                                                    @elseif($histories['status'] == 3)
                                                    <div class="alert alert-warning" role="alert" style="margin: 0 5px 0 0; padding: 5px 5px;">Pesanan sedang diantar</div>
                                                    @elseif($histories['status'] == 0)
                                                    <div class="alert alert-secondary" role="alert" style="margin: 0 5px 0 0; padding: 5px 5px;">Proses</div>
                                                    @endif
                                                </div>
                                                <div class="body-item">
                                                    <div class="image-item">
                                                        <img src="{{ $histories->{"image-product"} }}" alt="">
                                                    </div>
                                                    <div class="detail-item">
                                                        <a href="#" class="name-item">{{$histories->product}}</a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="price">
                                                                <p>{{$histories->price}}</p>
                                                            </div>
                                                            <div class="action-item">
                                                                <button type="button" class="button button-text"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#seeDetailModal{{$histories->id}}">
                                                                    Lihat Detail
                                                                </button>
                                                            </div>

                                                            <!--Modal See Detail-->
                                                            <div class="modal fade modal-detail" id="seeDetailModal{{$histories->id}}"
                                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                                tabindex="-1" aria-labelledby="seeDetailModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog  modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="seeDetailModalLabel">Detail Transaksi</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="line-detail">
                                                                                <h5>Info Transaksi</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Tanggal Transaksi</td>
                                                                                            <td>{{$histories->updated_at}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="line-detail">
                                                                                <h5>Info Pengiriman</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Nama</td>
                                                                                            <td class="bold-text">{{$histories->name}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Alamat</td>
                                                                                            <td>{{$histories->adress}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Produk</td>
                                                                                            <td>{{$histories->product}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="line-detail">
                                                                                <h5>Detail Pembayaran</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="bold-text">Total
                                                                                            </td>
                                                                                            <td class="bold-text">{{$histories->price}}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Modal Track Order-->
                                                            <div class="modal fade modal-tracking"
                                                                id="trackTransaksiModal" data-bs-backdrop="static"
                                                                data-bs-keyboard="false" tabindex="-1"
                                                                aria-labelledby="trackTransaksiModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="trackTransaksiModalLabel">Tracking
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-12 col-md-6 mb-3 mb-md-0">
                                                                                    <div class="detail-tracking">
                                                                                        <div
                                                                                            class="line-tracking number-tracking">
                                                                                            <p class="title-detail">No
                                                                                                Resi</p>
                                                                                            <h4 class="bold-text">
                                                                                                37463591974</h4>
                                                                                        </div>
                                                                                        <div class="line-tracking">
                                                                                            <p class="title-detail">
                                                                                                Sender</p>
                                                                                            <h4 class="bold-text">
                                                                                                Plantsasri ID</h4>
                                                                                        </div>
                                                                                        <div class="line-tracking">
                                                                                            <p class="title-detail">
                                                                                                Receiver</p>
                                                                                            <h4 class="bold-text">Reksa
                                                                                                Prayoga</h4>
                                                                                            <h4 class="address">Jl.
                                                                                                Skip, Kec. Bogor Sel.,
                                                                                                Kota Bogor, Jawa Barat,
                                                                                                16134 [Note: rt01 rw01
                                                                                                no47]</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6">
                                                                                    <div class="process-tracking">
                                                                                        <div class="tracking-images">
                                                                                            <img src="./assets/img/tracking-vector.svg"
                                                                                                alt="">
                                                                                        </div>
                                                                                        <p class="status">Status :
                                                                                            <span>Delivered</span></p>
                                                                                        <div class="card">
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track now-proccess">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Proces</p>
                                                                                            </div>
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Delivered</p>
                                                                                            </div>
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Done</p>
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
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        
                                        </div>
                                        <div class="tab-pane fade" id="nav-done" role="tabpanel"
                                            aria-labelledby="nav-done-tab">
                                             @foreach($history as $histories)
                                            @if($histories->email == Auth::user()->email && $histories['status'] == 1)
                                            <div class="history-item">
                                                <div class="head-item">
                                                    <div class="icon">
                                                        <img src="./assets/img/icon/icon-history-transaksi.svg" alt="">
                                                    </div>
                                                    <div class="date">{{$histories->updated_at}}</div>
                                                    <div class="status success">Selesai</div>
                                                </div>
                                                <div class="body-item">
                                                    <div class="image-item">
                                                        <img src="{{ $histories->{"image-product"} }}" alt="">
                                                    </div>
                                                    <div class="detail-item">
                                                        <a href="#" class="name-item">{{$histories->product}}</a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="price">
                                                                <p>{{$histories->price}}</p>
                                                            </div>
                                                            <div class="action-item">
                                                                <button type="button" class="button button-text"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#seeDetail2Modal{{$histories->id}}">
                                                                    Lihat Detail
                                                                </button>
                                                            </div>

                                                            <!--Modal See Detail-->
                                                            <div class="modal fade modal-detail" id="seeDetail2Modal{{$histories->id}}"
                                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                                tabindex="-1" aria-labelledby="seeDetailModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog  modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="seeDetailModalLabel">Detail Transaksi</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="line-detail">
                                                                                <h5>Info Transaksi</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Tanggal Transaksi</td>
                                                                                            <td>{{$histories->updated_at}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="line-detail">
                                                                                <h5>Info Pengiriman</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Nama</td>
                                                                                            <td class="bold-text">{{$histories->name}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Alamat</td>
                                                                                            <td>{{$histories->adress}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Produk</td>
                                                                                            <td>{{$histories->product}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="line-detail">
                                                                                <h5>Detail Pembayaran</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="bold-text">Total
                                                                                            </td>
                                                                                            <td class="bold-text">{{$histories->price}}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Modal Track Order-->
                                                            <div class="modal fade modal-tracking"
                                                                id="trackTransaksiModal" data-bs-backdrop="static"
                                                                data-bs-keyboard="false" tabindex="-1"
                                                                aria-labelledby="trackTransaksiModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="trackTransaksiModalLabel">Tracking
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-12 col-md-6 mb-3 mb-md-0">
                                                                                    <div class="detail-tracking">
                                                                                        <div
                                                                                            class="line-tracking number-tracking">
                                                                                            <p class="title-detail">No
                                                                                                Resi</p>
                                                                                            <h4 class="bold-text">
                                                                                                37463591974</h4>
                                                                                        </div>
                                                                                        <div class="line-tracking">
                                                                                            <p class="title-detail">
                                                                                                Sender</p>
                                                                                            <h4 class="bold-text">
                                                                                                Plantsasri ID</h4>
                                                                                        </div>
                                                                                        <div class="line-tracking">
                                                                                            <p class="title-detail">
                                                                                                Receiver</p>
                                                                                            <h4 class="bold-text">Reksa
                                                                                                Prayoga</h4>
                                                                                            <h4 class="address">Jl.
                                                                                                Skip, Kec. Bogor Sel.,
                                                                                                Kota Bogor, Jawa Barat,
                                                                                                16134 [Note: rt01 rw01
                                                                                                no47]</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6">
                                                                                    <div class="process-tracking">
                                                                                        <div class="tracking-images">
                                                                                            <img src="./assets/img/tracking-vector.svg"
                                                                                                alt="">
                                                                                        </div>
                                                                                        <p class="status">Status :
                                                                                            <span>Delivered</span></p>
                                                                                        <div class="card">
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track now-proccess">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Proces</p>
                                                                                            </div>
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Delivered</p>
                                                                                            </div>
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Done</p>
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
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                            </div>
                                        <div class="tab-pane fade" id="nav-pengiriman" role="tabpanel"
                                            aria-labelledby="nav-pengiriman-tab">
                                             @foreach($history as $histories)
                                            @if($histories->email == Auth::user()->email && $histories['status'] == 3)
                                            <div class="history-item">
                                                <div class="head-item">
                                                    <div class="icon">
                                                        <img src="./assets/img/icon/icon-history-transaksi.svg" alt="">
                                                    </div>
                                                    <div class="date">{{$histories->updated_at}}</div>
                                                    <div class="alert alert-warning" role="alert" style="margin: 0 5px 0 0; padding: 5px 5px;">Pesanan sedang diantar</div>
                                                </div>
                                                <div class="body-item">
                                                    <div class="image-item">
                                                        <img src="{{ $histories->{"image-product"} }}" alt="">
                                                    </div>
                                                    <div class="detail-item">
                                                        <a href="#" class="name-item">{{$histories->product}}</a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="price">
                                                                <p>{{$histories->price}}</p>
                                                            </div>
                                                            <div class="action-item" style="column-gap:10px;">
                                                                <button type="button" class="button button-text"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#seeDetail3Modal{{$histories->id}}">
                                                                    Lihat Detail
                                                                </button>
                                                                @if($histories['status'] == 1)
                                                                    <p style="color: green">Di Terima</p>
                                                                    @if($histories['updated_at'])
                                                                        <p>Tanggal Update: {{ $histories['updated_at']->format('d-m-Y') }}</p>
                                                                    @endif
                                                                @else
                                                                    <div class="d-flex gap-2">
                                                                        <form action="{{ route('penerimaan', $histories->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <input type="hidden" name="updated_at" value="{{ now() }}">
                                                                            <button type="submit" class="btn" style="background-color: black; color: white;" style="color: white; background:rgb(24, 175, 24)"> Konfirmasi Penerimaan</button>
                                                                        </form>
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            <!--Modal See Detail-->
                                                            <div class="modal fade modal-detail" id="seeDetail3Modal{{$histories->id}}"
                                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                                tabindex="-1" aria-labelledby="seeDetailModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog  modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="seeDetailModalLabel">Detail Transaksi</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="line-detail">
                                                                                <h5>Info Transaksi</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Tanggal Transaksi</td>
                                                                                            <td>{{$histories->updated_at}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="line-detail">
                                                                                <h5>Info Pengiriman</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Nama</td>
                                                                                            <td class="bold-text">{{$histories->name}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Alamat</td>
                                                                                            <td>{{$histories->adress}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Produk</td>
                                                                                            <td>{{$histories->product}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="line-detail">
                                                                                <h5>Detail Pembayaran</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="bold-text">Total
                                                                                            </td>
                                                                                            <td class="bold-text">{{$histories->price}}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Modal Track Order-->
                                                            <div class="modal fade modal-tracking"
                                                                id="trackTransaksiModal" data-bs-backdrop="static"
                                                                data-bs-keyboard="false" tabindex="-1"
                                                                aria-labelledby="trackTransaksiModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="trackTransaksiModalLabel">Tracking
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-12 col-md-6 mb-3 mb-md-0">
                                                                                    <div class="detail-tracking">
                                                                                        <div
                                                                                            class="line-tracking number-tracking">
                                                                                            <p class="title-detail">No
                                                                                                Resi</p>
                                                                                            <h4 class="bold-text">
                                                                                                37463591974</h4>
                                                                                        </div>
                                                                                        <div class="line-tracking">
                                                                                            <p class="title-detail">
                                                                                                Sender</p>
                                                                                            <h4 class="bold-text">
                                                                                                Plantsasri ID</h4>
                                                                                        </div>
                                                                                        <div class="line-tracking">
                                                                                            <p class="title-detail">
                                                                                                Receiver</p>
                                                                                            <h4 class="bold-text">Reksa
                                                                                                Prayoga</h4>
                                                                                            <h4 class="address">Jl.
                                                                                                Skip, Kec. Bogor Sel.,
                                                                                                Kota Bogor, Jawa Barat,
                                                                                                16134 [Note: rt01 rw01
                                                                                                no47]</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6">
                                                                                    <div class="process-tracking">
                                                                                        <div class="tracking-images">
                                                                                            <img src="./assets/img/tracking-vector.svg"
                                                                                                alt="">
                                                                                        </div>
                                                                                        <p class="status">Status :
                                                                                            <span>Delivered</span></p>
                                                                                        <div class="card">
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track now-proccess">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Proces</p>
                                                                                            </div>
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Delivered</p>
                                                                                            </div>
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Done</p>
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
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                            </div>
                                        <div class="tab-pane fade" id="nav-proccess" role="tabpanel"
                                            aria-labelledby="nav-proccess-tab">
                                             @foreach($history as $histories)
                                            @if($histories->email == Auth::user()->email && $histories['status'] == 0)
                                            <div class="history-item">
                                                <div class="head-item">
                                                    <div class="icon">
                                                        <img src="./assets/img/icon/icon-history-transaksi.svg" alt="">
                                                    </div>
                                                    <div class="date">{{$histories->updated_at}}</div>
                                                    <div class="alert alert-secondary" role="alert" style="margin: 0 5px 0 0; padding: 5px 5px;">Proses</div>
                                                </div>
                                                <div class="body-item">
                                                    <div class="image-item">
                                                        <img src="{{ $histories->{"image-product"} }}" alt="">
                                                    </div>
                                                    <div class="detail-item">
                                                        <a href="#" class="name-item">{{$histories->product}}</a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="price">
                                                                <p>{{$histories->price}}</p>
                                                            </div>
                                                            <div class="action-item">
                                                                <button type="button" class="button button-text"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#seeDetail4Modal{{$histories->id}}">
                                                                    Lihat Detail
                                                                </button>
                                                            </div>

                                                            <!--Modal See Detail-->
                                                            <div class="modal fade modal-detail" id="seeDetail4Modal{{$histories->id}}"
                                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                                tabindex="-1" aria-labelledby="seeDetailModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog  modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="seeDetailModalLabel">Detail Transaksi</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="line-detail">
                                                                                <h5>Info Transaksi</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Tanggal Transaksi</td>
                                                                                            <td>{{$histories->updated_at}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="line-detail">
                                                                                <h5>Info Pengiriman</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Nama</td>
                                                                                            <td class="bold-text">{{$histories->name}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Alamat</td>
                                                                                            <td>{{$histories->adress}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Produk</td>
                                                                                            <td>{{$histories->product}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="line-detail">
                                                                                <h5>Detail Pembayaran</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="bold-text">Total
                                                                                            </td>
                                                                                            <td class="bold-text">{{$histories->price}}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Modal Track Order-->
                                                            <div class="modal fade modal-tracking"
                                                                id="trackTransaksiModal" data-bs-backdrop="static"
                                                                data-bs-keyboard="false" tabindex="-1"
                                                                aria-labelledby="trackTransaksiModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="trackTransaksiModalLabel">Tracking
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-12 col-md-6 mb-3 mb-md-0">
                                                                                    <div class="detail-tracking">
                                                                                        <div
                                                                                            class="line-tracking number-tracking">
                                                                                            <p class="title-detail">No
                                                                                                Resi</p>
                                                                                            <h4 class="bold-text">
                                                                                                37463591974</h4>
                                                                                        </div>
                                                                                        <div class="line-tracking">
                                                                                            <p class="title-detail">
                                                                                                Sender</p>
                                                                                            <h4 class="bold-text">
                                                                                                Plantsasri ID</h4>
                                                                                        </div>
                                                                                        <div class="line-tracking">
                                                                                            <p class="title-detail">
                                                                                                Receiver</p>
                                                                                            <h4 class="bold-text">Reksa
                                                                                                Prayoga</h4>
                                                                                            <h4 class="address">Jl.
                                                                                                Skip, Kec. Bogor Sel.,
                                                                                                Kota Bogor, Jawa Barat,
                                                                                                16134 [Note: rt01 rw01
                                                                                                no47]</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6">
                                                                                    <div class="process-tracking">
                                                                                        <div class="tracking-images">
                                                                                            <img src="./assets/img/tracking-vector.svg"
                                                                                                alt="">
                                                                                        </div>
                                                                                        <p class="status">Status :
                                                                                            <span>Delivered</span></p>
                                                                                        <div class="card">
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track now-proccess">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Proces</p>
                                                                                            </div>
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Delivered</p>
                                                                                            </div>
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Done</p>
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
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                            </div>
                                        <div class="tab-pane fade" id="nav-failed" role="tabpanel"
                                            aria-labelledby="nav-failed-tab">
                                             @foreach($history as $histories)
                                            @if($histories->email == Auth::user()->email && $histories['status'] == 2)
                                            <div class="history-item">
                                                <div class="head-item">
                                                    <div class="icon">
                                                        <img src="./assets/img/icon/icon-history-transaksi.svg" alt="">
                                                    </div>
                                                    <div class="date">{{$histories->updated_at}}</div>
                                                    <div class="status danger">Gagal</div>
                                                </div>
                                                <div class="body-item">
                                                    <div class="image-item">
                                                        <img src="{{ $histories->{"image-product"} }}" alt="">
                                                    </div>
                                                    <div class="detail-item">
                                                        <a href="#" class="name-item">{{$histories->product}}</a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="price">
                                                                <p>{{$histories->price}}</p>
                                                            </div>
                                                            <div class="action-item">
                                                                <button type="button" class="button button-text"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#seeDetail5Modal{{$histories->id}}">
                                                                    Lihat Detail
                                                                </button>
                                                            </div>

                                                            <!--Modal See Detail-->
                                                            <div class="modal fade modal-detail" id="seeDetail5Modal{{$histories->id}}"
                                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                                tabindex="-1" aria-labelledby="seeDetailModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog  modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="seeDetailModalLabel">Detail Transaksi</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="line-detail">
                                                                                <h5>Info Transaksi</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Tanggal Transaksi</td>
                                                                                            <td>{{$histories->updated_at}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="line-detail">
                                                                                <h5>Info Pengiriman</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Nama</td>
                                                                                            <td class="bold-text">{{$histories->name}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Alamat</td>
                                                                                            <td>{{$histories->adress}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Produk</td>
                                                                                            <td>{{$histories->product}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="line-detail">
                                                                                <h5>Detail Pembayaran</h5>
                                                                                <table style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="bold-text">Total
                                                                                            </td>
                                                                                            <td class="bold-text">{{$histories->price}}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--Modal Track Order-->
                                                            <div class="modal fade modal-tracking"
                                                                id="trackTransaksiModal" data-bs-backdrop="static"
                                                                data-bs-keyboard="false" tabindex="-1"
                                                                aria-labelledby="trackTransaksiModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="trackTransaksiModalLabel">Tracking
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-12 col-md-6 mb-3 mb-md-0">
                                                                                    <div class="detail-tracking">
                                                                                        <div
                                                                                            class="line-tracking number-tracking">
                                                                                            <p class="title-detail">No
                                                                                                Resi</p>
                                                                                            <h4 class="bold-text">
                                                                                                37463591974</h4>
                                                                                        </div>
                                                                                        <div class="line-tracking">
                                                                                            <p class="title-detail">
                                                                                                Sender</p>
                                                                                            <h4 class="bold-text">
                                                                                                Plantsasri ID</h4>
                                                                                        </div>
                                                                                        <div class="line-tracking">
                                                                                            <p class="title-detail">
                                                                                                Receiver</p>
                                                                                            <h4 class="bold-text">Reksa
                                                                                                Prayoga</h4>
                                                                                            <h4 class="address">Jl.
                                                                                                Skip, Kec. Bogor Sel.,
                                                                                                Kota Bogor, Jawa Barat,
                                                                                                16134 [Note: rt01 rw01
                                                                                                no47]</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6">
                                                                                    <div class="process-tracking">
                                                                                        <div class="tracking-images">
                                                                                            <img src="./assets/img/tracking-vector.svg"
                                                                                                alt="">
                                                                                        </div>
                                                                                        <p class="status">Status :
                                                                                            <span>Delivered</span></p>
                                                                                        <div class="card">
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track now-proccess">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Proces</p>
                                                                                            </div>
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Delivered</p>
                                                                                            </div>
                                                                                            <div class="tracking">
                                                                                                <div
                                                                                                    class="process-track">
                                                                                                    <div
                                                                                                        class="bullets-track">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="line-track">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <p class="name-process">
                                                                                                    Done</p>
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
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
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

    {{-- <script>
        localStorage.removeItem('cartData');
    </script> --}}

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
</html>