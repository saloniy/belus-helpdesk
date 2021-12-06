@extends('layout/main')
@section('faq')
    <div class="wrapper bg-white rounded shadow">
        <div class="h3 text-primary text-center">How can we help you?</div>

        <div class="accordion accordion-flush border-top border-start border-end" id="myAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"> Popular on BBBootstrap </button> </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"> Know About Pro </button> </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree"> BBBootstrap Tools </button> </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour"> Download Snippets </button> </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">
{{--                        <ul class="list-unstyled m-0">--}}
{{--                            <li><a href="#">How to download snippets</a></li>--}}
{{--                            <li><a href="#">Donate to Author</a></li>--}}
{{--                            <li><a href="#">Donation methods</a></li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </div>
            <div class="support-button text-center d-flex align-items-center justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                <i class="lni-emoji-sad"></i>
                <p class="mb-0 px-2">Can't find your answers?</p>
                <a href="{{url('contactus')}}"> Contact us</a>
            </div>

        </div>
    </div>
@endsection