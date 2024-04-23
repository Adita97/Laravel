<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Include CSS and other common resources -->
    <style>
    /* CSS for overlay */
    #overlay {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(255, 255, 255, 0.7); /* semi-transparent white */
        z-index: 9999; /* ensure it's above everything else */
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 1;
        animation: fadeOut 0.3s ease-in-out forwards; /* fade-out animation */
    }

    /* CSS for spinner */
    #spinner {
        width: 100px; /* adjust size as needed */
        height: 100px; /* adjust size as needed */
    }

    /* CSS keyframes for fade-out animation */
    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }
</style>
</head>
<body>


<div id="overlay">
    <img id="spinner" src="{{ asset('spinner.gif') }}" alt="Loading..." />
</div>

@yield('content')

<script>
    // JavaScript to hide the overlay after 3 seconds
    setTimeout(function(){
        document.getElementById("overlay").style.display = "none";
    }, 6000);
</script>
</body>
</html>
