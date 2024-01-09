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
                <form action="/action_page.php">
                    <div class="container mt-2">
                        <div class="left">
                            <span><b>Status</b></span>
                        </div>
                        <div class="right">
                            <select class="form-select" name="" style="width: 50%;">
                                <option selected></option>
                                <option value="On Processed">On Processed</option>
                                <option value="Accept">Accept</option>
                                <option value="Reject">Reject</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <a href=""><input type="submit" value="Search"
                                style="margin-right:440px;margin-top:10px;"></a>
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
                    <tr style="line-height: 30px;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="updateStatusApplication"><i class="fas fa-edit"style="padding-right:15px;color:blue"></i></a>
                            <a href="viewKioskApplication"><i class="fas fa-eye"style="padding-right:15px;color:green"></i></a>
                            <a href="printKioskApplication"><i class="fas fa-print"style="padding-right:15px;color:black"></i></a>
                         </td>
                    </tr>
                    <tr style="display:none"></tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection