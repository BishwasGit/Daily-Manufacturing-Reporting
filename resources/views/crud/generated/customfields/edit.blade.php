@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Edit Customfields') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('customfields.index')); ?>

        </div>
        <div class='card-body'>
        <form action="{{route('customfields.update',[$data->customfield_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='customfield_id' value='{{$data->customfield_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("customfield_for","customfield_for","Customfield For",'',$data->customfield_for)}}
</div><div class="col-lg-6">{{createText("customfield_forref","customfield_forref","Customfield Forref",'',$data->customfield_forref)}}
</div><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("text","text ckeditor-classic","Text",$data->text)}}
</div><div class="col-lg-6">{{createText("fa_icon","fa_icon","Fa Icon",'',$data->fa_icon)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("logo","Logo",'',$data->logo)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('customfields.index')); ?>
</div> </form></div></div>
@endsection