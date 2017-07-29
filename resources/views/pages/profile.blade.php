@extends('partials.master')
@section('title', 'My Profile')
@section('page_title', 'My Profile')
@section('content')

<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card card-user">
            <div class="image">
                <img src="{{asset ('images/user_timeline.jpg')}}" alt="Image"/>
            </div>

            <div class="content">
                <div class="author">
                    <img class="avatar border-white" src="{{$image}}" alt="Image" id="profile"/><br />
                    <label class="btn btn-info">
                        <input type="file" name="profile_image" id="avatar" style="display:none"; onchange="document.getElementById('profile').src = window.URL.createObjectURL(this.files[0])">
                        <small>Change Avatar</small>
                    </label><br /><br />
                    <h4 class="title">{{$user->name}}<br /></h4>
                    <h5 class="title">
                        User Since : {{ $user->created_at->day }} {{($user->created_at)->format('M')}} {{ $user->created_at->year }}
                        <br />
                    </h5>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Profile</h4>
            </div>
            <div class="content">
                <form action= "{{route('saveProfile')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="name" class="form-control border-input" placeholder="First Name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="email" name="email" class="form-control border-input" placeholder="Email Address" value="{{$user->email}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control border-input" placeholder="Address" value="{{$user->address}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control border-input" placeholder="City" value="{{$user->city}}"> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state"  class="form-control border-input" placeholder="State" value="{{$user->state}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" name="country" class="form-control border-input" placeholder="Country" value="{{$user->country}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="number" name="zip_code" class="form-control border-input" placeholder="ZIP Code" value="{{$user->zip_code}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>About Me</label>
                                <textarea rows="5" name="about" class="form-control border-input" placeholder="Tell about Yourself">{{$user->about}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-fill btn-wd">Update Profile</button>
                        <button type="reset" class="btn btn-danger btn-fill btn-wd">Cancel</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
