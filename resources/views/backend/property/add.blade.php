<!-- create.blade.php -->

@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <!-- User Create Form -->
            
            <form action="{{ route("sell.property.store") }}" style="padding: 20px" method="POST" enctype="multipart/form-data" id="createUserForm">
                @csrf
                <div>
                    <div>
                        <h1>Add a property</h1>
                    </div>
                    <div>
                        @if(Auth::user()->utype == 'Admin')
                        <div>
                            <div>
                                <label for="user">User <span style="color: red;">*</span></label>                                
                                <select id="user" name="owner_id" required>                                    
                                    <option value="">Select an User</option>
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>
                        @endif
                        
                        <div>
                            <div>
                                <label for="title">Title
                                    <span style="color: red;">*</span>
                                    <span><i class="fa fa-info-circle"></i></span>
                                </label>
                                <input type="text" required="text" name="title" placeholder="Type title..." aria-label="Type title....">
                            </div>
                            <div>
                                <label for="description">Description
                                    <span style="color: red;">*</span>
                                    <span><i class="fa fa-info-circle"></i></span>
                                </label>
                                <textarea required name="description" class="description" rows="5" placeholder="Type description.."></textarea>
                            </div>
                        </div>
                        <div style=" float: left; width: 50%;padding: 10px;">
                            <div>
                                <div>
                                    <label for="propertyImage" class="form-label">Property Image
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyImage" type="file" name="image" accept="image/png, image/gif, image/jpeg">
                                </div>
                                <div>
                                    <label for="propertyType" class="form-label">Property Type
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyType" type="text" name="property_type" placeholder="Ex: apartment/duplex">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="propertyPrice" class="form-label">Property Price
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyPrice" type="number" name="price" placeholder="Type property price....">
                                </div>
                                <div>
                                    <label for="propertyOldPrice" class="form-label">Property Old Price
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertyOldPrice" type="number" name="old_price" placeholder="Type property old price....">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="propertyBedrooms" class="form-label">Total Bedrooms
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyBedrooms" type="number" name="bedrooms" placeholder="Type bedrooms....">
                                </div>
                                <div>
                                    <label for="propertyBathrooms" class="form-label">Total Bathrooms
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyBathrooms" type="number" name="bathrooms" placeholder="Type bathrooms....">
                                </div>
                                <div>
                                    <label for="propertyBalconies" class="form-label">Total Balconies
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input required class="propertyBalconies" type="number" name="balconies" placeholder="Type balconies....">
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
                                    <input required class="propertyKitchens" type="number" name="kitchens" placeholder="Type kitchens....">
                                </div>
                                <div>
                                    <label for="propertySizeSqFt" class="form-label">Area (sqft)
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertySizeSqFt" type="number" name="size_sqft" placeholder="Type Area (sqft)....">
                                </div>
                                <div>
                                    <label for="propertyLocation" class="form-label">Location
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertyLocation" type="text" name="location" placeholder="Ex: Pallabi,Mirpur-12,Dhaka">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="propertyContactNumber" class="form-label">Contact Number
                                        <span style="color: red;">*</span>
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertyContactNumber" type="number" name="contact_number" placeholder="Type contact number....">
                                </div>
                                <div>
                                    <label for="propertyContactEmail" class="form-label">Contact Email
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertyContactEmail" type="email" name="contact_email" placeholder="Type contact email....">
                                </div>
                                <div>
                                    <label for="propertyContactAddress" class="form-label">Contact Address
                                        <span><i class="fa fa-info-circle"></i></span>
                                    </label>
                                    <input class="propertyContactAddress" type="text" name="contact_address" placeholder="Type address email....">
                                </div>
                            </div>
                            <div style="margin-top: 30px">
                                <button id="submit-button"  type="submit">Create sell request</button>
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
