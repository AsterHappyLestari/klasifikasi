
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from tixia.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 10:25:52 GMT -->
<head>
    @include('layout.head')
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

		
		@include('layout.navheader')

        @include('layout.sidebar')
		
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				@yield('content')
            </div>
        </div>


        <!--**********************************
            Content body end
        ***********************************-->

        @include('layout.footer')

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    @include('layout.script')
	
</body>

<!-- Mirrored from tixia.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 10:26:22 GMT -->
</html>