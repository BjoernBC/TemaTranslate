@extends('layouts.app')

@section('title')
Translators
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <a class="nav-link" href="{{ route('register') }}">Add a new translator</a>
                <a class="nav-link float-right" href="#">Remove translators</a>
                <a class="nav-link float-right" href="#">Make admin</a>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row border-bottom">
                                    <div class="col-sm-6">
                                        <p class="card-title">Leaderboard</p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="card-title text-center">Locale</p>
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
</div>
@endsection
