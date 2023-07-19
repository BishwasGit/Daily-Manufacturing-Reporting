@extends('backend.template')
        @section('content')
        <div class="nk-content">
            <div class="container">
                <div class="nk-content-inner">
                <div class="nk-content-body">
                <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">{{ label('Edit Jobdemand') }}</h1>

                    </div>
                    <div class="nk-block-head-content">
                    <ul class="d-flex"> <li>
                        <a href="{{ route('jobdemand.index') }}" class="btn btn-md d-md-none btn-primary">
                                <em class="icon ni ni-plus"></em>
                                <span>View Cities</span>
                            </a>
                        </li>

                    </ul>
                </div>
                </div>
            </div>

            <div class="nk-block">

                        <div class="card">
                            <div class="card-body">
        <form action="{{route('jobdemand.update',[$data->job_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='job_id' value='{{$data->job_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div><div class="col-lg-6">{{createText("countries_id","countries_id","Countries Id",'',$data->countries_id)}}
</div><div class="col-lg-6">{{createText("companies_id","companies_id","Companies Id",'',$data->companies_id)}}
</div><div class="col-lg-6">{{createText("salary","salary","Salary",'',$data->salary)}}
</div><div class="col-lg-6">{{createText("required_nos","required_nos","Required Nos",'',$data->required_nos)}}
</div><div class="col-lg-6">{{createText("contract_period","contract_period","Contract Period",'',$data->contract_period)}}
</div><div class="col-lg-6">{{createText("duty_hrs","duty_hrs","Duty Hrs",'',$data->duty_hrs)}}
</div><div class="col-lg-6">{{createText("working_days","working_days","Working Days",'',$data->working_days)}}
</div><div class="col-lg-6">{{createText("overtime","overtime","Overtime",'',$data->overtime)}}
</div><div class="col-lg-6">{{createText("food_allowance","food_allowance","Food Allowance",'',$data->food_allowance)}}
</div><div class="col-lg-6">{{createText("transport_allowance","transport_allowance","Transport Allowance",'',$data->transport_allowance)}}
</div><div class="col-lg-6">{{createText("accomodation_allowance","accomodation_allowance","Accomodation Allowance",'',$data->accomodation_allowance)}}
</div><div class="col-lg-6">{{createText("medical_provided","medical_provided","Medical Provided",'',$data->medical_provided)}}
</div><div class="col-lg-6">{{createText("insurance_provided","insurance_provided","Insurance Provided",'',$data->insurance_provided)}}
</div><div class="col-lg-6">{{createText("required_documents","required_documents","Required Documents",'',$data->required_documents)}}
</div><div class="col-lg-6">{{createText("qualification","qualification","Qualification",'',$data->qualification)}}
</div><div class="col-lg-6">{{createText("work_experience","work_experience","Work Experience",'',$data->work_experience)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("details","details ckeditor-classic","Details",'','',$data->details)}}
</div><div class="col-lg-6">{{createText("remarks","remarks","Remarks",'',$data->remarks)}}
</div><div class="col-lg-6">{{createText("postedon","postedon","Postedon",'',$data->postedon)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
</div> </form></div></div></div></div></div></div></div></div>
@endsection