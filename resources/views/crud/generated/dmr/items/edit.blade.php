@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Edit Items') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('dmr.items.index')); ?>

        </div>
        <div class='card-body'>
        <form action="{{route('dmr.items.update',[$data->item_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='item_id' value='{{$data->item_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("item_name","item_name","Item Name",'',$data->item_name)}}
</div><div class="col-lg-6">{{createText("wip","wip","Wip",'',$data->wip)}}
</div><div class="col-lg-12 pb-2">{{createPlainTextArea("remarks","Remarks",'',$data->remarks)}}
</div><div class="col-lg-6">{{createText("created_by","created_by","Created By",'',$data->created_by)}}
</div><div class="col-lg-6">{{createText("updated_by","updated_by","Updated By",'',$data->updated_by)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('dmr.items.index')); ?>
</div> </form></div></div>
@endsection