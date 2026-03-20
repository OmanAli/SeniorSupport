@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4 order-0">
                
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-primary">Volunteer Applications</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Submitted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $app)
                                <tr>
                                    <td>{{ $app->id }}</td>
                                    <td>{{ $app->full_name }}</td>
                                    <td>{{ $app->email }}</td>
                                    <td>{{ $app->phone }}</td>
                                    <td>{{ Str::limit($app->message, 50) }}</td>
                                    <td>{{ $app->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No applications yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
