@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.results.title')</h3>

    <form method="POST" action="{{ route('results.update', $result->id) }}">
        @csrf
        @method('PUT')

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.edit')
            </div>

            <div class="panel-body">
                <!-- User Selection -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="user_id" class="control-label">@lang('quickadmin.results.fields.user')</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">@lang('quickadmin.select_user')</option>
                            @foreach ($users as $id => $name)
                                <option value="{{ $id }}" {{ old('user_id', $result->user_id) == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('user_id'))
                            <p class="help-block text-danger">{{ $errors->first('user_id') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Question Selection -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="question_id" class="control-label">@lang('quickadmin.results.fields.question')</label>
                        <select name="question_id" id="question_id" class="form-control">
                            <option value="">@lang('quickadmin.select_question')</option>
                            @foreach ($questions as $id => $question)
                                <option value="{{ $id }}" {{ old('question_id', $result->question_id) == $id ? 'selected' : '' }}>
                                    {{ $question }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('question_id'))
                            <p class="help-block text-danger">{{ $errors->first('question_id') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Correct Answer Field -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="correct" class="control-label">@lang('quickadmin.results.fields.correct')</label>
                        <input type="text" name="correct" id="correct" class="form-control" value="{{ old('correct', $result->correct) }}" placeholder="">
                        @if ($errors->has('correct'))
                            <p class="help-block text-danger">{{ $errors->first('correct') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Date Field -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="date" class="control-label">@lang('quickadmin.results.fields.date')</label>
                        <input type="text" name="date" id="date" class="form-control datetime" value="{{ old('date', $result->date) }}" placeholder="">
                        @if ($errors->has('date'))
                            <p class="help-block text-danger">{{ $errors->first('date') }}</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-danger">@lang('quickadmin.update')</button>
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
