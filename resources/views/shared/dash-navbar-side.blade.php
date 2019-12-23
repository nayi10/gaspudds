<nav class="side-nav ml-2">
    <ul class="navbar-nav list-group mt-0">

        <li class="nav-item list-group-item" style="font-size: 1.5rem;">
            <a class="nav-link" href="/admin">
                <span class="mdi mdi-dashboard mr-1"></span> Dashboard
            </a>
        </li>
        <li class="nav-item list-group-item">
            <a class="nav-link" href="/admin/users">
                <span class="mdi mdi-people mr-1"></span> User Management
            </a>
        </li>
        @can('administer site content')
            <li class="nav-item list-group ml-3">
                <a class="nav-link" href="#submenu1" data-toggle="collapse" aria-expanded="false">
                    <span class="mdi mdi-security mr-1"></span> Roles & Permissions
                </a>
                <div id='submenu1' class="collapse flex-column ml-3">
                    <a href="/admin/roles" class="list-group-item list-group-item-action hover-none">
                        <span class="mdi mdi-verified-user menu-collapse mr-1"></span>Roles
                    </a>
                    <a href="/admin/permissions" class="list-group-item list-group-item-action hover-none">
                        <span class="mdi mdi-lock mr-1"></span>Permissions
                    </a>
                </div>
            </li>
        @endcan
        <li class="nav-item list-group-item">
            <a class="nav-link" href="/admin/posts">
                <span class="mdi mdi-view-list mr-1"></span> Posts & Articles
            </a>
        </li>
        <li class="nav-item list-group-item">
            <a class="nav-link" href="/admin/events">
                <span class="mdi mdi-event-available mr-1"></span> Events
            </a>
        </li>
        <li class="nav-item list-group ml-3">
            <a class="nav-link" href="#gallery-menu" data-toggle="collapse" aria-expanded="false">
                <span class="mdi mdi-photo-album mr-1"></span> Gallery
            </a>
            <div id='gallery-menu' class="collapse flex-column ml-3">
                <a href="/admin/gallery/upload" class="list-group-item list-group-item-action hover-none">
                    <span class="mdi mdi-add-a-photo menu-collapse mr-1"></span>Upload Image
                </a>
                <a href="/admin/gallery" class="list-group-item list-group-item-action hover-none">
                    <span class="mdi mdi-photo-library mr-1"></span>View Gallery
                </a>
            </div>
        </li>
        <li class="nav-item list-group-item">
            <a class="nav-link" href="/admin/learning-materials">
                <span class="mdi mdi-book mr-1"></span> Learning Materials
            </a>
        </li>
        <li class="nav-item bg-light" style="position: fixed; bottom:0;">
            <small>
                <a class="nav-link text-dark" style="font-size:0.7rem;padding-right:4px;" href="tel:0547420604">
                    <span class="mdi mdi-power mr-1 text-warning" style="padding-left:5px"></span> Powered by Bandughana (0547420604)
                </a>
            </small>
        </li>
    </ul>
</nav>