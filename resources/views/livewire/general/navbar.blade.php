<nav class="navbar navbar-expand-md shadow-sm fixed-top" style="background-color: #592c82;">
    <div class="container">
        <a class="navbar-brand">
            <img src="{{ asset('img/chatzeus-blanco.png') }}" height="40" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">
                    <a href="/home" class="btn btn-outline-light my-2 my-sm-0">
                        <span class="material-icons py-1">home</span>
                    </a>
                    <a class="btn btn-outline-light my-2 my-sm-0"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <span class="material-icons py-1">logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}"
                        method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>