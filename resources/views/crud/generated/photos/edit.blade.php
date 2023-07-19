@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Edit Photos') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('photos.index')); ?>

        </div>
        <div class='card-body'>
        <form action="{{route('photos.update',[$data->photo_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='photo_id' value='{{$data->photo_id}}'/>
<div class="row"><div class="col-lg-6">{{createCustomSelect('tbl_galleries', 'title', 'gallery_id', $data->galleries_id, 'Galleries Id','galleries_id', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("thumb","Thumb",'',$data->thumb)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('photos.index')); ?>
</div> </form></div></div>
@endsection