@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4 order-0">
                
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title text-primary">Volunteer Testimonials</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#addTestimonialModal">
                                    Add Testimonial
                                </a>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Testimonial</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('VolunteerUpdateTestimonial') }}">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label">Order</label><span style="color: red">*</span>
                                                        <select name="display_order" class="form-control" required>
                                                            <option selected disabled>--Select Order--</option>
                                                            @for($i = 1; $i <= 10; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Quote</label><span style="color: red">*</span>
                                                        <textarea class="form-control" name="quote" rows="3" required></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Author Name</label><span style="color: red">*</span>
                                                        <input type="text" class="form-control" name="author_name" required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Author Role</label><span style="color: red">*</span>
                                                        <input type="text" class="form-control" name="author_role" required />
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

                <!-- Table -->
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Quote</th>
                                    <th>Author</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($testimonials as $item)
                                <tr>
                                    <td>{{ $item->display_order }}</td>
                                    <td>{{ Str::limit($item->quote, 50) }}</td>
                                    <td>{{ $item->author_name }}</td>
                                    <td>{{ $item->author_role }}</td>
                                    <td>
                                        <form action="{{ route('VolunteerDeleteTestimonial', $item->id) }}" 
                                              method="POST" style="display:inline;"
                                              onsubmit="return confirm('Delete this testimonial?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No testimonials added yet</td>
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
