<!-- create.blade.php -->

@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <!-- User Create Form -->
            
            <form action="{{ route("property.update", $property->id) }}" style="padding: 20px" method="POST" enctype="multipart/form-data" id="updatePropertyForm">
                @method('PUT')
                @csrf
                <div>
                    <div>
                        <h1>Update Property</h1>
                    </div>
                    <div>
                        <div>
                            @if(Auth::user()->utype == 'Admin')
                                <div>
                                    <label for="user">User <span style="color: red;">*</span></label>                                
                                    <select id="user" name="owner_id" required>                                    
                                        <option value="">Select an User</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $property->owner_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>                                        
                                        @endforeach                                    
                                    </select>
                                </div>
                                <div>
                                    <label for="status">Status <span style="color: red;">*</span></label>                                
                                    <select id="status" name="status" required>                                    
                                        <option value="">Select</option>
                                        <option value="0" {{ $property->status == 0 ? 'selected' : '' }}>
                                            Pending
                                        </option>                                      
                                        <option value="1" {{ $property->status == 1 ? 'selected' : '' }}>
                                            Approved
                                        </option>                                      
                                        <option value="2" {{ $property->status == 2 ? 'selected' : '' }}>
                                            Rejected
                                        </option>                                      
                                        <option value="3" {{ $property->status == 3 ? 'selected' : '' }}>
                                            Blocked
                                        </option>                                      
                                    </select>
                                </div>
                            @endif
                            <div>
                                <label for="title">Title
                                    <span style="color: red;">*</span>
                                    <span><i class="fa fa-info-circle"></i></span>
                                </label>
                                <input type="text" required="text" value="{{$property->title}}" name="title" placeholder="Type title..." aria-label="Type title....">
                            </div>
                            <div>
                                <label for="description">Description
                                    <span style="color: red;">*</span>
                                    <span><i class="fa fa-info-circle"></i></span>
                                </label>
                                <textarea required name="description" class="description" rows="5" placeholder="Type description..">{{$property->description}}</textarea>
                            </div>
                        </div>
                        <div style=" float: left; width: 50%;padding: 10px;">
                            <div>
                                <div>
                                    <label for="propertyImage" class="form-label">Property Image
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input  class="propertyImage" type="file" name="image" accept="image/png, image/gif, image/jpeg">
                                </div>
                                <div>
                                    <label for="propertyType" class="form-label">Property Type
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyType" value="{{$property->property_type}}" type="text" name="property_type" placeholder="Ex: apartment/duplex">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="propertyPrice" class="form-label">Property Price
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyPrice" value="{{$property->price}}" type="number" name="price" placeholder="Type property price....">
                                </div>
                                <div>
                                    <label for="propertyOldPrice" class="form-label">Property Old Price
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertyOldPrice" type="number" value="{{$property->old_price}}" name="old_price" placeholder="Type property old price....">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="propertyBedrooms" class="form-label">Total Bedrooms
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyBedrooms" type="number"  value="{{$property->bedrooms}}" name="bedrooms" placeholder="Type bedrooms....">
                                </div>
                                <div>
                                    <label for="propertyBathrooms" class="form-label">Total Bathrooms
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyBathrooms" type="number" value="{{$property->bathrooms}}" name="bathrooms" placeholder="Type bathrooms....">
                                </div>
                                <div>
                                    <label for="propertyBalconies" class="form-label">Total Balconies
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyBalconies" type="number" value="{{$property->balconies}}" name="balconies" placeholder="Type balconies....">
                                </div>
                            </div>
                        </div>
                        <div style="float: left; width: 50%; padding: 10px;">
                            <div>
                                <div>
                                    <label for="propertyKitchens" class="form-label">Total kitchens
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyKitchens" type="number" value="{{$property->kitchens}}" name="kitchens" placeholder="Type kitchens....">
                                </div>
                                <div>
                                    <label for="propertySizeSqFt" class="form-label">Area (sqft)
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertySizeSqFt" type="number" value="{{$property->size_sqft}}" name="size_sqft" placeholder="Type Area (sqft)....">
                                </div>
                                <div>
                                    <label for="propertyLocation" class="form-label">Location
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertyLocation" type="text" value="{{$property->location}}" name="location" placeholder="Ex: Pallabi,Mirpur-12,Dhaka">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="propertyContactNumber" class="form-label">Contact Number
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertyContactNumber" type="number" value="{{$property->contact_number}}"  name="contact_number" placeholder="Type contact number....">
                                </div>
                                <div>
                                    <label for="propertyContactEmail" class="form-label">Contact Email
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertyContactEmail" type="email" value="{{$property->contact_email}}" name="contact_email" placeholder="Type contact email....">
                                </div>
                                <div>
                                    <label for="propertyContactAddress" class="form-label">Contact Address
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertyContactAddress" type="text" value="{{$property->contact_address}}" name="contact_address" placeholder="Type address email....">
                                </div>
                            </div>
                            <div style="margin-top: 30px">
                                <button id="submit-button"  type="submit">Update sell request</button>
                            </div>
                        </div>                       
                    </div>
                </div>
            </form>
            
            
        </div>
        
    </div>
</main>
<!-- MAIN -->
@endsection
