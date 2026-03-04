<div class="container-fluid">
    <button class="btn btn-primary m-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideMenu">
        <i class="bi bi-list"></i>
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="sideMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li><a href="{{ route('conversations.index') }}" class="nav-link">Conversations</a></li>
                <li><a href="{{ route('users.conversations', auth()->user()) }}" class="nav-link">My Conversations</a></li>
            </ul>
        </div>
        <div class="p-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" class="btn btn-danger" value="Logout">
            </form>
        </div>
    </div>
</div>