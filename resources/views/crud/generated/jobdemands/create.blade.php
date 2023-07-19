@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header'>
        <h2 class="">{{ label('Add Jobdemands') }}</h2>
        </div>
        <div class='card-body'>
                <form action="{{route('jobdemands.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createText("title","title","Title")}}
</div><div class="col-lg-6">{{createCustomSelect('tbl_countries', 'title', 'country_id', '', 'Countries Id','countries_id', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createCustomSelect('tbl_companies', 'title', 'company_id', '', 'Companies Id','companies_id', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createText("salary","salary","Salary")}}
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
</div><div class="col-lg-12 pb-2">{{createTextarea("required_documents","required_documents ckeditor-classic","Required Documents")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("qualification","qualification ckeditor-classic","Qualification")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("experience","experience ckeditor-classic","Experience")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("details","details ckeditor-classic","Details")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("image","Image")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("thumb","Thumb")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("cover","Cover")}}
</div><div class="col-lg-6">{{createText("remarks","remarks","Remarks")}}
</div><div class="col-lg-6 pb-2">{{createDate("postedon","Postedon",'',date('Y-m-d'))}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
</div> </form></div></div>
@endsection