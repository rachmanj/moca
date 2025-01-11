@extends('layout.main')

@section('title_page')
    Inventories
@endsection

@section('breadcrumb_title')
    <small>site / inventories / dashboard</small>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <x-site-inventory-links page="dashboard" />

            @include('site.inventories._bycategory')
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .card-header .active {
            color: black;
            text-transform: uppercase;
        }
    </style>
@endsection
