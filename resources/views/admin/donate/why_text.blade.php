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
                                            <h5 class="card-title text-primary">Why Donate - Texts</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateTextModal">
                                                Update Texts
                                            </a>
                                            
                                            {{-- DELETE BUTTON --}}
                                            <form method="POST" action="{{ route('DonateDeleteWhyText') }}" class="d-inline" onsubmit="return confirm('Reset to default?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Update Modal --}}
                    <div class="modal fade" id="updateTextModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Why Donate Texts</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('DonateUpdateWhyText') }}">
                                        @csrf
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Section Heading <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="section_heading" 
                                                    value="{{ $data->section_heading ?? 'Why' }}" required />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Highlight Text (Purple) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="section_highlight" 
                                                    value="{{ $data->section_highlight ?? 'Donate' }}" required />
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Section Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="section_description" rows="3" required>{{ $data->section_description ?? 'At Senior Support Solutions, we believe every senior deserves dignity, safety, and the right care environment. Your donation directly supports families searching for assisted living, memory care, and long-term support options.' }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Sub Heading <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="sub_heading" 
                                                value="{{ $data->sub_heading ?? 'When you give, you help:' }}" required />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Bottom Text <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="bottom_text" rows="2" required>{{ $data->bottom_text ?? 'Your support is not just a gift — it is an investment in stability, security, and compassionate care for seniors.' }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Data Table --}}
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Section Heading</td>
                                        <td>{{ $data->section_heading ?? 'Why' }} <span class="text-purple">{{ $data->section_highlight ?? 'Donate' }}</span>?</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{{ Str::limit($data->section_description ?? 'At Senior Support Solutions...', 100) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sub Heading</td>
                                        <td>{{ $data->sub_heading ?? 'When you give, you help:' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bottom Text</td>
                                        <td>{{ Str::limit($data->bottom_text ?? 'Your support is not just a gift...', 100) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection