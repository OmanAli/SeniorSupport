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
                                            <h5 class="card-title text-primary">Home Page Menu Section</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateDataModal">
                                                Update Menu Section
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateDataImageModal">
                                                Update Menu Image
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
                                                                action="{{ route('HomePageUpdateMenuSection') }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Menu Order</label><span
                                                                        style="color: red">*</span>
                                                                    <select name="menu_order" class="form-control"
                                                                        id="" required>
                                                                        <option selected disabled>--Please Select--</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Menu Title</label><span
                                                                        style="color: red">*</span>
                                                                    <input type="menu_title" class="form-control"
                                                                        value="{{ old('menu_title') ?? '' }}"
                                                                        name="menu_title" required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Menu
                                                                        Description</label><span style="color: red">*</span>
                                                                    <input type="text" class="form-control"
                                                                        name="menu_description"
                                                                        value="{{ old('menu_description') ?? '' }}"
                                                                        required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Menu Icon</label><span
                                                                        style="color: red">*</span><span
                                                                        style="color: red;font-size: 10px;">60 × 60
                                                                        px</span>
                                                                    <input type="file" class="form-control"
                                                                        name="menu_icon" accept="image/webp" required />
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
                                                            <h5 class="modal-title">Update Menu Image</h5>
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
                                                                action="{{ route('HomePageUpdateMenuSectionImage') }}" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-company">Image</label><span
                                                                        style="color: red">*</span><span
                                                                        style="color: red;font-size: 10px;">540 × 757
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
                                                <th style="text-align: justify">Menu Order</th>
                                                <th style="text-align: justify">Menu Heading</th>
                                                <th style="text-align: justify">Menu Text</th>
                                                <th style="text-align: justify">Menu Icon</th>
                                                <th style="text-align: justify">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $item)
                                                <tr>
                                                    <td style="text-align: justify">{{ $item->menu_order ?? '' }}</td>
                                                    <td style="text-align: justify">{{ $item->menu_title ?? '' }}</td>
                                                    <td style="text-align: justify">{{ $item->menu_description ?? '' }}
                                                    </td>
                                                    <td style="text-align: justify">
                                                        <img src="{{ asset('menu/icons/' . $item->menu_icon) }}"
                                                            alt="Menu Icon" width="60" height="60">
                                                    </td>
                                                    <td style="text-align: justify">
                                                        <form action="{{ route('HomePageDeleteMenuSection', $item->id) }}"
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
