Companyarticles@extends('backend.template')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>{{ label("Companyarticles List") }}</h2>
        <a href="{{ route('companyarticles.create') }}" class="btn btn-primary"><span>{{label("Create New")}}</span></a>
    </div>
    <div class="card-body">
        <table class="table dataTable">
            <thead class="table-light">
                <tr>
                    <th class="tb-col"><span class="overline-title">{{label("Sn.")}}</span></th>
                    <th class="tb-col"><span class="overline-title">{{ label("parent_article") }}</span></th>
                    <th class="tb-col"><span class="overline-title">{{ label("title") }}</span></th>
                    <th class="tb-col"><span class="overline-title">{{ label("alias") }}</span></th>
                    <th class="tb-col" data-sortable="false"><span class="overline-title">{{ label("Action") }}</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($data as $item)
                <tr>
                    <td class="tb-col">{{ $i++ }}</td>
                    <td class="tb-col">{{ $item->parent_article }}</td>
                    <td class="tb-col">{{ $item->title }}</td>
                    <td class="tb-col">{{ $item->alias }}</td>
                    <td class="tb-col">
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-fill align-middle"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{route('companyarticles.show',[$item->article_id])}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> {{label("View")}}</a></li>
                                <li><a href="{{route('companyarticles.edit',[$item->article_id])}}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> {{label("Edit")}}</a></li>
                                <li>
                                    <a class="dropdown-item remove-item-btn" data-route="{{route('companyarticles.destroy',[$item->article_id])}}">
                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> {{label("Delete")}}
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>

        <textarea rows="20" class="form-control">{{App\Http\Controllers\GeneralFormController::listContent("tbl_companyarticles","")}}</textarea>
    </div>
</div>

@endsection