@extends('layouts.app')

@section('title')
    Wilgers
@endsection

@section('content')

    <div class="container-fluid col-12 px-4 py-5 bg-light mb-5" id="wilgersDiv">
        <div class="row align-items-center g-lg-5 py-5 ps-lg-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Die Wilgers</h1>
                <p class="col-lg-10 fs-4">
                    Die Wilgers is one of the eastern suburbs of Pretoria East in Gauteng. It can be described as a
                    peaceful and well kept residential area, rich in trees and with beautiful gardens and sidewalks. The
                    presence of various shops, Die Wilgers Hospital, the Afrikaans and English High schools, two primary
                    schools, as well as the German school, in close proximity, makes Die Wilgers a very popular and
                    sought after suburb. The residents of Die Wilgers strive to maintain the special character of the
                    area, through the actions of a Residents Association, represented by an executive committee, which
                    is democratically elected at its public annual general meeting. The association represents residents
                    in the area enclosed by Rubida Street to the West, Simon Vermooten Road to the East, the N4 to the
                    North and Bronberg as the Southern border.
                </p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5 pe-lg-5" id="wilgersMap">
                <iframe title="Die Wilgers Map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14373.168142935181!2d28.304539589442278!3d-25.760915863014436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e955e3738401f33%3A0xcf3d42415aa4c6af!2sDie%20Wilgers%2C%20Pretoria%2C%200184!5e0!3m2!1sen!2sza!4v1668093623428!5m2!1sen!2sza"
                    width="100%" height="500" style="border:0;" allowfullscreen=""
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

@endsection
