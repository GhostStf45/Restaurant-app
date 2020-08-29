@extends('layouts.app')

@section('content')
    @include('includes.slider')
    @include('includes.welcome')
    @include('includes.intro')
    @include('includes.promotions', ['allPromotions'=> $allPromotions])
    @include('includes.content_intro')
@endsection
