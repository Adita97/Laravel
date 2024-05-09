<x-layout>
    <x-errors />
    <div class="contact-section m-auto">
        <h1 class="section-title text-center">@lang('contact.contact')</h1>
        <div class="contact-container row justify-content-center">
            <div class="contact-form-container col-lg-5 my-3 py-1 px-5">
                <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control contact-input mb-3" placeholder="@lang('contact.firstName')" name="first_name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control contact-input mb-3" placeholder="@lang('contact.lastName')" name="last_name">
                        </div>
                    </div>
                    <input class="form-control contact-input mb-3" type="text" placeholder="@lang('contact.emailAddress')" name="email">
                    <input class="form-control contact-input mb-3" type="text" placeholder="@lang('contact.subject')" name="subject">
                    <textarea placeholder="@lang('contact.yourMessage')" name="message" class="form-control contact-input mb-3" rows="5"></textarea>
                    <div class="submit-container">
                        <button class="btn contact-btn btn-primary" type="submit">@lang('contact.submit')</button>
                    </div>
                </form>
            </div>
            <div class="map-container col-lg-6 d-flex justify-content-center my-3 p-3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3562.664838406176!2d-80.10497081275241!3d26.75506960689072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d92a0ac5758947%3A0x3ba6792a1334284a!2s141%20Heritage%20Way%2C%20West%20Palm%20Beach%2C%20FL%2033407%2C%20USA!5e0!3m2!1sen!2sro!4v1706527816552!5m2!1sen!2sro"
                style="border: 0; width:100%; height:auto"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
        </div>
    </div>
</x-layout>
