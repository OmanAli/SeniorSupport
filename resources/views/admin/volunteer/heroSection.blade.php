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
                                            <h5 class="card-title text-primary">Volunteer Hero Section</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#updateHeroModal">
                                                Update Hero Section
                                            </a>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="updateHeroModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Hero Section</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="{{ route('VolunteerUpdateHero') }}">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label">Hero Heading</label><span style="color: red">*</span>
                                                                    <input type="text" class="form-control" name="hero_heading"
                                                                        value="{{ $data->hero_heading ?? '' }}" required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Hero Subtitle</label><span style="color: red">*</span>
                                                                    <input type="text" class="form-control" name="hero_subtitle"
                                                                        value="{{ $data->hero_subtitle ?? '' }}" required />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Hero Paragraph</label>
                                                                    <textarea class="form-control" name="hero_paragraph" rows="3">{{ $data->hero_paragraph ?? '' }}</textarea>
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

                    <!-- Data Table Card -->
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-12">
                                <div class="card-body">
                                    <table class="table table-striped table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Hero Heading</th>
                                                <th>Hero Subtitle</th>
                                                <th>Hero Paragraph</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $data->hero_heading ?? '' }}</td>
                                                <td>{{ $data->hero_subtitle ?? '' }}</td>
                                                <td>{{ $data->hero_paragraph ?? '' }}</td>
                    
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