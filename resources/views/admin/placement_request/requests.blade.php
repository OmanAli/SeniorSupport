@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Placement Requests</h4>

        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Senior Age</th>
                            <th>Care Type</th>
                            <th>Location</th>
                            <th>Message</th>
                            <th>Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->full_name }}</td>
                            <td>{{ $request->phone }}</td>
                            <td>{{ $request->email }}</td>
                            <td>{{ $request->senior_age }}</td>
                            <td>{{ $request->care_type }}</td>
                            <td>{{ $request->location }}</td>
                            <td>{{ $request->message }}</td>
                            <td>{{ $request->created_at->format('d M, Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
