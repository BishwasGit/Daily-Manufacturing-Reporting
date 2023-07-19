@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header'>
        <h2 class="">{{ label('Edit Sitemenus') }}</h2>
        </div>
        <div class='card-body'>
        <form action="{{route('sitemenus.update',[$data->menu_id])}}" id="updateCustomForm" method="POST" >
 @csrf <input type=hidden name='menu_id' value='{{$data->menu_id}}'/>
<div class="row"><div class="col-lg-6">{{createCustomSelect('tbl_sitemenus', 'title', 'menu_id', $data->parent_menu, 'Parent Menu','parent_menu', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createCustomSelect('tbl_menulocations', 'title', 'menulocation_id', $data->menulocations_id, 'Menulocations Id','menulocations_id', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
</div><div class="col-lg-6">{{createText("type","type","Type",'',$data->type)}}
</div><div class="col-lg-6">{{createText("ref","ref","Ref",'',$data->ref)}}
</div><div class="col-lg-6">{{createText("target","target","Target",'',$data->target)}}
</div>  <div class="col-md-12"><?php createButton("btn-primary btn-update","","Submit"); ?>
</div> </form></div></div>
@endsection