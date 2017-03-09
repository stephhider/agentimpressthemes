@if (isset($vendors))
    @foreach ($vendors as $vendor)
        @if ($page_type == 'mls')
            @if (view()->exists('disclaimers.' . $vendor->vendor . '.listing-disclaimer'))
                <p>
                    @include('disclaimers.' . $vendor->vendor . '.listing-disclaimer', ['updated_at' => $vendor->updated_at->toDayDateTimeString()])
                </p>
            @endif
        @elseif ($page_type == 'index' || $page_type == 'search')

            @if (view()->exists('disclaimers.' . $vendor->vendor . '.disclaimer'))
                <p>
                    @include('disclaimers.' . $vendor->vendor . '.disclaimer', ['updated_at' => $vendor->updated_at->toDayDateTimeString()])
                </p>
            @endif
        @endif
    @endforeach
@endif