@props([
    'value' => old('type_id'),
    'types' => null
    ])
<div class="form-group">
    <label for="type_id" class="col-md-3 control-label">Шакли кор</label>
    <div class="col-md-9">
        <select class="form-control" name="type_id" id="type_id">
            <option value=""><small class="text-muted">--Лутфан шакли маводро интихоб кунед!--</small></option>
            @foreach ($types as $type)
                <option value="{{$type->id}}" {{ $value == $type->id ? 'selected' : ''}}>{{$type->name_tg}}</option>
            @endforeach         
        </select>
    </div>
    @error('type_id')
        <p class="text-danger"> {{$message}} </p>
    @enderror
</div>