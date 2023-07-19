<?php

use App\Http\Controllers\GeneralFormController;
?>
@extends("backend.template")
@section("content")

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="form-group"> <label for="exampleFormControlTextarea8" class="form-label">Migrations Code Content</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="exampleFormControlTextarea8" rows="8">{{GeneralFormController::migrationContent($tableName)}}</textarea>
                    </div>
                </div>
                <div class="form-group"> <label for="exampleFormControlTextarea8" class="form-label">Route Code Content</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="exampleFormControlTextarea8" rows="8">
                        {{GeneralFormController::routeContent($tableName, $directoryName)}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group"> <label for="exampleFormControlTextarea8" class="form-label">Model Code</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="exampleFormControlTextarea8" rows="8">{{GeneralFormController::modelContent($tableName, $directoryName)}}</textarea>
                    </div>
                </div>
                <div class="form-group"> <label for="exampleFormControlTextarea8" class="form-label">Controllers Code</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="exampleFormControlTextarea8" rows="8">{{GeneralFormController::controllerContent($tableName, $directoryName)}}</textarea>
                    </div>
                </div>
                <div class="form-group"> <label for="exampleFormControlTextarea8" class="form-label">List File Code</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="exampleFormControlTextarea8" rows="8">{{GeneralFormController::listContent($tableName, $directoryName)}}</textarea>
                    </div>
                </div>
                <div class="form-group"> <label for="exampleFormControlTextarea8" class="form-label">Create File Code</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="exampleFormControlTextarea8" rows="8">{{GeneralFormController::addContent($tableName, $directoryName)}}</textarea>
                    </div>
                </div>
                <div class="form-group"> <label for="exampleFormControlTextarea8" class="form-label">Edit File Code</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="exampleFormControlTextarea8" rows="8">{{GeneralFormController::editContent($tableName, $directoryName)}}</textarea>
                    </div>
                </div>

                <div class="form-group"> <label for="exampleFormControlTextarea8" class="form-label">Show File Code</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="exampleFormControlTextarea8" rows="8">{{GeneralFormController::showContent($tableName, $directoryName)}}</textarea>
                    </div>
                </div>

              


            </div>
        </div>
    </div>
</div>
@endsection