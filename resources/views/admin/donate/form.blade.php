@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-4 order-0">
                    
                    {{-- Header Card --}}
                    <div class="card mb-2">
                        <div class="d-flex align-items-end row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="card-title text-primary">Donate Form Section</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateFormModal">
                                                Update Form Section
                                            </a>
                                            
                                            {{-- DELETE BUTTON --}}
                                            <form method="POST" action="{{ route('DonateDeleteForm') }}" class="d-inline" onsubmit="return confirm('Are you sure? Default values will be restored.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Update Modal --}}
                    <div class="modal fade" id="updateFormModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Form Section</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('DonateUpdateForm') }}">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Form Heading <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="form_heading" 
                                                value="{{ $data->form_heading ?? 'Make Your Gift Today' }}" required />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Form Subheading <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="form_subheading" 
                                                value="{{ $data->form_subheading ?? 'Your generosity today helps a senior find the right place to call home.' }}" required />
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Data Table --}}
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-12">
                                <div class="card-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Field</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Form Heading</strong></td>
                                                <td>{{ $data->form_heading ?? 'Make Your Gift Today' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Form Subheading</strong></td>
                                                <td>{{ $data->form_subheading ?? 'Your generosity today helps a senior find the right place to call home.' }}</td>
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