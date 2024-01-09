<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    //User
    public function index()
    {
        return view('kioskParticipants.complaint.complaintStatusForm');
    }

    public function add()
    {
        return view('kioskParticipants.complaint.complaintApplicationForm');
    }

    public function edit()
    {
        return view('kioskParticipants.complaint.updateComplaintForm');
    }

    public function show()
    {
        return view('kioskParticipants.complaint.viewComplaintForm');
    }

    //Staff - Technical

    public function showComp()
    {
        return view('staff.complaint.viewKioskComplaintForm');
    }

    public function print()
    {
        return view('staff.complaint.printKioskComplaintForm');
    }
}
