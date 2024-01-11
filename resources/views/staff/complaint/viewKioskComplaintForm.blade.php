@extends('layouts.staffBase')

@section('title')
    <h3 class="text">Complaint</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>View Complaint Details</h6>
        </div>


        <form role="form" method="POST" action={{ route('technical.assign', ['complaints' => $data->cmp_ID]) }}
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_ID" value="{{ $data->user->user_ID }}">
            <input type="hidden" name="cmp_ID" value="{{ $data->cmp_ID }}">


            <div class="container mt-3 text-end">
                <span>
                    Complaint ID: <span>{{ $data->cmp_ID }}</span>
                </span>
            </div>

            <br>
            <p><b>Kiosk Owners Details</b></p>
            <div class="tabcontent">

                <div class="row" style="margin-bottom: 20px">
                    <div class="col">
                        <span>Owner's Name</span>
                        <input type="text" class="form-control" value="{{ $data->user->name }}" readonly>
                    </div>
                    <div class="col">
                        <span>Owner's IC Number</span>
                        <input type="text" class="form-control" value="{{ $data->user->icNum }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span>Kiosk Number</span>
                        <input type="text" class="form-control" value="{{ $data->application->kiosk->kiosk_name }}"
                            readonly>
                    </div>
                    <div class="col">
                        <span>Kiosk Location</span>
                        <input type="text" class="form-control" value="{{ $data->application->kiosk->kiosk_location }}"
                            readonly>
                    </div>
                </div>

            </div>

            <br><br>
            <p><b>Complaints Details</b></p>

            <div class="tabcontent">


                <div class="row" style="margin-bottom: 20px">
                    <div class="col">
                        <span>Complaint</span>
                        <input type="text" class="form-control" value="{{ $data->cmp_category }}" readonly>
                    </div>
                    <div class="col">
                        <span>Applied Date</span>
                        <input type="text" class="form-control" value="{{ $data->created_at->format('Y-m-d') }}"
                            readonly>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">
                        <span>Evidence</span>
                        <br>
                        @if ($data->cmp_evidence)
                            <a href="{{ Storage::url($data->cmp_evidence) }}" target="_blank" class="evidence-link">
                                <input type="text" readonly class="form-control"
                                    value="{{ basename($data->cmp_evidence) }}" style="width:100%">
                            </a>
                        @else
                            <p>No image available</p>
                        @endif
                        <br>
                    </div>
                </div>


                <div class="row" style="margin-bottom: 10px">
                    <div class="col">
                        <span>Remark</span>
                        <textarea name="cmp_remark" class="form-control" style="width:100%" readonly>{{ $data->cmp_remark }}</textarea>
                    </div>
                </div>


            </div>

            <!-- Button trigger modal -->
            <div class="text-end mt-2">
                <a href="#assignedTechModal{{ $data->cmp_ID }}" class="btn btn-info btn-sm float-left mb-0 mt-4" style="background-color: #1AA781;" data-bs-toggle="modal">Accept</a>            
            </div>



            <!-- Modal -->
            <div class="modal fade" id="assignedTechModal{{ $data->cmp_ID }}" tabindex="-1"
                aria-labelledby="assignedTechModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5 style="font-weight:bold;">Assign Technical</h5>

                            <div class="tabcontent">

                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col">
                                        <span>Technical Name
                                            <span class="text-danger">*</span>
                                        </span>
                                        <input class="form-control" type="text" name="cmp_assignTech" style="width:100%">
                                    </div>
                                </div>

                            </div>

                            <div class="row text-center">
                                <div class="col">
                                    <a href="" class="btn btn-secondary btn-sm mb-0 mt-4" style="width:80%;"
                                        data-bs-dismiss="modal">Cancel</a>
                                </div>
                                <div class="col">
                                    <button class="btn btn-secondary btn-sm mb-0 mt-4" style="width:80%" type="submit" name="submit">Submit</button>
                                </div>
                            </div>
        </form>
    </div>
    </div>
    </div>
    </div>

    <button type="reset" onclick="history.back()" class="btn btn-info btn-sm float-left mb-0 mt-4"
        style="background-color: gray;  border: 1px solid gray;">Back</button>


    </div>
@endsection
