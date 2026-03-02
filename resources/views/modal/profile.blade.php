<div class="modal fade" id="edit-profile-modal" tabindex="-1" aria-labelledby="editProfileModal">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
        <div class="row px-4">
            <div class="col-5">
                <div class="container mt-5 mb-3">
                    <small>Select a preset values.</small>
                </div>
                <div>
                    <ul class="list-group gap-2">
                        @foreach ($allProfile as $profile)
                            <li class="list-group-item rounded-2 shadow position-relative text-light {{ $profile->in_used ? 'active' : '' }}" style="background-image:url('{{ Storage::url($profile->background_image_url) }}')"
                                >
                                <div class="wrapper top-0 end-0 bottom-0 start-0 bg-dark"></div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="flex-fill">
                                        <span class="fw-bold">{{ $profile->header }}</span><br>
                                        <small class="">{{ $profile->subheader }} {{ $user->name }}</small>
                                    </div>
                                    <div>
                                        <img class="rounded-circle" src="{{ Storage::url($profile->profile_image_url) }}" height="40"  alt="{{ $profile->profile_image_url }}">
                                    </div>
                                </div>
                                <div class="float-end form-check d-flex gap-1">
                                    @if (!$profile->in_used)
                                        <form action="{{ route('profile.update', $profile->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="profile-id" value="{{ $profile->id }}" required>
                                            <button class="btn btn-light btn-sm" type="submit">
                                                use
                                            </button>
                                        </form>
                                    @else
                                        <div>
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <form action="{{ route('profile.destroy', $profile->id) }}" class="needs-confirmation" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-light btn-sm" type="submit">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-7">
                <form action="{{ route('profile.store') }}" method="POST" class="needs-validation w-100 d-flex flex-column gap-2" enctype="multipart/form-data" novalidate>
                @csrf
                @method("POST")
                <div class="modal-header border-bottom-0">
                <div class="flex-column align-items-start ms-3 mt-3">
                        <h5 class="m-0 p-0">Hompage</h5>
                        <small>Create a new preset of homepage values.</small>
                    </div>
                </div>
                <div class="modal-body d-flex flex-column gap-2">                            
                    <div class="form-floating">
                        <input type="text" class="form-control fw-semibold" placeholder="Header" id="header-input" name="header" value="{{ old(key: 'header') }}" required>
                        <label for="header-input" class="fw-semibold opacity-75 small mt-1">Header <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid header.
                        </div>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control fw-semibold" placeholder="Subheader" id="subheader-input" name="subheader" value="{{ old('subheader') }}" required>
                        <label for="subheader-input" class="fw-semibold opacity-75 small mt-1">Subheader <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid subheader.
                        </div>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control fw-semibold" placeholder="Position" id="position-input" name="position" value="{{ old('position') }}" required>
                        <label for="position-input" class="fw-semibold opacity-75 small mt-1">Position <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid position.
                        </div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="file" accept="*.jpg,*.png,*.jpeg" name="profile-image-url" id="profile-input">
                        <label for="profile-input" class="fw-semibold opacity-75 small mt-1">Profile <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid profile.
                        </div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="file" accept="*.jpg,*.png,*.jpeg" name="background-image-url" id="background-input">
                        <label for="background-input" class="fw-semibold opacity-75 small mt-1">Background <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid background.
                        </div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="file" accept="*.jpg,*.png,*.jpeg" name="logo-image-url" id="logo-input">
                        <label for="logo-input" class="fw-semibold opacity-75 small mt-1">Logo <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid logo.
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" type="button">
                        Close
                    </button>
                    <button class="btn btn-dark px-5" type="submit">
                        Save
                    </button>
                </div>
                </form>
            </div>    
        </div>
        </div>
    </div>
</div>