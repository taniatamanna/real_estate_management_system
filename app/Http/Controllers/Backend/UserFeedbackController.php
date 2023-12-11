<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Property;
use App\Models\TransactionHistory ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Authorize\AuthorizeNetPayment;
use App\Models\Feedback;

class UserFeedbackController extends Controller
{

    public function index()
    {

        $property=Property::orderBy('id','desc')->get()->load('feedback');

        return view('backend.feedback.index',compact('property'));

    }

    public function feedbackIndividualProperty($propertyId)
    {
        $feedback=Feedback::where('property_id',$propertyId)->orderBy('id','desc')->get()->load('user');
        $property=Property::findOrfail($propertyId);

        //dd($feedback);
        return view('backend.feedback.individual-feedback',compact('feedback','property'));
    }

}
