@extends('auth.login.layouts.page')


@section('content')
<div class="form-container">

    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">
                    @if(session('status'))
                    {{-- <div class="alert alert-success" role="alert">
                        <strong>{{session('status')}}</strong>
                    </div> --}}
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{session('status')}}</strong>
                    </div>

                    <script>
                        $(".alert").alert();
                    </script>
                    @endif

                    <h1 class="text-center">Iniciar Sesion en: <a href="index.html"><span class="brand-name">MERU
                                MANTENIMIENTO</span></a></h1>
                    {{-- <p class="signup-link">New Here? <a href="auth_register.html">Create an account</a></p> --}}
                    <form class="text-left" action="{{route('login')}}" method="POST">
                        @csrf

                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <input id="uid" name="uid" type="text" required autofocus class="form-control"
                                    placeholder="Nombre de usuario">
                                @error('uid') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input id="password" name="password" type="password" required class="form-control"
                                    placeholder="Contraseña">
                                @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper toggle-pass">
                                    <p class="d-inline-block">Mostrar Contraseña</p>
                                    <label class="switch s-primary">
                                        <input type="checkbox" id="toggle-password" class="d-none">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="field-wrapper flex-row-reverse">
                                    <button type="submit" class="btn btn-custom" value="">Acceder</button>
                                </div>

                            </div>

                            <div class="field-wrapper text-center keep-logged-in mb-n5">
                                <div class="n-chk new-checkbox checkbox-outline-primary">
                                    <label class="new-control new-checkbox checkbox-outline-primary">
                                        <input type="checkbox" class="new-control-input" name="remember">
                                        <span class="new-control-indicator"></span>Mantenerme Conectado
                                    </label>
                                </div>
                            </div>

                            {{-- <div class="field-wrapper"> --}}
                                {{-- <a href="auth_pass_recovery.html" class="forgot-pass-link">Forgot Password?</a>
                                --}}
                                {{-- </div> --}}

                        </div>
                    </form>
                    {{-- <p class="terms-conditions text-justify">© 2020 Todos los derechos Reservados. <a
                            href="index.html">Meru Operaciones</a> Es un producto creado por Erwil Diaz. <a
                            href="javascript:void(0);">Preferencias de Cookies</a>, <a
                            href="javascript:void(0);">Privacidad</a>, y <a href="javascript:void(0);">Terminos</a>.</p>
                    --}}
                    <p class="terms-conditions text-center"><span style="color: #1e638c">HidroBolivar </span>© 2023
                        Todos los derechos Reservados. </p>

                </div>
            </div>
        </div>
    </div>
    <div class="form-image">
        <div class="l-image">
        </div>
    </div>
</div>

@endsection