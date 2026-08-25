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
                                            <h5 class="card-title text-primary">Why Donate Section</h5>
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
                                    <h5 class="modal-title">Add New Card</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('DonateAddWhyDonate') }}" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Order <span class="text-danger">*</span></label>
                                            <select name="order" class="form-control" required>
                                                <option selected disabled>--Select Order--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" required />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" rows="3" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Icon <span class="text-danger">*</span> <small class="text-muted">60x60 px recommended</small></label>
                                            <input type="file" class="form-control" name="icon" accept="image/webp" required />
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add Card</button>
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
                                                    <td>{{ $item->order }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>
    <img src="{{ asset('assets/images/donate/whyicons/' . $item->icon) }}" 
         alt="Icon" width="60" height="60">
</td>
                                                    <td>
                                                        <form action="{{ route('DonateDeleteWhyDonate', $item->id) }}" 
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
        </div>
    </div>
@endsection