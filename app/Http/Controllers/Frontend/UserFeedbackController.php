<?php namespace App\Http\Controllers\Frontend;

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

    public function userPropertyFeedback(Request $request, $propertyId)
    {
        $data=[
            'user_id'=>auth()->id(),
            'property_id'=>$propertyId,
            'comment'=>$request->feedbackText
        ];

        $result=Feedback::create($data);

        if($result)
        {
            return redirect()->back()->with('success', 'Property feedback given successful.Thank You.');
        }
        else
        {
            return redirect()->back()->with('error', 'Property feedback given failed');
        }

    }


}
