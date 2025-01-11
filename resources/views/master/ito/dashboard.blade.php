@extends('layout.main')

@section('title_page')
    ITO
@endsection

@section('breadcrumb_title')
    <small>master / ito / dashboard</small>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <x-master-ito-links page="dashboard" />
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
