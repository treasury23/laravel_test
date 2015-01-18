@foreach ($publications as $publication)
    <div class="public">
    @foreach($publication->carImage as $image)
         <div class="car-img float-left"><img src="{{$image->file_path}}" width="220px"></div>
    @endforeach
    <div class="car-content">
    <table>
    <tr>
        <th>Область:</th>
        <td>{{$publication->city->area->name}}</td>
    </tr>
        <th>Город:</th>
        <td>{{$publication->city->name}}</td>
    <tr>
        <th>Марка:</th>
        <td>{{$publication->model->brand->name}}</td>
    </tr>
    <tr>
        <th>Модель:</th>
        <td>{{$publication->model->name}}</td>
    </tr>
    <tr>
        <th>Объем двигателя:</th>
        <td>{{$publication->engine}} л.</td>
    </tr>
    <tr>
        <th>Пробег:</th>
        <td>{{$publication->run}} км.</td>
    </tr>
    <tr>
         <th>Количество хозяев:</th>
         <td>{{$publication->owner}}</td>
    </tr>
    </table>
    </div>
    </div>

@endforeach

