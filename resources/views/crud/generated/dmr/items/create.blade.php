@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Add Items') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('dmr.items.index')); ?>

        </div>
        <div class='card-body'>
                <form action="{{route('dmr.items.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createText("item_name","item_name","Item Name")}}
</div><div class="col-lg-6">{{createText("wip","wip","Wip")}}
</div><div class="col-lg-12 pb-2">{{createPlainTextArea("remarks","remarks ckeditor-classic","Remarks")}}
</div><div class="col-lg-6">{{createText("created_by","created_by","Created By")}}
</div><div class="col-lg-6">{{createText("updated_by","updated_by","Updated By")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('dmr.items.index')); ?>
</div> </form></div></div>
@endsection