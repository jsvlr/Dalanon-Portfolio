<div class="container-fluid text-dark p-3 mt-5" style="min-height: 100vh;">
    <div class="container position-relative">
        <div>
            <h3 class="m-0 p-0">
                Projects
            </h3>
            <hr class="w-100 border-3">
            <p class="m-0 opacity-75">
                A showcase of real-world challenges met with technical solutions. This section details my end-to-end 
                involvement in building applications and managing systems, emphasizing clean code, 
                efficient architecture, and measurable results.
            </p>
        </div>
        <div class="row row-cols-3 g-2 mt-4">
            @foreach ($projects as $project)
                <div class="col">
                    <div class="card shadow-sm border-0 rounded-4 overflow-hidden position-relative h-100">
                        <div class="ratio ratio-16x9 position-relative">
                            @auth
                                <div class="position-absolute top-0 end-0 m-3 z-1 d-flex gap-2">
                                    <button class="btn btn-light rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center btn-edit-project" 
                                            style="width: 32px; height: 32px; background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(4px);"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#edit-project-modal"
                                            data-id="{{ $project->id }}"
                                            data-title="{{ $project->title }}"
                                            data-description="{{ $project->description }}"
                                            data-date="{{ $project->date_completed }}"
                                            data-github="{{ $project->github_link }}"
                                            data-demo="{{ $project->demo_link }}"
                                            data-status="{{ $project->status }}"
                                            data-techs='@json($project->tech_stacks)'
                                            >
                                        <i class="fa-solid fa-pen-to-square text-dark" style="font-size: 0.85rem;"></i>
                                    </button>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center" 
                                                style="width: 32px; height: 32px; background: rgba(33, 37, 41, 0.85); backdrop-filter: blur(4px);">
                                            <i class="fa-solid fa-trash text-white" style="font-size: 0.85rem;"></i>
                                        </button>
                                    </form>
                                </div>
                             @endauth
                            <img src="{{ Storage::url($project->thumbnail) }}" class="card-img-top object-fit-cover" alt="Project Preview">
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-{{ 
                                                            $project->status == 'Completed' ? 'success' : 
                                                            ($project->status == 'In-Progress' ? 'primary' : 'secondary') 
                                                      }} rounded-pill px-3 py-2 me-2 fw-medium">{{ $project->status }}
                                </span>
                                <small class="text-muted">
                                    @if ($project->date_completed == null)
                                        On-Going
                                    @else
                                        {{ $project->date_completed }}
                                    @endif
                                </small>
                            </div>
                            <h4 class="fw-bold text-dark mb-2">{{ $project->title }}</h4>
                            <p class="text-secondary mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                                {{ $project->description }}
                            </p>
                            <div class="d-flex flex-wrap gap-2 mb-auto">
                                @foreach ($project->tech_stacks as $tech)
                                    <span class="badge bg-secondary-subtle text-dark border-0 px-3 py-2 fw-normal rounded-2">{{ $tech }}</span>
                                @endforeach
                            </div>

                        </div>
                        <div class="card-footer border-0 bg-white">
                            <div class="row g-2 mt-auto">
                                <div class="col-6">
                                    @if ($project->github_link != '' || $project->github_link != null)
                                        <a href="{{ $project->github_link }}" class="btn btn-dark w-100 py-2 rounded-3 d-flex align-items-center justify-content-center gap-2" target="_blank">
                                            <i class="bi bi-code-slash"></i> Code
                                        </a>
                                    @endif
                                </div>
                                <div class="col-6">
                                    @if ($project->demo_link != '' || $project->demo_link != null)
                                        <a href="{{ $project->demo_link }}" class="btn btn-outline-danger w-100 py-2 rounded-3 d-flex align-items-center justify-content-center gap-2" target="_blank">
                                            <i class="bi bi-box-arrow-up-right"></i> Live Demo
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            @endforeach
        </div>
        @auth
            <div class="position-absolute end-0 bottom-100">
                <div>
                    <button class="btn btn-dark btn-md rounded-0 p-3" type="button" data-bs-toggle="modal" id="btn-create-project" data-bs-target="#edit-project-modal"> 
                        <i class="fa-solid fa-plus"></i> Add new project
                    </button>
                </div>
            </div>
        @endauth
    </div>
</div>
