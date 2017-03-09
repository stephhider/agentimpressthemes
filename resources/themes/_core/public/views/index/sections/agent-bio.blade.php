@if($user->bio)
    {{-- Nav Link --}}
    @push('main-menu')
    <li><a class="page-scroll" href="#index-agent-bio">About</a></li>
    @endpush

    <section id="index-agent-bio" class="main-section">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    @if (isset($section->title) && $section->title === false)
                    @else
                        <h2 class="section-heading">
                            {{ $section->title or 'About ' . $user->full_name }}
                            <br>
                            <small>{{ $section->sub_title or 'A Little Information About Me.' }}</small>
                        </h2>
                    @endif
                    <div class="bio-content">{!! $user->bio !!}</div>
                </div>
            </div>
        </div>
    </section>

@endif
