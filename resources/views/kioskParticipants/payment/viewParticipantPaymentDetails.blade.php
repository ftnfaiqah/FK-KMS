@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Participant Details</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div id="defaultOpen">
            
            <div class="table-responsive p-0">
                <table id="myTable" class="table align-items-center mb-3 border">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
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
                                <td>{{ $data->kiosk->kiosk_name ?? 'Test' }}</td>
                                <td>{{ $data->created_at->format('Y-m-d') ?? '-' }}</td>
                                <td>{{ $data->app_status ?? 'Unpaid' }}</td>
                                <td>
                                        
                                             <a href="{{ route('payment.viewReceiptDetails', ['payment' => $data['payment_ID']]) }}"><i
                                                     class="fas fa-eye" style="padding-right:15px;color:green"></i></a>
                                             
                                             
                                             
                                            
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
                Make Payment
            </a>

        </div>
    </div>
   
@endsection
