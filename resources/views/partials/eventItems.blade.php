<ul class="list-group shadow mb-5">
    @foreach($events as $e)
        <li class="list-group-item border-start-0 border-end-0 p-4"
            onclick="window.open('https://www.google.com/maps/search/?api=1&query={{urlencode($e->address)}}', '_blank').focus">
            <h3 class="h3 mb-0">
                {{$e->title}}
            </h3>
            {{$e->getEventTime()}}
        </li>
    @endforeach
</ul>
