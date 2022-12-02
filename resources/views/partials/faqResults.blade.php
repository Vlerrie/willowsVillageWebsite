@foreach($faq as $f)
    <div class="card mb-1">
        <div class="card-body px-5">
            <h4 class="display-6 text-center">
                {{$f->question}}
            </h4>
            <hr class="my-4 col-6 mx-auto">
            <p class="fs-4">
                {!! $f->answer !!}
            </p>
        </div>
    </div>

@endforeach
