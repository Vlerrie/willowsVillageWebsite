<form action="/admin/news/create" method="post">
    @csrf
    @error('title')
    <p class="text-danger">{{$message}}</p>
    @enderror
    <div class="form-floating mb-3">
        <input type="text" name="title" class="form-control" id="title">
        <label for="title">Title</label>
    </div>
    @error('body')
    <p class="text-danger">{{$message}}</p>
    @enderror
    <textarea id="post" name="body" class="form-control"></textarea>

    <div class="row my-3">
        <div class="col-md-3">
{{--            <div class="form-check form-switch my-3">--}}
{{--                <input class="form-check-input" name="publish" type="checkbox" role="switch"--}}
{{--                       id="publish" checked>--}}
{{--                <label class="form-check-label" for="publish">Publish</label>--}}
{{--            </div>--}}
            <button class="btn w-100 btn-outline-success">Save</button>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</form>

<hr class="my-5">
