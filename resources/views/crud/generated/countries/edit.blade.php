@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Edit Countries') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('countries.index')); ?>

        </div>
        <div class='card-body'>
        <form action="{{route('countries.update',[$data->country_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='country_id' value='{{$data->country_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("text","text ckeditor-classic","Text",$data->text)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("details","details ckeditor-classic","Details",$data->details)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("cover_photo","Cover Photo",'',$data->cover_photo)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("image_thumb","Image Thumb",'',$data->image_thumb)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('countries.index')); ?>
</div> </form></div></div>
@endsection