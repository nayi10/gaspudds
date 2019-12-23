<nav class="navbar navbar-expand-sm sticky-top" style="height:60px">
    <a class="navbar-brand" href="/">GASP UDS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="mdi mdi-menu" style="font-size: 1.7rem;"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/posts">Blog</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/events">Events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/gallery">Gallery</a>
        </li>
        @if (!Auth::guest())

        @hasanyrole('admin|executive')
          <li class="nav-item">
            <a class="nav-link" href="/admin">
                Admin
            </a>
          </li>
        @else
          @php
              $name = explode(' ', Auth::user()->name);
          @endphp
            <li class="nav-item dropdown">
              <a id="my-dropdown" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mdi mdi-settings"></span> {{ end($name) }}
              </a>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="/dashboard/posts/create">
                          <span class="mdi mdi-note-add mr-1"></span> New Article
                  </a>
                  <a class="dropdown-item" href="/dashboard/posts">
                      <span class="mdi mdi-view-headline mr-1"></span> My Articles
                  </a>
                  <a class="dropdown-item" href="/dashboard/profile">
                      <span class="mdi mdi-info-outline mr-1"></span>My Profile
                  </a>
                  <a class="dropdown-item" href="/learning-materials">
                    <span class="mdi mdi-library-books mr-1"></span>Documents
                </a>
              </div>
          </li>
        @endrole
        <li class="nav-item">
          <a class="nav-link" href="/logout">
            Logout
          </a>
        </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="/login">
              Login
            </a>
          </li>
        @endif
      </ul>
    </div>
  </nav>
