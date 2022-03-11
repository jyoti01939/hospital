
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
      <style>
          label
          {
              display: inline-block;
              width: 200px;
          }
      </style>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
          <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
              <div class="ps-lg-1">
              </div>
            </div>
          </div>
        </div>
     @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="container" align="center" style="padding: 100px;">
            <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px">
                    <label>Doctor Name</label>
                    <input type="text" style="color:black;" name="name" value="{{$data->name}}">
                </div>
                <div style="padding: 15px">
                    <label>Phone</label>
                    <input type="text" style="color:black;" name="phone" value="{{$data->phone}}">
                </div>
                <div style="padding: 15px">
                    <label>Room no</label>
                    <input type="text" style="color:black;" name="room" value="{{$data->room}}">
                </div>
                <div style="padding: 15px">
                    <label>Speciality</label>
                    <input type="text" style="color:black;" name="specaility" value="{{$data->specaility}}">
                </div>
                <div style="padding: 15px">
                    <label>Old image</label>
                    <img height="150" width="150" src="doctorimage/{{$data->image}}" alt="">
                </div>
                <div style="padding: 15px">
                    <label>Change image</label>
                   <input type="file" name="file">
                </div>
                <div style="padding: 15px">
                   <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>


        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</html>
