<x-layout>
    <x-errors/>
    <div class="row w-100">
    <div class="container mt-5 col-xl-6 p-3 ps-5 d-flex flex-column justify-content-center" >
        <h2 class="text-center">Book a Photosession</h2>
        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="fullName">Full Name</label>
                @auth
                    <input type="text" class="py-2 form-control" id="fullName" name="fullName" value="{{ auth()->user()->full_name }}" required>
                @else
                    <input type="text" class="py-2 form-control" id="fullName" name="fullName" value="{{ old('fullName') }}" required>
                @endauth
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="py-2 form-control" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                @auth
                    <!-- Input field for authenticated users -->
                    <input type="email" class="py-2 form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                @else
                    <!-- Input field for guest users -->
                    <input type="email" class="py-2 form-control" id="email" name="email" value="{{ old('email') }}" required>
                @endauth
               
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="py-2 form-control" id="date" name="date" placeholder="dd-mm-yyyy"  min="2024-01-01" max="2030-12-31" value="{{ old('date') }}" required>

            </div>
            <button type="submit" class="my-2 btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-xl-6">
        <img src="https://images.pexels.com/photos/6794125/pexels-photo-6794125.jpeg?auto=compress&cs=tinysrgb&w=1920&h=2880&dpr=1" class="auth-image" alt="">
    </div>
</div>
</x-layout>
