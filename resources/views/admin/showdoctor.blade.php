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
                        <th style="padding: 5px; font-size:20px; color:white;">Doctor name</th>
                        <th style="padding: 5px; font-size:20px; color:white;">Phone</th>
                        <th style="padding: 5px; font-size:20px; color:white;">Speciality</th>
                        <th style="padding: 5px; font-size:20px; color:white;">Room no</th>
                        <th style="padding: 5px; font-size:20px; color:white;">Images</th>
                        <th style="padding: 5px; font-size:20px; color:white;">Update</th>
                        <th style="padding: 5px; font-size:20px; color:white;">Delete</th>
                    </tr>


                    @foreach ($data as $doctor)

                    <tr align="center" style="background-color:aquamarine;">
                        <td style="padding: 10px; font-size:20px; color:black;">{{$doctor->name}}</td>
                        <td style="padding: 10px; font-size:20px; color:black;">{{$doctor->phone}}</td>
                        <td style="padding: 10px; font-size:20px; color:black;">{{$doctor->specaility}}</td>
                        <td style="padding: 10px; font-size:20px; color:black;">{{$doctor->room}}</td>
                        <td><img height="100" width= "100" src="doctorimage/{{$doctor->image}}"></td>
                        <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</a></td>
                        <td><a class="btn btn-danger" onclick="return confirm('are you sure to delete this')" href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>
                      </tr>

                    @endforeach
                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')

</html>
