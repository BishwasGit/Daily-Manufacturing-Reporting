@extends('backend.template')
        @section('content')
        <div class="nk-content">
            <div class="container">
                <div class="nk-content-inner">
                <div class="nk-content-body">
                <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">{{ label('Edit Jobdemands') }}</h1>

                    </div>
                    <div class="nk-block-head-content">
                    <ul class="d-flex"> <li>
                        <a href="{{ route('jobdemands.index') }}" class="btn btn-md d-md-none btn-primary">
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
        <form action="{{route('jobdemands.update',[$data->job_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='job_id' value='{{$data->job_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div><div class="col-lg-6">{{createCustomSelect('tbl_countries', 'title', 'country_id', $data->countries_id, 'Countries Id','countries_id', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createCustomSelect('tbl_companies', 'title', 'company_id', $data->companies_id, 'Companies Id','companies_id', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createText("salary","salary","Salary",'',$data->salary)}}
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
</div><div class="col-lg-12 pb-2">{{createTextarea("required_documents","required_documents ckeditor-classic","Required Documents",'','',$data->required_documents)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("qualification","qualification ckeditor-classic","Qualification",'','',$data->qualification)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("experience","experience ckeditor-classic","Experience",'','',$data->experience)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("details","details ckeditor-classic","Details",'','',$data->details)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("image","Image",'',$data->image)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("thumb","Thumb",'',$data->thumb)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("cover","Cover",'',$data->cover)}}
</div><div class="col-lg-6">{{createText("remarks","remarks","Remarks",'',$data->remarks)}}
</div><div class="col-lg-6 pb-2">{{createDate("postedon","Postedon",'',$data->postedon)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
</div> </form></div></div></div></div></div></div></div></div>
@endsection