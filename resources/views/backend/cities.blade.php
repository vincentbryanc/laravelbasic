@extends('layouts.backend')

@section('title')
    Cities
@endsection

@section('content')
<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Cities</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/cities') }}">Cities</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-lg-7 offset-lg-2">
            <div class="material-card card">
                <div class="card-body">
                    <div class="text-right">
                        <button class="btn btn-info btn-sm" id="btnModalCity" data-target="#modalCity" data-toggle="modal" type="button">Add New City <i class="mdi mdi-plus"></i></button>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" id="tblCities">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal->Add New City -->
<form id="frmCity" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modalCity" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">
                        <i class="ti-marker-alt mr-2"></i> Add New City
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="form_result"></div>
                    <div><code>Required Fields (*)</code></div>
                    <div class="form-group">
                        <label>City Name <code>*</code></label>
                        <div>
                            <input type="text" id="name" name="name" class="form-control" placeholder="City Name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success" id="btnSave"><i class="ti-save"></i> Save</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="ti-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection('content')

@section('script')
<script src="{{ URL::asset('js/cities.js') }}"></script>
@endsection