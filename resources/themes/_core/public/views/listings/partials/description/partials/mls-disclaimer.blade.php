<div class="data-by mls-disclaimer">
    {{ $listing_type }} Courtesy of
    <a href="{{ url('search?agent=' . $listing->disclaimer->agent_id) }}">{{ $listing->disclaimer->agent }}</a> of
    <a href="{{ url('search?brokers=' . $listing->disclaimer->broker_id) }}">{{ $listing->disclaimer->broker }}</a>
</div>
