<div class="card">
    <div class="card-header">{{ __('Add product') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('product.store') }}">
            @csrf

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Denmark">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus placeholder="Denmark">

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description_list" class="col-md-4 col-form-label text-md-right">{{ __('Description List') }}</label>

                <div class="col-md-6">
                    <input id="description_list" type="text" class="form-control @error('description_list') is-invalid @enderror" name="description_list" value="{{ old('description_list') }}" required autocomplete="description_list" autofocus placeholder="Denmark">

                    @error('description_list')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="package_contains" class="col-md-4 col-form-label text-md-right">{{ __('Package Contains') }}</label>

                <div class="col-md-6">
                    <input id="package_contains" type="text" class="form-control @error('package_contains') is-invalid @enderror" name="package_contains" value="{{ old('package_contains') }}" required autocomplete="package_contains" autofocus placeholder="Denmark">

                    @error('package_contains')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="country" class="col-md-4 col-form-label text-md-right">Language</label>

                <div class="col-md-6">
                    <select id="country" class="form-control" name="country" required>
                        <option value="">Language</option>
                        @foreach ($locales as $locale)
                            <option value="{{ $locale->country_code }}">
                                {{ $locale->name }}
                            </option>
                        @endforeach

                    </select>
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
