@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-4 order-0">
                    
                    {{-- Section Texts Card --}}
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title text-primary mb-0">Section Heading & Text</h5>
                                    <small class="text-muted">Ways to Give - Main heading and subheading</small>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="javascript:void(0)" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#updateTextModal">
                                        Edit Heading
                                    </a>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-12">
                                    <table class="table table-sm table-bordered mb-0">
                                        <tr>
                                            <td width="150"><strong>Heading:</strong></td>
                                            <td>{{ $section->section_heading ?? 'Ways to' }} <span class="text-purple fw-bold">{{ $section->section_highlight ?? 'Give' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Subheading:</strong></td>
                                            <td>{{ $section->section_subheading ?? 'Choose the giving option that works best for you.' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Update Text Modal --}}
                    <div class="modal fade" id="updateTextModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Section Texts</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('DonateUpdateWaysToGiveText') }}">
                                        @csrf
                                        
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Heading <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="section_heading" 
                                                    value="{{ $section->section_heading ?? 'Ways to' }}" required />
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Highlight (Purple) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="section_highlight" 
                                                    value="{{ $section->section_highlight ?? 'Give' }}" required />
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Subheading <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="section_subheading" 
                                                value="{{ $section->section_subheading ?? 'Choose the giving option that works best for you.' }}" required />
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Texts</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Cards Header --}}
                    <div class="card mb-2">
                        <div class="d-flex align-items-end row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="card-title text-primary">Cards (Select Order 1-4)</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#addCardModal">
                                                Add Card
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Add Card Modal --}}
                    <div class="modal fade" id="addCardModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Card (Select Order 1-4)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('DonateAddWaysToGive') }}" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Select Order (1-4) <span class="text-danger">*</span></label>
                                            <select name="order" class="form-control" required>
                                                <option selected disabled>--Select Order--</option>
                                                <option value="1">1 - First Card</option>
                                                <option value="2">2 - Second Card</option>
                                                <option value="3">3 - Third Card</option>
                                                <option value="4">4 - Fourth Card</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Card Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" placeholder="e.g. One-Time Donation" required />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" rows="3" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Icon (WebP) <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="icon" accept="image/webp" required />
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add Card</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Cards Table --}}
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td><span class="badge bg-primary fs-6">{{ $item->order }}</span></td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ Str::limit($item->description, 80) }}</td>
                                            <td>
                                                <img src="{{ asset('assets/images/donate/waysicons/' . $item->icon) }}" 
                                                     alt="Icon" width="50" height="50">
                                            </td>
                                            <td>
                                                <form action="{{ route('DonateDeleteWaysToGive', $item->id) }}" 
                                                      method="POST" style="display:inline;"
                                                      onsubmit="return confirm('Delete this card?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
@endsection