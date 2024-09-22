<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>doctoria-plus</title>
</head>

<body>
    <header class="Header">
        <div class="d-flex align-items-center container-fluid">
            <div class="container-fluid justify-content-between" id="Logo">
                <img src="{{ asset('frontend') }}/img/Doctoria-Logo.png" class="Logo" alt="" />
            </div>

            <div class="justify-content-center align-items-center pcMenu">
                <ul class="d-flex menuListPC align-items-center justify-content-center">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <li class="d-flex text-light">Home Page</li>
                    </a>
                    <a href="{{ route('Contact') }}" class="text-decoration-none">
                        <li class="d-flex text-light">Contact US</li>
                    </a>
                    <a href="{{ route('privacy') }}" class="text-decoration-none">
                        <li class="d-flex text-light">Privacy and Refund</li>
                    </a>
                    <a href="{{route('Terms')}}" class="text-decoration-none">
                        <li class="d-flex text-light">Terms and Conditions</li>
                      </a>
                    <a href="https://play.google.com/store/apps/details?id=com.tailors.doctoria&hl=en"
                        class="text-decoration-none">
                        <li>
                            <button class="download">
                                <svg class="saveicon" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                                        stroke-linejoin="round" stroke-linecap="round"></path>
                                </svg>
                                Download
                            </button>
                        </li>
                    </a>
                </ul>
            </div>

            <div class="justify-content-between align-items-center moblieMenu">
                <div class="my-5">
                    <div class="">
                        <button class="Menubtn" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <img width="40" height="40" src="https://img.icons8.com/ios/ffffff/128/menu--v7.png"
                                alt="menu--v7" />
                        </button>
                    </div>

                    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close text-reset btn-light" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="menuList">
                                <a href="" class="text-decoration-none">
                                    <li class="text-light font-weight-bold">Home Page</li>
                                </a>
                                <hr class="text-light" />
                                <a href="{{ route('Contact') }}" class="text-decoration-none">
                                    <li class="text-light font-weight-bold">Contact Us</li>
                                </a>
                                <hr class="text-light" />
                                <a href="{{ route('privacy') }}" class="text-decoration-none">
                                    <li class="text-light font-weight-bold">Privacy and Refund</li>
                                </a>
                                <a href="{{ route('Terms') }}" class="text-decoration-none">
                                    <li class="text-light font-weight-bold">Terms and Conditions</li>
                                </a>

                                <hr class="text-light" />
                                <a href="https://play.google.com/store/apps/details?id=com.tailors.doctoria&hl=en"
                                    class="text-decoration-none justify-content-end">
                                    <li class="text-light font-weight-bold">
                                        <button class="download">
                                            <svg class="saveicon" stroke="currentColor" stroke-width="1.7"
                                                viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                                                    stroke-linejoin="round" stroke-linecap="round"></path>
                                            </svg>
                                            Download
                                        </button>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid mb-5 privacyhead align-items-center">
        <h1 class="mb-5 text-center py-5 font-weight-bold align-items-center">
            Privacy and Refund
        </h1>
    </div>

    <div class="container">

        <div class="row g-3">

            <div class="col-sm-1">
                <h1 class="text-left"> <a href="{{ route('privacyAr') }}" class="text-decoration-none"><button
                            class="btn btn-outline-danger"><img width="30" height="30"
                                src="https://img.icons8.com/color/120/egypt-circular.png"
                                alt="egypt-circular" />Ar</button></a>
                </h1>
                <div class="sidebar">

                    <h2>Contents</h2>
                    <a class="text-decoration-none text-dark w-100" href="#introduction">Overview</a>
                    <a class="text-decoration-none text-dark w-100" href="#information">Information</a>
                    <a class="text-decoration-none text-dark w-100" href="#usage">Confiramtion</a>
                    <a class="text-decoration-none text-dark w-100" href="#sharing">User Actions</a>
                    <a class="text-decoration-none text-dark w-100" href="#rights">Your Rights</a>
                    <a class="text-decoration-none text-dark w-100" href="#security">Security Measures</a>
                    <a class="text-decoration-none text-dark w-100" href="#changes">Changes to This Policy</a>
                    <a class="text-decoration-none text-dark w-100" href="#refund">Refund Policy</a>
                </div>

            </div>
            <div class="col-md-11">
                <div class="content">
                    <section id="introduction">
                        <h1>Overview</h1>
                        <ol>
                            <li>
                                <p>
                                    By using the DoctoriaPlus app, the user automatically agrees to
                                    the terms and conditions of use mentioned here. If you do not
                                    agree to these terms, please do not use the app.
                                </p>
                            </li>
                            <li>
                                <p>
                                    To access the services provided by the app, your registration is
                                    required, along with the accurate completion of user
                                    information.
                                </p>
                            </li>
                            <li>
                                <p>
                                    The service recipient bears full responsibility for the accuracy
                                    of the data entered by them in the app and any consequences that
                                    may arise from it.
                                </p>
                            </li>
                        </ol>
                    </section>
                    <section id="information">
                        <h2>Concerns The User</h2>
                        <ol>
                            <li>
                                <p>
                                    Users are prohibited from using the DoctpriaPlus app in ways
                                    that disrupt the service or cause harm to the app or any other
                                    person. The use of the app is solely the user's responsibility,
                                    and the user undertakes not to use the app for any illegal or
                                    unlawful purpose. The DoctoriaPlus app disclaims any
                                    responsibility for illegal use of the app by users and may take
                                    legal action if any user violates applicable laws or
                                    regulations.
                                </p>
                            </li>
                            <li>
                                <p>
                                    The user bears full responsibility for their use of the
                                    DoctoriaPlus app and the content provided, as well as the
                                    consequences thereof.
                                </p>
                            </li>
                            <li>
                                <p>
                                    The DoctoriaPlus app reserves the right to terminate the account
                                    of any user who violates the terms of use without prior notice.                                </p>
                            </li>
                            <li>
                                <p>
                                    Users agree to indemnify and hold harmless the DoctoriaPlus app
                                    and its owners and officers from any losses or damages arising
                                    from their use of the app.
                                </p>
                            </li>

                            <li>
                                <p>
                                    The app is prohibited for use by minors without the supervision
                                    and consent of a parent or legal guardian. Users undertake to
                                    provide accurate information about their age and identity. If
                                    any unauthorized use of the app by a minor is discovered, the
                                    app has the right to take necessary legal action and block the
                                    accounts in violation.                                
                                </p>
                            </li>

                        </ol>
                    </section>
                    <section id="usage">
                        <h2>How We Use Your Information</h2>
                        <ol>
                            <li>
                                <p>
                                    Payment of fees is required in advance when requesting the
                                    service, with the fees clearly stated in the app during the
                                    ordering process.
                                </p>
                            </li>
                            <li>
                                <p>
                                    The user must verify that the data of the home healthcare
                                    provider, including the individual's name as displayed on their
                                    identification card, matches the data presented when selecting
                                    the provider. This is the sole responsibility of the user, who
                                    bears full responsibility for any discrepancies in the data and
                                    any resulting consequences.
                                </p>
                            </li>
                            <li>
                                <p>
                                    The user must comply with the specified limits of the required
                                    service indicated during the home care service booking process.
                                    Once the caregiver arrives on-site, the user is not entitled to
                                    request additional services.
                                </p>
                            </li>
                            <li>
                                <p>
                                    The user must adhere to the specified service limits established
                                    during the booking of home care services. Once the caregiver
                                    arrives at the location, the user is not entitled to request
                                    additional services beyond those that were pre-approved at the
                                    time of booking.
                                </p>
                            </li>
        
                            <li>
                                <p>
                                    Users are prohibited from interacting with service providers
                                    outside the scope of the application and must rely solely on
                                    communication and interaction with service providers through the
                                    designated app.
                                </p>
                            </li>
                        </ol>
                    </section>
                    <section id="sharing">
                        <h2>User actions</h2>
                        <ol>
                            <li>
                                <p>
                                    The application is not responsible for the individual actions of
                                    the service providers outside the scope of services provided
                                    through the app, including but not limited to harassment or
                                    theft.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Users must clearly and accurately specify the details of the
                                    required service during the booking process and are obligated to
                                    fill in all required fields in the booking form. The user is
                                    responsible for the accuracy and correctness of the information
                                    provided and commits to providing complete and correct
                                    information in line with the requested service.
                                </p>
                            </li>
                            <li>
                                <p>
                                    DoctoriaPlus reserves the right to change service policies and
                                    prices without prior notice, while notifying users of any
                                    changes through the application.
                                </p>
                            </li>
                        </ol>
                    </section>
                    <section id="rights">
                        <h2>Your Rights</h2>
                        <ol>
                            <li>
                                <p>
                                    If you wish to request any service provided through the
                                    application, you may be required to provide certain information
                                    related to your service purchase, including, but not limited to,
                                    your credit card number and its expiration date. The user
                                    acknowledges and agrees to the following:
        
                                <ul>
                                    <li>
                                        <p>They have the legal right to use any credit card or other payment method concerning
                                            any purchase</p>
                                    </li>
                                    <li>
                                        <p>The information they provide is correct and complete. </p>
                                    </li>
                                </ul>
                                </p>
                            </li>
                            <li>
                                <p>
                                    DoctoriaPlus reserves the right to refuse or cancel the user’s request at any time and for
                                    unspecified reasons, including, but not limited to, unavailability of the service, errors in
                                    description or pricing, or in cases of order errors, or for other reasons. In case of
                                    refunds, this will be done only through the original payment method. 
                                </p>
                            </li>
                            <li>
                                <p>Special terms for home visits:
                                <ul>
                                    <li>
                                        <p>If the user requests a female medical caregiver for home service, a female aged 18 or
                                            older must be present at the residence. </p>
                                    </li>
                                    <li>
                                        <p>The user is required to pay the full visit amount if the service provider arrives at
                                            the location and waits 10 minutes outside the door. </p>
                                    </li>
                                    <li>
                                        <p>The user has the right to cancel a home care visit request no later than 12 hours
                                            before the appointment while retaining the amount paid as credit. </p>
                                    </li>
        
                                    <li>
                                        <p>If the user cancels the home care visit appointment within 11 hours of the visit, the
                                            service provider is entitled to the full amount. </p>
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </section>
                    <section id="security">
                        <h2>Security Measures</h2>
                        <ol>
                            <li>
                                <p>
                                    The DoctoriaPlus app is committed to protecting users' privacy and the confidentiality of
                                    their personal data in accordance with relevant laws and regulations. The app also reserves
                                    the right to use users' information for research and statistical analysis purposes to
                                    improve its services. 
                                </p>
                            </li>
                            <li>
                                <p>
                                    We would like to emphasize that the information provided through the app is intended for
                                    guidance purposes only and should not be considered a substitute for professional medical
                                    care. 
                                </p>
                            </li>
                            <li>
                                <p>
                                    The use of the service is the personal responsibility of the user, as the service is provided
                                    on an "as is" and "as available" basis, without any warranties of any kind, whether express
                                    or implied. Under this provision, it cannot be guaranteed that the service will operate
                                    uninterrupted, securely, or be available at any specific time or location, nor can it
                                    guarantee the correction of any errors or defects, or that the results from using the
                                    service will meet the user's specific needs. 
                                </p>
                            </li>
                        </ol>
                    </section>
                    <section id="changes">
                        <h2>Changes to This Policy</h2>
                        <ol>
                            <li>
                                <p>
                                    The DoctoriaPlus app reserves the right to periodically update the terms and conditions
                                    policy, and any changes will be published on the app to affirm our commitment to the policy.
                                </p>
                            </li>
                            <li>
                                <p>
                                    These terms are governed and interpreted in accordance with the laws of the Arab Republic of
                                    Egypt, and the failure to enforce any right or provision of these terms shall not be deemed
                                    a waiver of such rights in any way. If any provision of these terms is found to be invalid
                                    or unenforceable by a court, the remaining provisions shall remain in effect. 
                                </p>
                            </li>
                        </ol>
                    </section>
                    <section id="refund">
                        <h2>Refund Policy</h2>
                        <ol>
                            <li>
                                <p>Home care visits:</p>
                                <ul>
                                    <li>
                                        <p>The user is required to pay the full amount for the visit if the service
                                            provider arrives at the location and waits for 10 minutes in front of the
                                            door.
                                        </p>
                                    </li>
                                    <li>
                                        <p>The user has the right to cancel their home care visit request up to 12 hours
                                            before
                                            the scheduled time, while retaining the amount paid as credit.
                                        </p>
                                    </li>
                                    <li>
                                        <p>If the user cancels a home care visit appointment at least 11 hours before
                                            the scheduled time, the service provider is entitled to the full payment.
                                        </p>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <p>Online consultation:</p>
                                <ul>

                                    <li>
                                        <p>The user is required to pay the full consultation fee if a service provider
                                            is present, whether for a specialized exam or an immediate consultation, and
                                            to wait for 10 minutes.</p>
                                    </li>
                                    <li>
                                        <p>The user has the right to cancel the online appointment with the specialist
                                            doctor up to 12 hours before the scheduled time while retaining the paid
                                            amount as credit.</p>
                                    </li>

                                    <li>
                                        <p>The user is entitled to retain the amount paid as credit if, during an online
                                            consultation with a specialist doctor or an immediate consultation, a doctor
                                            is not available within 10 minutes.</p>
                                    </li>
                                    <li>
                                        <p>If the user cancels their appointment with the specialist more than 11 hours
                                            before the scheduled visit, the service provider is entitled to receive the
                                            full amount.</p>
                                    </li>

                                </ul>
                        </ol>
                    </section>

                </div>
            </div>

        </div>


    </div>

    <footer class="bg-dark py-2 text-center">
        <p class="text-light pt-2">Doctoria-plus &#169; 2024</p>
    </footer>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        var swiper = new Swiper(".swiper-container", {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            loop: true,
        });
    </script>
    <script>
        AOS.init({
            offset: 200, // Offset (in px) from the original trigger point
            duration: 300, // Duration of animation (in ms)
            easing: "ease-in-out-sine", // Easing function
            delay: 100, // Delay before the animation starts (in ms)
            once: true, // Whether animation should happen only once - while scrolling down
            mirror: false, // Whether elements should animate out while scrolling past them
        });
    </script>
    <script>
        window.addEventListener('scroll', function() {
            var sidebar = document.getElementById('sidebar');
            var stopElement = document.getElementById('section2'); // The element where the sidebar should stop

            var sidebarRect = sidebar.getBoundingClientRect();
            var stopElementRect = stopElement.getBoundingClientRect();

            if (stopElementRect.top <= sidebarRect.bottom) {
                sidebar.style.position = 'absolute';
                sidebar.style.top = (stopElementRect.top - sidebarRect.height) + 'px';
            } else {
                sidebar.style.position = 'fixed';
                sidebar.style.top = '0';
            }
        });
    </script>
</body>

</html>
