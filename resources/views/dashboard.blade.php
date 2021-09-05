@extends('adminLayout.MasterLayout')
@section("content")
    <div style="margin-top:220px;">
          <div class="container">
           
              <div class="row">
                <div class="col-md-8">

                  @if(session("deleted"))
                  <div class="alert alert-danger" id="deletedata" role="alert">
                    {{session("deleted")}}
                  </div>
                  @endif
                  @if(session("update"))
                  <div class="alert alert-success" id="updatedata" role="alert">
                    {{session("update")}}
                  </div>
                  @endif

                  <a href="{{url('/Userform')}}" class="btn btn-primary">Add New Customer</a>
             </div>
              </div>
              <div class="row">
                  <div class="col-md-8 mx-auto">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($user as $cust)
                          <tr>
                            <td>{{$cust->id}}</td>
                            <td>{{$cust->username}}</td>
                            <td>{{$cust->email}}</td>
                            <td>
                              <a href="{{url('/edit/Customer/'.$cust->id)}}" class="btn btn-primary" >Edit</a>
                              <a href="{{url('/delete/Customer/'.$cust->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
    </div>



                               
                  
@endsection

@section("script")
        <script>
          $(document).ready(function(){
            //Deletion
             setTimeout(function(){
               $("#deletedata").fadeOut("fast")},3000);
            //Updation
               setTimeout(function(){
               $("#updatedata").fadeOut("fast")},3000); 
          });

        </script>
@endsection