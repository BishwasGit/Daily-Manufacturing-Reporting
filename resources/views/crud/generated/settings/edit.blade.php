@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Edit Settings') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('settings.index')); ?>

        </div>
        <div class='card-body'>
        <form action="{{route('settings.update',[$data->setting_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='setting_id' value='{{$data->setting_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("description","description ckeditor-classic","Description",$data->description)}}
</div><div class="col-lg-6">{{createText("url1","url1","Url1",'',$data->url1)}}
</div><div class="col-lg-6">{{createText("url2","url2","Url2",'',$data->url2)}}
</div><div class="col-lg-6">{{createText("email","email","Email",'',$data->email)}}
</div><div class="col-lg-6">{{createText("phone","phone","Phone",'',$data->phone)}}
</div><div class="col-lg-6">{{createText("secondary_phone","secondary_phone","Secondary Phone",'',$data->secondary_phone)}}
</div><div class="col-lg-6">{{createText("google_map","google_map","Google Map",'',$data->google_map)}}
</div><div class="col-lg-6">{{createText("fb","fb","Fb",'',$data->fb)}}
</div><div class="col-lg-6">{{createText("insta","insta","Insta",'',$data->insta)}}
</div><div class="col-lg-6">{{createText("twitter","twitter","Twitter",'',$data->twitter)}}
</div><div class="col-lg-6">{{createText("tiktok","tiktok","Tiktok",'',$data->tiktok)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("primary_logo","Primary Logo",'',$data->primary_logo)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("secondary_logo","Secondary Logo",'',$data->secondary_logo)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("thumb","Thumb",'',$data->thumb)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("icon","Icon",'',$data->icon)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("og_image","Og Image",'',$data->og_image)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("no_image","No Image",'',$data->no_image)}}
</div><div class="col-lg-6">{{createText("copyright_text","copyright_text","Copyright Text",'',$data->copyright_text)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("content1","content1 ckeditor-classic","Content1",$data->content1)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("content2","content2 ckeditor-classic","Content2",$data->content2)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("content3","content3 ckeditor-classic","Content3",$data->content3)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('settings.index')); ?>
</div> </form></div></div>
@endsection