@extends('layouts.app')

@section('title')
{{ $product->translations[0]->title }}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 pb-4">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row border-bottom">
                        {{-- <div class="col-sm-1">
                            <p class="card-title"></p>
                        </div> --}}
                        {{-- <div class="col-sm-1">
                            <p class="card-title">Id</p>
                            optional?
                        </div> --}}
                        <div class="col-sm-1">
                            <p class="card-title">Locale</p>
                        </div>
                        <div class="col-sm-1">
                            <p class="card-title">Title</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="card-title">Description</p>
                        </div>
                        <div class="col-sm-2">
                            <p class="card-title">List</p>
                        </div>
                        <div class="col-sm-2">
                            <p class="card-title">Contains</p>
                        </div>
                        <div class="col-sm-2">
                                <p class="card-title">User</p>
                            </div>
                        <div class="col-sm-1">
                            <p class="card-title">Actions</p>
                        </div>
                    </div>
                    @php
                        $numItems = count($product->translations);
                        $i = 0;
                    @endphp
                    @foreach ($product->translations as $translation)
                        <div class="row py-2 {{ ++$i === $numItems ? '' : 'border-bottom' }}">
                            {{-- <div class="col-sm-1">
                                <input type="checkbox">
                            </div> --}}
                            {{-- <div class="col-sm-1">
                                <p class="d-inline align-middle">{{  $translation->id }}</p>
                                optional?
                            </div> --}}
                            <div class="col-sm-1">
                                <p class="d-inline align-middle">{{  $translation->country_code }}</p>
                            </div>
                            <div class="col-sm-1">
                                <p class="d-inline align-middle">{{  $translation->title }}</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="d-inline align-middle">{{  $translation->description }}</p>
                            </div>
                            <div class="col-sm-2">
                                <p class="d-inline align-middle">{{ $translation->description_list }}</p>
                            </div>
                            <div class="col-sm-2">
                                <p class="d-inline align-middle">{{ $translation->package_contains }}</p>
                            </div>
                            <div class="col-sm-1">
                                <p class="d-inline align-middle">{{ $translation->translated_by }}</p>
                            </div>
                            <div class="col-sm-1">
                                <a href="#" class="">Edit</a>
                                /
                                <a href="#" class="">Delete</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
