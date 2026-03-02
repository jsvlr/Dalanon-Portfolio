    <div class="modal fade" id="edit-project-modal" tabindex="-1" aria-labelledby="editProjectModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 flex-column justify-content-start align-items-start">
                <div class="p-3">
                    <h5 class="d-block" id="project-modal-title">
                        Project
                    </h5>
                    <small class="d-block" id="project-modal-subheader">Add/Edit your project information</small>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{ route('project.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data" id="project-form" novalidate>
                    @csrf
                    <input type="hidden" name="_method" id="projectFormMethod" value="POST">
                    <div class="form-floating mb-2">
                        <input name="thumbnail" type="file" class="form-control" id="thumbnail-input" placeholder="Thumbnail" required />
                        <label for="thumbnail-input" class="fw-semibold opacity-75 small mt-1">Thumbnail</label>
                        <div class="invalid-feedback">
                            Please provide a valid thumbnail.
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="title" type="text" class="form-control fw-semibold" placeholder="Title" id="title-input" value="{{ old('title') }}"  required>
                        <label for="title-input" class="fw-semibold opacity-75 small mt-1">Title <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid title.
                        </div>  
                    </div>
                    <div class="form-floating mb-2">
                        <textarea name="description" class="form-control" id="description-input" style="height: 120px;" placeholder="Description" value="{{ old('description') }}" required></textarea>
                        <label for="description-input" class="fw-semibold opacity-75 small mt-1">Description <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid description.
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <select name="status" class="form-select" aria-label="Default select example" id="selected-input" required>
                            <option value="" selected>-- Select Status --</option>
                            @php 
                                $oldStatus = old('status')
                            @endphp
                            <option value="Completed" {{ $oldStatus == 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="In-Progress" {{ $oldStatus == 'In-Progress' ? 'selected' : '' }}>In-Progress</option>
                            <option value="Archived" {{ $oldStatus == 'Archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        <label for="selected-input" class="fw-semibold opacity-75 small mt-1">Status <span class="text-danger small">*</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid status.
                        </div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control" type="date" name="date-completed" id="date-input" value="{{ old('date-completed') }}">
                        <label for="date-input" class="fw-semibold opacity-75 small mt-1">Date (if completed)</label>
                        <div class="invalid-feedback">
                            Please provide a valid date.
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="github-link" type="text" class="form-control" id="github-input" placeholder="Github Link" value="{{ old('github-link') }}" />
                        <label for="github-input" class="fw-semibold opacity-75 small mt-1">Github Link <span>(optional)</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid github link.
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="demo-link" type="text" class="form-control" id="demo-input" placeholder="Demo Link" value="{{ old('demo-link') }}" />
                        <label for="demo-input" class="fw-semibold opacity-75 small mt-1">Demo Link <span>(optional)</span></label>
                        <div class="invalid-feedback">
                            Please provide a valid demo link.
                        </div>
                    </div>
                    <div class="container rounded-3 my-4 mb-5">
                        <div clas="mb-3">
                            <p class="my-3">Tech stacks used: </p>
                        </div>
                        <div class="row row-cols-3" style="max-height: 200px;">
                             @foreach ($skills as $skill)
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        name="tech-stacks[]" 
                                        value="{{ $skill->title }}" 
                                        id="skill-{{ $skill->title }}"
                                        
                                        {{ in_array($skill->title, old('tech_stacks', [])) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="skill-{{ $skill->title }}">
                                        {{ $skill->title }}
                                    </label>
                                </div>
                             @endforeach
                        </div>
                    </div>
                    <!-- <input type="submit" class="btn btn-dark w-100 py-3" value="Create" id="project-" required> -->
                    <button class="btn btn-dark w-100 py-3" type="submit" id="project-submit-btn">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>