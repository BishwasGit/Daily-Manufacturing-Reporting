@extends("backend.template")
@section("content")
<style> 
.page-content {
    
    background: url({{ asset('assets/images/admin-bg.jpg') }});
    background-size: contain;
    height:100vh;
}
</style>

@endsection

@push("js")

@endpush