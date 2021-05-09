@extends('layouts.admin_sidebar')

@section('content')

<div class="block-content">
    @if (auth()->user()->is_admin)
    <div class="block-content block-content-full">
        <a href="{{ route('admin.managers.create') }}" type="button" class="btn btn-alt-info">Create
            Manager</a>
    </div>
    @endif

    <div class="table-responsive" v-if="seeSoftware">
        <table class="js-table-sections table table-hover js-table-sections-enabled" v-if="investments.length > 0">
            <thead>
                <tr style="color: #3f9ce8;">
                    <th class="text-capitalize">#</th>
                    <th class="text-capitalize">Email</th>
                    <th class="text-capitalize">Name</th>
                </tr>
            </thead>
            <tbody class="js-table-sections-header tridax-grey">

                @foreach ($users as $user)

                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    @if (auth()->user()->is_admin)
                    <td>
                        <div class="row">
                            <a class="btn" type="button" href="{{ route('admin.managers.edit', $user->id) }}">
                                <i class="si si-eye"></i> View
                            </a> &nbsp;
                            <form id="delete" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this user')"
                                    data-toggle="tooltip" data-placement="top" title="Delete user"> <i
                                        class="fa fa-trash text-danger js-tooltip-enabled">

                                    </i> Delete</button>
                            </form>
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
@endsection
