<div class="card">
    <div class="card-header">{{ __('Add product') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('product.store') }}">
            @csrf

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Product Title">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="SKU" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>

                <div class="col-md-6">
                    <input id="SKU" type="text" class="form-control @error('SKU') is-invalid @enderror" name="SKU" value="{{ old('SKU') }}" required autofocus placeholder="Product SKU">

                    @error('SKU')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="package_contains" class="col-md-4 col-form-label text-md-right">{{ __('Package Contains') }}</label>

                <div class="col-md-6">
                    <input id="package_contains" type="text" class="form-control @error('package_contains') is-invalid @enderror" name="package_contains" value="{{ old('package_contains') }}" autocomplete="package_contains" autofocus placeholder="Item 1, Item 2, ...">

                    @error('package_contains')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description_list" class="col-md-4 col-form-label text-md-right">{{ __('Description List') }}</label>

                <div class="col-md-6">
                    <input id="description_list" type="text" class="form-control @error('description_list') is-invalid @enderror" name="description_list" value="{{ old('description_list') }}" autocomplete="description_list" autofocus placeholder="Description List">

                    @error('description_list')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus placeholder="Description">{{ old('description') }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="translation_level" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                <div class="col-md-6">
                    <select id="translation_level" class="form-control" name="translation_level" required>
                        <option value="">Translation level</option>
                        <option {{ old('translation_level') == 1 ? 'selected' : '' }} value="1">
                            Light
                        </option>
                        <option {{ old('translation_level') == 2 ? 'selected' : '' }} value="2">
                            Normal
                        </option>
                        <option {{ old('translation_level') == 3 ? 'selected' : '' }} value="3">
                            Advanced
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="is_priority" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>

                <div class="col-md-6">
                    <input id="is_priority" type="checkbox" class="form-control @error('is_priority') is-invalid @enderror" name="is_priority" value="{{ old('is_priority') ? old('is_priority') : '1' }}" autofocus>

                    @error('is_priority')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add product') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
