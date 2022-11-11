<ul class="list-group shadow">
    @foreach($news as $n)
        <li class="list-group-item border-start-0 border-end-0 p-4">
            <div class="row">
                <div class="col-md-3 border-end">
                    <h2 class="h2 mb-0">
                        {{$n->subject}}
                    </h2>
                    <small>{{$n->getPublished()}}</small>
                    <hr class="d-md-none">
                </div>
                <div class="col-md-9 ps-3">
                    @auth()
                        @if(Auth::user()->admin)
                            <button class="btn btn-outline-danger border-0 float-end"
                                    style="position: relative; right: 0px">
                                <i class="fa fa-trash-can"></i>
                            </button>
                        @endif
                    @endif

                    {!! $n->body !!}
                </div>
            </div>

        </li>
    @endforeach
</ul>
