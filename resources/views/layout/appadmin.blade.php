<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('backend/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="backend/images/logo_2H_tech.png"/>
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            @include('partials.adminheader') 
            @yield('admincontent')
            @include('partials.adminfooter')
        </div> 
        <!-- page-body-wrapper ends -->   
    </div>
    <!-- container-scroller -->
 <!-- plugins:js -->
 <script src="{{asset('backend/js/vendor.bundle.base.js')}}"></script>
 <script src="{{asset('backend/js/vendor.bundle.addons.js')}}"></script>
 <!-- endinject -->
 <!-- Plugin js for this page-->
 <!-- End plugin js for this page-->
 <!-- inject:js -->
 <script src="{{asset('backend/js/off-canvas.js')}}"></script>
 <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
 <script src="{{asset('backend/js/template.js')}}"></script>
 <script src="{{asset('backend/js/settings.js')}}"></script>
 <script src="backend/js/todolist.js')}}"></script>
 <!-- endinject -->
 <!-- Custom js for Dashbordpage page-->
 <script src="{{asset('backend/js/dashboard.js')}}"></script>
 <!-- Custom js for ajouter-categorie page-->
 <script src="{{asset('backend/js/form-validation.js')}}"></script>
 <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
 <!-- Custom js for this pages content table-->
 <script src="{{asset('backend/js/data-table.js')}}"></script>
 <!-- Custom js for message show when make action-->
 <script src="{{asset('backend/js/bootbox.min.js')}}"></script>
 <!-- End custom js for this page-->

 <script>
     $(document).on('click','#delete',function(e){
       e.preventDefault();
       var link=$(this).attr('href');
       bootbox.confirm('Vous voulez vraiment supprimer ça ?', function(confirmed){
            if (confirmed) {
                window.location.href = link;  
            };
       });
    });
 </script>
</body>

</html>    