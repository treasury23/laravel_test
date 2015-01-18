@foreach ($publications as $publication)
    <div class="public">
    @foreach($publication->carImage as $image)
            <div class="car-img"><img src="{{$image->file_path}}" width="100px" height="100px"></div>
    @endforeach
    <div class="car-content">
        <div class="model">{{$publication->model->name}}</div>
        <div class="area">{{$publication->city->area->name}}</div>
        {{$publication->model->brand->name}}
    </div>
    </div>

@endforeach

