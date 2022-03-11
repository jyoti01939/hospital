<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
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
              <form action="{{url('sendemail', $data->id)}}" method="POST">
                @csrf
                  <div style="padding:15px;">
                      <label>Greetings</label>
                      <input type="text" style="color:black;" name="greeting" required="">
                  </div>
                  <div style="padding:15px;">
                      <label>Body</label>
                      <input type="text" style="color:black;" name="body" required="">
                  </div>
                  <div style="padding:15px;">
                      <label>Action Text</label>
                      <input type="text" style="color:black;" name="actiontext" required="">
                  </div>
                  <div style="padding:15px;">
                      <label>Action Url</label>
                      <input type="text" style="color:black;" name="actionurl" required="">
                  </div>
                  <div style="padding:15px;">
                      <label>End part</label>
                      <input type="text" style="color:black;" name="endpart" required="">
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
