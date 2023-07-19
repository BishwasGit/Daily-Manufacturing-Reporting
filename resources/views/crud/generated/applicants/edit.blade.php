@extends('backend.template')
        @section('content')
        <div class="nk-content">
            <div class="container">
                <div class="nk-content-inner">
                <div class="nk-content-body">
                <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">{{ label('Edit Applicants') }}</h1>

                    </div>
                    <div class="nk-block-head-content">
                    <ul class="d-flex"> <li>
                        <a href="{{ route('applicants.index') }}" class="btn btn-md d-md-none btn-primary">
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
        <form action="{{route('applicants.update',[$data->applicant_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='applicant_id' value='{{$data->applicant_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("name","name","Name",'',$data->name)}}
</div><div class="col-lg-6">{{createText("father_name","father_name","Father Name",'',$data->father_name)}}
</div><div class="col-lg-6">{{createText("mobile","mobile","Mobile",'',$data->mobile)}}
</div><div class="col-lg-6">{{createText("sex","sex","Sex",'',$data->sex)}}
</div><div class="col-lg-6 pb-2">{{createDate("dob","Dob",'',$data->dob)}}
</div><div class="col-lg-6">{{createText("email","email","Email",'',$data->email)}}
</div><div class="col-lg-6">{{createText("religion","religion","Religion",'',$data->religion)}}
</div><div class="col-lg-6">{{createText("marital_status","marital_status","Marital Status",'',$data->marital_status)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("qualification","qualification ckeditor-classic","Qualification",'','',$data->qualification)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("biodata","biodata ckeditor-classic","Biodata",'','',$data->biodata)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("photo","Photo",'',$data->photo)}}
</div><div class="col-lg-6">{{createText("passport_no","passport_no","Passport No",'',$data->passport_no)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("passport_copy","Passport Copy",'',$data->passport_copy)}}
</div><div class="col-lg-6">{{createText("remarks","remarks","Remarks",'',$data->remarks)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
</div> </form></div></div></div></div></div></div></div></div>
@endsection