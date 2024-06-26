@extends('backend.template')
        @section('content')
            <div class="nk-content">
                <div class="container">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block">
<div class="offcanvas-body" data-simplebar>
        <div class="nk-block-head-content w-100">
            <div class="d-flex justify-content-between pb-4">
    
                <h2>{{ label('News Details') }}</h2>
               {{-- <button class="btn btn-primary print_pdf">Print PDF</button> --}}
            </div>
            <div class="card w-100">
                <div class="p-5">
    
                    <div class="card-head">
                        <h2 class="text-center">{{$data['parent_news']}}</h2>
                    </div>
                    <div class="card-body">
                <p><b>Parent News :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->parent_news}}</span></p><p><b>Title :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->title}}</span></p><p><b>Text :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->text}}</span></p><p><b>Image :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->image}}</span></p><p><b>Thumb :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->thumb}}</span></p><p><b>Cover :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->cover}}</span></p><p><b>Display Order :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->display_order}}</span></p><p><b>Status :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span
                class="{{$data->status == 1 ? 'text-success' : 'text-danger'}}">{{$data->status == 1 ? 'Active' : 'Inactive'}}</span></p><p><b>Createdby :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->createdby}}</span></p><p><b>Updatedby :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->updatedby}}</span></p><div class="d-flex justify-content-between">
        <div>
            <p><b>Created On :</b>&nbsp;&nbsp;&nbsp;<span>{{$data->created_at}}</span></p>
            <p><b>Created By :</b>&nbsp;&nbsp;&nbsp;<span>{{$data->createdBy}}</span></p>
        </div>
        <div>
            <p><b>Updated On :</b>&nbsp;&nbsp;&nbsp;<span>{{$data->updated_at}}</span></p>
            <p><b>Updated By :</b>&nbsp;&nbsp;&nbsp;<span>{{$data->updatedBy}}</span></p>

        </div>
    </div>
    </div>
            </div>
        </div>
    </div>
</div></div>
    </div>
</div>
</div>
</div>
@endSection