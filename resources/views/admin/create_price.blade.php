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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Созать цену') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.create_price') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>

                            <div class="col-md-6">
                                <select name="region" id="region" class="form-control">
                                @foreach($regions as $region)
                                    <option value="{{$region->title}}">{{$region->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('region'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                            <div class="col-md-6">
                                <select name="class" id="class" class="form-control">
                                    @foreach($class as $c)
                                        <option value="{{$c->title}}">{{$c->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('class'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('class') }}</strong>
                                    </span>
                                @endif
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