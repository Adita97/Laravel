<x-layout>
<x-errors/>
<div class="container-fluid p-0">
    <div class="row ">
        <div class="col-xl-6 m-auto">
            <h1 class="text-center">Password Reset</h1>
            <div class="form-control d-flex justify-content-center align-items-center h-75">
                <form class="w-75" method="POST" action="{{ route('password.email') }}">
                @csrf
                    <div>
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div>
                        <button class="btn btn-primary my-3" type="submit">Send Password Reset Link</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="col-xl-6 ">
        <img class="auth-image" src="https://images.pexels.com/photos/3747462/pexels-photo-3747462.jpeg?auto=compress&cs=tinysrgb&w=5760&h=3840&dpr=1" alt="">
    </div>
</div>

</x-layout>