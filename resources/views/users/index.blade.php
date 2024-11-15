@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <p>
        <a href="{{ route('users.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;">
                            <input type="checkbox" id="select-all">
                        </th>
                        <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        <th>@lang('quickadmin.users.fields.role')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse ($users as $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td><input type="checkbox" name="select[]" value="{{ $user->id }}"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->title ?? '' }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                
                                <!-- Form for delete action -->
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('{{ trans('quickadmin.are_you_sure') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger">@lang('quickadmin.delete')</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('users.mass_destroy') }}';
    </script>
@endsection
