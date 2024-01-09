@extends('layouts.staffBase')

@section('title')
<h3 class="text">Complaint</h3>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card-header d-flex justify-content-between mb-4">
        <h6>Complaint List</h6>
    </div>

    <div class="row">
        <div class="column">
            <form action="/action_page.php">
                <div class="container mt-2">
                    <div class="left">
                        <span><b>Status</b></span>
                    </div>
                    <div class="right">
                        <select class="form-select" name="" style="width: 50%;">
                            <option selected></option>
                            <option value="Open">Open</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Complete">Complete</option>
                            <option value="Close">Close</option>
                        </select>
                    </div>
                </div>
                <div>
                    <a href=""><input type="submit" value="Search" style="margin-right:380px;margin-top:10px; background-color: #1AA781;"></a>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-4">
        <p><b>Complaint List Table</b></p>
    </div>
    <div class="table-responsive p-0">
        <table id="myTable" class="table align-items-center mb-3 border">
            <thead class="bg-light">
                <tr>
                    <th>Complaint ID</th>
                    <th>Kiosk Number</th>
                    <th>Kiosk Name</th>
                    <th>Assigned</th>
                    <th>Applied Date</th>
                    <th>Complaint</th>
                    <th>Status</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <tr style="line-height: 30px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="{{route('technical.show')}}"><i class="fas fa-eye" style="padding-right:15px;color:green"></i></a>
                        <!-- Button trigger modal -->
                        <i class="fas fa-edit" style="padding-right:15px;color:blue" data-bs-toggle="modal" data-bs-target="#updateStatus"></i>
                        <a href="{{route('technical.print')}}"><i class="fas fa-print" style="padding-right:15px;color:black"></i></a>
                    </td>
                </tr>
                <tr style="display:none"></tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Update Status-->
<div class="modal fade" id="updateStatus" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h5 style="font-weight:bold;">Update Progress</h5>
                <div class="tabcontent">
                    <form action="">
                        @csrf
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col">
                                <span>Remark
                                    <span class="text-danger">*</span>
                                </span>
                                <textarea name="remark" id="remark" class="form-control" style="width:100%"></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row text-center">
                    <div class="col">
                        <a href="" class="btn btn-secondary btn-sm mb-0 mt-4" style="width:80%;" data-bs-dismiss="modal">Cancel</a>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-secondary btn-sm mb-0 mt-4" style="width:80%">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection