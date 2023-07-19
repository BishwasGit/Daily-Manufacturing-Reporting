@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class="">{{ label('Edit Companyarticles') }}</h2>
        <?php createButton("btn-primary btn-cancel","","Cancel",route('companyarticles.index')); ?>

        </div>
        <div class='card-body'>
        <form action="{{route('companyarticles.update',[$data->article_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='article_id' value='{{$data->article_id}}'/>
<div class="row"><div class="col-lg-6">{{createCustomSelect('tbl_companyarticles', 'title', 'article_id', $data->parent_article, 'Parent Article','parent_article', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("text","text ckeditor-classic","Text",$data->text)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("cover_photo","Cover Photo",'',$data->cover_photo)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
<?php createButton("btn-primary btn-cancel","","Cancel",route('companyarticles.index')); ?>
</div> </form></div></div>
@endsection