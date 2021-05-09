@extends('layouts.admin_sidebar')

@section('content')

<div class="block-content">

    <div class="table-responsive" v-if="seeSoftware">
        <table class="js-table-sections table table-hover js-table-sections-enabled" v-if="investments.length > 0">
            <thead>
                <tr style="color: #3f9ce8;">
                    <th class="text-capitalize">#</th>
                    <th class="text-capitalize">Email</th>
                    <th class="text-capitalize">Name</th>
                    <th class="text-capitalize">Total Approved txn</th>
                </tr>
            </thead>
            <tbody class="js-table-sections-header tridax-grey">

                @foreach ($users as $user)

                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->total_transactions }}</td>
                    <td>
                        <di class="row">

                            <form id="delete" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this user')" data-toggle="tooltip"
                                    data-placement="top" title="Delete user"> <i
                                        class="fa fa-trash text-danger js-tooltip-enabled">

                                    </i> Delete</button>
                            </form>
                        </di>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
@endsection
