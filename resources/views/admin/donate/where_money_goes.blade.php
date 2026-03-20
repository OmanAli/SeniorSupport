@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-4 order-0">
                    
                    {{-- Section Texts --}}
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title text-primary mb-0">Section Texts</h5>
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
                                            <td width="150"><strong>Heading:</strong></td>
                                            <td>{{ $texts->section_heading ?? 'Where Your' }} <span class="text-purple fw-bold">{{ $texts->section_highlight ?? 'Money Goes' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Description:</strong></td>
                                            <td>{{ Str::limit($texts->section_description ?? 'We are committed to financial transparency...', 100) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Quote:</strong></td>
                                            <td>{{ $texts->quote_text ?? 'We believe in responsible stewardship...' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Update Text Modal --}}
                    <div class="modal fade" id="updateTextModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Section Texts</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('DonateUpdateWhereMoneyGoesText') }}">
                                        @csrf
                                        
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Heading <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="section_heading" 
                                                    value="{{ $texts->section_heading ?? 'Where Your' }}" required />
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Highlight <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="section_highlight" 
                                                    value="{{ $texts->section_highlight ?? 'Money Goes' }}" required />
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="section_description" rows="3" required>{{ $texts->section_description ?? 'We are committed to financial transparency. Your donations are directly allocated toward making a real difference in the lives of seniors.' }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Quote Text <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="quote_text" rows="2" required>{{ $texts->quote_text ?? 'We believe in responsible stewardship and measurable impact.' }}</textarea>
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
                                    <h5 class="modal-title">Add Card (Select Order 1-4)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('DonateAddWhereMoneyGoesCard') }}" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" name="title" placeholder="e.g. Senior Placement" required />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" rows="3" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Icon (SVG/PNG) <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="icon" accept=".svg,.png,.jpg,.jpeg" required />
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
                                    @foreach ($cards as $item)
                                        <tr>
                                            <td><span class="badge bg-primary fs-6">{{ $item->order }}</span></td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ Str::limit($item->description, 80) }}</td>
                                            <td>
                                                <img src="{{ asset('assets/images/donate/moneyicons/' . $item->icon) }}" 
                                                     alt="Icon" width="50" height="50">
                                            </td>
                                            <td>
                                                <form action="{{ route('DonateDeleteWhereMoneyGoesCard', $item->id) }}" 
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