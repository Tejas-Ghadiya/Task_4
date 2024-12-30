@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Users details</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">

                        <div class="user-table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Admin</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Token</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($find as $item)
                                    <tr>
                                        <td style="width: 1%"> {{ $item->is_admin ? 'Yes' : 'No' }}</td>
                                        <td style="width: 1%"> {{ $item->name }}</td>
                                        <td style="width: 1%">{{ $item->email }}</td>
                                        <td style="width: -5%">{{ $item->remember_token }}</td>
                                        <td style="width: 1%">{{ $item->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="{{ asset('storage/css/Admin/user.css') }}">
