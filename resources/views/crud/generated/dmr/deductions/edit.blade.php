@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Edit Deductions') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('dmr.deductions.index')); ?>

        </div>
        <div class='card-body'>
        <form action="{{route('dmr.deductions.update',[$data->deduction_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='deduction_id' value='{{$data->deduction_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("deduction_amount","deduction_amount","Deduction Amount",'',$data->deduction_amount)}}
</div><div class="col-lg-6">{{createText("deduction_to","deduction_to","Deduction To",'',$data->deduction_to)}}
</div><div class="col-lg-6">{{createText("deduction_from","deduction_from","Deduction From",'',$data->deduction_from)}}
</div><div class="col-lg-12 pb-2">{{createPlainTextArea("remarks","Remarks",'',$data->remarks)}}
</div><div class="col-lg-6">{{createText("created_by","created_by","Created By",'',$data->created_by)}}
</div><div class="col-lg-6">{{createText("updated_by","updated_by","Updated By",'',$data->updated_by)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('dmr.deductions.index')); ?>
</div> </form></div></div>
@endsection