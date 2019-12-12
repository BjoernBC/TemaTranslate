<div class="card">
    <div class="card-header">{{ __('Import products') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
            @csrf

            {{-- <div class="form-group row">
                <label for="fileType" class="col-md-4 col-form-label text-md-right">{{ __('File type') }}</label>

                <div class="col-md-6">
                    <select id="fileType" class="form-control" name="fileType" required>
                        <option value="">File type</option>
                        <option {{ old('fileType') == 1 ? 'selected' : '' }} value="1">
                            JSON
                        </option>
                        <option {{ old('fileType') == 2 ? 'selected' : '' }} value="2">
                            XML
                        </option>
                    </select>
                </div>
            </div> --}}

            <div class="form-group row">
                <label for="import" class="col-md-4 col-form-label text-md-right">{{ __('Import file') }}</label>

                <div class="col-md-8">
                    <input id="import" type="file" class="form-control-file @error('import') is-invalid @enderror" name="import" value="{{ old('import') }}" requiredaria-describedby="fileHelp" required>
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
