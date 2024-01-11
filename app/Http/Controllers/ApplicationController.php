<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Kiosk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    //user
    //display application status page
    public function index()
    {
        $userId = Auth::id();
        $datas = Application::with('user')->where('user_ID', $userId)->get();
        return view('kioskParticipants/applicationApproval/applicationStatusForm', compact('datas'));
    }

    //display application form page
    public function createApp()
    {
        //retrieve user data
        $userId = Auth::id();
        $userWithApplications = User::with(['applications' => function ($query) use ($userId) {
            $query->where('user_ID', $userId);
        }])->find($userId);

        //retrieve list kiosk
        $kiosks = Kiosk::all();

        return view('kioskParticipants/applicationApproval/applicationForm', compact('userWithApplications', 'kiosks'));
    }

    //store application details into database
    public function storeApp(Request $request)
    {
        // Validate the form data
        $request->validate([
            'kiosk_id' => 'required|exists:kiosks,kiosk_id',
        ]);

        $userId = auth()->id();

        $application = new Application([
            'user_ID' => $userId,
            'kiosk_ID' => $request->input('kiosk_id'),
            'app_status' => 'Pending', // Set the default status
        ]);
        $application->save();

        // Update the kiosk status to "unavailable"
        $kiosk = Kiosk::find($request->input('kiosk_id'));
        if ($kiosk) {
            $kiosk->update(['kiosk_status' => 'Unavailable']);
        }

        return redirect()->route('application.index');
    }

    //display edit application page
    public function editApp($application) //pass app_ID
    {
        $userId = Auth::id();
        $datas = Application::with('kiosk')->find($application);
        $kiosks = Kiosk::All();
        return view('kioskParticipants/applicationApproval/updateApplicationForm', compact('datas', 'kiosks'));
    }


    //update application details into database
    public function updateApp(Request $request, $application)
    {

        $data = Application::find($application);
        $data->update([
            'user_ID' => $request->input('user_id'),
            'kiosk_ID' => $request->input('kiosk_id'),
            'app_status' => 'On Processed', // Set the default status
        ]);

        $user = User::find($request->input('user_id'));
        $user->update([
            'name' => $request->input('user_name'),
            'icNum' => $request->input('user_icNum'),
            'phoneNum' => $request->input('user_phoneNum'),
        ]);

        return redirect()->route('application.index');
    }

    //display application details in view more page
    public function showApp($application)
    {
        $data = Application::All()->find($application);
        return view('kioskParticipants/applicationApproval/viewApplicationForm', compact('data'));
    }

    //delete application details
    public function destroyApp($application)
    {
        $kiosks = Application::with('kiosk')->find($application);
        $app = Application::find($application);

        //set kiosk status to available
        $kiosks->kiosk->update([
            'kiosk_status' => 'Available', // Set the default status
        ]);


        if ($app) {
            $app->delete();
        }
        return redirect()->route('application.index');
    }

    //download application
    public function downloadApp($application)
    {
        $data = Application::find($application);
        $pdf = PDF::loadview('kioskParticipants/applicationApproval/downloadApplicationForm', compact('data'));
 
        // Return the PDF for download
        return $pdf->download('Kiosk_Application.pdf');
    }

    //show kiosk list availability
    public function showListKiosk()
    {
        $datas = Kiosk::All();

        return view('kioskParticipants/applicationApproval/kioskAvailabilityForm', compact('datas'));
    }

    //admin
    //display list application page
    public function indexAdmin()
    {
        $datas = Application::All();

        return view('admin/applicationApproval/listApplicationForm', compact('datas'));
    }

    //search application function
    public function searchStatus(Request $request)
    {
        $searchStatus = $request->input('searchStatus');

        // Set a default value for $lists
        $lists = [];

        if ($searchStatus) {
            $lists = Application::where('app_status', $searchStatus)->get();
        }

        return view('admin/applicationApproval/listApplicationForm', compact('lists'));
    }

    //display edit approval page
    public function editStatusApp($application) //pass app_ID
    {
        $data = Application::find($application);
        return view('admin/applicationApproval/updateStatusAppForm', compact('data'));
    }

    //update application status into database
    public function updateStatusApp(Request $request, $application)
    {

        $data = Application::find($application);
        $data->update([
            'app_status' => $request->input('appStatus'), // Set the default status
        ]);

        return redirect()->route('approval.index');
    }

    //display application details in view more page
    public function showAppForm($application)
    {
        $data = Application::All()->find($application);
        return view('admin/applicationApproval/viewApplicationForm', compact('data'));
    }

}
