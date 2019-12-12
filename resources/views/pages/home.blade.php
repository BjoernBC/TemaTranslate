@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="body col-md-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-4 pb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Translations queued</h5>
                        <p class="card-text text-center lead">
                            {{ count($products) }}
                        </p>
                        @if (Auth::user() && Auth::user()->is_admin)
                            <a href="{{ route('export') }}" class="btn btn-success float-right ml-3">Export</a>
                            <a href="{{ route('product.create') }}" class="btn btn-success float-right ml-3">Import</a>
                        @endif
                        @if (count($products))
                            <a href="{{ route('product.translate') }}" class="btn btn-success float-right">Start</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Avg time/translation</h5>
                        <p class="card-text text-center">{ calculate avg time/translation }</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Translations checks queued</h5>
                        <p class="card-text text-center">{ Number of translations checks }</p>
                        <a href="{{-- {{ route('translate.control') }} --}}" class="btn btn-success float-right">Start</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row border-bottom">
                                <div class="col-sm-6">
                                    <h5 class="card-title">Leaderboard</h5>
                                </div>
                                <div class="col-sm-2 text-center">
                                    <p>Country</p>
                                </div>
                                <div class="col-sm-2 text-center">
                                    <p>Total</p>
                                </div>
                                <div class="col-sm-2 text-right">
                                    <p>Avg/translation</p>
                                </div>
                            </div>
                            @php
                                $translators = $users->where('is_admin', false);
                                $numItems = count($translators);
                                $i = 0;
                            @endphp
                            @foreach ($translators as $translator)
                                <div class="row {{ ++$i === $numItems ? '' : 'border-bottom' }} py-2">
                                    <div class="col-sm-6">
                                        <p class="d-inline align-middle">{{ ucfirst($translator->name) }}</p>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <p class="d-inline align-middle">{{ ucfirst($translator->country_code) }}</p>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <p class="d-inline align-middle">3.551</p>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                        <p class="d-inline align-middle">0:32 min</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
