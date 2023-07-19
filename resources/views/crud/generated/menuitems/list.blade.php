        <table class="table dataTable" id="tbl_menuitems" data-url="{{ route('menuitems.sort') }}">
            <thead class="table-light">
                <tr>
                    <th class="tb-col"><span class="overline-title">{{label("Sn.")}}</span></th>
                    <th class="tb-col"><span class="overline-title">{{ label("parent_menu") }}</span></th>
                    <!-- <th class="tb-col"><span class="overline-title">{{ label("menulocations_id") }}</span></th> -->
                    <th class="tb-col"><span class="overline-title">{{ label("title") }}</span></th>
                    <th class="tb-col"><span class="overline-title">{{ label("alias") }}</span></th>
                    <th class="tb-col"><span class="overline-title">{{ label("type") }}</span></th>
                    <!-- <th class="tb-col"><span class="overline-title">{{ label("ref") }}</span></th>
                    <th class="tb-col"><span class="overline-title">{{ label("target") }}</span></th> -->
                    <th class="tb-col" data-sortable="false"><span class="overline-title">{{ label("Action") }}</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($data as $item)

                <tr data-id="{{$item->menu_id}}" data-display_order="{{$item->display_order}}" class="draggable-row">
                    <td class="tb-col">{{ $i++ }}</td>
                    <td class="tb-col">
                        {!! getFieldData("tbl_menuitems", "title", "menu_id", $item->parent_menu) !!}
                    </td>
                    <!-- <td class="tb-col">
                        {!! getFieldData("tbl_menulocations", "title", "menulocation_id", $item->menulocations_id) !!}
                    </td> -->
                    <td class="tb-col">{{ $item->title }}</td>
                    <td class="tb-col">
                        <div class="alias-wrapper" data-id="{{$item->menu_id}}">
                            <span class="alias">{{ $item->alias }}</span>
                            <input type="text" class="alias-input d-none" value="{{ $item->alias }}" id="alias_{{$item->menu_id}}" />
                        </div>
                        <span class="badge badge-soft-primary change-alias-badge">change alias</span>
                    </td>
                    <td class="tb-col">{{ $item->type }}</td>
                    <!-- <td class="tb-col">{{ $item->ref }}</td>
                    <td class="tb-col">{{ $item->target }}</td> -->
                    <td class="tb-col">
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-fill align-middle"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{route('menuitems.show',[$item->menu_id])}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> {{label("View")}}</a></li>
                                <li><a href="{{route('menuitems.edit',[$item->menu_id,'menulocation'=>($menulocation)?$menulocation:''])}}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> {{label("Edit")}}</a></li>
                                <li>
                                    <a href="{{route('menuitems.destroy',[$item->menu_id])}}" class="dropdown-item remove-item-btn" onclick="confirmDelete(this.href)">
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

