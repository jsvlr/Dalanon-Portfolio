<div class="modal fade" id="edit-message-modal" tabindex="-1" aria-labelledby="editmessageModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 justify-content-between">
                 <h5 class="m-0 p-0 fw-semibold">Inbox</h5>
                <button class="btn bg-none float-end" type="button" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="p-3">
                <ul class="list-group list-group-flush">
                    @foreach ($messages as $message)
                        <li class="list-group-item p-0 m-0">
                            <div class="card m-0 p-0 border-0">
                                <div class="card-body">
                                    <div class="row gx-1">
                                        <div class="col-2">
                                            <img class="rounded-circle p-2 border shadow-sm" src="{{ asset('images/others/user_icon.png') }}" height="60" alt="user-icon.png">
                                        </div>
                                        <div class="col-10">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="fw-bold m-0 p-0">{{ $message->fullname }}</h5>
                                                <small>{{ $message->created_at->format('h:i A') }}</small>
                                            </div>
                                            <p class="card-text text-truncate m-0 mt-2 p-0">
                                                {{ $message->message }}
                                            </p>
                                            <div class="d-flex justify-content-end align-items-center mt-3 gap-2">
                                                <a class="text-decoration-none" href="mailto:{{ $message->email }}">
                                                    <i class="fa-solid fa-reply"></i> 
                                                </a>
                                                <form action="{{ route('message.destroy', $message->id) }}" class="needs-confirmation" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="message-id" value="{{ $message->id }}" required>
                                                    <button class="btn btn-sm m-0 p-0" type="submit"><i class="fa-solid fa-trash"></i></button> 
                                                </form>
                                                <button 
                                                    class="btn btn-secondary btn-sm read-message-btn" 
                                                    type="button" 
                                                    data-bs-dismiss="modal"         
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#read-message-modal"
                                                    data-message-id="{{ $message->id }}"
                                                    data-message-email="{{ $message->email }}"
                                                    data-message-fullname="{{ $message->fullname }}"
                                                    data-message-content="{{ $message->message }}"
                                                >
                                                    <i class="fa-regular fa-eye"></i> Read
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>