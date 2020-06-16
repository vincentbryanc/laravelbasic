@extends('layouts.backend')

@section('title')
    Users
@endsection

@section('content')
<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Users</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/users') }}">Users</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="material-card card">
                <div class="card-body">
                    <div class="text-right">
                        <button class="btn btn-info btn-sm" id="btnModalUser" data-target="#modalUser" data-toggle="modal" type="button">Add New User <i class="mdi mdi-account-plus"></i></button>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" id="tblUsers">
                            <thead>
                                <tr>
                                    <th width="35%">Name</th>
                                    <th width="35%">Email</th>
                                    <th width="15%">Age</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal->Add New User -->
<form id="frmUser" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">
                        <i class="mdi mdi-account-plus mr-2"></i> Add New User
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="form_result"></div>
                    <div><code>Required Fields (*)</code></div>
                    <div class="form-group">
                        <label>Name <code>*</code></label>
                        <div>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address <code>*</code></label>
                        <div>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Age <code>*</code></label>
                        <div>
                            <input type="number" id="age" name="age" class="form-control" placeholder="Age">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" id="userid">
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
<script src="{{ URL::asset('js/users.js') }}"></script>
@endsection