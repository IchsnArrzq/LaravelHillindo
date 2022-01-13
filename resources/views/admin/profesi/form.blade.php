<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="user_id" class="form-label">user id</label>
            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                @foreach($clients as $client)
                <option @if($client->id == $client->id) selected @endif value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
            @error('user_id')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="name" class="form-label">name</label>
            <input name="name" id="name" value="{{ $profesi->name ?? old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="price_low" class="form-label">price low</label>
            <input name="price_low" id="price_low" value="{{ $profesi->price_low ?? old('price_low') }}" type="text" class="form-control @error('price_low') is-invalid @enderror">
            @error('price_low')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="price_medium" class="form-label">price medium</label>
            <input name="price_medium" id="price_medium" value="{{ $profesi->price_medium ?? old('price_medium') }}" type="text" class="form-control @error('price_medium') is-invalid @enderror">
            @error('price_medium')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="price_high" class="form-label">price high</label>
            <input name="price_high" id="price_high" value="{{ $profesi->price_high ?? old('price_high') }}" type="text" class="form-control @error('price_high') is-invalid @enderror">
            @error('price_high')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="margin" class="form-label">margin</label>
            <input name="margin" id="margin" value="{{ $profesi->margin ?? old('margin') }}" type="text" class="form-control @error('margin') is-invalid @enderror">
            @error('margin')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
</div>