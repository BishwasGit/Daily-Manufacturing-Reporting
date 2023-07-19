@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header'>
        <h2 class="">{{ label('Edit Menulocations') }}</h2>
        </div>
        <div class='card-body'>
        <form action="{{route('menulocations.update',[$data->menulocation_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='menulocation_id' value='{{$data->menulocation_id}}'/>
<div class="row"><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
</div> </form></div></div>
@endsection