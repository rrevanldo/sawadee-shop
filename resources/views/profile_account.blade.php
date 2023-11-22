<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SH</title>

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

    <div id="app">
        <div id="navbar" class="fixed-top">
            <div class="container">
                <div class="navbar-wrapper">
                    <div class="leftSideNavbar">
                        <div class="text-logo">
                            <a href="/show" class="text-dark text-decoration-none">
                                <h1 class="me-3">SH</h1>
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
               <div class="profileContainer first-line">
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
                           <div class="card profile-data">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-profileData-tab" data-bs-toggle="tab" data-bs-target="#nav-profileData" type="button" role="tab" aria-controls="nav-profileData" aria-selected="true">Profil Setting</button>
                                    <button class="nav-link" id="nav-securitySetting-tab" data-bs-toggle="tab" data-bs-target="#nav-securitySetting" type="button" role="tab" aria-controls="nav-securitySetting" aria-selected="false">Keamanan</button>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-profileData" role="tabpanel" aria-labelledby="nav-profileData-tab">
                                        <div class="row">
                                            <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                                                <div class="profile-images-wrapper">
                                                    <div class="profile-image">
                                                        @if (is_null($user['image_profile']))
                                                        <img src="../assets/faces/1.jpg" alt="" 
                                                            width="100" height="200" style="border-radius: 20px;" class="d-block m-auto">
                                                            @else
                                                            <img src="{{asset('assets/img/' .Auth::user()->image_profile)}}" alt=""  
                                                            width="100" height="200" style="border-radius: 20px;" class="d-block m-auto">
                                                        @endif
                                                    </div>
                                                    <div class="button-change-image">
                                                        <a href="{{'/profile/edit'}}" class="button button-outline-primary w-100">Ganti Profil</a>
                                                    </div>
                                                    <p class="info">File besar: maksimal 4.000.000 byte (4 MB). file yang diizinkan: .extensionJPG .JPEG .PNG</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <div class="biodata-user">
                                                    <h5 class="title-data-user">Profil Data Kamu</h5>
                                                    <div class="table-data-user">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="label">Nama</td>
                                                                    <td class="value">{{Auth::user()->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">Nomor Telepon</td>
                                                                    <td class="value">{{Auth::user()->phone}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">Email</td>
                                                                    <td class="value">{{Auth::user()->email}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="address-user">
                                                    <h5 class="title-data-user">Alamat Kamu</h5>
                                                    <p>{{Auth::user()->adress}}</p>
                                                </div>
                                                <div class="edit-data-modal py-2 pt-3 d-flex justify-content-end">
                                                      <div class="modal fade" id="changeDataProfileUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changeDataProfileUserLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="changeDataProfileUserLabel">Ubah Profil</h5>
                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <form action="">
                                                                  <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-input">
                                                                                <label for="firstName" class="form-label">Nama awal</label>
                                                                                <input type="text" class="form-control" id="firstName">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-input">
                                                                                <label for="lastName" class="form-label">Nama Akhir</label>
                                                                                <input type="text" class="form-control" id="lastName">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-input">
                                                                                <label for="phoneNumber" class="form-label">Nomor Telepon</label>
                                                                                <input type="number" class="form-control" id="phoneNumber">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-input">
                                                                                <label for="email" class="form-label">Email</label>
                                                                                <input type="email" class="form-control" id="email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-input">
                                                                                <label for="address" class="form-label">Alamat</label>
                                                                                <textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
                                                                            </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="row pt-3">
                                                                      <div class="col-12 d-flex justify-content-end">
                                                                          <button class="button button-outline-primary">Ubah Profil</button>
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
                                    <div class="tab-pane fade" id="nav-securitySetting" role="tabpanel" aria-labelledby="nav-securitySetting-tab">
                                        <div class="row change-password">
                                            <div class="col-12 col-md-4 mb-4 mb-md-0">
                                                <div class="greetings">
                                                    <p>Halo, <span class="name">{{Auth::user()->name}}</span></p>
                                                    <p>Ubah <span class="text-dark">keamanan akun</span> disini.</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <h5 class="title-data-user">Ganti Password</h5>
                                                <form action="{{route('password.change')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-input">
                                                        <label for="newPassword" class="form-label">Password baru</label>
                                                        <div class="password-eye">
                                                            <input type="password" class="form-control" id="newPassword">
                                                            <div class="togglePassword">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-input">
                                                        <label for="confirmPassword" class="form-label">Konfirmasi password</label>
                                                        <div class="password-eye">
                                                            <input type="password" name="password" class="form-control" id="confirmPassword">
                                                            <div class="togglePassword">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </div>
                                                        </div>
                                                        <p id="small" style="color: red; display: none;">pastikan kata sandinya sama</p>
                                                    </div>
                                                    <div class="d-flex justify-content-end pt-3">
                                                        <button class="button button-outline-primary" style="display: block;" id="button">Ganti Password</button>
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

        <script>
    var newPasswordInput = document.getElementById('newPassword');
    var confirmPasswordInput = document.getElementById('confirmPassword');
    var passwordMatchError = document.getElementById('button');
    var text = document.getElementById('small');

    function validatePassword() {
        if (newPasswordInput.value == confirmPasswordInput.value) {
            passwordMatchError.style.display = 'block';
            text.style.display = 'none';
        } else {
            passwordMatchError.style.display = 'none';
            text.style.display = 'block';
        }
    }

    newPasswordInput.addEventListener('input', validatePassword);
    confirmPasswordInput.addEventListener('input', validatePassword);
</script>
</html>