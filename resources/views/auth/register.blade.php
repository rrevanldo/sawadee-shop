@extends('auth.layout_auth')

@section('auth')
    <div id="auth">
        <div class="wrapper">
            <div class="authForm">
                <form action="{{route('register.account')}}" method="POST">
                    @csrf
                    <div class="headForm">
                        <h1>Buat Akun</h1>
                        <p>Buat akun untuk melanjutkan </p>
                    </div>
                    <div class="bodyForm">
                        <div class="mb-3 inputForm">
                            <div class="icon">
                                <label for="name">
                                    <img src="../assets/img/iconUser.svg" alt="">
                                </label>
                            </div>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="mb-3 inputForm">
                            <div class="icon">
                                <label for="phone">
                                    <img src="../assets/img/icon/email 2.png" alt="">
                                </label>
                            </div>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="mb-3 inputForm">
                            <div class="icon">
                                <label for="email">
                                    <img src="../assets/img/icon/telephone-handle-silhouette 1.png" alt="">
                                </label>
                            </div>
                            <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone">
                        </div>
                        <div class="mb-3 inputForm">
                            <div class="icon">
                                <label for="email">
                                    <img src="../assets/img/icon/pin (1).png" alt="">
                                </label>
                            </div>
                            <input type="text" name="adress" class="form-control" id="address" placeholder="Address">
                        </div>
                        <div class="mb-3 inputForm passwordForm">
                            <div class="icon">
                                <label for="address">
                                    <img src="../assets/img/iconLock.svg" alt="">
                                </label>
                            </div>
                            <div class="wrapperToggle">
                                <i class="bi bi-eye-fill" id="togglePassword"></i>
                            </div>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>

                        <div class="wrapperButton mb-4">
                            <button class="button" type="submit">Daftar</button>
                        </div>

                        <p class="toSignUppage">Sudah punya akun ? <a href="/login">Masuk</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
