@extends('layouts.app')

@section('title')
Locales
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4 pb-4">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row border-bottom">
                        <div class="col-sm-6">
                            <p class="card-title">Country</p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p>Country code</p>
                        </div>
                    </div>
                    @foreach ($locales as $locale)
                        <div class="row py-2">
                            <div class="col-sm-6">
                                <p class="d-inline align-middle">{{ ucfirst($locale->name) }}</p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <p class="d-inline align-middle">{{ ucfirst($locale->country_code) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        @include('includes.forms.storeLocale')
    </div>
</div>
@endsection
