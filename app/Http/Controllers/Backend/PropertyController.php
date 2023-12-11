<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    public function index()
    {
        if (Auth::user()->utype == 'Admin') {
            $data['properties'] = Property::orderBy('id','desc')->get();
            $data['users'] = User::orderBy('id','desc')->get();
        } else {
            $data['properties'] = Property::where('owner_id', Auth::user()->id)->orderBy('id','desc')->get();
        }

        return view('backend.property.show', $data);
    }

    public function create()
    {
        $users=User::all();

        return view('backend.property.add',compact('users'));
    }

    public function destroy($id)
    {
        $property = Property::find($id);

        if ($property) {
            $property->delete();
            return redirect()->back()->with('error', 'Property deleted successfully!');
        }

        return redirect()->back()->with('error', 'Property not found!');
    }
    public function edit($id)
    {
        $property = Property::find($id);
        $users=User::all();

        if ($property) {
            return view('backend.property.edit',compact(['property','users']));
        }

        return redirect()->back()->with('error', 'Property not found!');
    }
    public function update(Request $request, $id)
    {
        $property = Property::find($id);
    
        if ($property) {
            try {
                $inputs = $request->all();

                $currentImagePath = $property->image;
    
                if ($request->hasFile('image')) {
                    $imagePath = "uploads/property_images";
                    $image_name = Str::random(6) . "-property-image" . ".jpg";
                    $image = $request->file('image');
    
                    if (!File::isDirectory(public_path($imagePath))) {
                        File::makeDirectory(public_path($imagePath), 0777, true, true);
                    }
    
                    $image->move(public_path($imagePath), $image_name);
                    $inputs['image'] = $imagePath . "/" . $image_name;
    
                    if (File::exists(public_path($currentImagePath))) {
                        File::delete(public_path($currentImagePath));
                    }
                }
    
                $property->update($inputs);
    
                
            return redirect()->route('show-property')->with('success', 'Property updated successfully');
    
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error updating property: ' . $e->getMessage());
            }
        }
    
        return redirect()->back()->with('error', 'Property not found!');
    }
    

    
}
