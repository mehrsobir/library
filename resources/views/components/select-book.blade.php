@props([
    'books' => null,
    'value' => old('type_id')
    ])

<div class="form-group">
    <label for="book_id" class="col-md-3 control-label">Book</label>
    <div class="col-md-9">
        <select class="form-control" name="book_id" id="">
            <option value=""><small class="text-muted">--Select Book!--</small></option>
            @foreach ($books as $book)
                <option value="{{$book->id}}" {{ $value == $book->id ? 'selected' : ''}}>{{$book->title}}</option>
            @endforeach            
        </select>
    </div>
    @error('book_id')
        <p class="text-danger"> {{$message}} </p>
    @enderror
</div>

