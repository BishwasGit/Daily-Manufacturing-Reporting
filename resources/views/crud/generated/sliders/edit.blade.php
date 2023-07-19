@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Edit Sliders') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('sliders.index')); ?>

        </div>
        <div class='card-body'>
        <form action="{{route('sliders.update',[$data->slider_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='slider_id' value='{{$data->slider_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("slider_title","slider_title","Slider Title",'',$data->slider_title)}}
</div><div class="col-lg-6">{{createText("slider_desc","slider_desc","Slider Desc",'',$data->slider_desc)}}
</div><div class="col-lg-6">{{createText("url1","url1","Url1",'',$data->url1)}}
</div><div class="col-lg-6">{{createText("url2","url2","Url2",'',$data->url2)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("thumb","Thumb",'',$data->thumb)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('sliders.index')); ?>
</div> </form></div></div>
@endsection