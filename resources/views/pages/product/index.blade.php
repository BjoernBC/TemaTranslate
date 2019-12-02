@extends('layouts.app')

@section('title')
Products
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 pb-4">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row border-bottom">
                        <div class="col-sm-1">
                            <p class="card-title">Id</p>
                        </div>
                        <div class="col-sm-1">
                            <p class="card-title">Title</p>
                        </div>
                        <div class="col-sm-3">
                            <p class="card-title">Description</p>
                        </div>
                        <div class="col-sm-2">
                            <p class="card-title">Prioritized</p>
                        </div>
                        <div class="col-sm-2">
                            <p class="card-title">Level</p>
                        </div>
                        <div class="col-sm-2">
                            <p class="card-title">Translated Into</p>
                        </div>
                        <div class="col-sm-1">
                            <p class="card-title"></p>
                        </div>
                    </div>
                    @php
                        $numItems = count($products);
                        $i = 0;
                    @endphp
                    @foreach ($products as $product)
                        <div class="row py-2 {{ ++$i === $numItems ? '' : 'border-bottom' }}">
                            <div class="col-sm-1">
                                <p>{{  $product->id }}</p>
                            </div>
                            <div class="col-sm-1">
                                <p>{{  $product->translations[0]->title }}</p>
                            </div>
                            <div class="col-sm-3">
                                <p>{{  $product->translations[0]->description }}</p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{ $product->is_priority ? 'Yes' : 'No' }}</p>
                            </div>
                            <div class="col-sm-2">
                                <p>
                                    @switch($product->translation_level)
                                        @case(1)
                                            Light
                                            @break
                                        @case(2)
                                            Normal
                                            @break
                                        @case(3)
                                            Advanced
                                            @break
                                    @endswitch
                                </p>
                            </div>
                            <div class="col-sm-2">
                                <p>
                                    @php
                                        $numItems = count($product->translations);
                                        $i = 0;
                                    @endphp
                                    @foreach ($product->translations as $translation)
                                        {{ ucfirst($translation->country_code) }}
                                        {{ ++$i === $numItems ? '' : '-' }}
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-sm-1">
                                <a href="products/{{  $product->id }}">
                                    <p class="card-title">Show</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        @include('includes.forms.storeProduct')
    </div>
</div>
@endsection
