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
                                        <div class="col-md-3">
                                            <h5 class="card-title text-primary">Why Choose Us Section</h5>
                                        </div>
                                        <div class="col-md-9 text-end">
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateDataModal">
                                                Update Why Choose Us Section
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateDataImageModal">
                                                Update Why Choose Us Image
                                            </a>
                                            <div class="modal fade" id="updateDataModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Menu Section</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body" style="text-align: justify">
                                                            <div class="alert alert-danger alert-dismissible"
                                                                role="alert">
                                                                Please upload images using the recommended dimensions to
                                                                ensure an optimal design appearance.
                                                            </div>

                                                            <form method="post"
                                                                action="{{ route('HomePageUpdateChooseUsSection') }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Order</label><span
                                                                        style="color: red">*</span>
                                                                    <select name="order" class="form-control"
                                                                        id="" required>
                                                                        <option selected disabled>--Please Select--</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Title</label><span
                                                                        style="color: red">*</span>
                                                                    <input type="title" class="form-control"
                                                                        value="{{ old('title') ?? '' }}" name="title"
                                                                        required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="basic-default-company">
                                                                        Description</label><span style="color: red">*</span>
                                                                    <input type="text" class="form-control"
                                                                        name="description"
                                                                        value="{{ old('description') ?? '' }}" required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Icon</label><span
                                                                        style="color: red">*</span><span
                                                                        style="color: red;font-size: 10px;">60 × 60
                                                                        px</span>
                                                                    <input type="file" class="form-control"
                                                                        name="icon" accept="image/webp" required />
                                                                </div>

                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="updateDataImageModal" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Image</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body" style="text-align: justify">
                                                            <div class="alert alert-danger alert-dismissible"
                                                                role="alert">
                                                                Please upload images using the recommended dimensions to
                                                                ensure an optimal design appearance.
                                                            </div>

                                                            <form method="post"
                                                                action="{{ route('HomePageUpdateChooseUsSectionImage') }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Image</label><span
                                                                        style="color: red">*</span><span
                                                                        style="color: red;font-size: 10px;">516 × 573
                                                                        px</span>
                                                                    <input type="file" class="form-control"
                                                                        name="image" accept="image/webp" required />
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary">Save</button>
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
                                                <th style="text-align: justify">Order</th>
                                                <th style="text-align: justify">Title</th>
                                                <th style="text-align: justify">Description</th>
                                                <th style="text-align: justify">Icon</th>
                                                <th style="text-align: justify">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $item)
                                                <tr>
                                                    <td style="text-align: justify">{{ $item->order ?? '' }}</td>
                                                    <td style="text-align: justify">{{ $item->title ?? '' }}</td>
                                                    <td style="text-align: justify">{{ $item->description ?? '' }}
                                                    </td>
                                                    <td style="text-align: justify">
                                                        <img src="{{ asset('chooseUs/icons/' . $item->icon) }}"
                                                            alt="Menu Icon" width="60" height="60">
                                                    </td>
                                                    <td style="text-align: justify">
                                                        <form
                                                            action="{{ route('HomePageDeleteChooseUsSection', $item->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Delete</button>
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
