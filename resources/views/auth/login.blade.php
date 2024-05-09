<x-layout>
<x-errors/>
  <div class="container-fluid p-0 h-lg-75">
    <div class="row m-auto align-items-center">
      <div class="col-xl-6">
        <img src="https://images.pexels.com/photos/14521019/pexels-photo-14521019.jpeg?auto=compress&cs=tinysrgb&w=5760&h=3740&dpr=1" class="auth-image" alt="Login image">
      </div>
      <div class="col-xl-6">
       <div class="container d-flex flex-column align-items-center">
        <h2 class="mt-5">Login</h2>
        <form class="mt-4 w-75" method="post" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <label for="username"><b>Username:</b></label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password"><b>Password:</b></label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
            <a href="{{ route('password.resetForm') }}">Forgot password?</a><br>
            <button type="submit" class="mx-2 my-4 btn btn-lg btn-primary">Login</button>
            <a href="{{ route('register') }}"><button type="button" class="mx-2 my-4 btn btn-lg btn-primary">Register</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>
