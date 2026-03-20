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
                                            <h5 class="card-title text-primary">Home Page Form Section</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateDataModal">
                                                Update Form Section
                                            </a>

                                            <div class="modal fade" id="updateDataModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Form Section</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body" style="text-align: justify">

                                                            <form method="post"
                                                                action="{{ route('HomePageUpdateFormSection') }}"
                                                                enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Title</label><span
                                                                        style="color: red">*</span>
                                                                    <input type="title" class="form-control"
                                                                        value="{{ $data->form_heading ?? '' }}" name="title"
                                                                        required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Description</label><span
                                                                        style="color: red">*</span>
                                                                    <input type="text" class="form-control"
                                                                        name="description"
                                                                        value="{{ $data->form_description ?? '' }}" required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Bullet Point 1</label>
                                                                    <input type="text" class="form-control"
                                                                        name="bullet_point_1" value="{{ $data->form_bulletPoint1 ?? '' }}"/>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Bullet Point 2</label>
                                                                    <input type="text" class="form-control"
                                                                        name="bullet_point_2" value="{{ $data->form_bulletPoint2 ?? '' }}"/>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Bullet Point 3</label>
                                                                    <input type="text" class="form-control"
                                                                        name="bullet_point_3" value="{{ $data->form_bulletPoint3 ?? '' }}"/>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Bullet Point 4</label>
                                                                    <input type="text" class="form-control"
                                                                        name="bullet_point_4" value="{{ $data->form_bulletPoint4 ?? '' }}" />
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
                                                <th rowspan="2" style="text-align: justify">Heading</th>
                                                <th rowspan="2" style="text-align: justify">Description</th>
                                                <th colspan="4" style="text-align: center">Bullet Points</th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center">1</th>
                                                <th style="text-align: center">2</th>
                                                <th style="text-align: center">3</th>
                                                <th style="text-align: center">4</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <tr>
                                                    <td style="text-align: justify">{{ $data->form_heading ?? '' }}</td>
                                                    <td style="text-align: justify">{{ $data->form_description ?? '' }}</td>
                                                    <td style="text-align: justify">{{ $data->form_bulletPoint1 ?? '' }}</td>
                                                    <td style="text-align: justify">{{ $data->form_bulletPoint2 ?? '' }}</td>
                                                    <td style="text-align: justify">{{ $data->form_bulletPoint3 ?? '' }}</td>
                                                    <td style="text-align: justify">{{ $data->form_bulletPoint4 ?? '' }}</td>
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
