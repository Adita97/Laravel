<x-layout>
<X-errors/>
<body>
    <div class="container d-flex flex-column align-items-center">
        <h2 class="mt-5">Register</h2>
        <form class="mt-4" method="post" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full-name" name="full_name" value="{{old('full_name')}}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone_number" value="{{old('phone_number')}}" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password-register-confirm">Confirm Password:</label>
                <input type="password" class="form-control" id="password-register-confirm" name="password_confirmation" required>
            </div>
            <button type="submit" class="mx-2 my-4 btn btn-primary">Register</button>
            <a href="{{ route('login') }}"><button type="button" class="mx-2 my-4 px-3 btn btn-primary">I already have an account</button></a>
        </form>
    </div>
</body>
</x-layout>