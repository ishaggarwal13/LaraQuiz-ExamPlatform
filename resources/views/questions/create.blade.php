@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>

    <form method="POST" action="{{ route('questions.store') }}">
        @csrf
        
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.create')
            </div>

            <div class="panel-body">
                <!-- Topic -->
                <div class="form-group">
                    <label for="topic_id" class="control-label">@lang('Topic*')</label>
                    <select name="topic_id" id="topic_id" class="form-control">
                        <option value="">@lang('Select Topic')</option>
                        @foreach ($topics as $key => $value)
                            <option value="{{ $key }}" {{ old('topic_id') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('topic_id')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Question Text -->
                <div class="form-group">
                    <label for="question_text" class="control-label">@lang('Question text*')</label>
                    <textarea name="question_text" id="question_text" class="form-control" rows="3">{{ old('question_text') }}</textarea>
                    @error('question_text')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Options -->
                @foreach(range(1, 5) as $i)
                    <div class="form-group">
                        <label for="option{{ $i }}" class="control-label">@lang('Option #'.$i)</label>
                        <input type="text" name="option{{ $i }}" id="option{{ $i }}" value="{{ old('option'.$i) }}" class="form-control">
                        @error('option'.$i)
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

                <!-- Correct Option -->
                <div class="form-group">
                    <label for="correct" class="control-label">@lang('Correct Option*')</label>
                    <select name="correct" id="correct" class="form-control">
                        <option value="">@lang('Select Correct Option')</option>
                        @foreach ($correct_options as $key => $value)
                            <option value="{{ $key }}" {{ old('correct') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('correct')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Code Snippet -->
                <div class="form-group">
                    <label for="code_snippet" class="control-label">@lang('Code Snippet')</label>
                    <textarea name="code_snippet" id="code_snippet" class="form-control" rows="5">{{ old('code_snippet') }}</textarea>
                    @error('code_snippet')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Answer Explanation -->
                <div class="form-group">
                    <label for="answer_explanation" class="control-label">@lang('Answer Explanation*')</label>
                    <textarea name="answer_explanation" id="answer_explanation" class="form-control" rows="5">{{ old('answer_explanation') }}</textarea>
                    @error('answer_explanation')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- More Info Link -->
                <div class="form-group">
                    <label for="more_info_link" class="control-label">@lang('More Info Link')</label>
                    <input type="text" name="more_info_link" id="more_info_link" value="{{ old('more_info_link') }}" class="form-control">
                    @error('more_info_link')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">@lang('quickadmin.save')</button>
        </div>
    </form>
@stop
