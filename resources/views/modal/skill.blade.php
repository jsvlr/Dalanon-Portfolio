<div class="modal fade" id="edit-skill-modal" tabindex="-1" aria-labelledby="editSkillModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <div class="flex-column align-items-start ms-3 mt-3">
                    <h5 class="m-0 p-0">Skill</h5>
                    <small id="skill-subheader">Create/Edit your skill here</small>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{ route('skill.store') }}" class="needs-validation" id="skill-form"  method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="_method" id="skillFormMethod" value="POST">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control fw-semibold" placeholder="title" id="title-input" name="title" value="{{ old(key: 'title') }}" required>
                        <label for="title-input" class="fw-semibold opacity-75 small mt-1">Title <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid title.
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control fw-semibold" placeholder="type" id="type-input" name="type" value="{{ old(key: 'type') }}" required>
                        <label for="type-input" class="fw-semibold opacity-75 small mt-1">type <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid type.
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea type="text" class="form-control fw-semibold" placeholder="description" id="description-input" name="description" value="{{ old(key: 'description') }}" style="height: 100px;" required></textarea>
                        <label for="description-input" class="fw-semibold opacity-75 small mt-1">Description <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid description.
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input class="form-control" type="file" accept="*.jpg,*.png,*.jpeg" name="logo_image_url" id="logo-input">
                        <label for="logo-input" class="fw-semibold opacity-75 small mt-1">Logo</label>
                        <div class="invalid-feedback">
                            Please provide a valid logo.
                        </div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control" type="file" accept="*.jpg,*.png,*.jpeg" name="background_image_url" id="background-input">
                        <label for="background-input" class="fw-semibold opacity-75 small mt-1">Background</label>
                        <div class="invalid-feedback">
                            Please provide a valid background.
                        </div>
                    </div>
                    <button class="btn btn-dark w-100 py-3" type="submit" id="skill-submit-btn">
                        Create
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>