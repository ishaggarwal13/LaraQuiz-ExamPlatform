@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.results.title')</h3>
    
    <form method="POST" action="{{ route('results.store') }}">
        @csrf

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.create')
            </div>

            <div class="panel-body">
                <!-- User Selection -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="user_id" class="control-label">@lang('User*')</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach($users as $id => $name)
                                <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Question Selection -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="question_id" class="control-label">@lang('Question*')</label>
                        <select name="question_id" id="question_id" class="form-control">
                            @foreach($questions as $id => $question)
                                <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $question }}</option>
                            @endforeach
                        </select>
                        @error('question_id')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Correct Answer Field -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="correct" class="control-label">@lang('Correct*')</label>
                        <input type="text" name="correct" id="correct" value="{{ old('correct') }}" class="form-control" placeholder="">
                        @error('correct')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Date Field -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="date" class="control-label">@lang('Date*')</label>
                        <input type="text" name="date" id="date" value="{{ old('date') }}" class="form-control datetime" placeholder="">
                        @error('date')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-danger">@lang('quickadmin.save')</button>
    </form>
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js/timepicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "hh:mm:ss"
        });
    </script>
@stop
