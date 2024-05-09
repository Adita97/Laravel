<x-layout>
<x-errors/>
    <div class="container mt-5 text-center">
        <h2>@lang('booking.myBookings')</h2>
        @if ($bookings !== null && count($bookings) > 0)
            <div class="row text-center">
                @foreach ($bookings as $booking)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://images.pexels.com/photos/414781/pexels-photo-414781.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="camera lens">
                        <div class="card-body">
                            <h5 class="card-title">@lang('booking.name'): {{ $booking['full_name'] }}</h5>
                            <p class="card-text ">@lang('booking.bookingId'): {{ $booking['id'] }}</p>
                            <p class="card-text ">@lang('booking.phoneNumber'): {{ $booking['phone_number'] }}</p>
                            <p class="card-text ">@lang('booking.date'): {{ $booking['booking_date'] }}</p>
                            <div class="d-flex flex-row align-items-baseline justify-content-center">
                                <div>
                                    <!-----Cancel Booking Button----->
                                    <form action="{{ route('cancel-booking') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="booking_id" value="{{ $booking['id'] }}">
                                    <button type="submit" class="mx-2 my-3 px-4 btn btn-danger">@lang('booking.cancel')</button>
                                    </form>
                                </div>
                                <!-----Change Date Button with Modal----->
                                <div>
                                    <button type="button" class="btn btn-primary h-auto" data-bs-toggle="modal" data-bs-target="#changeDateModal{{ $booking['id'] }}">@lang('booking.changeDate')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Change Date Modal -->
            <div class="modal fade" id="changeDateModal{{ $booking['id'] }}" tabindex="-1" aria-labelledby="changeDateModalLabel{{ $booking['id'] }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changeDateModalLabel{{ $booking['id'] }}">@lang('booking.changeDate')
                                for @lang('booking.bookingId'): {{ $booking['id'] }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                        </div>
                        <form action="{{ route('change-date') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="newDate">@lang('booking.newDate')</label>
                                    <input type="date" class="form-control" id="newDate" name="newDate" required>
                                </div>
                                <input type="hidden" name="booking_id" value="{{ $booking['id'] }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('booking.cancel')</button>
                                <button type="submit" class="btn btn-primary">@lang('booking.saveChanges')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
    
        @else
            <h4 class="my-4 text-danger">@lang('booking.noBookings')</h4>
            <h4>@lang('booking.captureTheMoment')</h4>
            <a href="{{ route('booking') }}"><button class="my-5 px-4 btn btn-primary">@lang('booking.bookNow')</button></a>
        @endif
    </div>
</div>
</x-layout>
