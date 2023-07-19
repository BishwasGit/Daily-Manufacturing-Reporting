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
    
                <h2>{{ label('Jobdemand Details') }}</h2>
               {{-- <button class="btn btn-primary print_pdf">Print PDF</button> --}}
            </div>
            <div class="card w-100">
                <div class="p-5">
    
                    <div class="card-head">
                        <h2 class="text-center">{{$data['title']}}</h2>
                    </div>
                    <div class="card-body">
                <p><b>Title :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->title}}</span></p><p><b>Alias :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->alias}}</span></p><p><b>Countries Id :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->countries_id}}</span></p><p><b>Companies Id :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->companies_id}}</span></p><p><b>Salary :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->salary}}</span></p><p><b>Required Nos :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->required_nos}}</span></p><p><b>Contract Period :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->contract_period}}</span></p><p><b>Duty Hrs :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->duty_hrs}}</span></p><p><b>Working Days :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->working_days}}</span></p><p><b>Overtime :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->overtime}}</span></p><p><b>Food Allowance :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->food_allowance}}</span></p><p><b>Transport Allowance :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->transport_allowance}}</span></p><p><b>Accomodation Allowance :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->accomodation_allowance}}</span></p><p><b>Medical Provided :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->medical_provided}}</span></p><p><b>Insurance Provided :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->insurance_provided}}</span></p><p><b>Required Documents :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->required_documents}}</span></p><p><b>Qualification :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->qualification}}</span></p><p><b>Work Experience :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->work_experience}}</span></p><p><b>Details :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->details}}</span></p><p><b>Remarks :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->remarks}}</span></p><p><b>Postedon :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->postedon}}</span></p><p><b>Display Order :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->display_order}}</span></p><p><b>Status :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span
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