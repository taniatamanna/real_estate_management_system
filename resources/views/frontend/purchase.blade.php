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
                  <a href="/" class="text-body" style="text-decoration: none">
                  <button class="mb-3 btn btn-success"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Back</button></a>
                  <hr>

                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <img
                              src="{{ asset($propertie->image) }}"
                              class="img-fluid rounded-3" alt="Shopping item" style="width: 300px;">
                          </div>
                          <div class="ms-3">
                            <h5>{{$propertie->title }}</h5>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 130px;">
                            <h5 class="mb-0">BDT {{  $propertie->price }}</h5>
                          </div>
                          <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-lg-5">

                  <div class="card bg-primary text-white rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Card details:</h5>
                        <img src="{{ asset('images/logo/authorizenet.png') }}"
                          class="img-fluid rounded-3" style="width: 225px;" alt="Avatar">
                      </div>
                      <form action="{{ route("property.purchase.store",["id"=> $propertie->id]) }}" method="POST" enctype="multipart/form-data"  class="mt-4">
                        @csrf
                        <div class="form-outline form-white mb-4">
                         <label class="form-label" for="typeText">Card Number:</label>
                          <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                            placeholder="4716376247033021"  name="card" value=""/>

                        </div>

                        <div class="row mb-4">
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <label class="form-label" for="typeExp">Expiration Month</label>
                                <select name="expmonth"  class="form-control form-control-lg form-select" >
                                    <option value="01">January</option>
                                    <option value="02">February </option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05"  >May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">Spetember</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                                <label class="form-label" for="typeText">Expiry Year</label>
                              <input type="text" id="typeText" class="form-control form-control-lg"
                                placeholder="2027" size="1" minlength="4" maxlength="4" name="expyear" value=""/>

                            </div>
                          </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Subtotal:</p>
                          <p class="mb-2">BDT {{ $propertie->price }}</p>
                        </div>
                        @if(Auth::user())
                            <button type="submit" class="btn btn-info btn-block btn-lg">
                                <div class="d-flex justify-content-between">
                                <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                </div>
                            </button>
                        @else
                            <a href="" type="type" class="btn btn-info btn-block btn-lg" data-bs-toggle="modal" data-bs-target="#redirect-login-signup">
                                <div class="d-flex justify-content-between">
                                <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                </div>
                            </a>
                        @endif
                      </form>
                    </div>
                  </div>

                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
