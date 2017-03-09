@extends('layout.master') @section('content')
    <section class="main-section">
        <div class="container">
            <div class="row">
                <div class="login-wrap col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
                    @include('lead.partials.form')
                </div>
            </div>
        </div>
    </section>
@endsection
