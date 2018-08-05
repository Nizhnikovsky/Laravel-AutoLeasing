@extends('index')
@section('content')
<main role="main">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="/public/img/carousel/3.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Наши автомобили.</h1>
                        <p>Пользуясь нашим сервисом Вы можете быть уверенны в исправности автомобиля.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Рассчитать стоимость аренды</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="/public/img/carousel/2.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Круглосуточная поддержка.</h1>
                        <p>Мы готовы круглосуточно оказывать вам как информационную так и любую другую поддержку.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Связаться с нами</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="/public/img/carousel/6.jpg" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>Надежная страховка.</h1>
                        <p>Пользуясь нашей услугой Вы можете быть уверенны при любых аварийных ситуациях.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Подробнее</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    @if(isset($_POST['submit']))
    <div class="alert alert-success" role="alert">
        <strong>Стоимость аренды:{{$price}}USD</strong>
    </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-offset-3 col-md-6">
                <div class="card">
                        <form method="POST" action="{{ route('index') }}" class="form-horizontal">
                            @csrf
                            <span class="heading">Расчет заказа</span>
                            <p>Место подачи автомобиля:</p>
                            <div class="form-group">
                                <label for="region"></label>
                                <div class="col-md-12">
                                    <select class="form-control" id="region" size="1" name="region">
                                        <option selected value="Выберите город" disabled>Выберите город подачи автомобиля</option>
                                        @foreach($regions as $region)
                                            <option value="{{$region->title}}">{{$region->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="brand"></label>
                                <div class="col-md-12">
                                    <select class="form-control" id="brand" size="1" name="brand">
                                        <option selected value="Выберите бренд" disabled>Выберите автомобиль</option>
                                    @foreach($autos as $auto)
                                        <option value="{{$auto->brand}}{{$auto->model}}">{{$auto->brand}}{{' '}}{{$auto->model}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex flex-row">
                                        <div class="p-2">
                                            <label for="date"></label>
                                            <div class="col-md-12">
                                                <input type="date" name="date" id="date" class="form-control" placeholder="Выберите дату">
                                            </div>
                                        </div>
                                    <div class="p-2">
                                        <div class="col-md-12">
                                            <label for="time"></label>
                                            <select class="form-control" id="time" size="1" name="time">
                                                @for($i = 0; $i < 24; $i++)
                                                    @if($i<10)
                                                        <option value="0{{ $i }}.00">
                                                            0{{ $i }}.00
                                                        </option>
                                                    @else
                                                        <option value="{{ $i }}.00">
                                                            {{ $i }}.00
                                                        </option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Место возврата автомобиля:</p>
                            <div class="form-group row">
                                <label for="region2"></label>
                                <div class="col-md-12">
                                    <select class="form-control" id="region2" size="1" name="region2">
                                        <option selected value="Выберите город" disabled>Выберите город возврата автомобиля</option>
                                        @foreach($regions as $region)
                                            <option value="{{$region->title}}">{{$region->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex flex-row">
                                    <div class="p-2">
                                        <label for="date2"></label>
                                        <div class="col-md-12">
                                            <input type="date" name="date2" id="date2" class="form-control" placeholder="Выберите дату">
                                        </div>
                                    </div>
                                    <div class="p-2">
                                         <div class="col-md-12">
                                             <label for="time2"></label>
                                             <select class="form-control" id="time2" size="1" name="time2">
                                                 @for($i = 0; $i < 24; $i++)
                                                     @if($i<10)
                                                         <option value="0{{ $i }}.00">
                                                             0{{ $i }}.00
                                                         </option>
                                                     @else
                                                         <option value="{{ $i }}.00">
                                                             {{ $i }}.00
                                                         </option>
                                                     @endif
                                                 @endfor
                                             </select>
                                         </div>
                                    </div>
                                </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="submit">
                                        {{ __('Создать') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection