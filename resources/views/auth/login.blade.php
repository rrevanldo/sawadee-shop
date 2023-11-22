@extends('auth.layout_auth')

@section('auth')
    <div id="auth">
        <div class="wrapper">
            <div class="authForm">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="headForm">
                        <h1>Selamat Datang !!</h1>
                        <p>Silahkan masuk untuk melanjutkan</p>
                    </div>
                    <div class="bodyForm">
                        <div class="mb-3 inputForm">
                            <div class="icon">
                                <label for="username">
                                    <img src="../assets/img/icon/email 2.png" alt="">
                                </label>
                            </div>
                            <input name="email" class="form-control" id="username" placeholder="Email">
                        </div>
                        <div class="mb-3 inputForm passwordForm">
                            <div class="icon">
                                <label for="password">
                                    <img src="../assets/img/iconLock.svg" alt="">
                                </label>
                            </div>
                            <div class="wrapperToggle">
                                <i class="bi bi-eye-fill" id="togglePassword"></i>
                            </div>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password">
                        </div>

                        <div class="wrapperButton mb-4">
                            <button class="button" type="submit">Masuk</button>
                        </div>

                        <p class="toSignUppage">Tidak mempunyai akun ? <a href="{{ route('register.page') }}">Daftar sekarang!</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
