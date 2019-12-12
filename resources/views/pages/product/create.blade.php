@extends('layouts.app')

@section('title')
Products
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        @include('includes.forms.storeProduct')
    </div>
    <div class="col-lg-4">
        @include('includes.forms.importProducts')
    </div>
</div>
@endsection
