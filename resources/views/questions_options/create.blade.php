@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions-options.title')</h3>

    <form method="POST" action="{{ route('questions_options.store') }}">
        @csrf

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.create')
            </div>

            <div class="panel-body">
                <!-- Question Dropdown -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="question_id" class="control-label">@lang('quickadmin.questions-options.fields.question')</label>
                        <select name="question_id" id="question_id" class="form-control">
                            @foreach($questions as $id => $question)
                                <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>
                                    {{ $question }}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('question_id'))
                            <p class="help-block">{{ $errors->first('question_id') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Option Input -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="option" class="control-label">@lang('quickadmin.questions-options.fields.option')</label>
                        <input type="text" name="option" id="option" class="form-control" placeholder="Enter option" value="{{ old('option') }}">
                        @if($errors->has('option'))
                            <p class="help-block">{{ $errors->first('option') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Correct Checkbox -->
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="correct" class="control-label">@lang('quickadmin.questions-options.fields.correct')</label>
                        <input type="hidden" name="correct" value="0">
                        <input type="checkbox" name="correct" id="correct" value="1" class="form-control" {{ old('correct', 0) ? 'checked' : '' }}>
                        @if($errors->has('correct'))
                            <p class="help-block">{{ $errors->first('correct') }}</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-danger">@lang('quickadmin.save')</button>
    </form>
@stop
