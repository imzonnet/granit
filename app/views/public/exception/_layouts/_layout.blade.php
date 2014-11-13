<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>{{ Services\MenuManager::getTitle($title) }}</title>
		@section('meta_description')
		    <!-- -->
		@show
		@section('meta_keywords')
		    <!-- -->
		@show

		<meta name="author" content="John Nguyen">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="{{URL::to("assets/public/exception/images/favicon.ico")}}">

		<!-- CSS StyleSheets -->

		@include('public.exception._layouts._StylesPartial')

		
		<!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->

	
	</head>
	<body>
	    
	    <!-- site preloader start -->
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">
		    
            <!-- Header Start -->
            @include('public.exception._layouts._HeaderPartial')
            <!-- Header End -->

			<!-- Content Start -->
			<div id="contentWrapper">

                @section('slider')
                    {{-- Here goes the slider --}}
                @show

                @section('heading')

                @show

                @section('content')

                @show
				

			</div>
			<!-- Content End -->
			
			<!-- Footer start -->
            @include('public.exception._layouts._FooterPartial')
		    <!-- Footer end -->
		    
		    <!-- Back to top Link -->
	    	<div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
	    	
	    </div>

	    @include('public.exception._layouts._ScriptsPartial')

	</body>
</html>