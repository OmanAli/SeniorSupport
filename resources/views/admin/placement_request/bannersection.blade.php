@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-12 mb-4 order-0">

                <!-- Banner Update Card -->
                <div class="card mb-2">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title text-primary">Placement Request Banner Section</h5>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#updateDataModal">
                                            Update Banner Section
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="updateDataModal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Banner Section</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body" style="text-align: justify">
                                                        <form method="post"
                                                            action="{{ route('PlacementRequestBannerUpdate') }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="form-label">Banner Text</label><span
                                                                    style="color: red">*</span>
                                                                <textarea class="form-control" name="banner_text" required>{{ $data->description ?? '' }}</textarea>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Banner Update Card -->

                <!-- Banner Table -->
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            <div class="card-body">
                                <table class="table table-striped table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th style="text-align: justify">Banner Text</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: justify">{{ $data->description ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Banner Table -->

            </div>
        </div>

    </div>
</div>
@endsection
