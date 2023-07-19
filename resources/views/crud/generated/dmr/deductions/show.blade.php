@extends('backend.template')
        @section('content')
        <div class='card'>
            <div class='card-header d-flex justify-content-between align-items-center'>
            <h2><?php echo label('View Details'); ?></h2>
            <?php createButton("btn-primary btn-cancel","","Back to List",route('dmr.deductions.index')); ?>

            </div>
            <div class='card-body'>
            
        
    
                <p><b>Deduction Amount :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->deduction_amount}}</span></p><p><b>Deduction To :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->deduction_to}}</span></p><p><b>Deduction From :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->deduction_from}}</span></p><p><b>Status :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span
                class="{{$data->status == 1 ? 'text-success' : 'text-danger'}}">{{$data->status == 1 ? 'Active' : 'Inactive'}}</span></p><p><b>Remarks :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->remarks}}</span></p><p><b>Created By :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->created_by}}</span></p><p><b>Updated By :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{$data->updated_by}}</span></p><div class="d-flex justify-content-between">
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