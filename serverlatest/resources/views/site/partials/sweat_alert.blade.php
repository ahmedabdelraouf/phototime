@if(session()->get("error"))
<script>
Swal.fire({
  icon: 'error',
  title: 'Error',
  text: '{{session()->get("error")}}',
  showConfirmButton: false,
  timer: 3500
});
</script>
@endif

@if(session()->get("success"))
<script>
Swal.fire({
  icon: 'success',
  title: 'Success',
  text: '{{session()->get("success")}}',
  showConfirmButton: false,
  timer: 3500
});
</script>
@endif

@if(session()->get("warning"))
<script>
Swal.fire({
  icon: 'warning',
  title: 'Warning',
  text: '{{session()->get("warning")}}',
  showConfirmButton: false,
  timer: 3500
});
</script>
@endif

@if(session()->get("info"))
<script>
Swal.fire({
  icon: 'info',
  title: 'Info',
  text: '{{session()->get("info")}}',
  showConfirmButton: false,
  timer: 3500
});
</script>
@endif
