@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.create')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="name" class="control-label">Name*</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="">
                        @if($errors->has('name'))
                            <div class="help-block text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="email" class="control-label">Email*</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="">
                        @if($errors->has('email'))
                            <div class="help-block text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="">
                        @if($errors->has('password'))
                            <div class="help-block text-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="role_id" class="control-label">Role*</label>
                        <select name="role_id" class="form-control">
                            @foreach ($roles as $key => $role)
                                <option value="{{ $key }}" {{ old('role_id') == $key ? 'selected' : '' }}>{{ $role }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('role_id'))
                            <div class="help-block text-danger">
                                {{ $errors->first('role_id') }}
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-danger">@lang('quickadmin.save')</button>
    </form>
@stop
