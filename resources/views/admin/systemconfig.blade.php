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
                                            <h5 class="card-title text-primary">System Configuration</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateDataModal">
                                                Update System Configuration
                                            </a>
                                            <div class="modal fade" id="updateDataModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update System Configuration</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body" style="text-align: justify">
                                                            <form method="post" action="{{ route('systemconfigUpdate') }}">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Email</label>
                                                                    <input type="email" class="form-control"
                                                                        value="{{ $data->email ?? '' }}" name="email" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Phone-1</label>
                                                                    <input type="text" class="form-control"
                                                                        name="phone1" value="{{ $data->phone ?? '' }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-email">Phone-2</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <input type="text"class="form-control"
                                                                            name="phone2"
                                                                            value="{{ $data->phoneSecond ?? '' }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-phone">Address</label>
                                                                    <input type="text" class="form-control"
                                                                        name="address" value="{{ $data->address ?? '' }}" />
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </form>
                                                        </div>
                                                        {{-- <div class="modal-footer">
                                                            <button class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary">Save</button>
                                                        </div> --}}
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
                                                <th style="text-align: justify">Email</th>
                                                <th style="text-align: justify">Phone-1</th>
                                                <th style="text-align: justify">Phone-2</th>
                                                <th style="text-align: justify">Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: justify">{{ $data->email ?? '' }}</td>
                                                <td style="text-align: justify">{{ $data->phone ?? '' }}</td>
                                                <td style="text-align: justify">{{ $data->phoneSecond ?? '' }}</td>
                                                <td style="text-align: justify">{{ $data->address ?? '' }}</td>
                                            </tr>
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
