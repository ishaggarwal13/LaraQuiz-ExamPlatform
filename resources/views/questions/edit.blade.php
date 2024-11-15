@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>

    {{-- Form using Blade's native form components --}}
    <form method="POST" action="{{ route('questions.update', $question->id) }}">
        @csrf
        @method('PUT')

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.edit')
            </div>

            <div class="panel-body">
                {{-- Topic Field --}}
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="topic_id" class="control-label">@lang('quickadmin.questions.fields.topic')</label>
                        <select name="topic_id" id="topic_id" class="form-control">
                            <option value="">@lang('quickadmin.select_topic')</option>
                            @foreach($topics as $key => $value)
                                <option value="{{ $key }}" {{ old('topic_id', $question->topic_id) == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        @error('topic_id')
                            <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Question Text Field --}}
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="question_text" class="control-label">@lang('quickadmin.questions.fields.question-text')</label>
                        <textarea name="question_text" id="question_text" class="form-control" placeholder="">{{ old('question_text', $question->question_text) }}</textarea>
                        @error('question_text')
                            <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Code Snippet Field --}}
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="code_snippet" class="control-label">@lang('quickadmin.questions.fields.code-snippet')</label>
                        <textarea name="code_snippet" id="code_snippet" class="form-control" placeholder="">{{ old('code_snippet', $question->code_snippet) }}</textarea>
                        @error('code_snippet')
                            <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Answer Explanation Field --}}
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="answer_explanation" class="control-label">@lang('quickadmin.questions.fields.answer-explanation')</label>
                        <textarea name="answer_explanation" id="answer_explanation" class="form-control" placeholder="">{{ old('answer_explanation', $question->answer_explanation) }}</textarea>
                        @error('answer_explanation')
                            <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- More Info Link Field --}}
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="more_info_link" class="control-label">@lang('quickadmin.questions.fields.more-info-link')</label>
                        <input type="text" name="more_info_link" id="more_info_link" class="form-control" placeholder="" value="{{ old('more_info_link', $question->more_info_link) }}">
                        @error('more_info_link')
                            <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-danger">@lang('quickadmin.update')</button>
    </form>
@stop
