<nav class="navbar navbar-expand-lg shadow-lg position-fixed top-0 start-0 end-0 z-3 navbar-dark bg-dark" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo/nexa-node.png') }}" height="60" alt="nexa-node.png">
        <span class="lead fw-bold fs-4 text-uppercase text-header">
            Nexa Node
        </span>
    </a>
    <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav gap-4 ms-auto justify-content-center align-items-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#home">
            <i class="fa-regular fa-house"></i>
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">
            <i class="fa-solid fa-info"></i>
            About Me
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#skills">
            <i class="fa-solid fa-cube"></i>
            Skills
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#projects">
            <i class="fa-solid fa-diagram-project"></i>
            Projects
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">
            <i class="fa-solid fa-phone"></i>
            Contact Me
          </a>
        </li>
        @auth
          <li class="dropdown mx-5">
              <button class="nav-link" type="button" data-bs-toggle="dropdown" data-bs-target="#account-dropdown">
                <div class="d-flex justify-content-center align-items-center gap-2">
                  <div>
                      <img class="rounded-circle shadow-lg" src="{{ Storage::url($profile->profile_image_url) }}" height="50" alt="">
                  </div>
                  <div class="flex-fill justify-content-center align-items-start gap-0 flex-column pe-3">
                      <div class="border-bottom border-1">
                          {{ $user->name }}
                      </div>
                      <div class="flex-fill text-center w-100">
                            <small>Administrator</small>
                      </div>
                  </div>
                  <div>
                    <i class="fa-solid fa-angle-down"></i>
                  </div>
                </div>
              </button>
              <ul class="dropdown-menu dropdown-menu-dark">
                  <li>
                    <a class="dropdown-item mb-1" href="#" type="button" data-bs-toggle="modal" data-bs-target="#edit-account-modal">
                      <i class="fa-solid fa-user"></i> Account
                    </a>
                  </li>
                  <li>
                       <a class="dropdown-item mb-1 position-relative" type="button" data-bs-toggle="modal" data-bs-target="#edit-message-modal">
                            <i class="fa-solid fa-message"></i> Messages <small class="badge text-bg-danger">{{ $unviewedMessagesCount }}</small>
                       </a>
                  </li>
                  <li>
                    <div class="dropdown-item mb-1">
                      <form class="needs-confirmation" action="{{ route('auth.logout') }}" method="POST" data-confirmation-message="Do you want to logout?">
                          @csrf
                          @method('POST')
                          <input type="hidden" name="user-id" value="{{ auth()->user()->id }}" required>
                          <button class="btn btn-link text-decoration-none p-0 m-0 text-light" type="submit">
                              <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                          </button>
                      </form>
                    </div>
                  </li>
              </ul>
          </li>
        @else
          <li class="nav-item">
              <a class="btn btn-light" href="{{ route('auth.loginForm') }}" >
                Login
              </a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>