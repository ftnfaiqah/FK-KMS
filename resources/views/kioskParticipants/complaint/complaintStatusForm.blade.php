@extends('layouts.participantBase')

@section('title')
<h3 class="text">Complaint</h3>
@endsection



@section('content')
<div class="container-fluid">
    <div id="defaultOpen">
        <div class="table-responsive p-0">
            <a href="{{route('user.add')}}"class="btn btn-info btn-sm float-end mb-4 mt-4"> Add</a>
            <table id="myTable" class="table align-items-center mb-3 border">
                <thead class="bg-light">
                    <tr>
                        <th>No</th>
                        <th>Complaint</th>
                        <th>Applied Date</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="line-height: 30px;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{route('user.edit')}}"><i class="fas fa-edit" style="padding-right:15px;color:blue"></i></a>
                            <a href="{{route('user.show')}}"><i class="fas fa-eye" style="padding-right:15px;color:green"></i></a>
                        </td>
                    </tr>
                    <tr style="display:none"></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection