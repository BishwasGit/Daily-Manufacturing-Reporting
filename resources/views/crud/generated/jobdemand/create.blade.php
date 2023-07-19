@extends('backend.template')
        @section('content')
        <div class="nk-content">
            <div class="container">
                <div class="nk-content-inner">
                <div class="nk-content-body">
                <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">{{ label('Add Jobdemand') }}</h1>

                    </div>
                    <div class="nk-block-head-content">
                    <ul class="d-flex"> <li>
                        <a href="{{ route('jobdemand.index') }}" class="btn btn-md d-md-none btn-primary">
                                <em class="icon ni ni-plus"></em>
                                <span>List All</span>
                            </a>
                        </li>

                    </ul>
                </div>
                </div>
            </div>

            <div class="nk-block">

                        <div class="card">
                            <div class="card-body">
                <form action="{{route('jobdemand.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createText("title","title","Title")}}
</div><div class="col-lg-6">{{createText("countries_id","countries_id","Countries Id")}}
</div><div class="col-lg-6">{{createText("companies_id","companies_id","Companies Id")}}
</div><div class="col-lg-6">{{createText("salary","salary","Salary")}}
</div><div class="col-lg-6">{{createText("required_nos","required_nos","Required Nos")}}
</div><div class="col-lg-6">{{createText("contract_period","contract_period","Contract Period")}}
</div><div class="col-lg-6">{{createText("duty_hrs","duty_hrs","Duty Hrs")}}
</div><div class="col-lg-6">{{createText("working_days","working_days","Working Days")}}
</div><div class="col-lg-6">{{createText("overtime","overtime","Overtime")}}
</div><div class="col-lg-6">{{createText("food_allowance","food_allowance","Food Allowance")}}
</div><div class="col-lg-6">{{createText("transport_allowance","transport_allowance","Transport Allowance")}}
</div><div class="col-lg-6">{{createText("accomodation_allowance","accomodation_allowance","Accomodation Allowance")}}
</div><div class="col-lg-6">{{createText("medical_provided","medical_provided","Medical Provided")}}
</div><div class="col-lg-6">{{createText("insurance_provided","insurance_provided","Insurance Provided")}}
</div><div class="col-lg-6">{{createText("required_documents","required_documents","Required Documents")}}
</div><div class="col-lg-6">{{createText("qualification","qualification","Qualification")}}
</div><div class="col-lg-6">{{createText("work_experience","work_experience","Work Experience")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("details","details ckeditor-classic","Details")}}
</div><div class="col-lg-6">{{createText("remarks","remarks","Remarks")}}
</div><div class="col-lg-6">{{createText("postedon","postedon","Postedon")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
</div> </form></div></div></div></div></div></div></div></div>
@endsection