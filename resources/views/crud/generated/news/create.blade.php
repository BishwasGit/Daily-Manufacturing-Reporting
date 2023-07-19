@extends('backend.template')
        @section('content')
        <div class="nk-content">
            <div class="container">
                <div class="nk-content-inner">
                <div class="nk-content-body">
                <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">{{ label('Add News') }}</h1>

                    </div>
                    <div class="nk-block-head-content">
                    <ul class="d-flex"> <li>
                        <a href="{{ route('news.index') }}" class="btn btn-md d-md-none btn-primary">
                                <em class="icon ni ni-plus"></em>
                                <span>List All</span>
                            </a>
                        </li>

                    </ul>
                </div>
                </div>
            </div>

            <div class="nk-block">

                        <div class="card">
                            <div class="card-body">
                <form action="{{route('news.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createCustomSelect('tbl_news', 'title', 'news_id', '', 'Parent News','parent_news', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createText("title","title","Title")}}
</div><div class="col-lg-12 pb-2">{{createTextarea("text","text ckeditor-classic","Text")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("image","Image")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("thumb","Thumb")}}
</div><div class="col-lg-12 pb-2">{{createImageInput("cover","Cover")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
</div> </form></div></div></div></div></div></div></div></div>
@endsection