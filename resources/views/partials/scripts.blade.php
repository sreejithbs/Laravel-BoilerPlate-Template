
<!--   Core JS Files   -->
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

<!-- My Custom Js File -->
<script src="{{asset ('/js/custom.js')}}"></script>


<!-- AJAX CSRF TOKEN HEADER -->
<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
</script>