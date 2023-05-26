@props([
    'value' => old('lang')
    ])
<div class="form-group">
    <label for='lang' class="col-md-3 control-label">Забон </label>
    <div class="col-md-9">
        <select class="form-control" name="lang" id="">
            <option value="tg" {{ $value == 'tg' ? 'selected' : ''}}>Тоҷикӣ</option>
            <option value="ru" {{ $value == 'ru' ? 'selected' : ''}}>Русӣ</option>
            <option value="en" {{ $value == 'en' ? 'selected' : ''}}>Англисӣ</option>       
        </select>
    </div>
    @error('lang')
        <p class="text-danger"> {{$message}} </p>
    @enderror
</div>