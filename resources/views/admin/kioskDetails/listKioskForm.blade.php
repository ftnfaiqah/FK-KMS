@extends('layouts.adminBase')


@section('title')
    <h3 class="text">
        Kiosk Details</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>Kiosk List</h6>
        </div>
        <div class="row mt-4">
            <div class="col" style="float:right">
                <a href="{{ route('kiosk.registerKiosk') }}"><input type="submit" value="+ Register Kiosk"></a>
            </div>-
        </div>
        <div class="row mt-4">
            <p><b>All List</b></p>
        </div>
        <div class="table-responsive p-0">
            <table id="myTable" class="table align-items-center mb-3 border">
                <thead class="bg-light">
                    <tr>
                        <th>Bil</th>
                        <th>Kiosk Name</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="line-height: 30px;">
                        @foreach ($datas as $data)
                            <td>
                                {{ $loop->index + 1 }}
                            </td>
                            <td> {{ $data->kiosk_name ?? '-' }}</td>
                            <td>
                                {{ $data->kiosk_status ?? '-' }}
                            </td>
                            <td>
                                <a href="{{ route('kiosk.editKiosk', ['kiosk' => $data['kiosk_ID']]) }}">
                                    <i class="fas fa-edit" style="padding-right:15px;color:blue"></i>
                                </a>
                                <a href="{{ route('kiosk.viewKiosk', ['kiosk' => $data['kiosk_ID']]) }}">
                                    <i class="fas fa-eye" style="padding-right:15px;color:green"></i>
                                </a>
                                <a href="#"
                                    onclick="showDeleteConfirmation('{{ route('kiosk.destroyKiosk', ['kiosk' => $data['kiosk_ID']]) }}');">
                                    <i class="fas fa-trash" style="padding-right:15px;color:rgb(255, 5, 5)"></i></a>


                                {{-- <a href="updateKiosk"><i class="fas fa-edit" style="padding-right:15px;color:blue"></i></a> --}}
                                {{-- <a href="{{ route('kiosk.viewKiosk', ['kiosk' => $data['id']]) }}"><i class="fas fa-eye" style="padding-right:15px;color:green"></i></a> --}}
                                {{-- <a href="#" onclick=""><i class="fas fa-trash"
                                        style="padding-right:15px;color:rgb(255, 5, 5)"></i></a> --}}
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Padam Aduan Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Kiosk Details ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this kiosk details ?</p>
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