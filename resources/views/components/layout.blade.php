
@php
// Array of loading messages
$loadingMessages = [
    "Developing your digital masterpiece... 📷",
    "Capturing moments in time... Loading...",
    "Focusing our lenses on your experience...",
    "Loading... Our cameras are adjusting to the perfect exposure.",
    "Picture-perfect loading in progress...",
    "Developing pixels with a touch of magic...",
    "Loading... Our shutterbugs are framing your experience.",
    "Snapping, clicking, loading... Your gallery is coming to life.",
    "Loading... We're zooming in on perfection, one pixel at a time.",
    "Creating snapshots of joy... Loading your visual story."
];

    // Retrieve user details from the session
    $userDetails = session('user_details');
    @endphp
  
  <head>
    <!--    Bootstrap CDN     -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--    Bootstrap CDN     -->

    <!-- Css Animations library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap">
    @vite(['resources/css/layout.css'])
    <title>CelestialCapture</title>
  </head>
  <body>
  <div class="loading-camera text-center">
    <img src="{{ asset('spinner.png') }}" alt="">
    <h3>{{ $loadingMessages[array_rand($loadingMessages)] }}</h3>
  </div>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img class="logo" src="{{ asset('images/logo.png') }}" alt="CelestialCapture"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
            <li class="nav-item">
              <a class="nav-link nav-shadow" href="{{ route('home') }}">@lang('messages.home')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-shadow" href="{{ route('about') }}">@lang('messages.about') </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-shadow" href="{{ route('contact-form')}}">@lang('messages.contact')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-shadow" href="{{route ('gallery')}}">@lang('messages.gallery')</a>
            </li>
          </ul>

          <div class="nav-item">
            <div class="d-flex flex-row justify-content-xl-end justify-content-center align-items-center">
                @auth
                  <ul class="m-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         {{ $userDetails['name'] }}
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end animated slideInDown wider-dropdown" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item text-dark" href="{{ route('profile') }}">@lang('messages.profile')</a></li>
                        <li><a class="dropdown-item text-dark" href="{{ route('my-bookings') }}">@lang('messages.myBookings')</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                          <form action="{{ route('logout') }}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-danger">@lang('messages.logout')</button>
                          </form>
                        </li>
                      </ul>
                    </li>
                  </ul>
                @else
                    <a href="{{ route('login') }}" class=""><button class="btn btn-primary btn-lg">@lang('messages.login')</button></a>
                @endauth
            </div>
          </div>
        </div>
    </div>
  </nav>
      
  <!-- header ends here -->

  {{$slot}}

 <!-- footer begins -->

 <footer class="footer-background">   
    <div class="footer">
      <div class="footer-menu footer-section">
        <h3>@lang('messages.menu')</h3>
        <br />
        <a href="{{ route('home') }}">@lang('messages.home')</a>
        <a href="{{ route('about') }}">@lang('messages.about')</a>
        <a href="{{ route('contact-form')}}">@lang('messages.contact')</a>
        <a href="#">@lang('messages.gallery')</a>
      </div>
      <div class="footer-section">
        <h3>@lang('messages.newsletterText')</h3>
        <form action="{{route('email.subscribe')}}" method="POST">
          @csrf
          <input class="email-input" type="email" placeholder="Email" name="email_subscriber"/>
          <br />
            <button class="subscribe-button" type="submit">@lang('messages.subscribe')</button>
        </form>
      </div>

      <div class="address footer-section">
        <h3>@lang('messages.address')</h3>
        <br />
        <p>
          @lang('messages.streetAddress'): 141 Heritage Road <br />
          @lang('messages.city'): Pixley <br />
          @lang('messages.state'): California <br />
          @lang('messages.zipcode'): 93256 <br />
          @lang('messages.mobileNumber'): 916-225-7297
        </p>
      </div>
    </div>
    <div class="text-center p-3">
      <div class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          @lang('messages.localization') <i class="bi bi-translate">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
          </svg></i>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="locale/en">English</a></li>
          <li><a class="dropdown-item" href="locale/cn">Chinese</a></li>
          <li><a class="dropdown-item" href="locale/de">Deutsch</a></li>
        </ul>
      </div>
    </div> 
</footer>


<script>

document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        var loadingCamera = document.querySelector('.loading-camera');
        if (loadingCamera) {
            loadingCamera.style.transition = 'opacity 0.5s ease-in-out';
            loadingCamera.style.opacity = '0';
            setTimeout(function() {
                loadingCamera.style.display = "none";
            }, 500);
        }
    }, 500);
});


</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</html>