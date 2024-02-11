@extends("admin.layout.master")

@push('browser_title')
    Edit Album ::
@endpush

@section('albums-active')
    active current-page
@endsection

@section('content')
    <form action='{{route("admin.albums.do_edit", ["id" => $album->id])}}'
          method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.modules.albums.updated_edit_form')
    </form>
@endsection

@push("styles")
    <link rel="stylesheet" href="{{url("resources/dashboard/vendors/tinymce/tinymce.css")}}">
    <link href="{{url("resources/dashboard/build/css/select2.min.css")}}" rel="stylesheet"/>
@endpush

@push("scripts")
    <script src="{{url("resources/dashboard/vendors/jquery.tagsinput/src/jquery.tagsinput.js")}}"></script>
    <script src="{{url("resources/dashboard/vendors/jquery.hotkeys/jquery.hotkeys.js")}}"></script>
    <script src="{{url("resources/dashboard/vendors/google-code-prettify/src/prettify.js")}}"></script>
    <script src="{{url("resources/dashboard/vendors/tinymce/tinymce.js")}}"></script>
    <script src="{{url("resources/dashboard/build/js/select2.min.js")}}"></script>
    <script>
        $(document).ready(function () {
            $(".select2_multiple").select2({
                placeholder: "Select a posts",
                allowClear: true
            });
        })
    </script>
@endpush
