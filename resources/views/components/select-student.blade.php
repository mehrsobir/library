@props([
    'students' => null,
    'value' => old('type_id')
    ])
<div class="form-group">
    <label for="student_id" class="col-md-3 control-label">Student</label>
    <div class="col-md-9">
        <select class="form-control" name="student_id" id="student_id">
            <option value=""><small class="text-muted">--Select Student!--</small></option>
            @foreach ($students as $student)
                <option value="{{$student->id}}" {{ $value == $student->id ? 'selected' : ''}}>{{$student->name}}</option>
            @endforeach         
        </select>
    </div>
    @error('student_id')
        <p class="text-danger"> {{$message}} </p>
    @enderror
</div>