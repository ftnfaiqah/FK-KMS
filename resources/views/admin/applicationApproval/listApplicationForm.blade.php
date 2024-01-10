@extends('layouts.adminBase')

@section('title')
    <h3 class="text">Application And Approval</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>Application List</h6>
        </div>

        <div class="row">
            <div class="column">
                <form role="form" method="POST" action="{{ route('approval.search', ['searchStatus' => '']) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="container mt-2">
                        <div class="left">
                            <span><b>Status</b></span>
                        </div>
                        <div class="right">
                            <select class="form-select" name="searchStatus" style="width: 50%;">
                                <option selected></option>
                                <option value="Pending">Pending</option>
                                <option value="On Processed">On Processed</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                            <button type="submit" class="btn btn-info btn-sm float-right mb-0 mt-4">Save</button>
                        </div>
                    </div>
                    <div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <p><b>Application List Table</b></p>
        </div>
        <div class="table-responsive p-0">
            <table id="myTable" class="table align-items-center mb-3 border">
                <thead class="bg-light">
                    <tr>
                        <th>Bil</th>
                        <th>Application ID</th>
                        <th>Owner's Name</th>
                        <th>Applied Date</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Set a default value for $lists --}}
                    @php $lists = $lists ?? [] @endphp

                    {{-- Loop through the $lists --}}
                    @foreach ($lists as $list)
                        <tr style="line-height: 30px;">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $list->app_ID ?? '' }}</td>
                            <td>{{ $list->user->name ?? '' }}</td>
                            <td>{{ $list->created_at->format('Y-m-d') ?? '' }}</td>
                            <td>{{ $list->app_status ?? '' }}</td>
                            <td>
                                <a href="{{ route('approval.editStatus', ['application' => $list['app_ID']]) }}"
                                    @if ($list->app_status == 'Pending' || $list->app_status == 'On Progress') style="pointer-events: none; color: grey;" @endif>
                                    <i class="fas fa-edit"
                                        style="padding-right:15px;color:{{ $list->app_status == 'Approved' || $list->app_status == 'Rejected' ? 'blue' : 'grey' }}"></i>
                                </a>

                                <a href="{{ route('approval.viewApp', ['application' => $list['app_ID']]) }}"><i
                                        class="fas fa-eye" style="padding-right:15px;color:green"></i></a>

                                <a href="{{ route('approval.printApp', ['application' => $list['app_ID']]) }}"
                                    @if ($list->app_status == 'Pending' || $list->app_status == 'On Progress') style="pointer-events: none; color: grey;" @endif>
                                    <i class="fas fa-download"
                                        style="padding-right:15px;color:{{ $list->app_status == 'Approved' || $list->app_status == 'Rejected' ? 'black' : 'grey' }}"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
