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
        <div class="card">
            <div class="card-header">{{ __('Add locale') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('locale') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Denmark">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('Country code') }}</label>

                        <div class="col-md-6">
                            <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="DK">

                            @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add locale') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
