@extends('layout.app')

@section('content')

    <main data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example border-bottom border-light border-3 active" tabindex="0">
        <section class="homepage" id="home">
            @include('portfolio.homepage')
        </section>

        <section class="about-me" id="about">
            @include('portfolio.about')
        </section>

        <section class="skill" id="skills">
            @include('portfolio.skill')
        </section>

        <section class="project" id="projects">
            @include('portfolio.project')
        </section>

        <section class="information" id="contact">
            @include('portfolio.information')
        </section>
    </main>
    
@endsection

@auth
    @section('modals')
        @include('modal.account')
        @include('modal.profile')
        @include('modal.contact')
        @include('modal.about')
        @include('modal.skill')
        @include('modal.project')
        @include('modal.message')
        @include('modal.read')
        @include('modal.read-more-skill')
    @endsection

    @section('scripts')
        <script src="{{ asset('javascript/modal-handler.js') }}"></script>
        <script src="{{ asset('javascript/login-validation.js') }}"></script>
        <script src="{{ asset('javascript/show-password.js') }}"></script>
        <script src="{{ asset('javascript/logout.js') }}"></script>
        <script src="{{ asset('javascript/text-truncate.js') }}"></script>
        <script src="{{ asset('javascript/needs-confirmation.js') }}"></script>
        <script src="{{ asset('javascript/about.js') }}"></script>
        <script src="{{ asset('javascript/read-message.js') }}"></script>
    @endsection
@endauth