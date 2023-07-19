@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Add Countries') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('countries.index')); ?>

        </div>
        <div class='card-body'>
                <form action="{{route('countries.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createText("title","title","Title")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("text","text ckeditor-classic","Text")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("details","details ckeditor-classic","Details")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("cover_photo","Cover Photo")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("image_thumb","Image Thumb")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('countries.index')); ?>
</div> </form></div></div>
@endsection