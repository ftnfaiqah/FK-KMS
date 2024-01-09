@extends('layouts.staffBase')

@section('title')
<h3 class="text">Complaint</h3>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card-header d-flex justify-content-between">
        <h6>View Complaint Details</h6>
    </div>

    <div class="container mt-3 text-end">
        <span>
            Complaint ID: <span></span>
        </span>
    </div>

    <br>
    <p><b>Kiosk Owners Details</b></p>
    <div class="tabcontent">

        <form action="">
            @csrf
            <div class="row" style="margin-bottom: 20px">
                <div class="col">
                    <span>Owner's Name</span>
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name" readonly>
                </div>
                <div class="col">
                    <span>Owner's IC Number</span>
                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <span>Kiosk Number</span>
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name" readonly>
                </div>
                <div class="col">
                    <span>Kiosk Location</span>
                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" readonly>
                </div>
            </div>
        </form>
    </div>

    <br><br>
    <p><b>Complaints Details</b></p>

    <div class="tabcontent">

        <form action="">
            @csrf
            <div class="row" style="margin-bottom: 20px">
                <div class="col">
                    <span>Kiosk Number</span>
                    <input class="form-control" type="text" id="formFileMultiple" readonly>
                </div>

                <div class="col">
                    <span>Kiosk Name</span>
                    <input class="form-control" type="text" id="formFileMultiple" readonly>
                </div>

            </div>

            <div class="row" style="margin-bottom: 20px">
                <div class="col">
                    <span>Complaint</span>
                    <input type="text" class="form-control" placeholder="" aria-label="" readonly>
                </div>
                <div class="col">
                    <span>Applied Date</span>
                    <input type="text" class="form-control" placeholder="" aria-label="" readonly>
                </div>
            </div>

            <div class="row" style="margin-bottom: 20px">
                <div class="col-2">
                    <span>Evidence</span>
                </div>
                <div class="col-6">
                    <a href="">evidence.jpg<input type="text" readonly class="form-control-plaintext" id="" value=""></a>
                </div>
            </div>

            <div class="row" style="margin-bottom: 10px">
                <div class="col">
                    <span>Remark</span>
                    <textarea name="remark" id="remark" class="form-control" style="width:100%" readonly></textarea>
                </div>
            </div>
        </form>

    </div>

    <!-- Button trigger modal -->
    <div class="text-end mt-2">
        <button type="submit" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: #1AA781;" data-bs-toggle="modal" data-bs-target="#assignedTechModal">Accept</button>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="assignedTechModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 style="font-weight:bold;">Assign Technical</h5>
                    <div class="tabcontent">
                        <form action="">
                            @csrf
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col">
                                    <span>Technical Name
                                        <span class="text-danger">*</span>
                                    </span>
                                    <input class="form-control" type="text" id="" style="width:100%">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row text-center">
                        <div class="col">
                            <a href="" class="btn btn-secondary btn-sm mb-0 mt-4" style="width:80%;" data-bs-dismiss="modal">Cancel</a>
                        </div>
                        <div class="col">
                            <a href="complaintList" class="btn btn-secondary btn-sm mb-0 mt-4" style="width:80%">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="complaintList" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray;  border: 1px solid gray;">
        Back</a>

</div>

@endsection