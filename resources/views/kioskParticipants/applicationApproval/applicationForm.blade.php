@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Application and Approval</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>Kiosk Application</h6>
        </div>
        <br><br>
        <p><b>Kiosk Owners Details</b></p>
        <div class="tabcontent">
       
            <form action="">
                @csrf
                <div class="row" style="margin-bottom: 20px">
                    <div class="col">
                        <span>Owner's Name*</span>
                        <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <span>Owner's IC Number*</span>
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                </div>
                    <div class="col">
                        <span>Owner's Phone No.*</span>
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                </div>
            </form>
        </div>
        <br><br>
        <p><b>Kiosk Owners Details</b></p>
        <div class="tabcontent">
   
                <form action="">
                    @csrf
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col">
                            <span><b>Choose Kiosk *</b></span>
                                <select class="form-select" name="" style="width: 50%;">
                                    <option selected></option>
                                    <option value="On Processed">Kiosk 1</option>
                                    <option value="On Processed">Kiosk 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
    
                    <div class="text-end mt-2">
                        <button type="reset" class="btn btn-info btn-sm float-left mb-0 mt-4">Reset</button>
                        <button type="submit" class="btn btn-info btn-sm float-left mb-0 mt-4">Save</button>
                        <button type="submit" class="btn btn-info btn-sm float-left mb-0 mt-4">Submit</button>
                    </div>
                </form>
        </div>
        <a href="applicationStatus" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray;  border: 1px solid gray;">
            Kembali</a>
    </div>
@endsection