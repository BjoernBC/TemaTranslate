<div class="card">
    <div class="card-header">{{ __('Import products') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('product.storeMany') }}">
            @csrf

            <div class="form-group row">
                <label for="import" class="col-md-4 col-form-label text-md-right">{{ __('File to import') }}</label>

                <div class="col-md-6">
                    <input id="import" type="file" class="form-control-file @error('import') is-invalid @enderror" name="import" value="{{ old('import') }}" requiredaria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted"></small>

                    @error('import')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Import products') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
