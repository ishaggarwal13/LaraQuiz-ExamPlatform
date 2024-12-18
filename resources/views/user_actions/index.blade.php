@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.user-actions.title')</h3>

    <p>
        <!-- You can add content here, like a button or additional information if needed -->
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($user_actions) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th>@lang('quickadmin.user-actions.fields.user')</th>
                        <th>@lang('quickadmin.user-actions.fields.action')</th>
                        <th>@lang('quickadmin.user-actions.fields.action-model')</th>
                        <th>@lang('quickadmin.user-actions.fields.action-id')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse ($user_actions as $user_action)
                        <tr data-entry-id="{{ $user_action->id }}">
                            <td>{{ $user_action->user->name ?? '' }}</td>
                            <td>{{ $user_action->action }}</td>
                            <td>{{ $user_action->action_model }}</td>
                            <td>{{ $user_action->action_id }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
