@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $cnt = $users->firstItem(); @endphp
                        @forelse($users as $key => $user)
                            <tr>
                                <th scope="row">{{ $cnt++ }}</th>
                                <td>{{ Str::ucfirst($user->first_name) . ' ' . Str::ucfirst($user->last_name) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ getAppEnumObject($user->role_type)->enum_label }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">No data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="m-auto">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
