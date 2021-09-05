@extends('adminLayout.MasterLayout')
@section("content")
    <div style="margin-top:220px;">
          <div class="container">
              <div class="row">
                  <div class="col-md-8 offset-md-3">
                      <h1 class="text-center">Register Yourself</h1>
                      @if(Session::has('data'))
                      <div class="alert alert-success" id="insertdata" role="alert">
                        {{Session::get('data')}}
                      </div>
                      @endif
                      <form method="POST" action="{{url('/showDataController')}}">
                          @csrf
                        <div class="mb-3">
                          <label for="UserName" class="form-label fw-bold">UserName</label>
                          <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username">
                          @error("username")
                             <div class="text-danger">**{{$message}}</div>
                          @enderror

                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label fw-bold">Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" >
                          @error("email")
                          <div class="text-danger">**{{$message}}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                            @error("password")
                            <div class="text-danger">**{{$message}}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
    </div>
@endsection
@section("script")
<script>
  $(document).ready(function(){
    setTimeout(function() {
    $('#insertdata').fadeOut('fast');
    }, 3000); 
  });
</script>
@endsection