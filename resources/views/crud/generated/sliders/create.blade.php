@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Add Sliders') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('sliders.index')); ?>

        </div>
        <div class='card-body'>
                <form action="{{route('sliders.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createText("slider_title","slider_title","Slider Title")}}
</div><div class="col-lg-6">{{createText("slider_desc","slider_desc","Slider Desc")}}
</div><div class="col-lg-6">{{createText("url1","url1","Url1")}}
</div><div class="col-lg-6">{{createText("url2","url2","Url2")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("thumb","Thumb")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('sliders.index')); ?>
</div> </form></div></div>
@endsection