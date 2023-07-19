@extends('backend.template')
@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="nk-content-inner">
                <form method="get" action="{{ route('form.store') }}" enctype="multipart/form-data">
                    {{Label('Operation')}}
                    
                    {{ customCreateSelect('type', 'type', '', '', ['ajax-curd' => 'Ajax CURD', 'make-table-nullable'=>'Make Table Nullable','store' => 'store', 'update' => 'update']) }}

                    {{Label('Table Name')}}

                    {{ customCreateSelect('tableName', 'tableName', 'form-control custom-select2', '', $allTables) }}

                    {{Label('Write To')}}

                    {{ createText('directoryName', 'directoryName', 'Directory Name') }}
                    <?php createButton('mt-3 btn-primary', '', 'Submit'); ?>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.custom-select2').select2();
        });
    </script>
@endpush
