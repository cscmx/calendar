<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\View\View;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->filter ?? 'today';
        $query = Appointment::query();

        if ($filter === 'today')
            {
                $query->whereDate('start_date_time', today());
            }
        elseif ($filter === 'week')
            {
                $query->whereBetween('start_date_time',[now()->startOfWeek(), now()->endOfWeek()]); 
            }
        $appointments = $query->orderBy('start_date_time', 'asc')->get();
        
        $dateOfToday = today();
        $user = $request->user();
        

        return view('/dashboard',compact('appointments', 'user', 'dateOfToday', 'filter'));

    }
}
