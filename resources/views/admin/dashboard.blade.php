@extends('admin.auth.layout.master')

@section('content')
    {{ auth()->guard('admin')->user()->name }}
@endsection

{{-- @section('script')
    <script>
        toastr.info('Are you the 6 fingered man?')
    </script>
@endsection --}}
