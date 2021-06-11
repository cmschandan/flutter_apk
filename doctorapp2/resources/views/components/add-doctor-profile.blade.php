@extends('layouts.app')

@section('content')

<div id="wrapper">
   <div class="overlay"></div>
    
        <!-- Sidebar -->
        @include('components.sidebar')
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
	            <span class="hamb-top"></span>
	          	<span class="hamb-middle"></span>
	        	<span class="hamb-bottom"></span>
            </button>
            <div class="container justifiy-content-center">
            	<!-- form area start-->
                <div class="row ">
                    <div class="col-lg-8 col-lg-offset-2">
                    	<div class="card p-4 bg-light">
                    		<div class="card-header">
                    			Add Profile Details
                    		</div>
                    		<div class="card-body">
                    			<form method="post" action="{{route('store.doctor.profile')}}" enctype="multipart/form-data"> 
                        	<div class="form-group">
                        		<label for="about">About Yourself :</label>
                        		<textarea class="form-control" name="" id="" cols="20" rows="2" placeholder="add about yourself"></textarea>
                        	</div>
                        	<div class="form-group">
                        		<label for="">Experience : </label>
								<textarea class="form-control" name="" id="" cols="20" rows="2" placeholder="Enter experience details"></textarea>
                        	</div>

                        	<div class="form-group">
                        		<label for="education">Education : </label>
                        		<textarea class="form-control" name="" id="" cols="20" rows="2" placeholder="enter education details"></textarea>
                        	</div>

                        	<div class="form-group">
                        		<label for="fb_url">FB Profile :</label>
                        		<input type="text" class="form-control" id="" placeholder="Enter fb profile url" name="fb_url">
                        	</div>
                        	<div class="form-group">
                        		<label for="linkedin_url">LinkedIn Profile :</label>
                        		<input type="text" class="form-control" id="" placeholder="Enter linkedin profile url" name="linkedin_url">
                        	</div>
                        	<div class="form-group">
                        		<label for="twitter_url">Twitter Profile :</label>
                        		<input type="text" class="form-control" id="" placeholder="Enter twitter profile url" name="twitter_url">
                        	</div>
                        	
                        	<button type="submit" class="btn btn-primary mb-2">Submit</button>
                        	</form>
                    		</div>
                    		
                    	</div>
                                             
                    </div>
                </div>
                <!-- form area end-->
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  <script>
    $(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});
  </script>
@endsection