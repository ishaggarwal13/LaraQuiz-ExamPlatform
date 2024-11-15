@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.roles.title')</h3>

    <!-- Use standard HTML form with method PUT -->
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.edit')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <!-- Label and input for title -->
                        <label for="title" class="control-label">@lang('quickadmin.roles.fields.title')*</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="" value="{{ old('title', $role->title) }}">
                        
                        <p class="help-block"></p>
                        @if($errors->has('title'))
                            <p class="help-block">
                                {{ $errors->first('title') }}
                            </p>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-danger">@lang('quickadmin.update')</button>
    </form>
@stop
