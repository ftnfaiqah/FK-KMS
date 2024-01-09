<?php

namespace App\Http\Controllers;

use App\Models\Kiosk;
use Illuminate\Http\Request;




class KioskController extends Controller
{
    //display all kiosk list
    // KioskController.php

    public function index()
    {
        // Fetch the data from the database
        $datas = Kiosk::all();

        // Pass the data to the view
        return view('admin.kioskDetails.listKioskForm', compact('datas'));
    }


    //return kiosk registeration page
    public function createKiosk()
    {
        //array
        $datas = Kiosk::All();
        // $courseApp = Course_App::All();
        return view('admin/kioskDetails/registerKioskForm', compact('datas'));
    }

    //store kiosk details
    public function storeKiosk(Request $request)
    {
        $request->merge([
            // 'user_id' => auth()->user()->id,
            'kiosk_status' => "Available",
            // 'couApp_noApp' => 'CP' . date("Y") . sprintf("%'.05d\n", $CPCount + 1),
        ]);
        Kiosk::create($request->all());
        return redirect()->route('kiosk.index');
    }

    //display view kiosk page
    public function showKiosk($application)
    {
        $data = Kiosk::All()->find($application);
        return view('admin/kioskDetails/viewKioskForm', compact('data'));
    }

    //return kiosk edit page
    public function editKiosk($application)
    {
        $data = Kiosk::All()->find($application);
        return view('admin/kioskDetails/updateKioskForm', compact('data'));
    }

    //update kiosk
    public function updateKiosk(Request $request, $application)
    {
        $data = Kiosk::find($application);
        $data->update($request->all());
        return redirect()->route('kiosk.index');
    }

    //delete kiosk
    public function destroyKiosk($application)
    {
        $kiosk = Kiosk::find($application);

        if ($kiosk) {
            $kiosk->delete();
        }

        return redirect()->route('kiosk.index');
    }
}
