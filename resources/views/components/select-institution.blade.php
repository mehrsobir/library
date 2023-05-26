@props([
    'value' => null,
    'institutions' => null
    ])

<div class="form-group">
    <label for="institution_id">Ниҳод</label>
    <div class="col-md-9">
        <select class="form-control" name="institution_id" id="institution_id">
            <option value=""><small class="text-muted">--Лутфан ниҳодро интихоб кунед!--</small></option>
            @foreach ($institutions as $institution)
                <option value="{{$institution->id}}" {{ $value == $institution->id ? 'selected' : ''}}>{{$institution->name_tg}}</option>
            @endforeach         
        </select>
    </div>
    @error('institution_id')
        <p class="text-danger"> {{$message}} </p>
    @enderror
</div>