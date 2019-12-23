@if (!$promotedEvents->isEmpty())
  <div class="bd">
      <div id="carouselCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
          @php
              $count = 0;
              $sum = $promotedEvents->count();
          @endphp
          @for ($i=0; $i < $sum; $i++)
            <li data-target="#carouselCaptions" data-slide-to="{{ $i }}"></li>
          @endfor
        </ol>
        <div class="carousel-inner">
            @foreach ($promotedEvents as $event)
                @php
                    $count++;
                    $img = AppHelper::getImage($event->banner);
                    $state = $count == 1 ? "active":"";
                @endphp
                <div class="carousel-item {{ $state }}">
                    <img src="{{ asset("storage/$img") }}" class="d-block w-100 carousel-img" alt="{{ $event->title }}">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>{{ $event->title }}</h5>
                      <p>{{ substr($event->content, 0, 200) }}...</p>
                      <a href="{{ route('event.details', $event->slug) }}" class="btn btn-raised btn-outline-warning">
                        Read more...
                      </a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
  </div>
@endif