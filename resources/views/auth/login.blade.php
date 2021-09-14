@extends('layouts.auth')

@section('content')
    <div class="login-page">

        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>GDL</b>WebCamp</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Ingresa tus credenciales para acceder</p>

                    <!-- Formulario de login -->
                    <form
                        action="{{ route('login') }}"
                        method="post"
                    >
                        @csrf

                        <div class="input-group mb-3">
                            <input
                                class="form-control @error('email') is-invalid @enderror"
                                type="email"
                                name="email"
                                placeholder="{{ __('E-Mail Address') }}"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                autofocus
                                required
                            >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                            @error('email')
                                <span
                                    class="invalid-feedback"
                                    role="alert"
                                >
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('Password') }}"
                                name="password"
                                required
                                autocomplete="current-password"
                            >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span
                                    class="invalid-feedback"
                                    role="alert"
                                >
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                        {{ old('remember') ? 'checked' : '' }}
                                    >

                                    <label
                                        class="form-check-label"
                                        for="remember"
                                    >
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input
                                    type="hidden"
                                    name="accion"
                                    value="login"
                                >
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                @if (Route::has('password.request'))
                                    <a
                                        class="btn btn-link"
                                        href="{{ route('password.request') }}"
                                    >
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

    </div>
    <!-- ./wrapper -->

@endsection
