<option>{{$default_option}}</option>
@foreach ($options as $option)
    <option value="{{$option->id}}">{{ $option->name }}</option>
@endforeach
