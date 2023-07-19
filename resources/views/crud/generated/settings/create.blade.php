@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Add Settings') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('settings.index')); ?>

        </div>
        <div class='card-body'>
                <form action="{{route('settings.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createText("title","title","Title")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("description","description ckeditor-classic","Description")}}
</div><div class="col-lg-6">{{createText("url1","url1","Url1")}}
</div><div class="col-lg-6">{{createText("url2","url2","Url2")}}
</div><div class="col-lg-6">{{createText("email","email","Email")}}
</div><div class="col-lg-6">{{createText("phone","phone","Phone")}}
</div><div class="col-lg-6">{{createText("secondary_phone","secondary_phone","Secondary Phone")}}
</div><div class="col-lg-6">{{createText("google_map","google_map","Google Map")}}
</div><div class="col-lg-6">{{createText("fb","fb","Fb")}}
</div><div class="col-lg-6">{{createText("insta","insta","Insta")}}
</div><div class="col-lg-6">{{createText("twitter","twitter","Twitter")}}
</div><div class="col-lg-6">{{createText("tiktok","tiktok","Tiktok")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("primary_logo","Primary Logo")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("secondary_logo","Secondary Logo")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("thumb","Thumb")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("icon","Icon")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("og_image","Og Image")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("no_image","No Image")}}
</div><div class="col-lg-6">{{createText("copyright_text","copyright_text","Copyright Text")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("content1","content1 ckeditor-classic","Content1")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("content2","content2 ckeditor-classic","Content2")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("content3","content3 ckeditor-classic","Content3")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('settings.index')); ?>
</div> </form></div></div>
@endsection