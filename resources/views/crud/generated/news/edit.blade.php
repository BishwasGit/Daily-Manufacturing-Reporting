@extends('backend.template')
        @section('content')
        <div class="nk-content">
            <div class="container">
                <div class="nk-content-inner">
                <div class="nk-content-body">
                <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">{{ label('Edit News') }}</h1>

                    </div>
                    <div class="nk-block-head-content">
                    <ul class="d-flex"> <li>
                        <a href="{{ route('news.index') }}" class="btn btn-md d-md-none btn-primary">
                                <em class="icon ni ni-plus"></em>
                                <span>View Cities</span>
                            </a>
                        </li>

                    </ul>
                </div>
                </div>
            </div>

            <div class="nk-block">

                        <div class="card">
                            <div class="card-body">
        <form action="{{route('news.update',[$data->news_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='news_id' value='{{$data->news_id}}'/>
<div class="row"><div class="col-lg-6">{{createCustomSelect('tbl_news', 'title', 'news_id', $data->parent_news, 'Parent News','parent_news', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div><div class="col-lg-12 pb-2">{{createTextarea("text","text ckeditor-classic","Text",'','',$data->text)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("image","Image",'',$data->image)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("thumb","Thumb",'',$data->thumb)}}
</div><div class="col-lg-12 pb-2">{{createImageInput("cover","Cover",'',$data->cover)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
</div> </form></div></div></div></div></div></div></div></div>
@endsection