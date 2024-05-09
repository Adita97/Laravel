<x-layout>
<x-errors/>
<div class="container-fluid form-container p-0">
    <div class="row">
        <div class="col-xl-6 d-flex flex-column justify-content-center px-5">
            <h1 class="text-center">Enter a new password</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div>
                    <label for="email">Email</label>
                    <input class="form-control" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password" required autocomplete="new-password">
                </div>
                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
                </div>
                <div>
                    <button class="btn btn-primary my-3" type="submit">Reset Password</button>
                </div>
            </form>
        </div>
        <div class="col-xl-6">
            <img src="https://images.pexels.com/photos/39584/censorship-limitations-freedom-of-expression-restricted-39584.jpeg?auto=compress&cs=tinysrgb&w=5740&h=3740&dpr=1" class="auth-image" alt="">
        </div>
    </div>
</div>
</x-layout>