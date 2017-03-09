{{-- Nav Link --}}
@push('main-menu')
<li><a class="page-scroll" href="#listing-contact">Contact</a></li>
@endpush

<section id="listing-contact" class="main-section">
    <div class="wow fadeIn">
        <div class="container">
            <h2 class="section-heading">Contact <strong>{{ $user->full_name }}</strong></h2>
            <div class="row">
                <div class="col-sm-8">
                    @include('listings.partials.contact.form')
                </div>
                <div class="col-sm-4">
                    @include('listings.partials.contact.info')
                </div>
            </div>
        </div>
    </div>
</section>