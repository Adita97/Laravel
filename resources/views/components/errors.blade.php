@if ($errors->any())
    <div class="position-absolute bot-0 w-100 alert alert-danger error-container">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif (session('success'))
<div class="position-absolute bot-0 w-100 alert alert-success error-container">
    {{session('success')}}
</div>
@endif

<script>
    setTimeout(() => {
        const errorContainer = document.querySelector('.error-container');
        if (errorContainer) {
            errorContainer.style.transition = 'transform 1s';
            errorContainer.style.transform = 'translateY(-100%)';
            setTimeout(() => {
                errorContainer.remove();
            }, 1000); 
        }
    }, 5000); 
</script>
