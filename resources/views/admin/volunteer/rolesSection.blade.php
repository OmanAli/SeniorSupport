@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4 order-0">
                
                <!-- Header Card -->
                <div class="card mb-2">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title text-primary">Volunteer Roles Section</h5>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#addRoleModal">
                                            Add Role
                                        </a>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add Volunteer Role</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ route('VolunteerUpdateRolesSection') }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="form-label">Order</label><span style="color: red">*</span>
                                                                <select name="role_order" class="form-control" required>
                                                                    <option selected disabled>--Please Select--</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Role Title</label><span style="color: red">*</span>
                                                                <input type="text" class="form-control" name="role_title" required />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Description</label><span style="color: red">*</span>
                                                                <textarea class="form-control" name="role_description" rows="3" required></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Icon Class (FontAwesome)</label><span style="color: red">*</span>
                                                                <input type="text" class="form-control" name="role_icon" placeholder="fas fa-heart" required />
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

                <!-- Data Table -->
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Icon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $role)
                                        <tr>
                                            <td>{{ $role->role_order }}</td>
                                            <td>{{ $role->role_title }}</td>
                                            <td>{{ $role->role_description }}</td>
                                            <td><i class="{{ $role->role_icon }}"></i> {{ $role->role_icon }}</td>
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