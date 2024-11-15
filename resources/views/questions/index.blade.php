@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>

    <p>
        {{-- Create New Question Button --}}
        <a href="{{ route('questions.create') }}" class="btn btn-success">{{ trans('quickadmin.add_new') }}</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($questions) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('quickadmin.questions.fields.topic')</th>
                        <th>@lang('quickadmin.questions.fields.question-text')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($questions) > 0)
                        @foreach ($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">
                                <td></td>
                                <td>{{ $question->topic->title ?? '' }}</td>
                                <td>{!! $question->question_text !!}</td>
                                <td>
                                    {{-- View Button --}}
                                    <a href="{{ route('questions.show', $question->id) }}" class="btn btn-xs btn-primary">{{ trans('quickadmin.view') }}</a>
                                    {{-- Edit Button --}}
                                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-xs btn-info">{{ trans('quickadmin.edit') }}</a>
                                    {{-- Delete Form --}}
                                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('{{ trans('quickadmin.are_you_sure') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger">{{ trans('quickadmin.delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('questions.mass_destroy') }}';
    </script>
@endsection
