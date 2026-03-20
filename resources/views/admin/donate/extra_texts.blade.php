@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-4 order-0">
                    
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title text-primary mb-0">Second Form Extra Texts</h5>
                                    <small class="text-muted">Contact info section (bottom form only)</small>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="javascript:void(0)" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#updateTextModal">
                                        Edit Texts
                                    </a>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-12">
                                    <table class="table table-sm table-bordered mb-0">
                                        <tr>
                                            <td width="200"><strong>Secure Text:</strong></td>
                                            <td>{{ $data->secure_text ?? 'Secure online donations accepted.' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Contact Heading:</strong></td>
                                            <td>{{ $data->contact_heading ?? 'For questions about donations...' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong></td>
                                            <td>{{ $data->email_text ?? 'info@myseniorsupportsolutions.com' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone:</strong></td>
                                            <td>{{ $data->phone_text ?? '772-262-9721' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Update Modal --}}
                    <div class="modal fade" id="updateTextModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Extra Texts</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('DonateUpdateExtraText') }}">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Secure Text</label>
                                            <input type="text" class="form-control" name="secure_text" 
                                                value="{{ $data->secure_text ?? 'Secure online donations accepted.' }}" required />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Contact Heading</label>
                                            <textarea class="form-control" name="contact_heading" rows="2" required>{{ $data->contact_heading ?? 'For questions about donations, partnerships, or planned giving, please contact:' }}</textarea>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email_text" 
                                                    value="{{ $data->email_text ?? 'info@myseniorsupportsolutions.com' }}" required />
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="phone_text" 
                                                    value="{{ $data->phone_text ?? '772-262-9721' }}" required />
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Texts</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection