<script type="text/javascript" src="{{ asset('v2/js/assetlibs.js') }}"></script>
<script type="text/javascript" src=" {{ asset('v2/js/bootstrap-datepicker.js') }}"></script>
<input type="hidden" id="allSearch" value="{{ url('overAllSearch') }}">
<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('submit', '#orver-all-search', function (e) {
			e.preventDefault();
			var data = $("#orver-all-search").serialize();
			var url = $('#allSearch').val();
			window.location.href = url +'?'+ data;
		})
	})

</script>


