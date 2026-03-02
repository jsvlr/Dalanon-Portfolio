<div class="container-fluid d-flex justify-content-center align-items-center vh-100 position-relative">
    <div class="position-absolute top-0 start-0 end-0 bottom-0 login-side-background z-0"></div>
    <div class="container z-1">
        <div class="row gx-4">
            <div class="col-5 h-auto border-3 position-relative">
                <div class="position-absolute top-0 start-0 end-0 bottom-0 contact-side-background z-0"></div>
            </div>
            <div class="col-7 bg-white p-5">
                <div class="header text-dark">
                    <h2>Contact Me</h2>
                    <hr class="w-100 border border-1 border-dark">
                    <p class="" style="text-align: justify;">
                        &emsp14; Use this form for all general enquires. I monitor these responses constantly during working hours. If you are looking to partner
                        with me, please complete the new customer application instead.
                    </p>
                </div>
                <br>
                <br>
                <div>
                    <form class="needs-validation" action="{{ route('message.store') }}" method="POST" novalidate>
                        @csrf
                        @method('POST')
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control fw-semibold" placeholder="fullname" id="fullname-input" name="fullname" value="{{ old(key: 'fullname') }}" autocomplete="off" required>
                            <label for="fullname-input" class="fw-semibold opacity-75 small mt-1">Fullname <span class="text-danger small">*</span></label>
                            <div class="invalid-feedback">
                                Please provide a valid fullname.
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
                            <div class="form-floating flex-fill">
                                <input type="email" class="form-control fw-semibold" placeholder="email-number" id="email-input" name="email" value="{{ old(key: 'email') }}" autocomplete="off" required>
                                <label for="email-input" class="fw-semibold opacity-75 small mt-1">Email <span class="text-danger small">*</span></label>
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                            </div>
                            <div class="form-floating flex-fill">
                                <input type="text" class="form-control fw-semibold" placeholder="phone-number" id="phone-number-input" name="phone-number" value="{{ old(key: 'phone-number') }}" autocomplete="off" required>
                                <label for="phone-number-input" class="fw-semibold opacity-75 small mt-1">Phone No# <span class="text-danger small">*</span></label>
                                <div class="invalid-feedback">
                                    Please provide a valid phone number.
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-4">
                            <textarea class="form-control" name="message" id="message-input" type="input" style="height: 100px;" required>
                                {{ old('message') }}
                            </textarea>
                            <label for="message-input" class="fw-semibold opacity-75 small mt-1">Message <span class="text-danger small">*</span></label>
                            <div class="invalid-feedback">
                                Please provide a valid message.
                            </div>
                        </div>
                        <div>
                            {!! Anhskohbo\NoCaptcha\Facades\NoCaptcha::display() !!}
                        </div>
                        <button class="float-end rounded-0 px-5 py-3 btn btn-dark" type="submit">
                            Send Message <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>