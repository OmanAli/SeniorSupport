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
                                        <div class="col-md-3">
                                            <h5 class="card-title text-primary">Why Volunteer With Us Section</h5>
                                        </div>
                                      <div class="col-md-9 text-end">
    <!-- Buttons -->
    <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
        data-bs-target="#updateDataModal">
        Update Why Volunteer With Us Section
    </a>
    <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
        data-bs-target="#updateDataImageModal">
        Update Why Volunteer With Us Image
    </a>
    
   
<!-- Modal 1: Update Section -->
                                            <div class="modal fade" id="updateDataModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Why Volunteer With Us Section</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body" style="text-align: justify">
                                                            <form method="post"
                                                                action="{{ route('VolunteerUpdateWhyUsSection') }}">
                                                                @csrf
                                                                
                                                                <!-- Main Heading -->
                                                                <div class="mb-3">
                                                                    <label class="form-label">Main Heading</label><span style="color: red">*</span>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $mainData->main_heading ?? '' }}" name="main_heading"
                                                                        required />
                                                                </div>
                                                                
                                                                <!-- Main Paragraph -->
                                                                <div class="mb-3">
                                                                    <label class="form-label">Main Paragraph</label><span style="color: red">*</span>
                                                                    <textarea class="form-control" name="main_paragraph" rows="3" required>{{ $mainData->main_paragraph ?? '' }}</textarea>
                                                                </div>

                                                                <!-- Stats -->
                                                                <div class="mb-3">
                                                                    <label class="form-label">Stats Number</label><span style="color: red">*</span>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $mainData->stats_number ?? '500+' }}" name="stats_number"
                                                                        required />
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">Stats Text</label><span style="color: red">*</span>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $mainData->stats_text ?? '' }}" name="stats_text"
                                                                        required />
                                                                </div>

                                                                <hr>

                                                                <!-- 4 Benefits -->
                                                                @for($i = 1; $i <= 4; $i++)
                                                                    @php
                                                                        $benefit = $benefits->where('benefit_order', $i)->first();
                                                                    @endphp
                                                                    <h6>Benefit {{ $i }}</h6>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Title</label><span style="color: red">*</span>
                                                                        <input type="text" class="form-control"
                                                                            name="benefit_title_{{ $i }}"
                                                                            value="{{ $benefit->benefit_title ?? '' }}" required />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Description</label><span style="color: red">*</span>
                                                                        <input type="text" class="form-control"
                                                                            name="benefit_description_{{ $i }}"
                                                                            value="{{ $benefit->benefit_description ?? '' }}" required />
                                                                    </div>
                                                                @endfor

                                                                <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2: Update Image - YEH MODAL 1 KE BAHAR HO -->
    <div class="modal fade" id="updateDataImageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Why Volunteer With Us Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('VolunteerUpdateWhyUsSectionImage') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Image</label><span style="color: red">*</span>
                            <span style="color: red; font-size: 10px;">Recommended: 516 × 573 px</span>
                            <input type="file" class="form-control" name="image" accept="image/*" required />
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
                    
                  <!-- YAHAN IMAGE CARD ADD KARO - With Delete Button -->
<div class="card mb-3">
    <div class="card-header bg-white text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-primary">Current Image</h5>
        @if($imageData && $imageData->image)
            <form action="{{ route('VolunteerDeleteWhyUsImage') }}" method="POST" style="display:inline;" 
                  onsubmit="return confirm('Are you sure you want to delete this image?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="bx bx-trash"></i> Delete Image
                </button>
            </form>
        @endif
    </div>
    <div class="card-body text-center">
        @if($imageData && $imageData->image)
            <img src="{{ asset('assets/images/volunteer/whyUs/' . $imageData->image) }}" 
                 alt="Why Us Image" 
                 style="max-width: 300px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <p class="mt-2 text-muted">
                <strong>Filename:</strong> {{ $imageData->image }}<br>
                <strong>Updated:</strong> {{ $imageData->updated_at ?? 'N/A' }}
            </p>
        @else
            <div class="alert alert-warning">
                <i class="bx bx-image-alt fs-1"></i><br>
            No image uploaded yet
            </div>
        @endif
    </div>
</div>
                    
                  <!-- Benefits List Table - WITHOUT DataTables -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title text-primary">Benefits List</h5>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">  <!-- id="myTable" removed -->
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($benefits as $item)
                    <tr>
                        <td>{{ $item->benefit_order ?? '' }}</td>
                        <td>{{ $item->benefit_title ?? '' }}</td>
                        <td>{{ $item->benefit_description ?? '' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            No benefits added yet
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection