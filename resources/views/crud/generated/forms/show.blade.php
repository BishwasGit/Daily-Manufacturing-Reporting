@extends('backend.template')
        @section('content')
        <div class='card'>
            <div class='card-header d-flex justify-content-between align-items-center'>
            <h2><?php echo label('View Details'); ?></h2>
            <?php createButton("btn-primary btn-cancel","","Back to List",route('forms.index')); ?>

            </div>
            <div class='card-body'>
            
        
    
                <p><b>Title :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->title}}</span></p><p><b>Alias :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->alias}}</span></p><p><b>Cover Photo :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->cover_photo}}</span></p><p><b>Image Thumb :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->image_thumb}}</span></p><p><b>Form Fields :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->form_fields}}</span></p><p><b>Text :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->text}}</span></p><p><b>Headers :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->headers}}</span></p><p><b>Toemail :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->toemail}}</span></p><p><b>Fromemail :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->fromemail}}</span></p><p><b>Emailsubject :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->emailsubject}}</span></p><p><b>Emailtext :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->emailtext}}</span></p><p><b>Autoresponse :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->autoresponse}}</span></p><p><b>Responseheaders :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->responseheaders}}</span></p><p><b>Responsefrom :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->responsefrom}}</span></p><p><b>Responsesubject :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->responsesubject}}</span></p><p><b>Responsetext :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->responsetext}}</span></p><p><b>Display Order :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->display_order}}</span></p><p><b>Status :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span
                class="{{$data->status == 1 ? 'text-success' : 'text-danger'}}">{{$data->status == 1 ? 'Active' : 'Inactive'}}</span></p><p><b>Createdby :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->createdby}}</span></p><p><b>Updatedby :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->updatedby}}</span></p><div class="d-flex justify-content-between">
        <div>
            <p><b>Created On :</b>&nbsp;&nbsp;&nbsp;<span>{{$data->created_at}}</span></p>
            <p><b>Created By :</b>&nbsp;&nbsp;&nbsp;<span>{{$data->createdBy}}</span></p>
        </div>
        <div>
            <p><b>Updated On :</b>&nbsp;&nbsp;&nbsp;<span>{{$data->updated_at}}</span></p>
            <p><b>Updated By :</b>&nbsp;&nbsp;&nbsp;<span>{{$data->updatedBy}}</span></p>

        </div>
    </div>
    
            </div>
        </div>
            
@endSection