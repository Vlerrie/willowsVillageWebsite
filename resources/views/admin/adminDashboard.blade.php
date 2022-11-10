@extends('layouts.app')

@section('content')

    <div class="container-fluid col-12 py-5 bg-light mb-5 shadow min-vh-100">
        <div class="row py-5">
            <div class="col-md-2">
                <div class="d-flex align-items-center">
                    <div class="nav flex-column nav-pills w-100" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical">
                        <button class="nav-link w-100" id="v-pills-news-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-news" type="button" role="tab"
                                aria-controls="v-pills-news" aria-selected="true">News & Updates
                        </button>
                        <button class="nav-link w-100" id="v-pills-accounts-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-accounts" type="button" role="tab"
                                aria-controls="v-pills-accounts" aria-selected="false">Accounts
                        </button>
                        {{--                        <button class="nav-link w-100" id="v-pills-contact-tab" data-bs-toggle="pill"--}}
                        {{--                                data-bs-target="#v-pills-contact" type="button" role="tab"--}}
                        {{--                                aria-controls="v-pills-contact" aria-selected="false">Contact Permissions--}}
                        {{--                        </button>--}}
                        {{--                        <button class="nav-link w-100" id="v-pills-delete-tab" data-bs-toggle="pill"--}}
                        {{--                                data-bs-target="#v-pills-delete" type="button" role="tab"--}}
                        {{--                                aria-controls="v-pills-delete" aria-selected="false">Delete My Data--}}
                        {{--                        </button>--}}
                    </div>
                </div>
            </div>

            <div class="col-md-10 border-start py-3">
                <div class="tab-content" id="v-pills-tabContent">
                    {{-- Create update/news item --}}
                    <div class="tab-pane fade" id="v-pills-news" role="tabpanel"
                         aria-labelledby="v-pills-news-tab" tabindex="0">
                        @include('admin.newsForm')

                    </div>
                    {{-- Password Change Form --}}
                    <div class="tab-pane fade overflow-auto" id="v-pills-accounts" role="tabpanel"
                         aria-labelledby="v-pills-accounts-tab" tabindex="0">
                        <table class="table table-bordered" id="accountsTable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Cell</th>
                                <th>Address</th>
                                <th>Joined</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td>
                                        {{$account->name}}
                                        {{$account->surname}}
                                        @if($account->admin)
                                            <small><i class="fa fa-shield text-primary" title="admin"></i></small>
                                        @endif
                                    </td>
                                    <td>
                                        {{$account->email}}
                                    </td>
                                    <td>
                                        {{$account->cell}}
                                    </td>
                                    <td>
                                        {{$account->google_address_string}}
                                    </td>
                                    <td>
                                        {{$account->created_at}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- CONTACT PERMISSIONS --}}
                    <div class="tab-pane fade" id="v-pills-contact" role="tabpanel"
                         aria-labelledby="v-pills-contact-tab" tabindex="0">

                    </div>
                    <div class="tab-pane fade" id="v-pills-delete" role="tabpanel"
                         aria-labelledby="v-pills-delete-tab" tabindex="0">

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdn.tiny.cloud/1/41g56qn2t44rpdgooot4j3xfat8uqufoi70hnotysnwrsdy2/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>

    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>

    <script type="text/javascript" src="/jQuery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="/DataTables/datatables.min.js"></script>

    <script>
        tinymce.init({
            selector: '#post',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });

        let newsTab = document.querySelector('#v-pills-news-tab');
        let newsPage = document.querySelector('#v-pills-news');
        let pwTab = document.querySelector('#v-pills-password-tab');
        let pwPage = document.querySelector('#v-pills-password');
        let contactTab = document.querySelector('#v-pills-contact-tab');
        let contactPage = document.querySelector('#v-pills-contact');


        @if (!session()->has('last_form'))
        newsTab.classList.add('active');
        newsPage.classList.add('active');
        newsPage.classList.add('show');
        @elseif (session('last_form') == 'pw')
        pwTab.classList.add('active');
        pwPage.classList.add('active');
        pwPage.classList.add('show');
        @elseif (session('last_form') == 'comms')
        contactTab.classList.add('active');
        contactPage.classList.add('active');
        contactPage.classList.add('show');
        @endif

        $('#accountsTable').dataTable();
    </script>
@stop
