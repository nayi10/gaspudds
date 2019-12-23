@if(!empty($executives))
    <h3 class="text-md text-center mb-4 py-4">Know Our Executives</h3>
    <div class="owl-carousel">
        @foreach($executives as $exec)
            <div class="row mx-3 border-right">
                @php
                    $profileImg = AppHelper::getUserProfileImage($exec->student_id)
                @endphp
                <div class="col">
                    <img src="{{ asset($profileImg) }}" class="img-exec rounded-circle">
                </div>
                <div class="col mt-3 pr-3 pt-4">
                    <h4 class="text-sm">{{ $exec->name }}</h4>
                    <h6 class="text-xs text-success">{{ $exec->position }}</h6>
                </div>
            </div>
        @endforeach
    </div>
@endif