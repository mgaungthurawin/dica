<!-- <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> -->


<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->

<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="{{ asset('v2/js/assetlibs.js') }}"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->

<script type="text/javascript" src=" {{ asset('v2/js/bootstrap-datepicker.js') }}"></script>

<script>
// $(document).ready(function() {
//   $("#myCarousel").on("slide.bs.carousel", function(e) {
//     var $e = $(e.relatedTarget);
//     var idx = $e.index();
//     var itemsPerSlide = 3;
//     var totalItems = $("#myCarousel .carousel-item").length;

//     if (idx >= totalItems - (itemsPerSlide - 1)) {
//       var it = itemsPerSlide - (totalItems - idx);
//       for (var i = 0; i < it; i++) {
//         // añade cards al final
//         if (e.direction == "left") {
//           $("#myCarousel .carousel-item")
//             .eq(i)
//             .appendTo("#myCarousel .carousel-inner");
//         } else {
//           $("#myCarousel .carousel-item")
//             .eq(0)
//             .appendTo($(this).find(".carousel-inner"));
//         }
//       }
//     }
//   });
// });
// $('.carousel[data-type="multi"] .item').each(function() {
// 	var next = $(this).next();
// 	if (!next.length) {
// 		next = $(this).siblings(':first');
// 	}
// 	next.children(':first-child').clone().appendTo($(this));

// 	for (var i = 0; i < 2; i++) {
// 		next = next.next();
// 		if (!next.length) {
// 			next = $(this).siblings(':first');
// 		}

// 		next.children(':first-child').clone().appendTo($(this));
// 	}
// });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<input type="hidden" id="allSearch" value="{{ url('overAllSearch') }}">
<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('submit', '#orver-all-search', function (e) {
			e.preventDefault();
			var data = $("#orver-all-search").serialize();
			var url = $('#allSearch').val();
			window.location.href = url +'?'+ data;
		})

		$(document).on('submit', '#contact_form', function (e) {
			e.preventDefault();
			var data = $('#contact_form').serializeArray();
			var url = "{{ url('contactemail') }}";
			var home = "{{ url('/') }}";
			Swal.fire({
			  title: 'Are you sure?',
			  text: "You want to send email to business machining service",
			  icon: 'success',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes'
			}).then((result) => {
			  if (result.isConfirmed) {
			  	$.ajax({
		  	        url: url,
		  	        method:"POST",
		  	        data: data,
		  	        success:function(response) {
		  	        	var result = JSON.parse(response);
		  	           if(result.status === true){
		  	           	 Swal.fire(
		  	           	   'You have successfully sent email to business machining service'
		  	           	 )
		  	           	 window.setTimeout(function(){ } ,5000);
		  	           	 window.location.href = home;
		  	           }
		  	        }
		  	      })
			  }
			})
		})
	})
  $('.navbar-toggle').click(function(){
    console.log('hi');
    $('#bs-example-navbar-collapse-1').toggle();
})
</script>


