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
                <div class="card-header">{{ __('Создать авто') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.create_auto') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Brand') }}</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" value="{{ old('brand') }}" required autofocus>

                                @if ($errors->has('brand'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ old('model') }}" required autofocus>

                                @if ($errors->has('model'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="transmission" class="col-md-4 col-form-label text-md-right">{{ __('Transmission') }}</label>

                            <div class="col-md-6">
                                <select name="transmission" id="transmission" class="form-control">
                                    <option value="{{1}}">{{'Manual'}}</option>
                                    <option value="{{0}}">{{'Auto'}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{ old('color') }}" required autofocus>

                                @if ($errors->has('color'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="volume" class="col-md-4 col-form-label text-md-right">{{ __('Volume') }}</label>

                            <div class="col-md-6">
                                <input id="volume" type="text" class="form-control{{ $errors->has('volume') ? ' is-invalid' : '' }}" name="volume" value="{{ old('volume') }}" required autofocus>

                                @if ($errors->has('volume'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('volume') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                            <div class="col-md-6">
                                <select name="class" id="class" class="form-control">
                                    @foreach($class as $cl)
                                        <option value="{{$cl->title}}">{{$cl->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" {{('checked')}}  value={{1}}> {{ __('Опубликовать') }}
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