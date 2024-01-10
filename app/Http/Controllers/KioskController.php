<?php

namespace App\Http\Controllers;

use App\Models\Kiosk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // dd($request->all());
        $request->merge([
            'kiosk_status' => "Available",
        ]);
        
        $path = $request->file('image')->store('public/kioskimage');

        $data = Kiosk::create([
            'kiosk_name' => $request->input('kiosk_name'),
            'kiosk_location' => $request->input('kiosk_location'),
            'kiosk_size' => $request->input('kiosk_size'),
            'kiosk_rent' => $request->input('kiosk_rent'),
            'kiosk_rentDuration' => $request->input('kiosk_rentDuration'),
            'kiosk_status' => $request->input('kiosk_status'),
            'kiosk_img' => $path,
        ]);

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
    
        // Check if the image is being updated
        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($data->kiosk_img) {
                Storage::delete($data->kiosk_img);
            }
    
            // Store the new image
            $path = $request->file('image')->store('public/kioskimage');
            $data->kiosk_img = $path;
        }
    
        // Update other fields
        $data->update([
            'kiosk_name' => $request->input('kiosk_name'),
            'kiosk_location' => $request->input('kiosk_location'),
            'kiosk_status' => $request->input('kiosk_status'),
            'kiosk_size' => $request->input('kiosk_size'),
            'kiosk_rent' => $request->input('kiosk_rent'),
            'kiosk_rentDuration' => $request->input('kiosk_rentDuration'),
            'kiosk_status' => $request->input('kiosk_status'),
        ]);
    
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
