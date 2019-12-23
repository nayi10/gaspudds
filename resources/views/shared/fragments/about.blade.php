@if (!empty($about))
    <div class="container">
        <h1 class="text-md text-center">Get to Know Us - GASP UDS</h1>
        {!! nl2br(substr($about->content, 0, 1000)) !!}
    </div>
@endif