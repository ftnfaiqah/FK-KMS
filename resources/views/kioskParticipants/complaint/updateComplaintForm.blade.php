@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Complaint</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>Update Complaint Application</h6>
        </div>
        <br><br>
        <form role="form" method="POST" action={{ route('complaint.update', ['complaints' => $data->cmp_ID]) }} enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="app_ID" value="{{ $data->app_ID }}">
            
            <p><b>Kiosk Owners Details</b></p>
            <div class="tabcontent">

                <div class="row" style="margin-bottom: 20px">
                    <div class="col">
                        <span>Owner's Name</span>
                        <input type="text" class="form-control" value="{{ $data->user->name ?? '' }}" readonly>
                    </div>
                    <div class="col">
                        <span>Owner's IC Number</span>
                        <input type="text" class="form-control" value="{{ $data->user->icNum ?? '' }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span>Kiosk Number</span>
                        <input type="text" class="form-control" value="{{ $data->application->kiosk->kiosk_name ?? '_' }}"
                            readonly>
                    </div>
                    <div class="col">
                        <span>Kiosk Location</span>
                        <input type="text" class="form-control" value="{{ $data->application->kiosk->kiosk_location ?? '_' }}"
                            readonly>
                    </div>
                </div>


            </div>
            <br><br>
            <p><b>Complaints Details</b></p>
            <div class="tabcontent">

                <div class="row" style="margin-bottom: 20px">
                    <div class="col">
                        <span>Choose Category
                            <span class="text-danger">*</span>
                        </span>
                        <select class="form-select" name="cmp_category" style="width: 90%;">
                            <option selected hidden>{{ $data->cmp_category ?? '-' }}</option>
                            <option value="Electrical Damage">Electrical Damage</option>
                            <option value="Kiosk Damage">Kiosk Damage</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <span>Evidence</span>
                    <div class="col">
                        
                    @if ($data->cmp_evidence)
                        <img src="{{ Storage::url($data->cmp_evidence) }}" style="width: 200px; height: 200px;">
                    @else

                        <p>No image available</p>
                    @endif
                    <br>
                    <input class="form-control" type="file" id="myFiles" name="cmp_evidence" accept="image/*" multiple>
                    </div>
                    
                </div><br>

                <div class="row" style="margin-bottom: 20px">
                    <div class="col">
                        <span>Remark
                            <span class="text-danger">*</span>
                        </span>
                        <textarea name="cmp_remark" class="form-control" style="width:95%">{{ $data->cmp_remark ?? '-' }}</textarea>
                    </div>
                </div>

            </div>

            <div class="text-end mt-2">
                <button type="submit" class="btn btn-info btn-sm float-left mb-0 mt-4">Submit</button>
            </div>

        </form>

            <button type="reset" onclick="history.back()" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: gray;  border: 1px solid gray;">Back</button>
    </div>
    
@endsection
