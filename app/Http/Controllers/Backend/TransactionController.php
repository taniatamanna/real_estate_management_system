<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function index()
    {

        if (Auth::user()->utype == 'Admin') {
            $data['transactionHistory'] = TransactionHistory::orderBy('id', 'desc')->get()->load('user','property');
        } else {
            $data['transactionHistory'] = TransactionHistory::orderBy('id', 'desc')->where('user_id',Auth::user()->id )->get()->load('user','property');
        }

        return view('backend.transaction.index',$data);

    }

}
