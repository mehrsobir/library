@props([
    'value' => null,
    'educations' => null
    ])

<div class="form-group">
    <label for="education_id">Маълумот</label>
    <div class="col-md-9">
        <select class="form-control" name="education_id" id="education_id">
            <option value=""><small class="text-muted">--Лутфан маълумотро интихоб кунед!--</small></option>
            @foreach ($educations as $education)
                <option value="{{$education->id}}" {{ $value == $education->id ? 'selected' : ''}}>{{$education->name_tg}}</option>
            @endforeach         
        </select>
    </div>
    @error('education_id')
        <p class="text-danger"> {{$message}} </p>
    @enderror
</div>

{{-- <div class="form-group">
    <label for="education" class="col-md-3 control-label">Маълумот</label>
    <div class="col-md-9">
        <select class="form-control" name="education" id="education">
            <option value="Миёна" {{ $value == 'Миёна' ? 'selected' : ''}}>Миёна</option>
            <option value="Миёнаи касбӣ" {{ $value == 'Миёнаи касбӣ' ? 'selected' : ''}}>Миёнаи касбӣ</option>
            <option value="Бакалаур" {{ $value == 'Бакалаур' ? 'selected' : ''}}>Бакалаур</option>
            <option value="Мутахассис" {{ $value == 'Мутахассис' ? 'selected' : ''}}>Мутахассис</option> 
            <option value="Магистр" {{ $value == 'Магистр' ? 'selected' : ''}}>Магистр</option>
            <option value="Номзади илм" {{ $value == 'Номзади илм' ? 'selected' : ''}}>Номзади илм</option>
            <option value="PhD" {{ $value == 'PhD' ? 'selected' : ''}}>PhD</option>
            <option value="Доктори илм" {{ $value == 'Доктори илм' ? 'selected' : ''}}>Доктори илм</option> 
        </select>
    </div>
</div> --}}