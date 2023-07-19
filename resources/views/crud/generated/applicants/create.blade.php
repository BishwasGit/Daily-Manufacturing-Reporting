@extends('backend.template')
        @section('content')
        <div class="nk-content">
            <div class="container">
                <div class="nk-content-inner">
                <div class="nk-content-body">
                <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">{{ label('Add Applicants') }}</h1>

                    </div>
                    <div class="nk-block-head-content">
                    <ul class="d-flex"> <li>
                        <a href="{{ route('applicants.index') }}" class="btn btn-md d-md-none btn-primary">
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
                <form action="{{route('applicants.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createText("name","name","Name")}}
</div><div class="col-lg-6">{{createText("father_name","father_name","Father Name")}}
</div><div class="col-lg-6">{{createText("mobile","mobile","Mobile")}}
</div><div class="col-lg-6">{{createText("sex","sex","Sex")}}
</div><div class="col-lg-6">{{createText("dob","dob","Dob")}}
</div><div class="col-lg-6">{{createText("email","email","Email")}}
</div><div class="col-lg-6">{{createText("religion","religion","Religion")}}
</div><div class="col-lg-6">{{createText("marital_status","marital_status","Marital Status")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("qualification","qualification ckeditor-classic","Qualification")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("biodata","biodata ckeditor-classic","Biodata")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("photo","Photo")}}
</div><div class="col-lg-6">{{createText("passport_no","passport_no","Passport No")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("passport_copy","Passport Copy")}}
</div><div class="col-lg-6">{{createText("remarks","remarks","Remarks")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
</div> </form></div></div></div></div></div></div></div></div>
@endsection