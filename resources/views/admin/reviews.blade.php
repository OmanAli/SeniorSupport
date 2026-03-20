@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-4 order-0">
                    <div class="card mb-2">
                        <div class="d-flex align-items-end row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="card-title text-primary">User Reviews</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateDataModal">
                                                Add New Review
                                            </a>
                                            <div class="modal fade" id="updateDataModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Add New Review</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body" style="text-align: justify">
                                                            <form method="post" action="{{ route('reviewsStore') }}" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Name</label><span
                                                                        style="color: red">*</span>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ old('name') ?? '' }}" name="name"
                                                                        required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Designation</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ old('designation') ?? '' }}"
                                                                        name="designation" />
                                                                </div>
                                                                {{-- <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-email">Image</label>
                                                                        <span
                                                                        style="color: red;font-size: 10px;">140 × 158 px</span>
                                                                    <div class="input-group input-group-merge">
                                                                        <input type="file" class="form-control"
                                                                            name="image" />
                                                                    </div>
                                                                </div> --}}
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-phone">Review</label><span
                                                                        style="color: red">*</span>
                                                                    <textarea class="form-control" name="review" id="" cols="30" rows="5" required>{{ old('review') ?? '' }}</textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-12">
                                <div class="card-body">
                                    <table class="table table-striped table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th style="text-align: justify">User</th>
                                                <th style="text-align: justify">Designation</th>
                                                {{-- <th style="text-align: justify">Image</th> --}}
                                                <th style="text-align: justify">Review</th>
                                                <th style="text-align: justify">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $item)
                                                <tr>
                                                    <td style="text-align: justify">{{ $item->name ?? '' }}</td>
                                                    <td style="text-align: justify">{{ $item->designation ?? '' }}</td>
                                                    {{-- <td style="text-align: justify"><img src="{{asset('reviews/'.$item->picture)}}" alt="" style="width: 20%;"></td> --}}
                                                    <td style="text-align: justify">{{ $item->review ?? '' }}</td>
                                                    <td style="text-align: justify">
                                                        <form action="{{ route('reviewsDestroy', $item->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
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
    </div>
@endsection
