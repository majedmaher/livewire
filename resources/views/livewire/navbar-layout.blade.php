<div>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" wire:click='login_page'>Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" wire:click='register_page'>Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" wire:click=logout>Logout</a>
                    </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>
</div>
