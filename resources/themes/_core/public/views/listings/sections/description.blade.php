{{-- Nav Link --}}
@push('main-menu')
<li><a class="page-scroll" href="#listing-details">Details</a></li>
@endpush
<section id="listing-details" class="main-section">
    <div class="wow fadeIn">
        <div class="container">
            @include('listings.partials.description.description')
        </div>
    </div>
</section>
