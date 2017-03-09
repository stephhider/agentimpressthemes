<form action="{{ route('contact') }}" method="post">
    {!! csrf_field() !!}
    @if(isset($listing))
        <input type="hidden" name="listing_id" value="{{ $listing->id }}">
    @endif
    {!! Honeypot::generate('hp', 'hp_time') !!}
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="contact-first-name">First Name</label>
            <input required="" type="text" id="contact-first-name" name="contact[first_name]" class="form-control">
        </div>
        <div class="form-group col-sm-6">
            <label for="contact-last-name">Last Name</label>
            <input required="" type="text" id="contact-last-name" name="contact[last_name]" class="form-control">
        </div>
        <div class="form-group col-sm-6">
            <label for="contact-email">Email</label>
            <input required="" type="text" id="contact-email" name="contact[email]" class="form-control">
        </div>
        <div class="form-group col-sm-6">
            <label for="contact-phone">Phone No.</label>
            <input required="" type="text" id="contact-phone" name="contact[mobile]" class="form-control phone-mask">
        </div>
        <div class="form-group col-sm-12">
            <label for="contact-message">Message</label>
            <textarea rows="5" name="message" id="contact-message" class="form-control"></textarea>
        </div>
        <div class="form-group col-sm-12">
            <button type="submit" class="btn btn-info">Send</button>
        </div>
    </div>
</form>