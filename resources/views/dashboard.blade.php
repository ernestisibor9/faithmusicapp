<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin dashboard</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('backend/vendors/typicons.font/font/typicons.css')}}">
    <link rel="stylesheet" href=" {{asset('backend/vendors/css/vendor.bundle.base.css')}} ">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('backend/css/vertical-layout-light/style.css')}} ">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.png')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://cdn.tiny.cloud/1/bs6au1qu048pnog0s5m4f5jbdfqhbl6bx2k4cz9vnkhwhl25/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
		tinymce.init({
		  selector: '#mytextarea',
		//   apiKey: 'bs6au1qu048pnog0s5m4f5jbdfqhbl6bx2k4cz9vnkhwhl25'
		});
	  </script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('admin.body.header')
      <!-- partial -->
      @include('admin.body.sidebar')
        <!-- partial -->
        <div class="main-panel">
            @yield('admin')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.body.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('backend/js/off-canvas.js')}} "></script>
    <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('backend/js/template.js')}}"></script>
    <script src="{{asset('backend/js/settings.js')}}"></script>
    <script src="{{asset('backend/js/todolist.js')}} "></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{asset('backend/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('backend/vendors/chart.js/Chart.min.js')}} "></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('backend/js/dashboard.js')}}"></script>
    <!-- End custom js for this page-->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

        	<!-- SweetAlert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
	$(function () {
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        let link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
        });
    });
});
</script>

  </body>
</html>
