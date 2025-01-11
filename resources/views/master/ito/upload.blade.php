@extends('layout.main')

@section('title_page')
    ITO
@endsection

@section('breadcrumb_title')
    <small>master / ito / dashboard</small>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <x-master-ito-links page="upload" />

            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-xs btn-danger float-right" data-toggle="modal"
                        data-target="#truncateModal">
                        Truncate ItoTemp
                    </button>
                    <button type="button" class="btn btn-primary btn-xs float-right mr-2" data-toggle="modal"
                        data-target="#uploadModal">
                        Upload
                    </button>
                </div>

                <div class="card-body">
                    <div id="uploadStatus" class="alert alert-info">
                        <strong>Upload Status:</strong> <span id="recordCount">{{ $recordCount }}</span> records uploaded
                        successfully.
                    </div>
                </div>
            </div>


            <!-- Truncate Confirmation Modal -->
            <div class="modal fade" id="truncateModal" tabindex="-1" role="dialog" aria-labelledby="truncateModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="truncateModalLabel">Confirm Truncate</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to truncate the ito_temps table? This action cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                            <form action="{{ route('master.ito.truncate-itotemp') }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Truncate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('master.ito.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="file">Choose File</label>
                                    <input type="file" class="form-control" id="file_upload" name="file_upload" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('styles')
    <style>
        .card-header .active {
            color: black;
            text-transform: uppercase;
        }
    </style>
@endsection
