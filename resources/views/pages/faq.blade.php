@extends('layouts.app')

@section('title')
    Frequently Asked Questions
@endsection


@section('metaDescription')
    <meta name="description" content="Frequently asked questions about die wilgers and the closure project">
@endsection

@section('content')

    <div class="container-fluid col-12 px-4 py-3 bg-light shadow-lg min-vh-100">
        <div class="row align-items-top g-lg-5 py-5 ps-lg-5">
            <div class="col-lg-4 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-5">Frequently Asked Questions</h1>
                <div class="form-floating">
                    <input type="text" class="form-control form-control-lg" id="floatingSearch" name="searchTerm"
                           placeholder="Search">
                    <label for="floatingName">Search</label>
                </div>
                <small>Start typing to search for frequently asked questions</small>
            </div>
            <div class="col-md-10 mx-auto col-lg-8 px-lg-5 align-items-top" id="searchResultsDiv">
                @include('partials.faqResults')
            </div>
        </div>
    </div>

    <div class="container-fluid col-12 px-4 py-3 shadow-lg">
    </div>


    <script>
        var typingTimer;                //timer identifier
        var doneTypingInterval = 600;  //time in ms, 5 seconds for example
        var myInput = document.querySelector('#floatingSearch');

        function search() {
            fetch('/faq/search/'+myInput.value, {method: 'GET'})
                .then(response => response.json())
                .then(body => {
                    console.log(body);
                    document.querySelector('#searchResultsDiv').innerHTML= body.body;
                });
        }

        myInput.addEventListener('keyup', () => {
            clearTimeout(typingTimer);
            if (myInput.value) {
                typingTimer = setTimeout(search, doneTypingInterval);
            }
        });

    </script>
@stop
