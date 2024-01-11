@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Complaint</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div id="defaultOpen">
            <div class="table-responsive p-0">
                <a href="{{ route('complaint.add') }}" class="btn btn-info btn-sm float-end mb-4 mt-4"> Add</a>

                <table id="myTable" class="table align-items-center mb-3 border">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>Complaint</th>
                            <th>Applied Date</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 10px">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complaints as $complaint)
                            <tr style="line-height: 30px;">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $complaint->cmp_category }}</td>
                                <td>{{ $complaint->created_at->format('Y-m-d') }}</td>
                                <td class="text-center">{{ $complaint->cmp_status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('complaint.edit', $complaint) }}"><i class="fas fa-edit"
                                            style="padding-right:15px;color:blue {{ $complaint->cmp_status != 'Open' ? 'pointer-events: none; cursor: not-allowed; color: grey;' : '' }}"></i></a>
                                    <a href="{{ route('complaint.show', $complaint) }}"><i class="fas fa-eye"
                                            style="padding-right:15px;color:green"></i>
                                    </a>
                                    <i class="fas fa-close"
                                    style="padding-right:15px; color: red; {{ $complaint->cmp_status != 'Complete' ? 'pointer-events: none; cursor: not-allowed; color: grey;' : '' }}"
                                    data-bs-toggle="modal" data-bs-target="#markAsDoneModal{{ $complaint->cmp_ID }}">
                                </i>
                                 
                                </td>
                            </tr>

                            <tr style="display:none"></tr>

                            <!-- Modal -->
                            <div class="modal fade" id="markAsDoneModal{{ $complaint->cmp_ID }}" tabindex="-1"
                                aria-labelledby="markAsDoneModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="markAsDoneModalLabel">Close Complaint Application ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <form role="form" method="POST"
                                            action={{ route('complaint.close', ['complaints' => $complaint->cmp_ID]) }}
                                            enctype="multipart/form-data">
                                            @csrf

                                        <div class="modal-body">
                                            <p>Are you sure want to close this complaint application ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row text-center">
                                                <div class="col">
                                                    <a href="" class="btn btn-secondary btn-sm mb-0 mt-4"
                                                     data-bs-dismiss="modal">Cancel</a>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-secondary btn-sm mb-0 mt-4"
                                                        type="submit" name="submit">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--  End Modal -->
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
