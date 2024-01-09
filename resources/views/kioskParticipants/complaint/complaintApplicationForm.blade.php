@extends('layouts.participantBase')

@section('title')
<h3 class="text">Complaint</h3>
@endsection



@section('content')
<div class="container-fluid">
    <div class="card-header d-flex justify-content-between">
        <h6>Complaint Application</h6>
    </div>
    <br><br>
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
                    <span>Choose Category
                        <span class="text-danger">*</span>
                    </span>
                    <select class="form-select" name="" style="width: 90%;">
                        <option selected></option>
                        <option value="Electrical Damage">Electrical Damage</option>
                        <option value="Kiosk Damage">Kiosk Damage</option>
                        <option value="Others">Others</option>
                    </select>
                </div>

                <div class="col">
                    <span>Evidence</span>
                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div>

            </div>

            <div class="row" style="margin-bottom: 20px">
                <div class="col">
                    <span>Remark
                        <span class="text-danger">*</span>
                    </span>
                    <textarea name="remark" id="remark" class="form-control" style="width:95%"></textarea>
                </div>
            </div>
        </form>
    </div>

    <div class="text-end mt-2">
        <button type="submit" class="btn btn-info btn-sm float-left mb-0 mt-4">Submit</button>
    </div>

    <a href="complaintStatus" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray;  border: 1px solid gray;">
        Back</a>
</div>

@endsection