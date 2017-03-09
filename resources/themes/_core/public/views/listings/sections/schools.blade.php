{{-- Nav Link --}}
@push('main-menu')
<li><a class="page-scroll" href="#listing-schools">Schools</a></li>
@endpush

<section id="listing-schools" class="main-section">
    <div class="wow fadeIn">
        <div class="container">
            <h2 class="section-heading">{{ $listing_type or 'Listing' }} <strong>Schools</strong><br>
                <small>See how this {{ $listing_type }} stacks up when it comes to your school options.</small></h2>
            <div class="row">
                @if ($listing->schools['elementary_school'])
                    @include('listings.partials.schools.school', ['school' => $listing->schools['elementary_school']])
                @endif
                @if ($listing->schools['middle_school'])
                    @include('listings.partials.schools.school', ['school' => $listing->schools['middle_school']])
                @endif
                @if ($listing->schools['high_school'])
                    @include('listings.partials.schools.school', ['school' => $listing->schools['high_school']])
                @endif
            </div>
            <div class="pull-right">
                <small>
                    Powered by
                    <a href="http://www.greatschools.org/" target="_blank" data-toggle="tooltip" data-placement="left" title="GreatSchools ratings give an overview of a school's test results. The ratings are based on a comparison of test results for all schools in the state. Disclaimer: School attendance zone boundaries are supplied by Maponics and are subject to change. Check with the applicable school district prior to making a decision based on these boundaries.">
                        <i class="fa fa-exclamation-circle"></i> GreatSchools.org
                    </a>
                </small>
            </div>
        </div>
    </div>
</section>
