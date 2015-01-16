<select>
@foreach ($cities as $city)
    <options value="{{$city->id}}">{{ $city->name }}</options>
@endforeach
</select>