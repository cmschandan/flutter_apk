<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Auth;

class DoctorController extends Controller
{
    public function index()
    {
    	return view('pages.doctor-dashboard');
    }

    /**
     * Adding Doctor Profile Function for all basic details
     */

    public function AddDoctorProfile()
    {
    	Log::info('In DoctorController => AddDoctorProfile()..:');
    	return view('components.add-doctor-profile');
    }

    public function StoreDoctorProfile()
    {
    	$doctor_profile = new DoctorProfile();
    }
}
