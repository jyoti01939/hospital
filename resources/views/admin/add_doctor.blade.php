<!DOCTYPE html>
<html lang="en">
  <head>
      <style type="text/css">
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

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top: 50px;">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="btn-close" aria-label="Close">X</button>
                  {{session()->get('message')}}

                </div>
                @endif
              <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div style="padding:15px;">
                      <label>Doctor Name</label>
                      <input type="text" style="color:black;" name="name" placeholder="write your name" required="">
                  </div>
                  <div style="padding:15px;">
                      <label>Phone no</label>
                      <input type="number" style="color:black;" name="number" placeholder="write your number" required="">
                  </div>
                  <div style="padding:15px;">
                      <label>Speciality</label>
                      <select name="specaility" style="color:black; width:200px;" >
                          <option>--Select--</option>
                         <option value="skin">Skin</option>
                         <option value="eye">Eye</option>
                         <option value="heart">Heart</option>
                         <option value="ear">Ear</option>
                         <option value="chest">Chest</option>
                         <option value="gyno">Gyno</option>
                      </select>
                  </div>
                  <div style="padding:15px;">
                      <label>Room no</label>
                      <input type="text" style="color:black;" name="room" placeholder="write your room no" required="">
                  </div>
                  <div style="padding:15px;">
                      <label>Doctor Image</label>
                      <input type="file" name="file" required="">
                  </div>
                  <div style="padding:15px;">
                      <input type="submit" class="btn btn-success">
                  </div>
              </form>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</html>
