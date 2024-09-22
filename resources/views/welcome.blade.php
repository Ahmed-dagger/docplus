<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend')}}/LoginRegister/LoginRegisterStyling.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <title>doctoria-plus</title>
  </head>
  <body>
    <header class="Header">
      <div class="d-flex align-items-center container-fluid">
        <div class="container-fluid justify-content-between" id="Logo">
          <img src="{{asset('frontend/img/Doctoria-Logo.png')}}" class="Logo" alt="" />
        </div>
        
        

        <div class="justify-content-center align-items-center pcMenu">
          <ul
            class="d-flex menuListPC align-items-center justify-content-center"
          >
            <a href="/" class="text-decoration-none">
              <li class="d-flex text-light">Home Page</li>
            </a>
            <a href="{{ route('Contact') }}" class="text-decoration-none">
              <li class="d-flex text-light">Contact US</li>
            </a>
            <a href="{{route('privacy')}}" class="text-decoration-none">
              <li class="d-flex text-light">Privacy and Refund</li>
            </a>
            <a href="{{route('Terms')}}" class="text-decoration-none">
              <li class="d-flex text-light">Terms and Conditions</li>
            </a>
            <a href="https://play.google.com/store/apps/details?id=com.tailors.doctoria&hl=en" class="text-decoration-none">
              <li>
                <button class="download">
                  <svg
                    class="saveicon"
                    stroke="currentColor"
                    stroke-width="1.7"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                      stroke-linejoin="round"
                      stroke-linecap="round"
                    ></path>
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
              <button
                class="Menubtn"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight"
              >
                <img
                  width="40"
                  height="40"
                  src="https://img.icons8.com/ios/ffffff/128/menu--v7.png"
                  alt="menu--v7"
                />
              </button>
            </div>

            <div
              class="offcanvas offcanvas-end bg-dark"
              tabindex="-1"
              id="offcanvasRight"
              aria-labelledby="offcanvasRightLabel"
            >
              <div class="offcanvas-header">
                <button
                  type="button"
                  class="btn-close text-reset btn-light"
                  data-bs-dismiss="offcanvas"
                  aria-label="Close"
                ></button>
              </div>
              <div class="offcanvas-body">
                <ul class="menuList">
                  <a href="" class="text-decoration-none"
                    ><li class="text-light font-weight-bold">Home Page</li></a
                  >
                  <hr class="text-light" />
                  <a href="{{ route('Contact') }}" class="text-decoration-none"
                    ><li class="text-light font-weight-bold">Contact Us</li></a
                  >
                  <hr class="text-light" />
                  <a href="{{ route('privacy') }}" class="text-decoration-none">
                    <li class="text-light font-weight-bold">Privacy and Refund</li>
                </a>

                  <a href="{{ route('Terms') }}" class="text-decoration-none">
                    
                    <li class="text-light font-weight-bold">
                      Terms and Conditions
                    </li>
                  </a>

                  <hr class="text-light" />
                  <a href="https://play.google.com/store/apps/details?id=com.tailors.doctoria&hl=en" class="text-decoration-none justify-content-end"
                    ><li class="text-light font-weight-bold">
                      <button class="download">
                        <svg
                          class="saveicon"
                          stroke="currentColor"
                          stroke-width="1.7"
                          viewBox="0 0 24 24"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                            stroke-linejoin="round"
                            stroke-linecap="round"
                          ></path>
                        </svg>
                        Download
                      </button>
                    </li></a
                  >
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container my-5">
        <div class="row my-5 align-items-center">
          <div class="col-sm-6 my-5">
            <h2 class="text-light font-weight-bold">
              One App for Telemedicine & Home HealthCare Services
            </h2>
            <p class="text-light my-3">
              Better health beyond the doctor's office
            </p>
            <a href="https://play.google.com/store/apps/details?id=com.tailors.doctoria&hl=en" class="text-decoration-none">
            <button class="download">
              <svg
                class="saveicon"
                stroke="currentColor"
                stroke-width="1.7"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                  stroke-linejoin="round"
                  stroke-linecap="round"
                ></path>
              </svg>
              Download
            </button>
            </a>
          </div>

          <div class="col-sm-6">
            <img src="{{asset('frontend/img/Subheaderimage.png')}}" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </header>

    <div class="container-fluid my-5 justify-content-center">
      <div class="container text-center justify-content-center">
        <h1 class="text-dark text-center font-weight-bold">
          The All-In-One <br />
          Smart Medical Solution for Chronic Disease Management <br />
          and home care
        </h1>
      </div>

      <div class="row g-3 justify-content-center text-center my-5">
        <div class="col-md-3 justify-content-center text-center">
          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <p class="title">Extended care at Home</p>
                <p>Hover Me</p>
              </div>
              <div class="flip-card-back">
                <p class="title">BACK</p>
                <p>
                  Extended care to the patient’s home Online service for patient
                  alerts, tasks, and messages Medication compliance and lifetime
                  coaching
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <p class="title">Personalized Patient Care</p>
                <p>Hover Me</p>
              </div>
              <div class="flip-card-back">
                <p class="title">BACK</p>
                <p>
                  On-demand lifestyle support for chronic conditions through our
                  user-friendly app Virtual and face-to-face interaction A
                  tailored care plan for every patient
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <p class="title">Data-Driven Smart Products</p>
                <p>Hover Me</p>
              </div>
              <div class="flip-card-back">
                <p class="title">BACK</p>
                <p>
                  Cloud-based clinical platforms, intuitive mobile app, and
                  smart monitoring devices Real-time analysis of patient's data
                  trends for actionable insights Medical outcome driven
                  treatment and care plan adjustment
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid justify-content-center">
      <div
        class="row justify-content-center align-items-center"
        data-aos="fade-up"
      >
        <div class="col-sm-6 justify-content-center pl-5">
          <h1 class="font-weight-bold ml-5">
            Remote Patient Monitoring <br />
            Program of DOCTORIA <br />
            - Unified Care
          </h1>
          <button class="animated-button ml-5 mt-5">
            <svg
              viewBox="0 0 24 24"
              class="arr-2"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
              ></path>
            </svg>
            <span class="text">Learn More</span>
            <span class="circle"></span>
            <svg
              viewBox="0 0 24 24"
              class="arr-1"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
              ></path>
            </svg>
          </button>
        </div>
        <div class="col-sm-6">
          <img src="{{asset('frontend/img/mobile-view.png')}}" class="img-fluid" alt="" />
        </div>
      </div>
    </div>

    <div class="container-fluid justify-content-center">
      <div
        class="row justify-content-center align-items-center"
        data-aos="fade-up"
      >
        <div class="col-sm-6">
          <div class="container">
            <img src="{{asset('frontend/img/Clinical-providance.png')}}" class="img-fluid" alt="" />
          </div>
        </div>

        <div class="col-sm-6">
          <div class="container">
            <h2>Clinically proven programs we provide</h2>
          </div>
          <div class="container">
            <div class="row justify-content-start">
              <div class="col-sm-1">
                <img
                  width="60"
                  height="60"
                  src="https://img.icons8.com/sf-regular/120/invert-colors.png"
                  alt="invert-colors"
                />
              </div>
              <div class="col-sm-5 justify-content-start">
                <h4 class="text-left mt-3">Diabetes</h4>
                <p>+ Blood glucose monitoring</p>
                <p>+ RD, CDE services</p>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row justify-content-start">
              <div class="col-sm-1">
                <img
                  width="50"
                  height="50"
                  src="https://img.icons8.com/ios-filled/120/heart-with-pulse--v1.png"
                  alt="heart-with-pulse--v1"
                />
              </div>
              <div class="col-sm-7 justify-content-start">
                <h4 class="text-left mt-3">Hypertension</h4>
                <p>+ Blood pressure monitoring</p>
                <p>+ Optional MNT services for qualifying patients</p>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row justify-content-start">
              <div class="col-sm-1">
                <img
                  width="48"
                  height="48"
                  src="https://img.icons8.com/sf-regular/128/save.png"
                  alt="save"
                />
              </div>
              <div class="col-sm-7 justify-content-start">
                <h4 class="text-left mt-3">Other</h4>
                <p>
                  Additional monitoring devices and services for related
                  cardio-metabolic conditions
                </p>
              </div>
            </div>
          </div>
          <div class="container">
            <button class="animated-button ml-5 mt-5">
              <svg
                viewBox="0 0 24 24"
                class="arr-2"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                ></path>
              </svg>
              <span class="text">Learn More</span>
              <span class="circle"></span>
              <svg
                viewBox="0 0 24 24"
                class="arr-1"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                ></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="container justify-content-center">
      <div
        class="row gy-3 gx-3 justify-content-center text-center align-items-center mt-5"
        data-aos="fade-up"
      >
        <h1 class="text-dark text-center font-weight-bold">
          We have the best expierence for Ptients and Doctors
        </h1>
        <div class="col-md-3 justify-content-center lordicon m-3">
          <a href="#" class="text-decoration-none text-dark">
            <script src="https://cdn.lordicon.com/lordicon.js"></script>
            <lord-icon
              src="https://cdn.lordicon.com/xnjspmau.json"
              trigger="loop"
              colors="primary:#121331,secondary:#66a1ee,tertiary:#ffc738"
              style="width: 250px; height: 250px"
            >
            </lord-icon>
            <h3 class="text-center">Doctors</h3>
          </a>
        </div>

        <div
          class="col-md-3 text-center justify-content-center align-items-center lordicon m-3"
        >
          <a href="#" class="text-decoration-none text-dark"
            ><script src="https://cdn.lordicon.com/lordicon.js"></script>
            <lord-icon
              src="https://cdn.lordicon.com/ntrjwroy.json"
              trigger="loop"
              style="width: 250px; height: 250px"
            >
            </lord-icon>
            <h3 class="text-center">Patients</h3></a
          >
        </div>
      </div>
    </div>

    <div class="container-fluid my-5 gradient-background" data-aos="fade-up">
      <div class="row text-light align-items-center justify-content-center">
        <div class="col-sm-6 align-items-center">
          <h1 class="ml-5 mt-5">BETTER OUTCOMES, MORE REVENUE</h1>
          <p class="ml-5">
            Help your patients manage chronic conditions with better outcomes
            while adding additional revenue to your practice
          </p>
          <button class="animated-button text-light ml-5 mt-5">
            <svg
              viewBox="0 0 24 24"
              class="arr-2"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
              ></path>
            </svg>
            <span class="text">Learn More</span>
            <span class="circle"></span>
            <svg
              viewBox="0 0 24 24"
              class="arr-1"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
              ></path>
            </svg>
          </button>
        </div>
        <div class="col-sm-6">
          <img
            src="{{asset('frontend/img/freepik-untitled-project-20240802132036HvJN.png')}}"
            class="img-fluid"
            alt=""
          />
        </div>
      </div>
    </div>

    <div class="container-fluid my">
      <div class="row my-5 g-3 align-items-center">
        <div class="col-sm-6" data-aos="fade-right">
          <img src="{{asset('frontend/img/Dashbordstats.jpg')}}" class="img-fluid" alt="" />
        </div>
        <div class="col-sm-6 my-5">
          <h1 class="mt-5">Better Outcome, Closer Patient Relationship</h1>
          <p>
            Lorem ipsum dolor sit amet consectetur adipiscing elit sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam.
          </p>
        </div>
      </div>
    </div>

    <div class="Footer container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-sm-6" data-aos="fade-right">
          <div class="container-fluid">
            <h2 class="text-light my-5">Download the App now!</h2>
            <p class="text-light my-">
              On the other hand we denounce with righteous indignation and
              <br />
              dislike men who are so beguiled and demoralized by the charms of
              <br />
              pleasure of the moment so blinded.
            </p>
            <div
              class="container-fluid justify-content-start mt-3 download-buttons"
            >
              <div class="row g-3 my-5">
                <div class="col-md">
                  <a href="#" class="playstore-button text-decoration-none">
                    <span class="icon">
                      <svg
                        fill="currentcolor"
                        viewBox="-52.01 0 560.035 560.035"
                        xmlns="http://www.w3.org/2000/svg"
                        stroke="#ffffff"
                      >
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g
                          id="SVGRepo_tracerCarrier"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        ></g>
                        <g id="SVGRepo_iconCarrier">
                          <path
                            d="M380.844 297.529c.787 84.752 74.349 112.955 75.164 113.314-.622 1.988-11.754 40.191-38.756 79.652-23.343 34.117-47.568 68.107-85.731 68.811-37.499.691-49.557-22.236-92.429-22.236-42.859 0-56.256 21.533-91.753 22.928-36.837 1.395-64.889-36.891-88.424-70.883-48.093-69.53-84.846-196.475-35.496-282.165 24.516-42.554 68.328-69.501 115.882-70.192 36.173-.69 70.315 24.336 92.429 24.336 22.1 0 63.59-30.096 107.208-25.676 18.26.76 69.517 7.376 102.429 55.552-2.652 1.644-61.159 35.704-60.523 106.559M310.369 89.418C329.926 65.745 343.089 32.79 339.498 0 311.308 1.133 277.22 18.785 257 42.445c-18.121 20.952-33.991 54.487-29.709 86.628 31.421 2.431 63.52-15.967 83.078-39.655"
                          ></path>
                        </g>
                      </svg>
                    </span>
                    <span class="texts">
                      <span class="text-1">GET IT ON</span>
                      <span class="text-2">APP STORE</span>
                    </span>
                  </a>
                </div>

                <div class="col-md">
                  <a class="playstore-button text-decoration-none" href="https://play.google.com/store/apps/details?id=com.tailors.doctoria&hl=en">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="currentColor"
                      class="icon"
                      viewBox="0 0 512 512"
                    >
                      <path
                        d="M99.617 8.057a50.191 50.191 0 00-38.815-6.713l230.932 230.933 74.846-74.846L99.617 8.057zM32.139 20.116c-6.441 8.563-10.148 19.077-10.148 30.199v411.358c0 11.123 3.708 21.636 10.148 30.199l235.877-235.877L32.139 20.116zM464.261 212.087l-67.266-37.637-81.544 81.544 81.548 81.548 67.273-37.64c16.117-9.03 25.738-25.442 25.738-43.908s-9.621-34.877-25.749-43.907zM291.733 279.711L60.815 510.629c3.786.891 7.639 1.371 11.492 1.371a50.275 50.275 0 0027.31-8.07l266.965-149.372-74.849-74.847z"
                      ></path>
                    </svg>
                    <span class="texts">
                      <span class="text-1">GET IT ON</span>
                      <span class="text-2">Google Play</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="container-fluid" data-aos="fade-up">
            <img src="{{asset('frontend/img/footerdesign1.png')}}" class="img-fluid w-100" alt="" />
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
    <script src="burger-menu.js"></script>
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
  </body>
</html>
