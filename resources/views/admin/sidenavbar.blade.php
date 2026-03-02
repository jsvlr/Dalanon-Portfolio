<div class="sidenavbar-panel-bg position-fixed top-0 bottom-0 rounded-end-5 text-light pt-5 position-relative" style="max-width: 400px; min-width: 200px; width: 300px;">
    <div class="header flex-1 justify-content-start align-items-center mt-5 w-100">
        <div class="d-flex gap-1 justify-content-start align-items-center mx-2">
            <div class="">
                <img class="rounded-circle" src="{{ asset('images/logo/nexa-node.png') }}" alt="profile-picture.jpeg" height="60">
            </div>
            <div class="flex-1 flex-column gap-0">
                <h6 class=" m-0 p-0 text-header" style="font-size: 12px;">
                    {{ $user->name }}
                </h6>
                <span class="small p-0 m-0 secondary-font">
                    {{ $user->email }}
                </span>
            </div>
        </div>
    </div>
    <div class="pages d-flex justify-content-center align-items-center mt-5">
        <ul class="list-group gap-3 w-75 ">
            <a class="list-group-item rounded-3 bg-transparent border-0 text-light {{ $pages['dashboard'] == true? "opacity-100" : "opacity-50" }} " href="{{ route('admin.dashboard')  }}">
                <i class="fa-solid fa-gauge"></i> 
                <span class="ms-3 text-header">Dashboard</span>
            </a>
             <a class="list-group-item rounded-3 bg-transparent border-0 text-light {{ $pages['profile'] ? "opacity-100" : "opacity-50" }}" href="">
                <i class="fa-regular fa-circle-user"></i>
                <span class="ms-3 text-header">Profile</span>
            </a>
            <a class="list-group-item rounded-3 bg-transparent border-0 text-light {{ $pages['categories'] ? "opacity-100" : "opacity-50" }}" href="{{ route('admin.categories') }}">
                <i class="fa-solid fa-layer-group"></i>
                <span class="ms-3 text-header">Categories</span>
            </a>
             <a class="list-group-item rounded-3 bg-transparent border-0 text-light {{ $pages['about'] ? "opacity-100" : "opacity-50" }}" href="">
                <i class="fa-regular fa-circle-user"></i>
                <span class="ms-3 text-header">About Us</span>
            </a>
            <a class="list-group-item rounded-3 bg-transparent border-0 text-light {{ $pages['skills'] ? "opacity-100" : "opacity-50" }}" href="">
                <i class="fa-solid fa-cube"></i>
                <span class="ms-3 text-header">Skills</span>
            </a>
            <a class="list-group-item rounded-3 bg-transparent border-0 text-light {{ $pages['project'] ? "opacity-100" : "opacity-50" }}" href="">
                <i class="fa-solid fa-folder"></i>
                <span class="ms-3 text-header">Project</span>
            </a>
            <a class="list-group-item rounded-3 bg-transparent border-0 text-light {{ $pages['images'] ? "opacity-100" : "opacity-50" }}" href="">
                <i class="fa-regular fa-image"></i>
                <span class="ms-3 text-header">Images</span>
            </a>
        </ul>
    </div>
    <div class="position-absolute bottom-0 start-0 end-0 py-4 mb-2 ms-4">
        <div>
            <form action="{{ route('admin.logout') }}" method="POST" id="logout-form">
                @csrf
                @method('POST')
                <input type="hidden" name="user-id" value="{{ $user->id }}" required>
                <div class="d-flex justify-content-start align-items-center gap-1">
                    <i class="fa-solid fa-power-off opacity-50"></i>
                    <input type="submit" class="btn btn-sm text-light opacity-50" value="Logout">
                </div>  
            </form>
        </div>
    </div>
</div>