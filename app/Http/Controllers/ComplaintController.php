<?php

namespace App\Http\Controllers;


use App\Models\Application;
use App\Models\Complaint;
use App\Models\Kiosk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    //User
    public function index()
    {
        $userId = Auth::id();
        $complaints = Complaint::with('user')->where('user_ID', $userId)->get();
        return view('kioskParticipants.complaint.complaintStatusForm', compact('complaints'));
    }



    //display complaint application list page
   
    //display complaint form page
    public function add()
    {
        //retrieve user data
        $userId = Auth::id();
        $application = Application::with('user')->where('user_ID', $userId)->get();
        // $userWithApplications = User::with(['applications' => function ($query) use ($userId) {
        //     $query->where('user_ID', $userId);
        // }])->find($userId);


        return view('kioskParticipants.complaint.complaintApplicationForm', compact('application'));
    }

    //store complaints details into database
    public function store(Request $request)
    {
        $userId = auth()->id();

        $request->validate([
            'app_ID' => 'required',
            'cmp_category' => 'required',
            'cmp_evidence' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cmp_remark' => 'required',
        ]);

        $path = $request->file('cmp_evidence')->store('public/kioskimage');

        Complaint::create([
            'user_ID' => $userId,
            'app_ID' => $request->input('app_ID'),
            'cmp_category' => $request->input('cmp_category'),
            'cmp_evidence' => $path,
            'cmp_remark' => $request->input('cmp_remark'),
        ]);

        return redirect()->route('complaint.index')->with('status', 'Inserted successfully');
    }



    public function edit($complaints)
    {
        $userId = Auth::id();
        $data = Complaint::with('application')->find($complaints);
        $kiosks = Kiosk::All();

        return view('kioskParticipants.complaint.updateComplaintForm', compact('data', 'kiosks'));
    }

    public function update(Request $request, $complaints)
    {

        $data = Complaint::find($complaints);

        // Check if the image is being updated
        if ($request->hasFile('cmp_evidence')) {
            // Delete the previous image if it exists
            if ($data->cmp_evidence) {
                Storage::delete($data->cmp_evidence);
            }

            // Store the new image
            $path = $request->file('cmp_evidence')->store('public/kioskimage');
            $data->cmp_evidence = $path;
        }

        // Update the fields in the Complaint model
        $data->update([
            'cmp_category' => $request->input('cmp_category'),
            'cmp_remark' => $request->input('cmp_remark'),
        ]);


        return redirect()->route('complaint.index', ['complaints' => $complaints])->with('status', 'Updated successfully');
    }

    public function show($complaints)
    {
        $data = Complaint::all()->find($complaints);

        return view('kioskParticipants.complaint.viewComplaintForm', compact('data'));
    }

    //Staff - Technical
    public function indexComp()
    {
        $data = Complaint::all();

        return view('staff.complaint.listComplaintForm', compact('data'));
    }

    public function viewComp($complaints)
    {
        $data = Complaint::all()->find($complaints);

        return view('staff.complaint.viewKioskComplaintForm', compact('data'));
    }

    public function assign(Request $request, $complaints)
    {
        $data = Complaint::find($complaints);

        $data->update([
            'cmp_assignTech' => $request->input('cmp_assignTech'),
            'cmp_status' => 'In Progress',
        ]);

        return redirect()->route('technical.index')->with('status', 'Updated successfully');
    }

    public function updateProgress(Request $request, $complaints)
    {
        $data = Complaint::find($complaints);

        $data->update([
            'cmp_progress' => $request->input('cmp_progress'),
            'cmp_status' => 'Complete',
        ]);

        return redirect()->route('technical.index')->with('status', 'Updated successfully');
    }
    
    //print application
    public function print($complaints)
    {
        $data = Complaint::find($complaints);

        // $pdf = PDF::loadview('staff.complaint.printKioskComplaintForm', compact('data'));
 
        // // Return the PDF for download
        // return $pdf->download('Complaint_Application.pdf');

        return view('staff.complaint.printKioskComplaintForm', compact('data'));

    }

    // Search based on status
    public function statusSearch (Request $request)
    {
        $statusSearch = $request->input('statusSearch');

        $datas = [];

        if($statusSearch) 
        {
            $datas = Complaint::where('cmp_status', $statusSearch)->get();
        }

        return view('staff.complaint.listComplaintForm', compact('datas'));
    }

    public function close($complaints)
    {
        $data = Complaint::find($complaints);

        $data->update([
            'cmp_status' => 'Close',
        ]);

        return redirect()->route('complaint.index');
    }

}
