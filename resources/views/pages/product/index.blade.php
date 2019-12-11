@extends('layouts.app')

@section('title')
Products
@endsection

@section('content')
<div class="row">
    @if (Auth::user() && Auth::user()->is_admin)
        <a href="{{ route('product.create') }}" class="nav-link">Add a new product</a>
        <a href="{{ route('import') }}" class="nav-link">Import products</a>
        <a href="{{ route('export') }}" class="nav-link">Export products</a>
    @endif
</div>
<div class="row justify-content-center">
    <div class="row">
        {{ $products->links() }}
    </div>
    <div class="col-lg-12 pb-4">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row border-bottom">
                        <div class="col-sm-1">
                            <p class="card-title">SKU</p>
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
                        $productCount = count($products);
                        $i = 0;
                        // dd($products);
                    @endphp
                    @foreach ($products as $product)
                    {{-- {{ dd($product->translations) }} --}}
                        <div class="row small py-2 {{ ++$i === $productCount ? '' : 'border-bottom' }}">
                            <div class="col-sm-1">
                                <p class="d-inline align-middle">{{  $product->sku }}</p>
                            </div>
                            <div class="col-sm-1">
                                <p class="d-inline align-middle">{{  $product->translations[0]->title }}</p>
                            </div>
                            <div class="col-sm-3">
                                <p class="d-inline align-middle">{{ $product->translations[0]->description }}</p>
                            </div>
                            <div class="col-sm-2">
                                {{-- {{ dd($product->is_priority) }} --}}
                                <p class="d-inline align-middle">{{ $product->is_priority ? 'Yes' : 'No' }}</p>
                            </div>
                            <div class="col-sm-2">
                                <p class="d-inline align-middle">
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
                                <p class="d-inline align-middle">
                                    @php
                                        $translationCount = count($product->translations);
                                        $j = 0;
                                    @endphp
                                    @foreach ($product->translations as $translation)
                                        {{ ucfirst($translation->country_code) }}
                                        {{ ++$j === $translationCount ? '' : '-' }}
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-sm-1">
                                <a href="{{ route('product.index') }}/{{ $product->id }}">
                                    <p class="card-title d-inline align-middle">Show</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{ $products->links() }}
    </div>
</div>
@endsection
