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
            <label for="quot_number" class="form-label">quot number</label>
            <input name="quot_number" id="quot_number" value="{{ $quotation->quot_number ?? old('quot_number') }}" type="text" class="form-control @error('quot_number') is-invalid @enderror">
            @error('quot_number')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="qty" class="form-label">qty</label>
            <input name="qty" id="qty" value="{{ $quotation->qty ?? old('qty') }}" type="text" class="form-control @error('qty') is-invalid @enderror">
            @error('qty')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="tgl_buat" class="form-label">tanggal buat</label>
            <input name="tgl_buat" id="tgl_buat" onkeypress='return isNumberKey(event)' oninput="this.value = formatter(this.value)" value="{{ $quotation->tgl_buat ?? number_format(old('tgl_buat')) }}" type="text" class="form-control @error('tgl_buat') is-invalid @enderror">
            @error('tgl_buat')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="total_price" class="form-label">total price</label>
            <input name="total_price" id="total_price" onkeypress='return isNumberKey(event)' oninput="this.value = formatter(this.value)" value="{{ $quotation->total_price ?? number_format(old('total_price')) }}" type="text" class="form-control @error('total_price') is-invalid @enderror">
            @error('total_price')
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