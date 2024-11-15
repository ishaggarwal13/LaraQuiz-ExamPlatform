@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.topics.title')</h3>

    <!-- Start of the form -->
    <form method="POST" action="{{ route('topics.store') }}">
        @csrf

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.create')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="title" class="control-label">@lang('quickadmin.topics.fields.title')*</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="">

                        <p class="help-block"></p>
                        @if($errors->has('title'))
                            <p class="help-block text-danger">
                                {{ $errors->first('title') }}
                            </p>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-danger">@lang('quickadmin.save')</button>
    </form>
@stop
