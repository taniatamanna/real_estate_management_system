<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addProductModal" aria-hidden="true">
    <form action="{{ route("sell.property.store") }}" method="POST" enctype="multipart/form-data" id="sellPropertyRequest">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductModal">Add a property</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="title">Title
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex:Apartment For Rent In Bashundhara R-a, Block A"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input required ="text" name="title" class="form-control title" placeholder="Type title..." aria-label="Type title....">
                        </div>
                        <div class="col-6">
                            <label for="description">Description
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: The area is built to be like a dreamland, giving residents a warm feeling during the evenings when the lively atmosphere and kids playing on the streets is quite the sight to see. The morning walks will seem amazingly refreshing since the place is filled with greenery. "><i class="fa fa-info-circle"></i></span>
                            </label>
                            <textarea required name="description" class="form-control description"  rows="5"  placeholder="Type description.."></textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="propertyImage" class="form-label">Property Image
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="This is the image of the property."><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input required class="form-control propertyImage" type="file" name="image" accept="image/png, image/gif, image/jpeg">
                        </div>
                        <div class="col-6">
                            <label for="propertyType" class="form-label">Property Type
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Property Type Ex: apartment/duplex."><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input required class="form-control propertyType" type="text" name="property_type" placeholder="Ex: apartment/duplex">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="propertyPrice" class="form-label">Property Price
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: 50000000"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input required class="form-control propertyPrice" type="number" name="price" placeholder="Type property price....">
                        </div>
                        <div class="col-6">
                            <label for="propertyOldPrice" class="form-label">Property Old Price
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: 60000000"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input class="form-control propertyOldPrice" type="number" name="old_price" placeholder="Type property old price....">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3">
                            <label for="propertyBedrooms" class="form-label">Total Bedrooms
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: 4"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input required class="form-control propertyBedrooms" type="number" name="bedrooms" placeholder="Type bedrooms....">
                        </div>
                        <div class="col-3">
                            <label for="propertyBathrooms" class="form-label">Total Bathrooms
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: 3"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input required class="form-control propertyBathrooms" type="number" name="bathrooms" placeholder="Type bathrooms....">
                        </div>
                        <div class="col-3">
                            <label for="propertyBalconies" class="form-label">Total Balconies
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: 3"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input required class="form-control propertyBalconies" type="number" name="balconies" placeholder="Type balconies....">
                        </div>
                        <div class="col-3">
                            <label for="propertyKitchens" class="form-label">Total kitchens
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: 1"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input required class="form-control propertyKitchens" type="number" name="kitchens" placeholder="Type kitchens....">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label for="propertySizeSqFt" class="form-label">Area (sqft)
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: 2250"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input class="form-control propertySizeSqFt" type="number" name="size_sqft" placeholder="Type Area (sqft)....">
                        </div>
                        <div class="col-6">
                            <label for="propertyLocation" class="form-label">Location
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: Pallabi,Mirpur-12,Dhaka"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input class="form-control propertyLocation" type="text" name="location" placeholder="Ex: Pallabi,Mirpur-12,Dhaka">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-4">
                            <label for="propertyContactNumber" class="form-label">Contact Number
                                <span style="color: red;">*</span>
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: 01710000000"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input class="form-control propertyContactNumber" type="number" name="contact_number" placeholder="Type contact number....">
                        </div>
                        <div class="col-4">
                            <label for="propertyContactEmail" class="form-label">Contact Email
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: propertysell@mail.com"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input class="form-control propertyContactEmail" type="email" name="contact_email"  placeholder="Type contact email....">
                        </div>
                        <div class="col-4">
                            <label for="propertyContactAddress" class="form-label">Contact Address
                                <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Ex: Bashundhara R-a, Block A, Road:1, House:47"><i class="fa fa-info-circle"></i></span>
                            </label>
                            <input class="form-control propertyContactAddress" type="text" name="contact_address" placeholder="Type address email....">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <p></p>
                    <button type="submit" class="btn btn-primary">Create sell request</button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
    <style>
        .col-2 {
            display: flex;
            align-items: center;
        }

        .btn-group {
            display: flex;
            gap: 5px;
            margin-top:30px!important;
        }
    </style>
@endpush
