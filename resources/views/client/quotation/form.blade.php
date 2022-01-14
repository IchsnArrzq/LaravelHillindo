<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="profesi_id" class="form-label">profesi id</label>
            <input name="profesi_id" id="profesi_id" value="{{ $profesi->id }}" class="form-control @error('profesi_id') is-invalid @enderror">
            @error('profesi_id')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="name" class="form-label">name</label>
            <input name="name" id="name" value="{{ $quotation->name ?? old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror">
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
            <input name="price_low" id="price_low" onkeypress='return isNumberKey(event)' oninput="this.value = formatter(this.value)" value="{{ $quotation->price_low ?? number_format(old('price_low')) }}" type="text" class="form-control @error('price_low') is-invalid @enderror">
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
            <input name="price_medium" id="price_medium" onkeypress='return isNumberKey(event)' oninput="this.value = formatter(this.value)" value="{{ $quotation->price_medium ?? number_format(old('price_medium')) }}" type="text" class="form-control @error('price_medium') is-invalid @enderror">
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
            <input name="price_high" id="price_high" onkeypress='return isNumberKey(event)' oninput="this.value = formatter(this.value)" value="{{ $quotation->price_high ?? number_format(old('price_high')) }}" type="text" class="form-control @error('price_high') is-invalid @enderror">
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
            <input name="margin" id="margin" onkeypress='return isNumberKey(event)' oninput="this.value = formatter(this.value)" value="{{ $quotation->margin ?? number_format(old('margin')) }}" type="text" class="form-control @error('margin') is-invalid @enderror">
            @error('margin')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
</div>
@push('script')
<script>
    const formatter = function(num) {
        var str = num.toString().replace("", ""),
            parts = false,
            output = [],
            i = 1,
            formatted = null;
        if (str.indexOf(".") > 0) {
            parts = str.split(".");
            str = parts[0];
        }
        str = str.split("").reverse();
        for (var j = 0, len = str.length; j < len; j++) {
            if (str[j] != ",") {
                output.push(str[j]);
                if (i % 3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
            }
        }
        formatted = output.reverse().join("");
        return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
@endpush