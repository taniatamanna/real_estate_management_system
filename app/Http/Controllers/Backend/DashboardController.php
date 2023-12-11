<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $users=User::orderBy('id','desc')->get();
        $transactionHistory = TransactionHistory::orderBy('id', 'desc')->get();

        return view('backend.dashboard',compact('users','transactionHistory'));
    }

}
