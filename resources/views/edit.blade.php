@extends('adminLayout.MasterLayout')
@section("content")
    <div style="margin-top:220px;">
          <div class="container">
              <div class="row">
                  <div class="col-md-8 mx-auto">
                      <h1 class="text-center">Update the data</h1>
                     
                      <form method="POST" action="{{url('update/Customer/'.$customerdata->id)}}">
                          @csrf
                        <div class="mb-3">
                          <label for="UserName" class="form-label fw-bold">UserName</label>
                          <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{$customerdata->username}}">
                          @error("username")
                             <div class="text-danger">**{{$message}}</div>
                          @enderror

                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label fw-bold">Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$customerdata->email}}" >
                          @error("email")
                          <div class="text-danger">**{{$message}}</div>
                          @enderror
                        </div>
                   
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                  </div>
              </div>
          </div>
    </div>
@endsection
