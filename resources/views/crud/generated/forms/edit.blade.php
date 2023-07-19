@extends('backend.template')
@section('content')
<div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
                <h2 class="">{{ label('Edit Forms') }}</h2>
                <?php createButton("btn-primary btn-cancel", "", "Cancel", route('forms.index')); ?>

        </div>
        <div class='card-body'>
                <form action="{{route('forms.update',[$data->form_id])}}" id="updateCustomForm" method="POST">
                        @csrf <input type=hidden name='form_id' value='{{$data->form_id}}' />
                        <div class="row">
                                <div class="col-lg-6">{{createText("title","title","Title",'',$data->title)}}
                                </div>
                                <div class="col-lg-12 pb-2">{{createImageInput("cover_photo","Cover Photo",'',$data->cover_photo)}}
                                </div>
                                <div class="col-lg-12 pb-2">{{createImageInput("image_thumb","Image Thumb",'',$data->image_thumb)}}
                                </div>
                                <div class="col-lg-12">
                                        <?php
                                         //dd(json_decode($data->form_fields))
                                        ?>
                                        <div id="repeater-container">
                                                @foreach(json_decode($data->form_fields) as $field)
                                                <div class="form-field row">
                                                        <div class="col"><label for="fieldName" class="form-label col-form-label"> Field Name </label><input type="text" name="fieldNames[]" placeholder="Field Name" class="form-control" autocomplete="off" value="{{$field->fieldName}}"></div>
                                                        <div class="col"><label for="fieldName" class="form-label col-form-label"> Field Type </label><select name="fieldTypes[]" class="col form-control">
                                                                        <option value="text" <?php if($field->fieldType=="text") echo "SELECTED"; ?>>Text</option>
                                                                        <option value="textarea" <?php if($field->fieldType=="textarea") echo "SELECTED"; ?>>Textarea</option>
                                                                </select></div>
                                                        <div class="col"><label for="fieldName" class="form-label col-form-label"> Default Value </label><input type="text" name="fieldDefaults[]" placeholder="Field Default Value" class="col form-control" value="{{$field->fieldDefault}}"></div>
                                                        <div class="col"><label for="fieldName" class="form-label col-form-label"> Extra CSS </label><input type="text" name="fieldCss[]" class="form-control" value="{{$field->fieldCss}}"></div>
                                                        <div class="col"><label for="fieldName" class="form-label col-form-label"> &nbsp; </label><button class="btn btn-danger col form-control" onclick="removeRow(this);">Remove Field</button></div>
                                                </div>
                                                @endforeach



                                        </div>
                                        <div id="add-button-container">
                                        </div>
                                </div>
                                <div class="col-lg-12 pb-2">{{createTextarea("text","text ckeditor-classic","Text",$data->text)}}
                                </div>
                                <div class="col-lg-6">{{createText("headers","headers","Headers",'',$data->headers)}}
                                </div>
                                <div class="col-lg-6">{{createText("toemail","toemail","Toemail",'',$data->toemail)}}
                                </div>
                                <div class="col-lg-6">{{createText("fromemail","fromemail","Fromemail",'',$data->fromemail)}}
                                </div>
                                <div class="col-lg-6">{{createText("emailsubject","emailsubject","Emailsubject",'',$data->emailsubject)}}
                                </div>
                                <div class="col-lg-6">{{createText("emailtext","emailtext","Emailtext",'',$data->emailtext)}}
                                </div>
                                <div class="col-lg-6">{{createText("autoresponse","autoresponse","Autoresponse",'',$data->autoresponse)}}
                                </div>
                                <div class="col-lg-6">{{createText("responseheaders","responseheaders","Responseheaders",'',$data->responseheaders)}}
                                </div>
                                <div class="col-lg-6">{{createText("responsefrom","responsefrom","Responsefrom",'',$data->responsefrom)}}
                                </div>
                                <div class="col-lg-6">{{createText("responsesubject","responsesubject","Responsesubject",'',$data->responsesubject)}}
                                </div>
                                <div class="col-lg-6">{{createText("responsetext","responsetext","Responsetext",'',$data->responsetext)}}
                                </div>
                                <div class="col-md-12"><?php createButton("btn-primary btn-update", "", "Submit"); ?>
                                        <?php createButton("btn-primary btn-cancel", "", "Cancel", route('forms.index')); ?>
                                </div>
                </form>
        </div>
</div>
@endsection
@push("js")
<script>
        createFormFieldsRepeater();

        function createFormFieldsRepeater() {
                const repeaterContainer = document.getElementById('repeater-container');
                const addButtonContainer = document.getElementById('add-button-container');

                // Add button
                const addButton = document.createElement('button');
                addButton.textContent = 'Add Field';
                addButton.addEventListener('click', addFormField);
                addButtonContainer.appendChild(addButton);

                // Repeater fields
                let fieldCount = 0;

                function addFormField() {
                        event.preventDefault();
                        fieldCount++;

                        // Create form field container
                        const fieldContainer = document.createElement('div');
                        fieldContainer.classList.add('form-field');
                        fieldContainer.classList.add('row');
                        const fieldInputContainer = document.createElement('div');
                        fieldInputContainer.classList.add("col");
                        fieldInputContainer.innerHTML = ("<label for=\"fieldName\" class=\"form-label col-form-label\"> Field Name </label>");
                        const fieldNameInput = document.createElement('input');
                        fieldNameInput.setAttribute('type', 'text');
                        fieldNameInput.setAttribute('name', `fieldNames[]`);
                        fieldNameInput.setAttribute('placeholder', 'Field Name');
                        fieldInputContainer.classList.add('col');
                        fieldNameInput.classList.add('form-control');
                        fieldInputContainer.appendChild(fieldNameInput);
                        fieldContainer.appendChild(fieldInputContainer);

                        // Field Type select
                        const fieldInputContainers2 = document.createElement('div');
                        fieldInputContainers2.classList.add("col");
                        fieldInputContainers2.innerHTML = ("<label for=\"fieldName\" class=\"form-label col-form-label\"> Field Type </label>");

                        const fieldTypeSelect = document.createElement('select');
                        fieldTypeSelect.setAttribute('name', `fieldTypes[]`);
                        const textOption = document.createElement('option');
                        textOption.setAttribute('value', 'text');
                        textOption.textContent = 'Text';

                        fieldTypeSelect.appendChild(textOption);

                        const textareaOption = document.createElement('option');
                        textareaOption.setAttribute('value', 'textarea');
                        textareaOption.textContent = 'Textarea';
                        fieldTypeSelect.appendChild(textareaOption);
                        fieldTypeSelect.classList.add('col');
                        fieldTypeSelect.classList.add('form-control');
                        fieldInputContainers2.appendChild(fieldTypeSelect);
                        fieldContainer.appendChild(fieldInputContainers2);

                        // Field Default input
                        const fieldInputContainer3 = document.createElement('div');
                        fieldInputContainer3.classList.add("col");
                        fieldInputContainer3.innerHTML = ("<label for=\"fieldName\" class=\"form-label col-form-label\"> Default Value </label>");
                        const fieldDefaultInput = document.createElement('input');
                        fieldDefaultInput.setAttribute('type', 'text');
                        fieldDefaultInput.setAttribute('name', `fieldDefaults[]`);
                        fieldDefaultInput.setAttribute('placeholder', 'Field Default Value');
                        fieldDefaultInput.classList.add('col');
                        fieldDefaultInput.classList.add('form-control');
                        fieldInputContainer3.appendChild(fieldDefaultInput);
                        fieldContainer.appendChild(fieldInputContainer3);

                        // Field CSS input
                        const fieldInputContainer4 = document.createElement('div');
                        fieldInputContainer4.classList.add("col");
                        fieldInputContainer4.innerHTML = ("<label for=\"fieldName\" class=\"form-label col-form-label\"> Extra CSS </label>");
                        const fieldCssInput = document.createElement('input');
                        fieldCssInput.setAttribute('type', 'text');
                        fieldCssInput.setAttribute('name', `fieldCss[]`);
                        fieldCssInput.classList.add('form-control');
                        fieldInputContainer4.appendChild(fieldCssInput);
                        fieldContainer.appendChild(fieldInputContainer4);

                        // Remove button
                        const fieldInputContainer5 = document.createElement('div');
                        fieldInputContainer5.classList.add("col");
                        fieldInputContainer5.innerHTML = ("<label for=\"fieldName\" class=\"form-label col-form-label\"> &nbsp </label>");
                        const removeButton = document.createElement('button');
                        removeButton.textContent = 'Remove Field';
                        removeButton.classList.add('btn');
                        removeButton.classList.add('btn-danger');
                        removeButton.classList.add('col');
                        removeButton.classList.add('form-control');
                        removeButton.addEventListener('click', () => {
                                //event.preventDefault();
                                repeaterContainer.removeChild(fieldContainer);
                        });
                        fieldInputContainer5.appendChild(removeButton);
                        fieldContainer.appendChild(fieldInputContainer5);

                        repeaterContainer.appendChild(fieldContainer);
                }
        }



        function removeRow(button) {
                event.preventDefault();
                const row = button.parentNode.parentNode;
                row.parentNode.removeChild(row);
        }
</script>
@endpush