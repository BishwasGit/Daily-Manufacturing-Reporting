@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Edit Units') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('dmr.units.index')); ?>

        </div>
        <div class='card-body'>
        <form action="{{route('dmr.units.update',[$data->unit_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='unit_id' value='{{$data->unit_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("units_name","units_name","Units Name",'',$data->units_name)}}
</div><div class="col-lg-12 pb-2">{{createPlainTextArea("remarks","Remarks",'',$data->remarks)}}
</div><div class="col-lg-6">{{createText("created_by","created_by","Created By",'',$data->created_by)}}
</div><div class="col-lg-6">{{createText("updated_by","updated_by","Updated By",'',$data->updated_by)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('dmr.units.index')); ?>
</div> </form></div></div>
@endsection