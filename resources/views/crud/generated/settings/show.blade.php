@extends('backend.template')
        @section('content')
        <div class='card'>
            <div class='card-header d-flex justify-content-between align-items-center'>
            <h2><?php echo label('View Details'); ?></h2>
            <?php createButton("btn-primary btn-cancel","","Back to List",route('settings.index')); ?>

            </div>
            <div class='card-body'>
            
        
    
                <p><b>Title :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->title}}</span></p><p><b>Description :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->description}}</span></p><p><b>Url1 :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->url1}}</span></p><p><b>Url2 :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->url2}}</span></p><p><b>Email :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->email}}</span></p><p><b>Phone :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->phone}}</span></p><p><b>Secondary Phone :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->secondary_phone}}</span></p><p><b>Google Map :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->google_map}}</span></p><p><b>Fb :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->fb}}</span></p><p><b>Insta :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->insta}}</span></p><p><b>Twitter :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->twitter}}</span></p><p><b>Tiktok :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->tiktok}}</span></p><p><b>Primary Logo :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->primary_logo}}</span></p><p><b>Secondary Logo :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->secondary_logo}}</span></p><p><b>Thumb :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->thumb}}</span></p><p><b>Icon :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->icon}}</span></p><p><b>Og Image :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->og_image}}</span></p><p><b>No Image :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->no_image}}</span></p><p><b>Copyright Text :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->copyright_text}}</span></p><p><b>Content1 :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->content1}}</span></p><p><b>Content2 :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->content2}}</span></p><p><b>Content3 :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->content3}}</span></p><p><b>Display Order :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->display_order}}</span></p><p><b>Status :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span
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