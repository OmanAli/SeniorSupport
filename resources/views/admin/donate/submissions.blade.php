@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-4 order-0">
                    
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title text-primary mb-0">Donation Submissions</h5>
                            <span class="badge bg-primary">Total: {{ $submissions->count() }}</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Amount</th>
                                            <th>Form</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($submissions as $sub)
                                            <tr>
                                                <td>{{ $sub->id }}</td>
                                                <td>{{ $sub->created_at->format('Y-m-d H:i') }}</td>
                                                <td>{{ $sub->name }}</td>
                                                <td><a href="mailto:{{ $sub->email }}">{{ $sub->email }}</a></td>
                                                <td>{{ $sub->phone }}</td>
                                                <td><span class="fw-bold text-success">${{ number_format($sub->amount, 2) }}</span></td>
                                                <td>
                                                    @if($sub->form_location == 'top')
                                                        <span class="badge bg-info">Top Form</span>
                                                    @else
                                                        <span class="badge bg-secondary">Bottom Form</span>
                                                    @endif
                                                </td>
                                                <td>{{ Str::limit($sub->message, 50) }}</td>
                                                <td>
                                                    <form action="{{ route('DonateDeleteSubmission', $sub->id) }}" 
                                                          method="POST" style="display:inline;"
                                                          onsubmit="return confirm('Delete this submission?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">No submissions found</td>
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
    </div>
@endsection