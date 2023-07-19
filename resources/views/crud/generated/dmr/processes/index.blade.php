@extends('backend.template')
@section('content')
<div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
    <h2>{{ label("Processes List") }}</h2>
    <a href="{{ route('dmr.processes.create') }}" class="btn btn-primary"><span>{{label("Create New")}}</span></a>
</div>
<div class="card-body">
<table class="table dataTable" id="tbl_processes" data-url="{{ route('dmr.processes.sort') }}">
                            <thead class="table-light">
                                <tr>
                                <th class="tb-col"><span class="overline-title">{{label("Sn.")}}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("process_name") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("created_by") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("updated_by") }}</span></th>
<th class="tb-col" data-sortable="false"><span
        class="overline-title">{{ label("Action") }}</span>
    </th>
    </tr>
    </thead>
    <tbody>
        @php
        $i = 1;
        @endphp
        @foreach ($data as $item)
        
        <tr data-id="{{$item->process_id}}" data-display_order="{{$item->display_order}}" class="draggable-row">
            <td class="tb-col">{{ $i++ }}</td><td class="tb-col">{{ $item->process_name }}</td>
<td class="tb-col">{{ $item->created_by }}</td>
<td class="tb-col">{{ $item->updated_by }}</td>
<td class="tb-col">
        <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a href="{{route('dmr.processes.show',[$item->process_id])}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> {{label("View")}}</a></li>
                                                            <li><a href="{{route('dmr.processes.edit',[$item->process_id])}}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> {{label("Edit")}}</a></li>
                                                            <li>
                                                            <a href="{{route('dmr.processes.destroy',[$item->process_id])}}" class="dropdown-item remove-item-btn" onclick="confirmDelete(this.href)">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> {{ label('Delete') }}
                                                        </a>
                                                                
                                                            </li>
                                                        </ul>
                                                    </div>
        
        
    </td>
    </tr>

    @endforeach

    </tbody>
    </table>

    
</div>
</div>

    @endsection
 
@push("css")
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.0/css/rowReorder.dataTables.min.css">
@endpush
@push("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.4.0/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
$(document).ready(function(e) {
    $('.change-alias-badge').on('click', function() {
        var aliasWrapper = $(this).prev('.alias-wrapper');
        var aliasSpan = aliasWrapper.find('.alias');
        var aliasInput = aliasWrapper.find('.alias-input');
        var isEditing = $(this).hasClass('editing');
        aliasInput.toggleClass("d-none");
        if (isEditing) {
            // Update alias text and switch to non-editing state
            var newAlias = aliasInput.val();
            aliasSpan.text(newAlias);
            aliasSpan.show();
            aliasInput.hide();
            $(this).removeClass('editing').text('Change Alias');
            var articleId = $(aliasWrapper).data('id');
            var ajaxUrl = "{{ route('dmr.processes.updatealias') }}";
            var data = {
                articleId: articleId,
                newAlias: newAlias
            };
            
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            // Switch to editing state
            aliasSpan.hide();
            aliasInput.show().focus();
            $(this).addClass('editing').text('Save Alias');
        }
    });
    var mytable = $(".dataTable").DataTable({
        ordering: true,
        rowReorder: {
            //selector: 'tr'
        },
    });

    var isRowReorderComplete = false;

    mytable.on('row-reorder', function(e, diff, edit) {
        isRowReorderComplete = true;
    });

    mytable.on('draw', function() {
        if (isRowReorderComplete) {
            var url = mytable.table().node().getAttribute('data-url');
            var ids = mytable.rows().nodes().map(function(node) {
                return $(node).data('id');
            }).toArray();

            console.log(ids);
            $.ajax({
                url: url,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id_order: ids
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
            isRowReorderComplete=false;
        }
    });
});
function confirmDelete(url) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this item!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire('Deleted!', 'The item has been deleted.', 'success');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    Swal.fire('Error!', 'An error occurred while deleting the item.', 'error');
                }
            });
        }
    });
}
</script>


@endpush
    