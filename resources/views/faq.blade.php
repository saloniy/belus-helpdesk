@extends('layout/main')
@section('faq')
    <div class="wrapper bg-white rounded shadow mt-3">
        <div class="h3 text-primary text-center">How can we help you?</div>

        <div class="accordion accordion-flush border-top border-start border-end" id="myAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"> I’M TIRED OF MY WIRELESS NETWORK CONSTANTLY GOING OFFLINE. HELP! </button> </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">
                        Many off-the-shelf routers are not properly maintained,
                        meaning that security updates are not completed and software becomes out-of-date.
                        This can cause your wireless network to go offline and business grinds to a halt.
                        If your wireless network is routinely going down, a network health check will not only get your office running efficiently again,
                        it will secure your system and protect your business.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"> THE QUALITY OF MY PHONE CALLS IS CONSISTENTLY BAD. ANY IDEAS? </button> </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">
                        It’s possible your data switches aren’t set up correctly. If you think of your data network as a series of highways,
                        data switches act like traffic cops to direct different types of communications along different channels. Without proper switches,
                        the signals get clogged up and interfere with each other, leading to poor call quality.
                        Another possibility is that your Internet access is poor or your Internet connection speed is too slow
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree"> HOW SECURE IS MY DATA NETWORKING SYSTEM? </button> </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">
                        Sunco takes security very seriously and we work with trusted partners to make sure your data systems are secure.
                        In general, wired systems are more difficult to hack than wireless routers.
                        Remember to change your wireless password regularly and monitor your system to protect sensitive material and ensure no one is able to use your network for illegal activities.
                        Talk to us regarding a network health check to make sure your business is secure
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour"> MY NETWORK IS VERY SLOW. WHAT’S GOING ON? </button> </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">
                        If your data network wasn’t set up correctly, there could be a number of different problems behind the scenes,
                        from pinched cables to inefficient data routing.
                        Adding wiring or upgrading to a faster Internet connection could solve your problem.
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
