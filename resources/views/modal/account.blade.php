<div class="modal fade" id="edit-account-modal" tabindex="-1" aria-labelledby="editAccountModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <div class="flex-column align-items-start ms-3 mt-3">
                    <h5 class="m-0 p-0">Account</h5>
                    <small>Edit your account here</small>
                </div>
            </div>
            <form action="{{ route('user.update', auth()->user()->id) }}" method="POST" class="needs-validation w-100 d-flex flex-column gap-2" novalidate>
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-floating mb-2">
                            <input type="text" class="form-control fw-semibold" name="name" id="name-input" value="{{ auth()->user()->name }}" required>
                            <label for="name-input" class="fw-semibold opacity-75 small mt-1">Name <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">
                                Please provide a valid name
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="email" class="form-control fw-semibold" name="email" id="email-input" value="{{ auth()->user()->email }}" required>
                            <label for="email-input" class="fw-semibold opacity-75 small mt-1">E-mail <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">
                                Please provide a valid email
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control fw-semibold rounded-1 shadow-none border-2" name="password" id="password-input" placeholder="********" value="{{ old('password') }}" required>
                            <label for="password-input" class="fw-semibold opacity-75 small  mt-1">Password <span class="text-danger">*</span></label>
                            <div class="position-absolute top-50 end-0 translate-middle-y me-3" id="show-password-toggler">
                                <i class="fa-solid fa-eye opacity-50" id="toggler-icon"></i>
                            </div>
                            <div class="invalid-feedback small opacity-50 fw-semibold">
                                    Password is required to continue.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control fw-semibold rounded-1 shadow-none border-2" name="password_confirmation" id="password-confirm-input" required>
                            <label for="password-confirm-input" class="fw-semibold opacity-75 small mt-1">Password Confirm <span class="text-danger">*</span></label>
                            <div class="invalid-feedback small opacity-50 fw-semibold">
                                    Please check if the password is the same as confirm password.
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            {!! Anhskohbo\NoCaptcha\Facades\NoCaptcha::display() !!}
                        </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-dark px-5">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>