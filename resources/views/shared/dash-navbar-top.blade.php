<nav class="navbar navbar-expand-md fixed-top">
    <a class="navbar-brand dash" href="/" >
        <span class="mdi mdi-home mr-1"></span> Home
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mdi mdi-menu" style="font-size: 1.7rem;"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTop">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form class="form-inline mt-1 mr-md-5">
                    <div class="search-container">
                        <input id="input-control" type="search" placeholder="Search content" aria-label="Search">
                        <button type="submit">
                            <span class="mdi mdi-search"></span>
                        </button>
                    </div>
                </form>
            </li>
            @can('administer site content')
                <li class="nav-item dropdown">
                    <a id="my-dropdown" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mdi mdi-settings"></span> Settings
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/mail-config">
                                <span class="mdi mdi-email mr-1"></span> Mail Config
                        </a>
                        <a class="dropdown-item" href="/admin/contacts">
                            <span class="mdi mdi-message mr-1"></span> Messages
                        </a>
                        <a class="dropdown-item" href="/admin/about">
                            <span class="mdi mdi-info-outline mr-1"></span> About Story
                        </a>
                    </div>
                </li>
            @endcan
            <li class="dropdown nav-item">
                <?php $name = explode(' ', Auth::user()->name) ?>
                <a id="another-dropdown" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mdi mdi-account-circle"></span> {{ end($name) }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="another-dropdown">
                    <a class="dropdown-item" href="/admin/my-account">
                        <span class="mdi mdi-person mr-1"></span> My Account
                    </a>
                    <a class="dropdown-item" href="/logout">
                        <span class="mdi mdi-lock mr-1"></span> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>