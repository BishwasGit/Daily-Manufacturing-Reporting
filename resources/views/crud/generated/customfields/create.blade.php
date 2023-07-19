@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Add Customfields') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('customfields.index')); ?>

        </div>
        <div class='card-body'>
                <form action="{{route('customfields.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createText("customfield_for","customfield_for","Customfield For")}}
</div><div class="col-lg-6">{{createText("customfield_forref","customfield_forref","Customfield Forref")}}
</div><div class="col-lg-6">{{createText("title","title","Title")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("text","text ckeditor-classic","Text")}}
</div><div class="col-lg-6">{{createText("fa_icon","fa_icon","Fa Icon")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("logo","Logo")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('customfields.index')); ?>
</div> </form></div></div>
@endsection