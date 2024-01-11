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
                <form role="form" method="POST" action="{{route ('status.search', ['statusSearch' => ''])}}" enctype="multipart/form-data">
                @csrf

                    <div class="container mt-2">
                        <div class="left">
                            <span><b>Status</b></span>
                        </div>
                        <div class="right">
                            <select class="form-select" name="statusSearch" style="width: 50%;">
                                <option selected></option>
                                <option value="Open">Open</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Complete">Complete</option>
                                <option value="Close">Close</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <a href=""><input type="submit" value="Search"
                                style="margin-right:380px;margin-top:10px; background-color: #1AA781;"></a>
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
                        <th class="text-center">Status</th>
                        <th class="text-center">Operation</th>
                    </tr>
                </thead>

                <tbody>
                    @php $datas = $datas ?? [] @endphp
                    @foreach ($datas as $data)
                        <tr style="line-height: 30px;">
                            <td>{{ $data->cmp_ID }}</td>
                            <td>{{ $data->application->kiosk->kiosk_ID }}</td>
                            <td>{{ $data->application->kiosk->kiosk_name }}</td>
                            <td>{{ $data->cmp_assignTech }}</td>
                            <td>{{ $data->created_at->format('Y-m-d') ?? '-' }}</td>
                            <td>{{ $data->cmp_category }}</td>
                            <td class="text-center">{{ $data->cmp_status }}</td>
                            <td class="text-center">
                                <!-- Disable the eye icon if the status is "Complete" or "In Progress" -->
                                <a href="{{ route('technical.view', $data) }}" style="text-decoration: none;">
                                    <i class="fas fa-eye" 
                                        style="padding-right:15px; color:{{ in_array($data->cmp_status, ['Complete', 'In Progress']) ? 'grey' : 'green' }};"
                                        {{ in_array($data->cmp_status, ['Complete', 'In Progress']) ? 'data-bs-toggle= "false"' : '' }}>
                                    </i>
                                </a>
                            
                                <!-- Edit icon with conditional clickability -->
                                <i class="fas fa-edit"
                                    style="padding-right:15px; color: blue;{{ $data->cmp_status === 'Open' ? 'pointer-events: none; cursor: not-allowed; color: grey;' : '' }}"
                                    data-bs-toggle="modal" data-bs-target="#updateProgressModal{{ $data->cmp_ID }}">
                                </i>
                            
                                <!-- Print icon with conditional clickability and color change -->
                               
                                <a href=" {{ route('technical.print', $data) }}"
                                    style="{{ $data->cmp_status === 'Open' ? 'pointer-events: none; cursor: not-allowed; color: grey;' : '' }}">
                                    <i class="fas fa-print" style="padding-right:15px;"></i>
                                </a>
                            </td>
                            

                        </tr>
                        <!-- Modal Update Status-->
                        <div class="modal fade" id="updateProgressModal{{ $data->cmp_ID }}" tabindex="-1"
                            aria-labelledby="updateProgressModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h5 style="font-weight:bold;">Update Progress</h5>

                                        <form role="form" method="POST"
                                            action={{ route('technical.progress', ['complaints' => $data->cmp_ID]) }}
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="user_ID" value="{{ $data->user->user_ID }}">
                                            <input type="hidden" name="cmp_ID" value="{{ $data->cmp_ID }}">

                                            <div class="tabcontent">

                                                <div class="row" style="margin-bottom: 20px;">
                                                    <div class="col">
                                                        <span>Remark
                                                            <span class="text-danger">*</span>
                                                        </span>
                                                        <textarea name="cmp_progress" class="form-control" style="width:100%"></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row text-center">
                                                <div class="col">
                                                    <a href="" class="btn btn-secondary btn-sm mb-0 mt-4"
                                                        style="width:80%;" data-bs-dismiss="modal">Cancel</a>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-secondary btn-sm mb-0 mt-4" style="width:80%"
                                                        type="submit" name="submit">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <tr style="display:none"></tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
@endsection
