<ul class="list-group shadow">
    @foreach($events as $e)
        <li class="list-group-item border-start-0 border-end-0 p-4">
            <h3 class="h3 mb-0">
                {{$e->title}}
            </h3>
            <div class="row">
                <div class="col-md-6">
                    {{$e->date}}
                </div>
                <div class="col-md-6">
                    <a class="link-success text-end"
                       href="https://www.google.com/maps/search/?api=1&query={{urlencode($e->address)}}">
                        @foreach(explode(',', $e->address) as $addressLine)
                            {{$addressLine}}<br>
                        @endforeach
                    </a><br>
                </div>
            </div>
            <div class="text-end">

            </div>


            <small></small>


        </li>
    @endforeach
</ul>
