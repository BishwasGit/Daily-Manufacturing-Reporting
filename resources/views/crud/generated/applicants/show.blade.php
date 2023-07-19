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
    
                <h2>{{ label('Applicants Details') }}</h2>
               {{-- <button class="btn btn-primary print_pdf">Print PDF</button> --}}
            </div>
            <div class="card w-100">
                <div class="p-5">
    
                    <div class="card-head">
                        <h2 class="text-center">{{$data['name']}}</h2>
                    </div>
                    <div class="card-body">
                <p><b>Name :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->name}}</span></p><p><b>Father Name :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->father_name}}</span></p><p><b>Mobile :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->mobile}}</span></p><p><b>Sex :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->sex}}</span></p><p><b>Dob :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->dob}}</span></p><p><b>Email :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->email}}</span></p><p><b>Religion :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->religion}}</span></p><p><b>Marital Status :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->marital_status}}</span></p><p><b>Qualification :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->qualification}}</span></p><p><b>Biodata :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->biodata}}</span></p><p><b>Photo :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->photo}}</span></p><p><b>Passport No :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->passport_no}}</span></p><p><b>Passport Copy :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->passport_copy}}</span></p><p><b>Display Order :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->display_order}}</span></p><p><b>Status :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span
                class="{{$data->status == 1 ? 'text-success' : 'text-danger'}}">{{$data->status == 1 ? 'Active' : 'Inactive'}}</span></p><p><b>Createdby :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->createdby}}</span></p><p><b>Updatedby :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->updatedby}}</span></p><p><b>Remarks :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->remarks}}</span></p><div class="d-flex justify-content-between">
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