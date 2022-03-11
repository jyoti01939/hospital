
<!DOCTYPE html>
<html lang="en">
  <head>
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
         <div align="center" style="padding-top: 100px;">
             <table>
            <tr style="background-color: black;">
                <th style="padding: 5px; font-size:20px; color:white;">Customer name</th>
                <th style="padding: 5px; font-size:20px; color:white;">Email</th>
                <th style="padding: 5px; font-size:20px; color:white;">Phone</th>
                <th style="padding: 5px; font-size:20px; color:white;">Doctor name</th>
                <th style="padding: 5px; font-size:20px; color:white;">Date</th>
                <th style="padding: 5px; font-size:20px; color:white;">Message</th>
                <th style="padding: 5px; font-size:20px; color:white;">Status</th>
                <th style="padding: 5px; font-size:20px; color:white;">Approved</th>
                <th style="padding: 5px; font-size:20px; color:white;">Canceled</th>
                <th style="padding: 5px; font-size:20px; color:white;">Send Email</th>
            </tr>

              @foreach ($data as $appoints)
            <tr align="center" style="background-color:aquamarine;">
              <td style="padding: 10px; font-size:15px; color:black;">{{$appoints->name}}</td>
              <td style="padding: 10px; font-size:15px; color:black;">{{$appoints->email}}</td>
              <td style="padding: 10px; font-size:15px; color:black;">{{$appoints->phone}}</td>
              <td style="padding: 10px; font-size:15px; color:black;">{{$appoints->doctor}}</td>
              <td style="padding: 10px; font-size:15px; color:black;">{{$appoints->date}}</td>
              <td style="padding: 10px; font-size:15px; color:black;">{{$appoints->message}}</td>
              <td style="padding: 10px; font-size:15px; color:black;">{{$appoints->status}}</td>
              <td><a class="btn btn-success" href="{{url('approved',$appoints->id)}}">Apporved</a></td>
              <td><a class="btn btn-danger" href="{{url('canceled',$appoints->id)}}">Canceled</a></td>
              <td><a class="btn btn-primary" href="{{url('emailview',$appoints->id)}}">Send Email</a></td>
            </tr>
            @endforeach
             </table>
         </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</html>
