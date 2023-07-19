@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Edit Galleries') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('galleries.index')); ?>

        </div>
        <div class='card-body'>
        <form action="{{route('galleries.update',[$data->gallery_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='gallery_id' value='{{$data->gallery_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("thumb","Thumb",'',$data->thumb)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('galleries.index')); ?>
</div> </form></div></div>
@endsection