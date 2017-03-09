<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>{!! str_replace(array('Middle','Elementary','High'),array('<strong>Middle</strong>','<strong>Elementary</strong>','<strong>High</strong>'),$school->name) !!}</h4>
            <div class="rating-well"><span class="rank">6</span><span class="out-of">of 10</span></div>
        </div>
        <div class="panel-body">
            <dl class="school-stats">
                @if(isset($school->enrollment))
                    <dt>Enrollment</dt>
                    <dd>{{ $school->enrollment }} Students - {{ $school->gradeRange }}</dd>
                @endif
                @if(isset($school->district))
                    <dt>District</dt>
                    <dd>{{ $school->district }}</dd>
                @endif
                <dt>Address</dt>
                <dd>
                    <a target="_blank" href="https://www.google.com/maps/place/{{ urlencode($school->address) }}">{!! str_replace(',','', str_replace("\n", '<br /> ', $school->address)) !!}</a>
                </dd>
                @if(isset($school->phone))
                <dt>Phone</dt>
                <dd><a href="tel:{{ $school->phone }}">{{ $school->phone }}</a></dd>
                @endif
                @if(isset($school->website) && !is_object($school->website))
                    <dt>Website</dt>
                    <dd><a target="_blank" href="{{ 'http://' . $school->website }}">{{ $school->website }}</a></dd>
                @endif
            </dl>
        </div>

    </div>
</div>
