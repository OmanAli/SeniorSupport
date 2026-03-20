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
                                            <h5 class="card-title text-primary">Donate Page Hero Section</h5>
                                        </div>
                                      <div class="col-md-6 text-end">
    <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateHeroModal">
        Update Hero Section
    </a>
    
    {{-- DELETE BUTTON --}}
    <form method="POST" action="{{ route('DonateDeleteHero') }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete? Default values will be restored.');">
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
                    <div class="modal fade" id="updateHeroModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Hero Section</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('DonateUpdateHero') }}">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Heading <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="heading" 
                                                value="{{ $data->heading ?? 'Become a Hero' }}" required />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Subheading <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="subheading" 
                                                value="{{ $data->subheading ?? 'Be the Reason a Senior Finds the Right Home.' }}" required />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" rows="4" required>{{ $data->description ?? 'Your generosity fuels our mission...' }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Button Text <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="button_text" 
                                                value="{{ $data->button_text ?? 'Donate Now' }}" required />
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
                                                <td><strong>Heading</strong></td>
                                                <td>{{ $data->heading ?? 'Become a Hero' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Subheading</strong></td>
                                                <td>{{ $data->subheading ?? 'Be the Reason a Senior Finds the Right Home.' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Description</strong></td>
                                                <td>{{ $data->description ?? 'Your generosity fuels our mission...' }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Button Text</strong></td>
                                                <td>{{ $data->button_text ?? 'Donate Now' }}</td>
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