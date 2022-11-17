<table class="table table-bordered" id="eventDataTable">
    <thead>
    <tr>
        <th>Title</th>
        <th>Address</th>
        <th>Date & Time</th>
    </tr>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <td>{{$event->title}}</td>
            <td>{{$event->address}}</td>
            <td>{{$event->getEventTime()}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
