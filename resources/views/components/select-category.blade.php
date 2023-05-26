@props([
    'value' => old('category_id'),
    'categorys' => null
    ])

<div class="form-group">
    <label for="category_id" class="col-md-3 control-label">Бахш</label>
    <div class="col-md-9">
        <select class="form-control" name="category_id" id="">
            <option value=""><small class="text-muted">--Лутфан бахшро интихоб кунед!--</small></option>
            @foreach ($categorys as $category)
                <option value="{{$category->id}}" {{ $value == $category->id ? 'selected' : ''}}>{{$category->name_tg}}</option>
            @endforeach            
        </select>
    </div>
    @error('category_id')
        <p class="text-danger"> {{$message}} </p>
    @enderror
</div>

{{-- <div class="form-group">
    <label for="category" class="col-md-3 control-label">Бахш </label>
    <div class="col-md-9">
        <select class="form-control" name="category" id="">
            <option value="Иқтисод" {{ $value == 'Иқтисод' ? 'selected' : ''}}>Иқтисод</option>
            <option value="Фалсафа" {{ $value == 'Фалсафа' ? 'selected' : ''}}>Фалсафа</option>
            <option value="Сиёсат" {{ $value == 'Сиёсат' ? 'selected' : ''}}>Сиёсат</option>
            <option value="Таърих" {{ $value == 'Таърих' ? 'selected' : ''}}>Таърих</option>
            <option value="Фарҳанг" {{ $value == 'Фарҳанг' ? 'selected' : ''}}>Фарҳанг</option>          
        </select>
    </div>
</div> --}}