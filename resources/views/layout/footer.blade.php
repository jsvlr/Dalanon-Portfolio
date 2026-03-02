<footer class="bg-dark py-5 m-0">
    <div class="container">
        <div class="row align-items-center g-4">
            
            <div class="col-md-4 text-center text-md-start">
                <div class="d-flex justify-content-start align-items-center gap-4">
                    <img src="{{ asset('images/logo/nexa-node.png') }}" alt="nexa-node.png" height="45">
                    <h5 class="text-header m-0 p-0 text-uppercase">Nexa Node</h5>
                </div>

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
                <div class="d-flex justify-content-center gap-3">
                    @foreach ($contacts as $contact)
                        <a href="{{ $contact->link }}" class="btn btn-outline-secondary btn-sm rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                            <img class="img-fluid object-fit-contain" src="{{ Storage::url($contact->image_url) }}" alt="{{ $contact->image_url }}">
                        </a>
                    @endforeach
                </div>
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
</footer>