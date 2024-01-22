@extends('layout')
@section('title','Editprofile')
@section('content')
<div class="container-xl px-4 mt-4">
   
    <hr class="mt-0 mb-4">
    <div class="row">
        <form action="update-user/{{auth()->user()->id}}" method="POST" class="d-flex">
            @csrf
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0" >
                <div class="card-header">Profile Picture</div>
          <!-- Your blade file -->

@livewire('image-upload', ['user' => $user])

            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4" style="    margin-left: 11px;">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                            <input class="form-control" id="inputUsername" name="name" type="text" placeholder="Enter your username" value="{{$user->name}}">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text" name="firstname"  placeholder="Enter your first name" value="{{$user->userinfo->firstname??''}}">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" name="lastname"  id="inputLastName" type="text" placeholder="Enter your last name" value="{{$user->userinfo->lastname??''}}">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Address</label>
                                <input class="form-control" id="inputOrgName" name="address"   type="text" placeholder="Enter your Address" value="{{$user->userinfo->address??''}}">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Location</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="Jordan">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" name="email" type="email" placeholder="Enter your email address"  value="{{$user->email??''}}">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel" name="phone" placeholder="Enter your phone number"  value="{{$user->userinfo->phone??''}}">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Address 2 </label>
                                <input class="form-control" id="inputBirthday" type="text"  name="address2" placeholder="Enter your Address " value="{{$user->userinfo->address2??''}}">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>

</div>
@endsection