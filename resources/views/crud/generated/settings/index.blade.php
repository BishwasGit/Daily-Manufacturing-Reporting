@extends('backend.template')
@section('content')
<div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
    <h2>{{ label("Settings List") }}</h2>
    <a href="{{ route('settings.create') }}" class="btn btn-primary"><span>{{label("Create New")}}</span></a>
</div>
<div class="card-body">
<table class="table dataTable" id="tbl_settings" data-url="{{ route('settings.sort') }}">
                            <thead class="table-light">
                                <tr>
                                <th class="tb-col"><span class="overline-title">{{label("Sn.")}}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("title") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("url1") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("url2") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("email") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("phone") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("secondary_phone") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("google_map") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("fb") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("insta") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("twitter") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("tiktok") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("primary_logo") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("secondary_logo") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("thumb") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("icon") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("og_image") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("no_image") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("copyright_text") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("content1") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("content2") }}</span></th>
<th class="tb-col"><span class="overline-title">{{ label("content3") }}</span></th>
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
        
        <tr data-id="{{$item->setting_id}}" data-display_order="{{$item->display_order}}" class="draggable-row">
            <td class="tb-col">{{ $i++ }}</td><td class="tb-col">{{ $item->title }}</td>
<td class="tb-col">{{ $item->url1 }}</td>
<td class="tb-col">{{ $item->url2 }}</td>
<td class="tb-col">{{ $item->email }}</td>
<td class="tb-col">{{ $item->phone }}</td>
<td class="tb-col">{{ $item->secondary_phone }}</td>
<td class="tb-col">{{ $item->google_map }}</td>
<td class="tb-col">{{ $item->fb }}</td>
<td class="tb-col">{{ $item->insta }}</td>
<td class="tb-col">{{ $item->twitter }}</td>
<td class="tb-col">{{ $item->tiktok }}</td>
<td class="tb-col">{{ showImageThumb($item->primary_logo) }}</td>
<td class="tb-col">{{ showImageThumb($item->secondary_logo) }}</td>
<td class="tb-col">{{ showImageThumb($item->thumb) }}</td>
<td class="tb-col">{{ showImageThumb($item->icon) }}</td>
<td class="tb-col">{{ showImageThumb($item->og_image) }}</td>
<td class="tb-col">{{ showImageThumb($item->no_image) }}</td>
<td class="tb-col">{{ $item->copyright_text }}</td>
<td class="tb-col">{{ $item->content1 }}</td>
<td class="tb-col">{{ $item->content2 }}</td>
<td class="tb-col">{{ $item->content3 }}</td>
<td class="tb-col">
        <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a href="{{route('settings.show',[$item->setting_id])}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> {{label("View")}}</a></li>
                                                            <li><a href="{{route('settings.edit',[$item->setting_id])}}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> {{label("Edit")}}</a></li>
                                                            <li>
                                                            <a href="{{route('settings.destroy',[$item->setting_id])}}" class="dropdown-item remove-item-btn" onclick="confirmDelete(this.href)">
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
            var ajaxUrl = "{{ route('settings.updatealias') }}";
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
    