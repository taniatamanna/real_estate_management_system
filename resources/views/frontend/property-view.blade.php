@extends('frontend.layouts.app')

@section('content')
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-lg-7">
                  <a href="/"  style="text-decoration: none" class="text-body">
                  <button class="mb-3 btn btn-success">
                    <i class="fas fa-long-arrow-alt-left me-2"></i>Show All Property
                  </button>
                </a>
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset($propertie->image) }}" class="img-fluid rounded-3" alt="Shopping item" style="width: 575px;" >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p class="text-justify"><span class="fw-bolder">Title:</span> {{$propertie->title }}</p>
                    <p class="text-justify"><span class="fw-bolder">Description:</span>: {{$propertie->description }}</p>
                  </div>
                </div>
                <div class="col-lg-5 mt-5">
                  <div class="card  rounded-3 mt-5">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Details:</h5>
                      </div>
                            <p class="text-muted"><i class="fa fa-home fa-1x text-primary"></i> {{ $propertie->property_type }}</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <p><i class="fa fa-bed"></i> {{ $propertie->bedrooms }} Bedrooms</p>
                                </div>
                                <div class="col-md-4">
                                    <p style="margin-left: -4px;"><i class="fa fa-bath"></i> {{ $propertie->bathrooms }} Bathrooms</p>
                                </div>
                                <div class="col-md-4">
                                    <p><i class="fa fa-map"></i> {{ $propertie->balconies }} Balconies</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><i class="fa fa-expand"></i> {{ $propertie->size_sqft }} sqft</p>
                                </div>
                                <div class="col-md-6">
                                    <p><i class="fa fa-map-marker"></i> {{ $propertie->location }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <p>Price: {{ $propertie->price }}</p>
                                </div>
                                <div class="col-md-6">
                                    @if ($propertie->old_price)
                                     <p class="text-muted">Old Price:<del style="color:red;"> {{ $propertie->old_price }}</del></p>
                                     @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Contact Number: {{ $propertie->contact_number }}</p>
                                </div>
                                <div class="col-md-6">
                                     <p class="">Contact Email: {{ $propertie->contact_email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Contact Address: {{ $propertie->contact_address }}</p>
                                </div>
                            </div>

                        @if(Auth::user())
                            <a href="{{ route('propertyPurchase',["id"=> $propertie->id]) }}" class="btn btn-info btn-block btn-lg">
                                <div class="d-flex justify-content-between">
                                <span>Buy <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                </div>
                            </a>
                        @else
                            <a href="" data-bs-toggle="modal" data-bs-target="#redirect-login-signup" class="btn btn-info btn-block btn-lg">
                                <div class="d-flex justify-content-between">
                                <span>Buy <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                </div>
                            </a>
                        @endif
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-md-12">
            <div class="row d-flex justify-content-left">
                <div class="col-md-12 col-lg-12">
                  <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4">
                        <form action="{{ route("user.property.feedback",["propertyId"=> $propertie->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-outline mb-4">
                                <textarea id="addANote" name="feedbackText" class="form-control" placeholder="Type feedback..."  cols="30" rows="10"></textarea>
                                @if(Auth::user())
                                    <button  type="submit" class="btn btn-warning m-2">+ Give feedback</button>
                                @else
                                    <a   data-bs-toggle="modal" data-bs-target="#redirect-login-signup" class="btn btn-warning m-2">+ Give feedback</a>
                                @endif
                            </div>
                        </form>
                        <p>Previous Feedback....</p>
                       @foreach ($feedback as $item)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" width="25"
                                        height="25" />
                                    <p class="small mb-0 ms-2">{{ $item?->user?->name }}</p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="small text-muted mb-0 ml-2">
                                            {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                        </p>
                                        {{-- <i class="fa fa-eye text-black" style="margin-top: -0.16rem;margin-left: 11px;margin-right: 10px;"></i>
                                        <p class="small text-muted mb-0">3</p> --}}
                                    </div>
                                </div>
                                <div class="card m-4" >
                                    <div class="card-body">
                                        <p>{{ $item->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endforeach
                      {{-- <div class="card mb-4">
                        <div class="card-body">
                          <p>Type your note, and hit enter to add it</p>

                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="25"
                                height="25" />
                              <p class="small mb-0 ms-2">Johny</p>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                              <p class="small text-muted mb-0">Upvote?</p>
                              <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                              <p class="small text-muted mb-0">4</p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="card mb-4">
                        <div class="card-body">
                          <p>Type your note, and hit enter to add it</p>

                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp" alt="avatar" width="25"
                                height="25" />
                              <p class="small mb-0 ms-2">Mary Kate</p>
                            </div>
                            <div class="d-flex flex-row align-items-center text-primary">
                              <p class="small mb-0">Upvoted</p>
                              <i class="fas fa-thumbs-up mx-2 fa-xs" style="margin-top: -0.16rem;"></i>
                              <p class="small mb-0">2</p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-body">
                          <p>Type your note, and hit enter to add it</p>

                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="25"
                                height="25" />
                              <p class="small mb-0 ms-2">Johny</p>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                              <p class="small text-muted mb-0">Upvote?</p>
                              <i class="far fa-thumbs-up ms-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-8">

        </div>
    </div>
    </div>
  </section>
@endsection
