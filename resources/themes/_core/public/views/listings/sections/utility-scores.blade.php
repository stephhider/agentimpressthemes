{{-- Nav Link --}}
@push('main-menu')
<li><a class="page-scroll" href="#listing-utility-scores">Utility Score</a></li>
@endpush
<section id="listing-utility-scores" class="main-section">
    <div class="wow fadeIn">
        <div class="container">
            <h2 class="section-heading">{{ $listing_type or 'Listing' }} <strong>Utility Scores</strong><br>
                <small>See how this {{ $listing_type }} stacks up when it comes to your utility costs.</small>
            </h2>
            <div id="utility-score-wrap" class="row">
                <div id="utility-score" class="col-sm-3 utility-score">
                    <div class="my-utility-score-content">
                        <div class="my-utility-score-content">
                            <div class="my-utility-score-score my-utility-score-progress-{{ $listing->utility_score['utility_score'] }}">
                                <div class="overlay utility-score-rating animated">
                                    <ul class="list-unstyled">
                                        <li class="rating">
                                            <span class="animated-number" data-value="{{ $listing->utility_score['utility_score'] }}" data-speed="2400">0</span><br><span class="out-of">Out Of 100</span>
                                        </li>
                                        <li class="cost"><strong>Estimated Costs</strong>
                                            <br><span>$ {{ round($listing->utility_score['total_bill_annual'] / 12) }} / Monthly</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="my-utility-score-chart" data-percent="{{ $listing->utility_score['utility_score'] }}"></div>
                                <span class="danger-color"></span>
                                <span class="warning-color"></span>
                                <span class="success-color"></span>
                                <span class="primary-color"></span>
                                <div class="chart-place-holder danger-chart" data-percent="33.333"></div>
                                <div class="chart-place-holder warning-chart" data-percent="33.333"></div>
                                <div class="chart-place-holder success-chart" data-percent="33.333"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="utility-costs" class="col-sm-9 ">
                    <div class="my-utility-costs-content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="panel panel-default electric">
                                    <div class="panel-heading"><h4><strong>Electric</strong> Costs</h4></div>
                                    <div class="panel-body">
                                        <dl>
                                            <dt class="term">Monthly Cost</dt>
                                            <dd>$<span class="animated-number" data-value="{{ $listing->utility_score['electricity_bill_monthly'] }}" data-speed="1500"></span></dd>
                                            <dt class="term">Yearly Cost</dt>
                                            <dd>$<span class="animated-number" data-value="{{ $listing->utility_score['electricity_bill_annual'] }}" data-speed="1500"></span></dd>
                                            <dt class="term">Peak Summer Cost</dt>
                                            <dd>$<span class="animated-number" data-value="{{ $listing->utility_score['electricity_bill_peak_summer'] }}" data-speed="1500"></span></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-default gas">
                                    <div class="panel-heading"> <h4><strong>Gas</strong> Costs</h4> </div>
                                    <div class="panel-body">
                                        <dl>
                                            <dt class="term">Monthly Cost</dt>
                                            <dd>$<span class="animated-number" data-value="{{ $listing->utility_score['natural_gas_monthly'] }}" data-speed="1500"></span></dd>
                                            <dt class="term">Yearly Cost</dt>
                                            <dd>$<span class="animated-number" data-value="{{ $listing->utility_score['natural_gas_annual'] }}" data-speed="1500"></span></dd>
                                            <dt class="term">Peak Winter Cost</dt>
                                            <dd>$<span class="animated-number" data-value="{{ $listing->utility_score['natural_gas_peak_winter'] }}" data-speed="1500"></span></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-default water">
                                    <div class="panel-heading"><h4><strong>Water</strong> Costs</h4></div>
                                    <div class="panel-body">
                                        <dl>
                                            <dt class="term">Monthly Cost</dt>
                                            <dd>$<span class="animated-number" data-value="{{ $listing->utility_score['water_sewer_monthly'] }}" data-speed="1500"></span></dd>
                                            <dt class="term">Yearly Cost</dt>
                                            <dd>$<span class="animated-number" data-value="{{ $listing->utility_score['water_sewer_annual'] }}" data-speed="1500"></span></dd>
                                            <dt class="term">Peak Summer Cost</dt>
                                            <dd>$<span class="animated-number" data-value="{{ $listing->utility_score['water_sewer_peak_summer'] }}" data-speed="1500"></span></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="data-by pull-right">
                <small>
                    Powered by
                    <a href="https://www.myutilityscore.com/" target="_blank" data-toggle="tooltip" data-placement="left" title="UtilityScore delivers accurate utility estimates that are based on local utility rates and typical usage assumptions synthesized from widely-cited state and national energy use, water use, and climate data sources.">
                        <i class="fa fa-exclamation-circle"></i> My Utility Score
                    </a>
                </small>
            </div>
        </div>
    </div>
</section>
