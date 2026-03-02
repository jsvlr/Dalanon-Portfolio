<div class="container-fluid text-dark p-3" style="min-height: 100vh;">
    <div class="container position-relative mb-5">
        <div>
            <h3 class="m-0 p-0">
                Skills & Abilities
            </h3>
            <hr class="w-100 border-3">
            <p class="m-0 opacity-75">
                Beyond just code and hardware, this is a look at my ability to diagnose complex 
                issues and implement efficient workflows. It covers everything from cloud architecture 
                to cybersecurity protocols, ensuring tech stacks stay robust and downtime stays low.
            </p>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-2 gy-5 mt-4">
            @foreach ($skills as $skill)
                <div class="col">
                  <div class="card shadow border-0 rounded-4 overflow-hidden h-100 onclick-skill-card" type="button" data-bs-toggle="modal" data-bs-target="#read-skill-modal">      
                        <div class="position-relative text-center bg-secondary bg-opacity-25">
                            <div class="ratio ratio-21x9">
                                <img src="{{ Storage::url($skill->background_image_url) }}" class="card-img-top object-fit-cover" alt="{{ $skill->background_image_url }}">
                                @auth
                                    <div class="position-absolute top-0 end-0 m-3 d-flex gap-2">
                                        <button class="btn btn-edit-skill btn-light rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center" 
                                                style="width: 32px; height: 32px; background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(4px);"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#edit-skill-modal"
                                                data-id="{{ $skill->id }}"
                                                data-title="{{ $skill->title }}"
                                                data-description="{{ $skill->description }}"
                                                data-type="{{ $skill->type }}"
                                                data-background="{{ Storage::url($skill->background_image_url) }}"
                                                data-logo="{{ Storage::url($skill->logo_image_url) }}"
                                                >
                                            <i class="fa-solid fa-pen-to-square text-dark" style="font-size: 0.85rem;"></i>
                                        </button>
                                        <form action="{{ route('skill.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Delete this skill?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center" 
                                                    style="width: 32px; height: 32px; background: rgba(33, 37, 41, 0.85); backdrop-filter: blur(4px);">
                                                <i class="fa-solid fa-trash text-white" style="font-size: 0.85rem;"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                            <div class="position-absolute top-100 start-0 translate-middle-y ms-4 ps-2">
                                <div class="bg-white p-1 shadow rounded-3 d-flex justify-content-center align-items-center">
                                    <img src="{{ Storage::url($skill->logo_image_url) }}" alt="{{ $skill->logo_image_url }}" height="50">
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 pt-5 mt-3">
                            <div class="d-flex align-items-center mb-3 gap-2">
                                <h2 class="card-title fw-bold mb-0 fs-4 text-dark">{{ $skill->title }}</h2>
                                <span class="badge bg-secondary text-uppercase rounded-pill fw-semibold ls-1">{{ $skill->type }}</span>
                            </div>
                            <p class="card-text text-secondary mb-4 lh-base">
                                {{ $skill->description }} <small class="fw-bold text-dark">Read More...</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @auth
            <div class="position-absolute end-0 bottom-100">
                <div>
                    <button class="btn btn-dark btn-md rounded-0 p-3" type="button" data-bs-toggle="modal" data-bs-target="#edit-skill-modal" id="btn-create-skill"> 
                        <i class="fa-solid fa-plus"></i> Add new skill
                    </button>
                </div>
            </div>
        @endauth
    </div>
</div>