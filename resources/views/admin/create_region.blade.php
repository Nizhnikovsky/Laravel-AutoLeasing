@extends('index')
<div class="container-fluid">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.index')}}">На админпанель</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><strong>{{$title}}</strong></a>
        </li>
    </ul>
<div>
    Вывести табличку с существующими регионами
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Созать регион') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.create_region') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>

                            <div class="col-md-6">
                                <input id="region" type="text" class="form-control{{ $errors->has('region') ? ' is-invalid' : '' }}" name="region" value="{{ old('region') }}" required autofocus>

                                @if ($errors->has('region'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <select name="title" id="title" class="form-control">
                                    @foreach($capitals as $capital)
                                        <option value="{{$capital->city}}">{{$capital->city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" {{('checked')}}  value={{'1'}} > {{ __('Опубликовать') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Создать') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>