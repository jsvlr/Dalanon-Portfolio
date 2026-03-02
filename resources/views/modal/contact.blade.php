<div class="modal fade" id="edit-contact-modal" tabindex="-1" aria-labelledby="editContactModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <div class="flex-column align-items-start ms-3 mt-3">
                    <h5 class="m-0 p-0">Contact</h5>
                    <small>Edit your contact links here</small>
                </div>
            </div>
            <div class="modal-body">
                <div>
                    <form action="{{ route('contact.store') }}" method="POST"  class="needs-validation" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('POST')
                        <div class="form-floating mb-2">
                            <input class="form-control fw-semibold rounded-1 shadow-none border-2" type="text" placeholder="Title" value="{{ old('title') }}" id="title-input" name="title" required>
                            <label class="fw-semibold opacity-75 small mt-1" for="title-input">Title <span class="text-danger">*</span></label>
                            <div class="invalid-feedback small opacity-50 fw-semibold">
                                Please provide a valid title.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control fw-semibold rounded-1 shadow-none border-2" type="text" placeholder="Link" value="{{ old('link') }}" id="link-input" name="link" required>
                            <label class="fw-semibold opacity-75 small mt-1" for="link-input">Link <span class="text-danger">*</span></label>
                            <div class="invalid-feedback small opacity-50 fw-semibold">
                                Please provide a valid link.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control fw-semibold rounded-1 shadow-none border-2" type="file" accept="*.png,*.jpg,*.jpeg" placeholder="image" value="{{ old('image') }}" id="image-input" name="image" required>
                            <label class="fw-semibold opacity-75 small mt-1" for="image-input">image <span class="text-danger">*</span></label>
                            <div class="invalid-feedback small opacity-50 fw-semibold">
                                Please provide a valid image.
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-dark float-end px-5" id="btn-submit">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
                <div>
                    <ul class=""></ul>
                </div>
            </div>
            <div class="modal-footer border-top-0">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>