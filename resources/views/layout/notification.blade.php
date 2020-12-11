@if(Session::has('message'))
	<input type='hidden' id='show' value='1'>
	<input type='hidden' id='error' value='{{Session::get('error')}}'>
	<input type='hidden' id='message' value='{{Session::get('message')}}'>
@else
	<input type='hidden' id='show' value='0'>
@endif
<script type="text/javascript">
 $( document ).ready(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    var show = $('#show').val();
    var error = $('#error').val();
    var message = $('#message').val();
	if(show=='1'){
		Toast.fire({
			icon: error,
			title: "&nbsp;&nbsp;"+message
		})
	}
 });
</script>
