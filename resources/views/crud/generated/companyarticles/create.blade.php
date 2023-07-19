@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Add Companyarticles') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('companyarticles.index')); ?>

        </div>
        <div class='card-body'>
                <form action="{{route('companyarticles.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createCustomSelect('tbl_companyarticles', 'title', 'article_id', '', 'Parent Article','parent_article', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createText("title","title","Title")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("text","text ckeditor-classic","Text")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("cover_photo","Cover Photo")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('companyarticles.index')); ?>
</div> </form></div></div>
@endsection