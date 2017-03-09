@extends('errors.layout.' . app()->environment())
@section('content')
    @include('errors.' . app()->environment() . '.404')
@endsection