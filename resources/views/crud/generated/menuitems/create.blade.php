@extends('backend.template')
@section('content')
<div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
                <h2 class="">{{ label('Add Menu Items') }}</h2>
                <?php createButton("btn-primary btn-cancel", "", "Cancel", route('menuitems.index', ($menulocation) ? ['menulocation' => $menulocation] : '')); ?>

        </div>
        <div class='card-body'>
                <form action="{{route('menuitems.store')}}" id="storeCustomForm" method="POST">
                        @csrf
                        <div class="row">
                                <div class="col-lg-12">{{createCustomSelect('tbl_menulocations', 'title', 'menulocation_id', ($menulocation)?$menulocation:'', 'Menu Location','menulocations_id', 'form-control select2','status<>-1')}}</div>
                                <div class="col-lg-6">{{createCustomSelect('tbl_menuitems', 'title', 'menu_id', '', 'Sub Menu of (Ignore if it is going as root)','parent_menu', 'form-control select2','status<>-1')}}</div>
                                <div class="col-lg-6">{{createCustomSelectFromArray($menuTypes,"Menu Type","type")}}</div>
                                <div class="col-lg-6" id="ref-container">{{createText("ref","ref","# or Start from / or http:// or https://")}}</div>
                                <div class="col-lg-4">{{createText("title","title","Display Title")}}</div>
                                <div class="col-lg-2">{{createCustomSelectFromArray(array(['display'=>'Self','value'=>"_SELF"],['display'=>'New Tab','value'=>"_BLANK"]),"Target","target","_SELF")}}
                                </div> <br>
                                <div class="col-md-12"><?php createButton("btn-primary btn-store", "", "Submit"); ?>
                                        <?php createButton("btn-primary btn-cancel", "", "Cancel", route('menuitems.index')); ?>
                                </div>
                </form>

                <div class="card">
                        <div class="card-header">
                                <h2>Menu Items</h2>
                        </div>
                        <div class="card-body">
                                @include("crud.generated.menuitems.list",[$data=$TableData])
                        </div>

                </div>


        </div>
</div>
@endsection
@push("js")
<script>
        var firstLevelSelect = document.getElementById('type');
        var secondLevelContainer = document.getElementById('ref-container');
        function showRef() {
                var selectedOption = firstLevelSelect.value;
                var menuTypes = <?php echo json_encode($menuTypes); ?>;
                var selectedMenuType = menuTypes.find(function(menuType) {
                        return menuType.value === selectedOption;
                });
                secondLevelContainer.innerHTML = '';
                if (selectedOption == '') {
                        var label = document.createElement('label');
                        label.setAttribute('for', 'ref');
                        label.className = 'form-label col-form-label';
                        label.textContent = '# or Start from / or http:// or https://';
                        secondLevelContainer.appendChild(label);
                        // Create an input element
                        var secondLevelInput = document.createElement('input');
                        secondLevelInput.type = 'text';
                        secondLevelInput.name = 'ref';
                        secondLevelInput.className = 'form-control';
                        secondLevelContainer.appendChild(secondLevelInput);
                } else {
                        var label = document.createElement('label');
                        label.setAttribute('for', 'ref');
                        label.className = 'form-label col-form-label';
                        label.textContent = 'Ref (Select Reference)';
                        secondLevelContainer.appendChild(label);
                        // Create a select element
                        var secondLevelSelect = document.createElement('select');
                        secondLevelSelect.name = 'ref';
                        secondLevelSelect.className = 'form-select form-control';
                        secondLevelContainer.appendChild(secondLevelSelect);

                        // Add the default option
                        var defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.textContent = 'Select Option';
                        secondLevelSelect.appendChild(defaultOption);

                        if (selectedMenuType && selectedMenuType.values) {
                                var values = JSON.parse(selectedMenuType.values);
                                values.forEach(function(value) {
                                        var option = document.createElement('option');
                                        option.value = value.value;
                                        option.textContent = value.display;
                                        secondLevelSelect.appendChild(option);
                                });
                        }
                }
        }
        firstLevelSelect.addEventListener('change', function() {
                showRef();
        });
</script>

@endpush