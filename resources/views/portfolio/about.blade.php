<div class="container d-flex justify-content-center align-items-center position-relative text-dark px-5 gap-4 position-relative min-vh-100 vh-100">
    <div class="">
        <img class="rounded-circle border img-fluid" src="{{ Storage::url($about->image) }}" alt="{{$about->image}}"
        style="object-fit:cover;"
        >
    </div>
    <div class="bg-dark h-75 opacity-75" style="padding: 1px;"></div>
    <div class="flex-fill flex-column">
        <h3 class="m-0 p-0" >About Me</h3>
        <br>
        <br>
        
        <h4 class="fw-bold m-0 p-0">I'm {{ $user->name }}</h4>
        <span class="lead">{{ $profile->position }}</span>
        <br>
        <br>
        <p class="opacity-75" style="text-align:justify;">
                &emsp;  {{ $about->introduction }}
        </p>
        <div class="">
            <div>
                <h5 class="fw-semibold text-uppercase">Core Tech Stack</h5>
            </div>
            <hr class="w-100 border-2 border-secondary">    
            <div class="d-flex justify-content-center align-items-center gap-2">
                <div class="flex-fill row row-cols-4 g-1">
                    @foreach ($coreTechStacks as $core)
                        <div class="col">
                            <div class="p-3 shadow rounded-3 hover-shadow text-center">
                                <img src="{{ Storage::url($core->logo_image_url) }}" alt="{{ $core->logo_image_url }}" height="70">
                                <hr class="border w-100">
                                <p class="fw-semibold m-0 p-0">{{ $core->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="rounded-0 btn btn-md btn-dark p-3 ms-4 px-5 float-end" href="{{  $about->resume_link }}" target="_blank" >
                    Download my Resume <i class="fa-solid fa-download"></i>
                </a>
            </div>
            <hr class="w-100 border-2 border-secondary">
            <div class="">

            </div>  
        </div>
        <br>
        <br>
  
    </div>
    @auth
        <div class="position-absolute top-0 end-0 m-3">
            <button class="btn btn-dark btn-md rounded-0 p-3" type="button" data-bs-toggle="modal" data-bs-target="#edit-about-modal">
                <i class="fa-solid fa-pen-to-square"></i> Edit about info
            </button>
        </div>
    @endauth
</div>