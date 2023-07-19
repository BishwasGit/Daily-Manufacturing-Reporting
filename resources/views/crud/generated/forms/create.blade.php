@extends('backend.template')
@section('content')
<div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
                <h2 class="">{{ label('Add Forms') }}</h2>
                <?php createButton("btn-primary btn-cancel", "", "Cancel", route('forms.index')); ?>

        </div>
        <div class='card-body'>
                <form action="{{route('forms.store')}}" id="my-form" method="POST">
                        @csrf
                        <div class="row">
                                <div class="col-lg-6">{{createText("title","title","Title")}}
                                </div>
                                <div class="col-lg-12 pb-2">{{createImageInput("cover_photo","Cover Photo")}}
                                </div>
                                <div class="col-lg-12 pb-2">{{createImageInput("image_thumb","Image Thumb")}}
                                </div>
                                <div class="col-lg-12">
                                        <div id="repeater-container"></div>
                                </div>
                                <div class="col-lg-12 pb-2">{{createTextarea("text","text ckeditor-classic","Text")}}
                                </div>
                                <div class="col-lg-6">{{createText("headers","headers","Headers")}}
                                </div>
                                <div class="col-lg-6">{{createText("toemail","toemail","Toemail")}}
                                </div>
                                <div class="col-lg-6">{{createText("fromemail","fromemail","Fromemail")}}
                                </div>
                                <div class="col-lg-6">{{createText("emailsubject","emailsubject","Emailsubject")}}
                                </div>
                                <div class="col-lg-6">{{createText("emailtext","emailtext","Emailtext")}}
                                </div>
                                <div class="col-lg-6">{{createText("autoresponse","autoresponse","Autoresponse")}}
                                </div>
                                <div class="col-lg-6">{{createText("responseheaders","responseheaders","Responseheaders")}}
                                </div>
                                <div class="col-lg-6">{{createText("responsefrom","responsefrom","Responsefrom")}}
                                </div>
                                <div class="col-lg-6">{{createText("responsesubject","responsesubject","Responsesubject")}}
                                </div>
                                <div class="col-lg-6">{{createText("responsetext","responsetext","Responsetext")}}
                                </div> <br>
                                <div class="col-md-12"><?php createButton("btn-primary btn-store", "", "Submit"); ?>
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
                                repeaterContainer.removeChild(fieldContainer);
                        });
                        fieldInputContainer5.appendChild(removeButton);
                        fieldContainer.appendChild(fieldInputContainer5);

                        repeaterContainer.appendChild(fieldContainer);
                }
        }
</script>
@endpush