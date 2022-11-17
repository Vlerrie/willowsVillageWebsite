<table class="table table-bordered" id="newsDataTable">
    <thead>
    <tr>
        <th>Subject</th>
        <th>Body</th>
        <th>Published</th>
    </tr>
    </thead>
    <tbody>
    @foreach($news as $new)
        <tr>
            <td>{{$new->subject}}</td>
            <td>{!! strip_tags($new->body) !!}</td>
            <td>{{$new->getPublished()}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
