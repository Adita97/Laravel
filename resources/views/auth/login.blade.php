<x-layout>
  <div class="container-fluid">
    <div class="row m-auto align-items-center">
      <div class="col-xl-6">
        <img src="https://images.pexels.com/photos/14521019/pexels-photo-14521019.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"  alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>

   <div class="col-xl-6">
       <div class="container d-flex flex-column align-items-center">
    <h2 class="mt-5">Login</h2>

    @if(session('full_name'))
    @header
    @else
        <form class="mt-4 w-75" method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="username"><b>Username:</b></label>
                <input type="text" class="form-control" id="username" name="username" required>
                @error('username')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password"><b>Password:</b></label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="mx-2 my-4 btn btn- btn-primary">Login</button>
            <a href="{{ route('register') }}"><button type="button" class="mx-2 my-4 btn btn-lg btn-primary">Register</button></a>
        </form>
    @endif
    </div>
  </div>
  </div>
</div>
</x-layout>
