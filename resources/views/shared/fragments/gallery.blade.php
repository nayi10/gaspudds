@if (!$gallery->isEmpty())
    <h6 class="text-md text-center mb-4">Have a Gist, Explore the Gallery</h6>
    <div class="row mx-md-4">
        @foreach ($gallery as $image)
        <div class="col-md-3 mb-4">
            <div class="card">
                <a href="{{ asset("storage/$image->image_url") }}" data-lightbox="gallery-set">
                    <img class="card-img h-md" src="{{ asset("storage/$image->image_url") }}" alt="{{ $image->image_name }}"/>
                </a>
                </div>
            </div>
        @endforeach
        <div class="col-12 clearfix">
            <a href="{{ route('gallery') }}" class="btn btn-warning btn-raised pull-right">
                More in our gallery collection<span class="mdi mdi-navigate-next"></span>
            </a>
        </div>
    </div>
@endif