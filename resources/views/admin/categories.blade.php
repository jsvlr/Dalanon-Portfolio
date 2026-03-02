@extends('admin.base')

@section('title', 'Categories')

@section('content')
    <section class="sidenavbar">
        @include('admin.sidenavbar')
    </section>
    <section class="pages d-flex flex-column gap-2">
        <div class="vh-100" style="margin-left: 350px;">
            <div class="d-flex justify-content-center align-items-center container-fluid row gap-2 mt-5">
                <div class="col-5">              
                    <form action="" method="POST" class="needs-validation rounded-3 p-3">
                        @csrf
                        @method('POST')
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="category" id="category-input" placeholder="New Category" required>
                            <label for="category-input">Category</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="link" id="link-input" placeholder="Link" required>
                            <label for="category-input">Link</label>
                        </div>
                    </form>
                </div>
                <div class="col-5">
                    <ul class="list-group list-group-flush gap-2">
                        <li class="list-group-item">
                            Category
                        </li>
                        <li class="list-group-item">
                            Category
                        </li>
                        <li class="list-group-item">
                            Category
                        </li>
                        <li class="list-group-item">
                            Category
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection