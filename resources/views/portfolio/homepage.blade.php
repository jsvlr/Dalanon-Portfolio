<div class="container-fluid d-flex justify-content-center align-items-center vh-100 position-relative text-light"
    style="
        background-image: url('{{ Storage::url($profile->background_image_url) }}');
        background-size: cover;
        background-repeat: no-repeat;
        filter: grayscale(2px);
        "
    >
    <div class="row w-100">
        <div class="col-6 text-start d-flex flex-column gap-0">
            <div class="">
                <h1 class="m-0 p-0" style="font-size: 96px;">{{ $profile->header }}</h1>
                <h1 class="m-0 p-0 text-nowrap" style="font-size: 83px;">{{ $profile->subheader }} {{ $user->name }}</h1>
                <p class="fs-4">I'm into <span style="font-weight: 900;">{{ $profile->position }}</span></p>
            </div> 
            <div class="d-flex justify-content-start align-items-center gap-2">
                @foreach ($contacts as $contact)
                    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                        @auth
                            <div class="text-light">
                                <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="needs-confirmation">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <button class="btn btn-outline-danger btn-sm" type="submit">
                                            <i class="fa-solid fa-x small" style="font-size: 10px;"></i>   
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endauth
                        <a href="{{ $contact->link }}" target="_blank">
                            <img src="{{ Storage::url($contact->image_url) }}" height="45" alt="{{ $contact->title }}">
                        </a>
                        <span>{{ $contact->title }}</span>
                    </div>
                @endforeach
                @auth
                    <div>
                        <button class="btn btn-light" data-bs-toggle="modal" type="button" data-bs-target="#edit-contact-modal">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <span class="small">Add Contact</span>
                    </div>
                @endauth
            </div>
        </div>
        <div class="col-6">
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <div class="">
                    <img class="img-fluid rounded-circle" src="{{ Storage::url($profile->profile_image_url) }}"  alt="{{ $profile->profile_image_url }}"
                    style="
                    height: 400px;
                    width: 400px;
                    ">
                </div>
            </div>
        </div>
    </div>
    @auth
        <div class="position-absolute bottom-0 end-0 m-3">
            <button class="btn btn-light btn-md p-3" type="button" data-bs-toggle="modal" data-bs-target="#edit-profile-modal">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </div>
    @endauth
</div>