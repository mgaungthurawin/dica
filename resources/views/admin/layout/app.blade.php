<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.

-->
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
        Matching Service Program
    </title>
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/AdminLTE.min.css')}}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	     folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/skins/_all-skins.min.css')}}">
	<link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/iCheck/all.css') }}">
	<!-- Google Font -->
	<link rel="stylesheet"
	      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
	<!-- Time Picker -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	<link rel="shortcut icon" href="{{ asset('frontend/images/moi_logo.png') }}" sizes="130x130">
	<style>
	    .bs-example{
	        margin: 20px;
	    }
	    .accordion .fa{
	        margin-right: 0.5rem;
	    }
	</style>
	<!-- End Q and A -->

<!-- </head> -->
<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script> 

<!-- suggestion textbox -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Date Picker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	@include('admin.layout.header')
	@include('admin.layout.sidebar')
	<div class="content-wrapper">
		<section class="content container-fluid">

			@yield('content')

		</section>
	</div>
	@include('admin.layout.footer')
	@include('admin.layout.sidebar')

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Create the tabs -->
		<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
			<li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
			<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Home tab content -->
			<div class="tab-pane active" id="control-sidebar-home-tab">
				<h3 class="control-sidebar-heading">Recent Activity</h3>
				<ul class="control-sidebar-menu">
					<li>
						<a href="javascript:;">
							<i class="menu-icon fa fa-birthday-cake bg-red"></i>

							<div class="menu-info">
								<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

								<p>Will be 23 on April 24th</p>
							</div>
						</a>
					</li>
				</ul>
				<!-- /.control-sidebar-menu -->

				<h3 class="control-sidebar-heading">Tasks Progress</h3>
				<ul class="control-sidebar-menu">
					<li>
						<a href="javascript:;">
							<h4 class="control-sidebar-subheading">
								Custom Template Design
								<span class="pull-right-container">
										<span class="label label-danger pull-right">70%</span>
									</span>
							</h4>

							<div class="progress progress-xxs">
								<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
							</div>
						</a>
					</li>
				</ul>
				<!-- /.control-sidebar-menu -->

			</div>
			<!-- /.tab-pane -->
			<!-- Stats tab content -->
			<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
			<!-- /.tab-pane -->
			<!-- Settings tab content -->
			<div class="tab-pane" id="control-sidebar-settings-tab">
				<form method="post">
					<h3 class="control-sidebar-heading">General Settings</h3>

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Report panel usage
							<input type="checkbox" class="pull-right" checked>
						</label>

						<p>
							Some information about this general settings option
						</p>
					</div>
					<!-- /.form-group -->
				</form>
			</div>
			<!-- /.tab-pane -->
		</div>
	</aside>
	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
	immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div> 
<input type="hidden" id="product_url" name="product_url" value="{{ url('getProductByCategory') }}">
<input type="hidden" id="processing_url" name="processing_url" value="{{ url('getProcessingByCategory') }}">

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('bower_components/admin-lte/dist/js/demo.js')}}"></script>

<script src="{{ asset('bower_components/admin-lte/plugins/iCheck/icheck.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.js" type="text/javascript"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('bower_components/admin-lte/app.js')}}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.min.js')}}"></script>
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		var s = 1;
		var q = 1;
		$(document).on('show.bs.modal','#deleteMediaModal', function (e) {
		    var button = $(e.relatedTarget);
		    $('#delete_id').val(button.data('id'));
		    var url = '<?php echo asset("admin/media") ?>' + '/' + button.data('id');
		    $('#deleteMediaFormAction').attr('action', url);
		})

		$(document).on('show.bs.modal','#deleteFormModal', function (e) {
		    var button = $(e.relatedTarget);
		    $('#delete_id').val(button.data('id'));
		    var url = button.data('url');
		    $('#deleteFormAction').attr('action', url);
		})

		$(document).on('show.bs.modal', '#lawyerApprovalModal', function (e) {
			var button = $(e.relatedTarget);
			$('#update_id').val(button.data('id'));
			var url = button.data('url');
			$('#deleteLawyerApprovalFormAction').attr('action', url);
		})
		
		$('#date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        })

		$('textarea.editor').each(function() {
            CKEDITOR.replace($(this).attr('id'));
        });

        // Q & A document
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
        //end Q & A

        $(document).ready(function () {
        	var str = $('#company_category_id').val();
        	var array = str.split("-");
        	var category_id = array[0];
        	$('#category_id').val(array[0]);
        })

        $(document).on('change', '#company_category_id', function () {
        	$('#pro_id').empty();
        	$('#process_id').empty();
        	var str = $(this).val();
        	var array = str.split("-");
        	var category_id = array[0];
        	var prefix = array[1];
        	$('#category_id').val(array[0]);
        	// getProductByCategory(category_id, prefix);
        	// getProcessingByCategory(category_id, prefix);
        	if (array['1'] == {{ FOOD }}) {
        		window.location.href = category_id + '/' + prefix + '/food'
        	}
        })

        // function getProcessingByCategory(category_id, prefix) {
        // 	var url = $('#processing_url').val() + "?category_id=" + category_id +"&prefix="+ prefix;
        // 	var settings = {
        // 	  "url": url,
        // 	  "method": "GET",
        // 	  "timeout": 0,
        // 	};
        // 	$.ajax(settings).done(function (response) {
        // 		response.forEach(function(item) {
        // 			$('#process_id').append($('<option>',{
    			 //        value: item.id,
    			 //        text : item.main_process 
    			 //    }));
        // 		});
        // 	});
        // }

        // function getProductByCategory(category_id, prefix) {
        // 	var url = $('#product_url').val() + "?category_id=" + category_id +"&prefix="+ prefix;
        // 	var settings = {
        // 	  "url": url,
        // 	  "method": "GET",
        // 	  "timeout": 0,
        // 	};

        // 	$.ajax(settings).done(function (response) {
        // 		response.forEach(function(item) {
        // 			$('#pro_id').append($('<option>', {
    			 //        value: item.id,
    			 //        text : item.name 
    			 //    }));
        // 		});
        // 	});
        // }

        $("input[id*='mm_name'], text[id*='mm_name']").change(function(e) {
            myanmarLetterOnly($(this));
        });
        
        $(document).on('keydown', '#mm_name', function () {
        	myanmarLetterOnly($(this));
        })

        $('#pro_id').select2();
        $('#process_id').select2();
        $('#loc_id').select2();

        function myanmarLetterOnly( self )
        {
            val = self.val();
            if ( /[a-zA-Z0-9]+$/.test( val ) ) {
              self.val( val.replace(/[a-zA-Z0-9]+$/, '') );
            }
        }

        

	})
</script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@include('sweetalert::alert')
</body>
</html>