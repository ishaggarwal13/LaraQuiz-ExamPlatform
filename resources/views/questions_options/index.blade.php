@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions-options.title')</h3>

    <p>
        <a href="{{ route('questions_options.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($questions_options) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('quickadmin.questions-options.fields.question')</th>
                        <th>@lang('quickadmin.questions-options.fields.option')</th>
                        <th>@lang('quickadmin.questions-options.fields.correct')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if ($questions_options->isNotEmpty())
                        @foreach ($questions_options as $questions_option)
                            <tr data-entry-id="{{ $questions_option->id }}">
                                <td></td>
                                <td>{{ $questions_option->question->question_text ?? '' }}</td>
                                <td>{{ $questions_option->option }}</td>
                                <td>{{ $questions_option->correct ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('questions_options.show', $questions_option->id) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    <a href="{{ route('questions_options.edit', $questions_option->id) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    
                                    <!-- Replace the form with standard HTML -->
                                    <form 
                                        style="display: inline-block;" 
                                        method="POST" 
                                        action="{{ route('questions_options.destroy', $questions_option->id) }}" 
                                        onsubmit="return confirm('{{ trans('quickadmin.are_you_sure') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger">@lang('quickadmin.delete')</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('questions_options.mass_destroy') }}';
    </script>
@endsection
