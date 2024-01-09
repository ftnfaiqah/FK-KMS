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
                <p style="padding-bottom: 20px;">4. View kiosk availability <a href="kioskAvailability"><u>here.</u></a></p>

                <div class="table-responsive p-0">
                    <table id="myTable" class="table align-items-center mb-3 border">
                        <thead class="bg-light">
                            <tr>
                                <th>Bil</th>
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
                                <td>
                                    <a href="updateApplication"><i class="fas fa-edit" style="padding-right:15px;color:blue"></i></a>
                                    <a href="viewApplication"><i class="fas fa-eye" style="padding-right:15px;color:green"></i></a>
                                    <a href="#" onclick=""><i class="fas fa-trash"
                                            style="padding-right:15px;color:rgb(255, 5, 5)"></i></a>
                                    <a href="printApplication"><i class="fas fa-print"style="padding-right:15px;color:black"></i></a>
                        
                                </td>
                            </tr>
                            <tr style="display:none"></tr>
                        </tbody>
                    </table>
                </div>
                <a href="kioskApplication"
                    class="btn btn-info btn-sm float-end mb-0 mt-4"> Apply</a>
            </div>
</div>
@endsection