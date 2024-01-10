@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Application and Approval</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div id="defaultOpen">
            <img src="assets/img/petakom-logo.png" alt="Logo">
            <h6>KIOSK RENTAL TERMS AND CONDITIONS</h6>
            <p style="padding-top: 20px;">1. Kiosk rental are open to outside vendor and PETAKOM student only.</p>
            <p>2. Each application are valid to rental for a semester only.</p>
            <p>3. No advanced payment is charged and the rental fee is RM 200 per month.</p>
            <p>3. Application for kiosk are restricted to one kiosk per applicant.</p>
            <p style="padding-bottom: 20px;">4. View kiosk availability <a href="{{route('application.availability')}}"><u>here.</u></a></p>

            <div class="table-responsive p-0">
                <table id="myTable" class="table align-items-center mb-3 border">
                    <thead class="bg-light">
                        <tr>
                            <th>Bil</th>
                            <th>Owner's Name</th>
                            <th>Kiosk's Name</th>
                            <th>Applied Date</th>
                            <th>Status</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr style="line-height: 30px;">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->user->name ?? '-' }}</td>
                                <td>{{ $data->kiosk->kiosk_name ?? '-' }}</td>
                                <td>{{ $data->created_at->format('Y-m-d') ?? '-' }}</td>
                                <td>{{ $data->app_status ?? '-' }}</td>
                                <td>
                                            <a href="{{ route('application.editApp', ['application' => $data['app_ID']]) }}"
                                                @if ($data->app_status != 'Pending') style="pointer-events: none; color: grey;" @endif>
                                                <i class="fas fa-edit" style="padding-right:15px;color:{{ $data->app_status == 'Pending' ? 'blue' : 'grey' }}"></i>
                                             </a>
                                             <a href="{{ route('application.viewApp', ['application' => $data['app_ID']]) }}"><i
                                                     class="fas fa-eye" style="padding-right:15px;color:green"></i></a>
                                             <a href="#"
                                                onclick="showDeleteConfirmation('{{ route('application.destroyApp', ['application' => $data['app_ID']]) }}');"
                                                @if ($data->app_status != 'Pending') style="pointer-events: none; color: grey;" @endif>
                                                <i class="fas fa-trash" style="padding-right:15px;color:{{ $data->app_status == 'Pending' ? 'red' : 'grey' }}"></i>
                                             </a>
                                             <a href="{{ route('application.printApp', ['application' => $data['app_ID']]) }}"
                                                @if ($data->app_status != 'Rejected' && $data->app_status != 'Approved') style="pointer-events: none; color: grey;" @endif>
                                                <i class="fas fa-download" style="padding-right:15px;color:{{ $data->app_status == 'Pending' ? 'black' : 'grey' }}k"></i>
                                             </a>
                                </td>
                            </tr>
                            <tr style="display:none"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ $datas->where('app_status', 'Pending', 'Approved')->isNotEmpty() ||
            $datas->where('app_status', 'On Processed', 'Approved')->isNotEmpty()
                ? '#'
                : route('application.create') }}"
                class="btn btn-info btn-sm float-end mb-0 mt-4"
                @if ($datas->where('app_status', 'Pending')->isNotEmpty() || $datas->where('app_status', 'On Processed')->isNotEmpty() || $datas->where('app_status', 'Approved')->isNotEmpty()) style="pointer-events: none; background-color:grey; color: lightgrey;" disabled @endif>
                Apply
            </a>

        </div>
    </div>
    <!-- Padam Aduan Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Application Details ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this application details ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="" id="deleteLink" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!--  End Padam Aduan Modal -->
    <script>
        function showDeleteConfirmation(deleteUrl) {
            // Set the href attribute of the delete link in the modal
            document.getElementById('deleteLink').href = deleteUrl;

            // Show the delete confirmation modal
            $('#deleteConfirmationModal').modal('show');
        }
    </script>
@endsection
