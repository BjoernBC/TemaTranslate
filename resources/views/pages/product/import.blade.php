{{-- unused --}}
@extends('layouts.app')

@section('title')
Import products
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        @include('includes.forms.importProducts')
    </div>
</div>
@endsection
