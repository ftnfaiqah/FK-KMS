<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('kioskParticipants.applicationApproval.applicationStatusForm');
    }

    public function adminIndex()
    {
        
        return view('admin.kioskDetails.listKioskForm');
    }

    public function technicalIndex()
    {
        return view('staff.complaint.listComplaintForm');
    }

    public function bursaryIndex()
    {
        return view('staff.payment.homepage');
    }

    public function pupukIndex()
    {
        return view('staff.salesReport.homepage');
    }
}
