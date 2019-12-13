@extends('layouts.app')

@section('title')
{{-- Products --}}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="{{-- d-none --}}">
        {{-- {{ $products->links() }} --}}
    </div>
    <div class="col-lg-12 pb-4">
        @php
            // $prioList = $products->sortByDesc('is_priority');
            // dd($products);
            $translated = false;
        @endphp
        @foreach ($products as $product)
            @foreach ($product->translations as $translation)
                @if ($translation->country_code == Auth::User()->country_code)
                    @php
                        $translated = true;
                    @endphp
                @endif
            @endforeach
            {{-- @if ($translated === false ) --}}
                <form id="create_translation" method="POST" action="{{ route('product.translate') }}">
                    @csrf

                    {{-- Hidden fields --}}
                    <input type="hidden" name="country_code" value="{{ Auth::User()->country_code }}">
                    <input type="hidden" name="updated_by" value="{{ Auth::User()->email }}">
                    <input type="hidden" name="product_sku" value="{{ $product->sku }}">

                    <div class="row d-flex justify-content-between">
                        <div>
                            <img src="https://picsum.photos/250/250" class="rounded">
                        </div>
                        <div class="d-flex flex-column justify-content-start">
                            <input class="btn btn-lg btn-block btn-success mb-2" type="submit" value="Save (ctrl+arrowDown)">
                            <a href="" class="btn btn-lg btn-block btn-outline-danger">Skip (ctrl+arrowRight)</a>
                        </div>
                    </div>
                    <div class="row form-field d-flex justify-content-between mb-3">
                        <div class="col-lg-6">
                            <p class="font-weight-bold pt-2 my-0">Title</p>
                            <p>{{ $product->translations[0]->title }}</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-between">
                                <label for="title" class="font-weight-bold pt-2 my-0">{{ __('Title') }}</label>
                                <div class="small d-inline"><i class="inputLength">0</i> / <span class="max">{{ $maxTitle }}</span></div>
                            </div>

                            <div>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Product Title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row form-field d-flex justify-content-between mb-3">
                        <div class="col-lg-6">
                            <p class="font-weight-bold pt-2 my-0">Package Contains</p>
                            <p>{{ $product->translations[0]->package_contains }}</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-between">
                                <label for="package_contains" class="font-weight-bold pt-2 my-0">{{ __('Package Contains') }}</label>
                                <div class="small d-inline"><i class="inputLength">0</i> / <span class="max">{{ $maxContains }}</span></div>
                            </div>

                            <div>
                                <input id="package_contains" type="text" class="form-control @error('package_contains') is-invalid @enderror" name="package_contains" value="{{ old('package_contains') }}" autocomplete="package_contains" placeholder="Package Contains">

                                @error('package_contains')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row form-field d-flex justify-content-between mb-3">
                        <div class="col-lg-6">
                            <p class="font-weight-bold pt-2 my-0">Description List</p>
                            <p>{{ $product->translations[0]->description_list }}</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-between">
                                <label for="description_list" class="font-weight-bold pt-2 my-0">{{ __('Description List') }}</label>
                                <div class="small d-inline"><i class="inputLength">0</i> / <span class="max">{{ $maxDescList }}</span></div>
                            </div>

                            <div>
                                <input id="description_list" type="text" class="form-control @error('description_list') is-invalid @enderror" name="description_list" value="{{ old('description_list') }}" autocomplete="description_list" placeholder="Description List">

                                @error('description_list')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row form-field d-flex justify-content-between mb-3">
                        <div class="col-lg-6">
                            <p class="font-weight-bold pt-2 my-0">Description</p>
                            <p>{{ $product->translations[0]->description }}</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-between">
                                <label for="description" class="font-weight-bold pt-2 my-0">{{ __('Description') }}</label>
                                <div class="small d-inline"><i class="inputLength">0</i> / <span class="max">{{ $maxDesc }}</span></div>
                            </div>

                            <div>
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required placeholder="Description" rows="6">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            {{-- @else --}}
                {{-- <p class="text-center">No translations queued!</p> --}}
            {{-- @endif --}}
        @endforeach
    </div>
</div>
@endsection
