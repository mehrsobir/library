@props([
    'value' => null,
    'positions' => null
    ])

<div class="form-group">
    <label for="position_id">Вазифа</label>
    <div class="col-md-9">
        <select class="form-control" name="position_id" id="position_id">
            <option value=""><small class="text-muted">--Лутфан вазифаро интихоб кунед!--</small></option>
            @foreach ($positions as $position)
                <option value="{{$position->id}}" {{ $value == $position->id ? 'selected' : ''}}>{{$position->name_tg}}</option>
            @endforeach         
        </select>
    </div>
    @error('position_id')
        <p class="text-danger"> {{$message}} </p>
    @enderror
</div>