
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

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap">
    @vite(['resources/css/layout.css'])
    <title>CelestialCapture</title>
  </head>
  <body>
    <x-slot name="title">
      CelestialCapture
  </x-slot>

  <div class="loading-camera text-center">
      <img src="{{ asset('spinner.png') }}" alt="">
      <h3>{{ $loadingMessages[array_rand($loadingMessages)] }}</h3>
  </div>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
          <a class="navbar-brand" href="#"><img class="logo" src="{{ asset('images/logo.png') }}" alt="CelestialCapture"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                  <li class="nav-item">
                      <a class="nav-link nav-shadow" href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link nav-shadow" href="{{ route('about') }}">About us</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link nav-shadow" href="#">Contact</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link nav-shadow" href="#">Gallery</a>
                  </li>
              </ul>

              <div class="nav-item">
                  <div class="d-flex flex-row justify-content-end align-items-center">
                    @auth
                    <ul class="m-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> {{ $userDetails['name'] }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end animated slideInDown" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item text-dark" href="{{ route('profile') }}">Profile</a></li>
                                <li><a class="dropdown-item text-dark" href="#">My Bookings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <a href="{{ route('login') }}" class=""><button class="btn btn-primary btn-lg">Login</button></a>
                @endauth
                  </div>
              </div>
          </div>
      </div>
  </nav>
      
  <!-- header ends here -->

  {{$slot}}

 <!-- footer begins -->

 <footer class="footer">
        
  <div class="footer-menu footer-section">
    <h3>Menu</h3>
    <br />
    <a href="index.php">Home</a>
    <a href="about-us.php">About Us</a>
    <a href="contact-us.php">Contact</a>
  </div>
  <div class="footer-section">
    <h3>Frame-Worthy News: Join Our Newsletter</h3>
    <form action="submit">
      <input class="email-input" type="email" placeholder="Email" />
      <br />
      <button class="subscribe-button" type="submit">Subscribe</button>
    </form>
  </div>

  <div class="address footer-section">
    <h3>Address</h3>
    <br />
    <p>
      City Street Address: 141 Heritage Road City: Pixley <br />
      State: CA <br />
      State Full: California <br />
      Zipcode: 93256 <br />
      559-757-5837 <br />
      Mobile Number: 916-225-7297
    </p>
  </div>
</footer>
</a>
</div>
</div>
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
</html>