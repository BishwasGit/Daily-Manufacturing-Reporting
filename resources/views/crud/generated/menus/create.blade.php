@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header'>
        <h2 class="">{{ label('Add Menus') }}</h2>
        </div>
        <div class='card-body'>
                <form action="{{route('menus.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createCustomSelect('tbl_menus', 'title', 'menu_id', '', 'Parent Menu','parent_menu', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createCustomSelect('tbl_menulocations', 'title', 'menulocation_id', '', 'Menulocations Id','menulocations_id', 'form-control select2','status<>-1')}}</div><div class="col-lg-6">{{createText("title","title","Title")}}
</div><div class="col-lg-6">{{createText("type","type","Type")}}
</div><div class="col-lg-6">{{createText("ref","ref","Ref")}}
</div><div class="col-lg-6">{{createText("target","target","Target")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
</div> </form></div></div>
@endsection