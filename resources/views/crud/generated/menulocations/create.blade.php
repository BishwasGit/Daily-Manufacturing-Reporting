@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header'>
        <h2 class="">{{ label('Add Menulocations') }}</h2>
        </div>
        <div class='card-body'>
                <form action="{{route('menulocations.store')}}" id="storeCustomForm" method="POST">
 @csrf 
<div class="row"><div class="col-lg-6">{{createText("title","title","Title")}}
</div> <br> <div class="col-md-12"><?php createButton("btn-primary btn-store","","Submit"); ?>
</div> </form></div></div>
@endsection