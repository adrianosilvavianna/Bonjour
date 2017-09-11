<div class="row">
    <div class="col-md-3 {{ $errors->has('location[zip_code]') ? ' has-error' : '' }}">
        <div class="form-group label-floating ">
            <label class="control-label">CEP</label>
            <input type="text" name="location[zip_code]" id="zip_code" class="form-control" value="{{ old('location[zip_code]') }}">
        </div>
        @if ($errors->has('location[zip_code]'))
            <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('location[zip_code]') }}</strong>
                                    </span>
        @endif
    </div>
    <div class="col-md-7">
        <div class="form-group label-floating focus">
            <label class="control-label">Endere�o</label>
            <input type="text" name="location[address]" class="form-control" id="address">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group label-floating">
            <label class="control-label">N�mero</label>
            <input type="text" name="location[number]" class="form-control" id="address">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group label-floating focus">
            <label class="control-label">Bairro</label>
            <input type="text" class="form-control" name="location[district]" id="district">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group label-floating focus">
            <label class="control-label">Cidade</label>
            <input type="text" class="form-control" name="location[city]" id="city">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group label-floating focus">
            <label class="control-label">Estado</label>
            <input type="text" class="form-control" name="location[uf]" id="uf">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group label-floating focus">
            <label class="control-label">Complemento</label>
            <input type="text" class="form-control" name=location[complement]" id="complement">
        </div>
    </div>
</div>