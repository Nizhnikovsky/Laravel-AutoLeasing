@extends('index')
<div class="container">
    <div class="col-md-6">
        <div class="list-group">
            <a href="{{route('admin.create_auto')}}" class="list-group-item list-group-item-info">Создать авто</a>
            <a href="{{route('admin.create_price')}}"class="list-group-item list-group-item-info">Создать цену</a>
            <a href="{{route('admin.create_region')}}"class="list-group-item list-group-item-info">Создать регион</a>
            <a href="{{'/'}}"class="list-group-item list-group-item-info">Посчитать стоимость аренды авто</a>

        </div>
        <div>
            <h3 align="center" style="color: #1d1f21">Список автомобилей</h3>
            <div class="container">
                @if($autos)
                        <table class="table table-info" style="background:white">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>ID Авто</th>
                                    <th>Бренд</th>
                                    <th>Модель</th>
                                    <th>Тип трансмиссии</th>
                                    <th>Цвет</th>
                                    <th>Объем двигателя</th>
                                    <th>Класс автомобиля</th>
                                    <th>Отображается</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($autos as $k =>$auto)
                                <tr>
                                    <td>{{$auto->id}}</td>
                                    <td>{{$auto->brand}}</td>
                                    <td>{{$auto->model}}</td>
                                    <td>{{($auto->transmission)?'Auto':'Manual'}}</td>
                                    <td>{{$auto->color}}</td>
                                    <td>{{$auto->volume}}</td>
                                    <td>{{$auto->class}}</td>
                                    <td>{{!($auto->status)?'Не отображается':'Отображается'}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                @endif
            </div>
        </div>
    </div>
</div>