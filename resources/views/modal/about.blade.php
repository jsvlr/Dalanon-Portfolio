<div class="modal fade" id="edit-about-modal" tabindex="-1" aria-labelledby="editAboutModal">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 d-flex flex-column justify-content-start align-items-start gap-1">
                <div class="pt-3 ps-3 pe-3">
                    <h5 class="m-0 p-0">About</h5>
                    <small>Create a new preset of about section values.</small>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{ route('about.update', $about->id) }}" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-1">
                        <div class="col-3">
                            <img class="h-100 w-100" style="max-width:300px; object-fit: cover;" src="{{ Storage::url($about->image) }}" alt="{{ $about->image }}" id="about-background-image">
                        </div>
                        <div class="col-7">
                            <div class="form-floating mb-2">
                                <textarea type="text" class="form-control fw-semibold" placeholder="introduction" id="introduction-input" name="introduction" style="height: 150px" required>
                                    {{ $about->introduction }}
                                </textarea>
                                <label for="introduction-input" class="fw-semibold opacity-75 small mt-1">Introduction <span class="text-danger small">*</span></label>
                                <div class="invalid-feedback">
                                        Please provide a valid introduction.
                                </div>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control fw-semibold" placeholder="link" id="link-input" name="resume-link" value="{{ $about->resume_link }}" required>
                                <label for="link-input" class="fw-semibold opacity-75 small mt-1">Resume Link <span class="text-danger small">*</span></label>
                                <div class="invalid-feedback">
                                        Please provide a valid resume link.
                                </div>
                            </div>
                            <div class="form-floating">
                                <input type="file" class="form-control fw-semibold" placeholder="image" accept="*.jpg,*.jpeg,*.png" id="image-input" name="image">
                                <label for="image-input" class="fw-semibold opacity-75 small mt-1">Image (fill this if you want to update the image)</label>
                                <div class="invalid-feedback">
                                        Please provide a valid resume image.
                                </div>
                            </div>
                            <button class="btn btn-dark px-5 mt-3 float-end" type="submit">
                                Saved
                            </button>
                        </div>
                        <div class="col-2">
                            <ul class="list-group list-group-flushed gap-1" style="max-height: 300px;">
                                @foreach ($skills as $skill)
                                    <li class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="{{ $skill->id }}" name="core[]" id="core-{{ $skill->id }}" {{ $skill->is_tech_core ? 'checked' : ''}}>
                                        <label class="form-check-label" for="core-{{ $skill->id }}">{{ $skill->title }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>