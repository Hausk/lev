<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $dashboard_user = User::all();
            $online_count = 0;
            foreach ($dashboard_user as $user) {
                if ($user['is_online'] == true) {
                    $online_count++;
                }
            }
            return view('dashboard', ['dashboard_user' => $dashboard_user, 'online_count' => $online_count]);
        }
    }
}
