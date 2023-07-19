@extends('backend.template')

@section('content')
<div class="card">
    <div class="card-header">
        {{ label($title . ' List') }}

        <ul class="d-flex">
            <li>
                <a href="{{ route($routeName . 'create') }}" class="btn btn-md d-md-none btn-primary" data-bs-toggle="modal" data-bs-target="">
                    <em class="icon ni ni-plus"></em><span>Add</span>
                </a>
            </li>
            <li>
                <a href="{{ route($routeName . 'create') }}" class="btn btn-primary d-none d-md-inline-flex">
                    <em class="icon ni ni-plus"></em><span>Add {{ label($translated) }}</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <table class="datatable-init table" data-nk-container="table-responsive" id="CustomTable">
            <thead class="table-light">
                <tr>
                    <th class="tb-col"><span class="overline-title">S.N.</span></th>
                    {{ $tableHeader }}
                    <th class="tb-col" data-sortable="false"><span class="overline-title">{{ label('Action') }}</span></th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($data as $item)
                {{ $tableRows }}
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection