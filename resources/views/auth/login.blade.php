@extends('auth.base')

@section('title', 'Login')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100 margin-0 p-0 position-relative">
        <div class="position-absolute top-0 start-0 m-3 z-1">
            <a href="{{ route('index') }}" class="btn btn-link text-dark text-decoration-none">
                <i class="fa-solid fa-arrow-left"></i> 
                <span>back to login</span>
            </a>
        </div>
        <div class="container h-100 m-4 d-inherit justify-content-center align-items-center position-relative">
            <br>
            <br>
            <br>
            <div class="d-flex justify-content-start align-items-center gap-2">
                <img src="{{ asset('images/logo/nexa-node.png') }}" height="60" alt="my-logo">
                <div>
                     <h1 class="fw-bold text-uppercase text-header">Nexa Node</h1> 
                     <i class="fa-solid fa-grip-lines-vertical"></i><span class="d-line opacity-75 fw-normal small">Portfolio Admin Panel</span>
                </div>
            </div>
            <div class="d-flex justify-content-center ps-5 flex-column">
                <div class="text-start">
                    <p class="m-0 p-0 fs-5 text-title">
                        Good Day Admin!
                    </p>
                    <span class="fs-xs">
                        Please use your credentials to sign in.
                    </span>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <form action="{{ route('auth.login') }}" novalidate method="POST" class="needs-validation container-fluid d-flex flex-column gap-2 align-items-stretch justify-content-center mt-5" style="width: 400px;" id="login-form">
                @csrf
                @method('POST')
                <div class="form-floating mb-0">
                    <input type="email" class="form-control fw-semibold small rounded-1 shadow-none border-2 pe-5" 
                        name="email" id="email-input" placeholder="name@gmail.com" 
                        value="{{ old('email') }}" required>
                    <label for="email-input" class="fw-semibold opacity-75 small mt-1">E-mail</label>
                    <div class="position-absolute end-0 me-3" style="top: 29px; transform: translateY(-50%);">
                        <i class="fa-regular fa-envelope opacity-50"></i>
                    </div>
                    <div class="invalid-feedback small opacity-50 fw-semibold">
                        Email address is required to continue.
                    </div>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control fw-semibold rounded-1 shadow-none border-2" name="password" id="password-input" placeholder="********" value="{{ old('password') }}" required>
                    <label for="password-input" class="fw-semibold opacity-75 small mt-1">Password</label>
                    <div class="position-absolute end-0 me-3" style="top: 29px; transform: translateY(-50%);"  id="show-password-toggler">
                         <i class="fa-solid fa-eye opacity-50" id="toggler-icon"></i>
                    </div>

                    <div class="invalid-feedback small opacity-50 fw-semibold">
                        Password is required to continue.
                    </div>
                </div>
                <div class="helper d-flex justify-content-between align-items-center">
                    <div>
                        <input type="checkbox" name="show-password-chkbox" id="show-password-chkbox">
                        <label class="fw-semibold small opacity-75" style="font-size: 14px;" for="show-password-chkbox">Show password</label>
                    </div>
                    <button class="color-french-blue btn btn-link small fw-semibold opacity-75" type="button" data-bs-toggle="modal" data-bs-target="#sendOTPModal">
                        Forgot Password?
                    </button>
                </div>
                <div class="d-flex justify-content-center align-items-center my-2">
                    {!! Anhskohbo\NoCaptcha\Facades\NoCaptcha::display() !!}
                </div>
                <input type="submit" class="btn btn-primary btn-lg fw-semibold mt-2 rounded-1 py-3" value="Login">
            </form>
            <div class="position-absolute start-0 end-0 bottom-0 p-3">
                <div class="row align-items-center g-4">    
                    <div class="col-md-4 text-center text-md-start">
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-2">
                            <div class="bg-danger p-1 rounded-2 me-2">
                                <i class="bi bi-code-slash text-white fs-5"></i>
                            </div>
                            <span class="fw-bold fs-5 tracking-tight">{{ $user->name }}</span>
                        </div>
                        <p class="text-secondary small mb-0">
                            &copy; 2026 {{ $user->name }}. All rights reserved.
                        </p>
                    </div>

                    <div class="col-md-4 text-center">
                    </div>

                    <div class="col-md-4 text-center text-md-end">
                        <p class="text-secondary small mb-0">
                            Built with <span class="text-danger fw-semibold">Laravel</span> & 
                            <span class="text-primary fw-semibold">Bootstrap</span>
                        </p>
                        <p class="text-muted extra-small" style="font-size: 0.75rem;">
                            Updated February 2026
                        </p>
                    </div>

                </div>
            </div>
        </div>
         <div class="p-5 border d-md-block d-none w-100 h-100 margin-0 p-0 login-side-background">
        </div>
    </div>

    <!-- Send OTP Modal -->
    <div class="modal fade" id="sendOTPModal" tabindex="-1" aria-labelledby="sendOTPModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title border-0 fs-5" id="sendOTPModalLabel">OTP Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="password-reset-modal-body">
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control fw-semibold small rounded-1 shadow-none border-2 pe-5" 
                            name="email" id="otp-email-input" placeholder="name@gmail.com" 
                            value="{{ old('email') }}" required>
                        <label for="email-input" class="fw-semibold opacity-75 small mt-1">E-mail</label>
                        <div class="position-absolute end-0 me-3" style="top: 29px; transform: translateY(-50%);">
                            <i class="fa-regular fa-envelope opacity-50"></i>
                        </div>
                        <div class="invalid-feedback small opacity-50 fw-semibold">
                            Email address is required to continue.
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-1 mb-4">
                        <div class="form-floating flex-fill">
                            <input type="text" class="form-control fw-semibold small rounded-1 shadow-none border-2 pe-5" 
                                name="otp" id="otp-verify-input" placeholder="######" 
                                value="{{ old('otp') }}" disabled required>
                            <label for="email-input" class="fw-semibold opacity-75 small mt-1">6 digit otp</label>
                            <div class="position-absolute end-0 me-3" style="top: 29px; transform: translateY(-50%);">
                                <i class="fa-solid fa-envelope-circle-check"></i>
                            </div>
                            <div class="invalid-feedback small opacity-50 fw-semibold">
                                OTP is required to continue.
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-dark h-100" type="button" id="verify-otp-btn" disabled>
                                Verify
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-dark w-100 py-3" type="button" id="send-otp-btn">
                        Send OTP
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="passwordResetModal" tabindex="-1" aria-labelledby="passwordResetModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title border-0 fs-5" id="passwordResetModalLabel">Password Reset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="password-reset-modal-body">
                    <form class="" action="" method="POST" novalidate>
                        @csrf
                        @method('POST')
                        <div class="form-floating mb-2">
                            <input type="text">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('javascript/show-password.js') }}"></script>
    <script src="{{ asset('javascript/login-validation.js') }}"></script>
@endsection