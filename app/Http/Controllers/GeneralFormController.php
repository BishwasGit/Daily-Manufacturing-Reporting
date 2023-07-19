<?php

namespace App\Http\Controllers;

use App\Helpers\BibClass;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class GeneralFormController extends Controller
{
    protected static $imageFields;
    protected static $textEditorFields;
    protected static $textAreaFields;
    protected static $dateFields;
    protected static $HiddenCols;
    public function __construct()
    {
        $this->initializeFields();
    }

    protected function initializeFields()
    {
        self::$imageFields = array(
            'image', 'logo', 'cover_photo', 'featured_image',
            'image_thumb',
            'primary_logo',
            'secondary_logo',
            'thumb_image', 'thumb', 'cover', 'photo', 'passport_copy', 'icon', 'favicon', 
            'og_image',
            'no_image'
        );
        self::$textEditorFields = array('details', 'description', 'text', 'qualification', 'experience', 'required_documents', 'biodata', 'privacy_policy', 'content1', 'content2', 'content3');
        self::$textAreaFields = array('copyright', 'remarks', 'seo_keywords', 'seo_description', 'meta_tags');
        self::$dateFields = array('dob', 'postedon', 'valid_till');
        self::$HiddenCols = array("createdby", "updatedby", "updated_at", "created_at", "status", "alias", "display_order");
    }

    protected function getImageFields()
    {
        return $this->imageFields;
    }

    protected function gettextEditorFields()
    {
        return $this->textEditorFields;
    }

    public function create()
    {
        $tables = DB::select('SHOW TABLES');
        try {
            $databasdeName =   DB::connection()->getDatabaseName();
            $allTables = [];
            foreach ($tables as $table) {
                $table_field = "Tables_in_$databasdeName";
                $allTables[$table->$table_field] = $table->$table_field;
            }
            return view('crud.form.create', compact('allTables'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'type' => 'required',
            'tableName' => 'required',
        ]);

        $name = trim($request->type);
        $command = $name;

        $tableName = trim($request->tableName);
        $directoryName = trim($request->directoryName);

        switch ($command) {
            case 'dictonary':
                $data['tableName'] = "tbl_dictonary";
                if ($tableName != "") {
                    switch ($tableName) {
                        case 'add':
                            $data['TableCols'] = DB::select("describe " . $data['tableName']);
                            return view("crud.settings.dictonary/add", $data);
                        default:
                            $data['TableRows'] = DB::select("select * from " . $data['tableName']);
                            return view("crud.settings.dictonary.list", $data);
                    }
                }
                $data['TableName'] = "tbl_dictonary";
                $data['TableRows'] = DB::select("select * from " . $data['TableName']);
                return view("crud.settings.dictonary", $data);



            case 'curd':
                $data['tableName'] = $tableName;
                $data['directoryName'] = $directoryName;
                return view("crud.settings.curd", $data);
                break;
            case 'ajax-curd':
                $data['tableName'] = $tableName;
                $data['directoryName'] = $directoryName;
                $columns =  DB::select("describe $tableName"); // users table
                return view("crud.settings.ajax-curd", $data);
                break;
            case 'make-table-nullable':
                nullableFields($tableName);
                return redirect()->back();
                break;
            default:

                return view("crud.settings.home");
        }
    }

    public function getTableNullablecreate()
    {
        return view("crud.settings.ajax-curd");
    }

    public function tables()
    {
        $AllTables = DB::select('SHOW TABLES');
        try {
            $databasdeName =   DB::connection()->getDatabaseName();
            $allTables = [];
            foreach ($AllTables as $table) {
                $myTable = new stdClass;
                //$allTables[]=$table['Tables_in_'.$databasdeName];
                $key = "Tables_in_" . $databasdeName;
                $table->columns = DB::select("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '" . $table->$key . "'");
                $myTable->tablename = $table->$key;
                $myTable->tablecolumns = $table->columns;
                $allTables[] = $myTable;
            }
            return view('crud.form.tables', compact('allTables'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public static function getForeignTable($all_columns)
    {
        $string = '_id';
        $foreign = [];
        foreach ($all_columns as $key => $column) {
            if (str_contains($column, $string) !== FALSE) { // Yoshi version
                $foreign[] = $column;
            }
        }
        unset($foreign[0]);
        $strArray = [];
        foreach ($foreign as $key => $foreignKey) {
            $strArray[$key] = explode('_id', $foreignKey);
            unset($strArray[$key][1]);
        }
        if ($strArray) {
            $all_Foreign_Key_Table = call_user_func_array('array_merge', $strArray);
            foreach ($all_Foreign_Key_Table as $column) {
                $tableName[] = "tbl_" . $column;
            }
            return $tableName;
        } else {
            return [];
        }
    }

    public static function getTableColumns($TableName)
    {
        return array_column(DB::select("SHOW COLUMNS FROM $TableName"), 'Field');
    }



    public static function ajaxShowContent($TableName, $directoryName)
    {
        $TableName = strtolower($TableName);
        $TableCols = DB::select("describe " . $TableName);
        $TableRows = DB::select("select * from " . $TableName);
        $folder = '';
        $routeName = '';
        if (!empty($directoryName)) {
            $folder .= strtolower($directoryName) . '/';
            $routeName .= strtolower($directoryName) . '.';
        }
        $routeName .= strtolower(str_replace("tbl_", "", $TableName));
        $folder .= str_replace("tbl_", "", $TableName);
        $Table_pk = str_replace("tbl_", "", $TableName) . "_id";
        $title = ucwords(str_replace("tbl_", "", $TableName));
        $showContent = "
        
    
                ";

        foreach ($TableCols as $key => $TableCol) :
            $TableCol = $TableCol->Field;
            if ($key == 0 || $TableCol == 'createdOn' || $TableCol == 'createdBy' || $TableCol == 'updatedBy' || $TableCol == 'created_at' || $TableCol == 'updated_at')
                continue;
            $TableColLabel = ucwords(str_replace("_", " ", $TableCol));
            if ($TableCol == 'status')
                $showContent .= "<p><b>Status :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span
                class=\"{{\$data->$TableCol == 1 ? 'text-success' : 'text-danger'}}\">{{\$data->$TableCol == 1 ? 'Active' : 'Inactive'}}</span></p>";
            else
                $showContent .= '<p><b>' . $TableColLabel . " :&nbsp;&nbsp;&nbsp;&nbsp;</b> <span>{{\$data->$TableCol}}</span></p>";

        endforeach;
        $showContent .= "<div class=\"d-flex justify-content-between\">
        <div>
            <p><b>Created On :</b>&nbsp;&nbsp;&nbsp;<span>{{\$data->created_at}}</span></p>
            <p><b>Created By :</b>&nbsp;&nbsp;&nbsp;<span>{{\$data->createdBy}}</span></p>
        </div>
        <div>
            <p><b>Updated On :</b>&nbsp;&nbsp;&nbsp;<span>{{\$data->updated_at}}</span></p>
            <p><b>Updated By :</b>&nbsp;&nbsp;&nbsp;<span>{{\$data->updatedBy}}</span></p>

        </div>
    </div>
    ";

        return $showContent;
    }
    public static function ajaxEditContent($TableName, $directoryName)
    {
        $TableName = strtolower($TableName);
        $TableCols = DB::select("describe " . $TableName);
        $TableRows = DB::select("select * from " . $TableName);
        $folder = '';
        $routeName = '';
        if (!empty($directoryName)) {
            $folder .= strtolower($directoryName) . '/';
            $routeName .= strtolower($directoryName) . '.';
        }
        $routeName .= strtolower(str_replace("tbl_", "", $TableName));
        $folder .= str_replace("tbl_", "", $TableName);

        $title = ucwords(str_replace("tbl_", "", $TableName));

        $all_columns = self::getTableColumns($TableName);
        $Table_pk = $all_columns[0];
        $all_foreign_table =  self::getForeignTable($all_columns);
        $all_foreignKey = [];
        if ($all_foreign_table)
            foreach ($all_foreign_table as $key => $tablename) {
                $all_foreignKey[$tablename] = self::getTableColumns($tablename);
                $all_foreignKey[$tablename] = $all_foreignKey[$tablename][0] ?? null;
            }


        $editContent = "
        <form action=\"{{route('$routeName.update',[\$data->$Table_pk])}}\" id=\"updateCustomForm\" method=\"POST\" >\n @csrf ";
        $editContent .= "<input type=hidden name='" . $Table_pk . "' value='{{\$data->" . $Table_pk . "}}'/>" . PHP_EOL;
        $editContent .= '<div class="row">';
        foreach ($TableCols as $key => $TableCol) :

            $TableCol = $TableCol->Field;
            if (!in_array($TableCol, self::$HiddenCols)) {
                $TableColLabel = ucwords(str_replace("_", " ", $TableCol));

                switch ($TableCol) {
                    case $TableCols[0]->Field:
                        break;
                    case (strpos($TableCol, "parent_") !== false):
                        $editContent .= '<div class="col-lg-6">';
                        $editContent .= "{{createCustomSelect('$TableName', 'title', '" . $TableCols[0]->Field . "', \$data->$TableCol, '" . $TableColLabel . "','$TableCol', 'form-control select2','status<>-1')}}";
                        $editContent .= "</div>";
                        break;
                    case (strpos($TableCol, "s_id") !== false):  //CASE TO HANDLE FOREIGN TABLE
                        $FTNameRaw = str_replace("s_id", "s", $TableCol);
                        $FTName = "tbl_" . str_replace("s_id", "s", $TableCol);
                        $FTCols = DB::select("describe " . $FTName);
                        $editContent .= '<div class="col-lg-6">';
                        //createCustomSelect($tableName, $fieldNameToDisplay, $fieldNameForValue, $defaultValueSelected, $displayTextForLabel, $HTMLElementName, $additionalClass = "form-control", $defaultCondition = null)
                        $editContent .= "{{createCustomSelect('$FTName', 'title', '" . $FTCols[0]->Field . "', \$data->$TableCol, '" . $TableColLabel . "','$TableCol', 'form-control select2','status<>-1')}}";
                        $editContent .= "</div>";
                        break;
                    case (in_array($TableCol, self::$textEditorFields)):
                        $editContent .= '<div class="col-lg-12 pb-2">';
                        //function createTextArea($name, $class = "", $display = "", $default = "",$row = "")
                        $editContent .= "{{createTextarea(\"$TableCol\",\"$TableCol ckeditor-classic\",\"$TableColLabel\",\$data->$TableCol)}}\n";
                        $editContent .= "</div>";
                        break;
                    case (in_array($TableCol, self::$imageFields)):
                        $editContent .= '<div class="col-lg-12 pb-2">';
                        $editContent .= "{{createImageInput(\"$TableCol\",\"$TableColLabel\",'',\$data->$TableCol)}}\n";
                        $editContent .= "</div>";
                        break;
                    case (in_array($TableCol, self::$dateFields)):
                        $editContent .= '<div class="col-lg-6 pb-2">';
                        $editContent .= "{{createDate(\"$TableCol\",\"$TableColLabel\",'',\$data->$TableCol)}}\n"; //createDate($name, $display = "",$class = "datepicker", $default = "")
                        $editContent .= "</div>";
                        break;
                    case (in_array($TableCol, self::$textAreaFields)):
                        $editContent .= '<div class="col-lg-12 pb-2">';
                        $editContent .= "{{createPlainTextArea(\"$TableCol\",\"$TableColLabel\",'',\$data->$TableCol)}}\n"; //createDate($name, $display = "",$class = "datepicker", $default = "")
                        $editContent .= "</div>";
                        break;
                    default:
                        $editContent .= '<div class="col-lg-6">';
                        $editContent .= "{{createText(\"$TableCol\",\"$TableCol\",\"$TableColLabel\",'',\$data->$TableCol)}}\n";
                        $editContent .= "</div>";
                }
            }


        endforeach;
        $editContent .= '  <div class="col-md-12">';
        $editContent .= "<?php createButton(\"btn-primary btn-update\",\"\",\"Submit\"); ?>\n";
        $editContent .= "<?php createButton(\"btn-primary btn-cancel\",\"\",\"Cancel\",route('$routeName.index')); ?>\n";
        $editContent .= "</div>";
        $editContent .= " </form>";



        return $editContent;
    } //end of ajaxEditContent method
    public static function editContent($TableName, $directoryName)
    {
        $TableName = strtolower($TableName);
        $TableCols = DB::select("describe " . $TableName);
        $TableRows = DB::select("select * from " . $TableName);
        $folder = '';
        $routeName = '';
        if (!empty($directoryName)) {
            $folder .= strtolower($directoryName) . '/';
            $routeName .= strtolower($directoryName) . '.';
        }
        $routeName .= strtolower(str_replace("tbl_", "", $TableName));
        $folder .= str_replace("tbl_", "", $TableName);
        $Table_pk = str_replace("tbl_", "", $TableName) . "_id";
        $title = ucwords(str_replace("tbl_", "", $TableName));
        $editContent = "@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class=\"\">{{ label('Edit $title') }}</h2>
        <?php createButton(\"btn-primary btn-cancel\",\"\",\"Cancel\",route('$routeName.index')); ?>\n
        </div>
        <div class='card-body'>";
        $editContent .= self::ajaxEditContent($TableName, $directoryName);
        $editContent .= "</div></div>\n@endsection";
        $path = base_path() . "/resources/views/crud/generated/$folder/";
        $file = $path . "edit.blade.php";
        if (!file_exists("$path")) {
            mkdir("$path", 0777, true);
        }
        if (!file_exists($file)) {
            $file = fopen($file, 'w');
            fwrite($file, $editContent);
            fclose($file);
        }

        return $editContent;
    } //end of editContent method

    public static function addContent($TableName, $directoryName)
    {
        $TableName = strtolower($TableName);
        $TableCols = DB::select("describe " . $TableName);
        $TableRows = DB::select("select * from " . $TableName);
        $folder = '';
        $routeName = '';
        if (!empty($directoryName)) {
            $folder .= strtolower($directoryName) . '/';
            $routeName .= strtolower($directoryName) . '.';
        }
        $routeName .= strtolower(str_replace("tbl_", "", $TableName));
        $folder .= str_replace("tbl_", "", $TableName);
        $Table_pk = str_replace("tbl_", "", $TableName) . "_id";
        $title = ucwords(str_replace("tbl_", "", $TableName));

        $addContent = "@extends('backend.template')
        @section('content')
        <div class='card'>
        <div class='card-header d-flex justify-content-between align-items-center'>
        <h2 class=\"\">{{ label('Add $title') }}</h2>
        <?php createButton(\"btn-primary btn-cancel\",\"\",\"Cancel\",route('$routeName.index')); ?>\n
        </div>
        <div class='card-body'>";
        $addContent .= self::ajaxAddContent($TableName, $directoryName);
        $addContent .= "</div></div>\n@endsection";
        $path = base_path() . "/resources/views/crud/generated/$folder/";
        $file = $path . "create.blade.php";
        if (!file_exists("$path")) {
            mkdir("$path", 0777, true);
        }
        if (!file_exists($file)) {
            $file = fopen($file, 'w');
            fwrite($file, $addContent);
            fclose($file);
        }

        return $addContent;
    } //End of addContent
    public static function ajaxAddContent($TableName, $directoryName)
    {
        $TableName = strtolower($TableName);
        $TableCols = DB::select("describe " . $TableName);
        $TableRows = DB::select("select * from " . $TableName);
        $folder = '';
        $routeName = '';
        if (!empty($directoryName)) {
            $folder .= strtolower($directoryName) . '/';
            $routeName .= strtolower($directoryName) . '.';
        }
        $routeName .= strtolower(str_replace("tbl_", "", $TableName));
        $folder .= str_replace("tbl_", "", $TableName);
        $Table_pk = str_replace("tbl_", "", $TableName) . "_id";
        $title = ucwords(str_replace("tbl_", "", $TableName));

        $all_columns = self::getTableColumns($TableName);
        $all_foreign_table =  self::getForeignTable($all_columns);
        $all_foreignKey = [];
        if ($all_foreign_table)
            foreach ($all_foreign_table as $key => $tablename) {
                $all_foreignKey[$tablename] = self::getTableColumns($tablename);
                $all_foreignKey[$tablename] = $all_foreignKey[$tablename][0] ?? null;
            }

        $addContent = "
                <form action=\"{{route('$routeName.store')}}\" id=\"storeCustomForm\" method=\"POST\">\n @csrf \n";
        $addContent .= '<div class="row">';
        foreach ($TableCols as $key => $TableCol) :
            $TableCol = $TableCol->Field;
            if (!in_array($TableCol, self::$HiddenCols)) {
                $TableColLabel = ucwords(str_replace("_", " ", $TableCol));

                switch ($TableCol) {
                    case $TableCols[0]->Field:
                        break;
                    case (strpos($TableCol, "parent_") !== false):
                        $addContent .= '<div class="col-lg-6">';
                        $addContent .= "{{createCustomSelect('$TableName', 'title', '" . $TableCols[0]->Field . "', '', '" . $TableColLabel . "','$TableCol', 'form-control select2','status<>-1')}}";
                        $addContent .= "</div>";
                        break;
                    case (strpos($TableCol, "s_id") !== false):  //CASE TO HANDLE FOREIGN TABLE
                        $FTNameRaw = str_replace("s_id", "s", $TableCol);
                        $FTName = "tbl_" . str_replace("s_id", "s", $TableCol);
                        $FTCols = DB::select("describe " . $FTName);
                        $addContent .= '<div class="col-lg-6">';
                        //createCustomSelect($tableName, $fieldNameToDisplay, $fieldNameForValue, $defaultValueSelected, $displayTextForLabel, $HTMLElementName, $additionalClass = "form-control", $defaultCondition = null)
                        $addContent .= "{{createCustomSelect('$FTName', 'title', '" . $FTCols[0]->Field . "', '', '" . $TableColLabel . "','$TableCol', 'form-control select2','status<>-1')}}";
                        $addContent .= "</div>";
                        break;
                    case (in_array($TableCol, self::$textEditorFields)):
                        $addContent .= '<div class="col-lg-12 pb-2">';
                        $addContent .= "{{createTextarea(\"$TableCol\",\"$TableCol ckeditor-classic\",\"$TableColLabel\")}}\n";
                        $addContent .= "</div>";
                        break;
                    case (in_array($TableCol, self::$textAreaFields)):
                        $addContent .= '<div class="col-lg-12 pb-2">';
                        $addContent .= "{{createPlainTextArea(\"$TableCol\",\"$TableCol ckeditor-classic\",\"$TableColLabel\")}}\n";
                        $addContent .= "</div>";
                        break;
                    case (in_array($TableCol, self::$imageFields)):
                        $addContent .= '<div class="col-lg-12 pb-2">';
                        $addContent .= "{{createImageInput(\"$TableCol\",\"$TableColLabel\")}}\n";
                        $addContent .= "</div>";
                        break;
                    case (in_array($TableCol, self::$dateFields)):
                        $addContent .= '<div class="col-lg-6 pb-2">';
                        $addContent .= "{{createDate(\"$TableCol\",\"$TableColLabel\",'',date('Y-m-d'))}}\n"; //createDate($name, $display = "",$class = "datepicker", $default = "")
                        $addContent .= "</div>";
                        break;
                    default:
                        $addContent .= '<div class="col-lg-6">';
                        $addContent .= "{{createText(\"$TableCol\",\"$TableCol\",\"$TableColLabel\")}}\n";
                        $addContent .= "</div>";
                }
            }
        endforeach;
        $addContent .= ' <br> <div class="col-md-12">';
        $addContent .= "<?php createButton(\"btn-primary btn-store\",\"\",\"Submit\"); ?>\n";
        $addContent .= "<?php createButton(\"btn-primary btn-cancel\",\"\",\"Cancel\",route('$routeName.index')); ?>\n";
        $addContent .= "</div>";
        $addContent .= " </form>";


        return $addContent;
    } //End of ajax addContent
    public static function showContent($TableName, $directoryName)
    {
        $TableName = strtolower($TableName);
        $TableCols = DB::select("describe " . $TableName);
        $TableRows = DB::select("select * from " . $TableName);
        $folder = '';
        $routeName = '';
        if (!empty($directoryName)) {
            $folder .= strtolower($directoryName) . '/';
            $routeName .= strtolower($directoryName) . '.';
        }
        $routeName .= strtolower(str_replace("tbl_", "", $TableName));
        $folder .= str_replace("tbl_", "", $TableName);
        $Table_pk = str_replace("tbl_", "", $TableName) . "_id";
        $title = ucwords(str_replace("tbl_", "", $TableName));

        $showContent = "@extends('backend.template')
        @section('content')
        <div class='card'>
            <div class='card-header d-flex justify-content-between align-items-center'>
            <h2><?php echo label('View Details'); ?></h2>
            <?php createButton(\"btn-primary btn-cancel\",\"\",\"Back to List\",route('$routeName.index')); ?>\n
            </div>
            <div class='card-body'>
            ";
        $showContent .= self::ajaxShowContent($TableName, $directoryName);
        $showContent .= "
            </div>
        </div>
            
@endSection";

        $path = base_path() . "/resources/views/crud/generated/$folder/";
        $file = $path . "show.blade.php";
        if (!file_exists("$path")) {
            mkdir("$path", 0777, true);
        }
        if (!file_exists($file)) {
            $file = fopen($file, 'w');
            fwrite($file, $showContent);
            fclose($file);
        }
        return $showContent;
    }


    public static function migrationContent($tableName)
    {
        $tableName = strtolower($tableName);
        $columns = self::getTableColumns($tableName);
        $tableFields = DB::select("describe $tableName");
        // foreach($tableFields as $tableField){
        //     dd($tableField->Field);
        // }
        $pkField = str_replace("tbl_", "", $tableName) . "_id";
        //BibClass::pre($tableFields);

        $contentString = "<?php\n
        use Illuminate\Database\Migrations\Migration;\n
        use Illuminate\Database\Schema\Blueprint;\n
        use Illuminate\Support\Facades\Schema;\n
        return new class extends Migration\n
        {\n
            public function up()\n
            {\nSchema::create(\"$tableName\", function (Blueprint \$table) {\n";
        foreach ($tableFields as $tableField) {
            $Type = $tableField->Type;
            //WRITE CODE HERE TO IDENTIFY THE TYPES OF FIELDS
            switch ($Type) {
                case 'int(11)':
                    if ($tableField->Field == $pkField) :
                        $contentString .= "\$table->integer(\"$tableField->Field\")->autoIncrement();\n";
                    else :
                        $contentString .= "\$table->integer(\"$tableField->Field\")->default(0);\n";
                    endif;
                    break;

                case 'varchar(255)':
                    $contentString .= "\$table->string(\"$tableField->Field\")->nullable();\n";
                    break;

                case 'datetime':
                    $contentString .= "\$table->datetime(\"$tableField->Field\")->nullable();\n";
                    break;

                case 'text':
                    $contentString .= "\$table->text(\"$tableField->Field\")->nullable();\n";
                    break;
                case 'timestamp':
                    $contentString .= "\$table->text(\"$tableField->Field\")->nullable();\n";
                    break;
                default:
            }
        }
        $contentString .= "\$table->timestamps();\n });\n   }\n    public function down()\n    {\n     Schema::dropIfExists(\"$tableName\");\n    }\n};";
     /*
        $file = fopen(base_path() . "/database/migrations/" . date('Y_m_d_his') . "_create_" . $tableName . "_table.php", 'w');
        fwrite($file, $contentString);
        fclose($file);
    */
        return $contentString;
     
    }

    public static function routeContent($TableName, $directoryName)
    {
        $TableName = strtolower($TableName);
        $TableName = str_replace("tbl_", "", $TableName);
        $routePrefixName = '';
        $ControllerName = '';
        if (!empty($directoryName)) {
            // $ControllerName .= ucwords($directoryName) . '/';
            $routePrefixName .= strtolower($directoryName) . '.';
        }
        $ControllerName .= ucwords($TableName) . "Controller";
        $routePrefixName .=   strtolower($TableName);

        $RouteContent = "Route::prefix(\"$TableName\")->group(function () {
            Route::get('/', [$ControllerName::class, 'index'])->name('$routePrefixName.index');
            Route::get('/create', [$ControllerName::class, 'create'])->name('$routePrefixName.create');
            Route::post('/store', [$ControllerName::class, 'store'])->name('$routePrefixName.store');
            Route::post('/sort', [$ControllerName::class, 'sort'])->name('$routePrefixName.sort');
            Route::post('/updatealias', [$ControllerName::class, 'updatealias'])->name('$routePrefixName.updatealias');
            Route::get('/show/{id}', [$ControllerName::class, 'show'])->name('$routePrefixName.show');
            Route::get('/edit/{id}', [$ControllerName::class, 'edit'])->name('$routePrefixName.edit') ;
            Route::post('/update/{id}', [$ControllerName::class, 'update'])->name('$routePrefixName.update');
            Route::delete('/destroy/{id}', [$ControllerName::class, 'destroy'])->name('$routePrefixName.destroy');
        });";

        $path = base_path() . "/routes/CRUDgenerated/";
        $file = $path . "route." . $routePrefixName . ".php";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if (!file_exists($file)) {
            $file = fopen($file, 'w');
            fwrite($file, "<?php" . PHP_EOL);
            $controllerNamespace = $directoryName ? "App\\Http\\Controllers\\$directoryName\\$ControllerName" : "App\\Http\\Controllers\\$ControllerName";
            fwrite($file, "use $controllerNamespace;" . PHP_EOL);
            fwrite($file, "use Illuminate\Support\Facades\Route;" . PHP_EOL);
            fwrite($file, $RouteContent);
            fclose($file);
        }




        return $RouteContent;
    }

    public static function listContent($TableName, $directoryName)
    {
        $TableName = strtolower($TableName);
        $TableCols = DB::select("describe " . $TableName);
        $TableRows = DB::select("select * from " . $TableName);
        $folder = '';
        $routeName = '';
        if (!empty($directoryName)) {
            $folder .= strtolower($directoryName) . '/';
            $routeName .= strtolower($directoryName) . '.';
        }
        $folder .= str_replace("tbl_", "", $TableName);
        $Table_pk = str_replace("tbl_", "", $TableName) . "_id";
        $title = ucwords(str_replace("tbl_", "", $TableName));
        $routeName .= strtolower(str_replace("tbl_", "", $TableName)) . '.';
        $columns = self::getTableColumns($TableName);
        $primaryKey = $columns[0];
        $tableFields = DB::select("describe $TableName");
        $translated = label('' . $title);
        $HiddenColumns = array($primaryKey, "remarks", "createdon", "createdby", "updatedby", "created_at", "updated_at", "description", "details", "text", "display_order", "status");
        $listContent = '@extends(\'backend.template\')
@section(\'content\')
<div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
    <h2>{{ label("' . $title . ' List") }}</h2>
    <a href="{{ route(\'' . $routeName . 'create\') }}" class="btn btn-primary"><span>{{label("Create New")}}</span></a>
</div>
<div class="card-body">
<table class="table dataTable" id="' . $TableName . '" data-url="{{ route(\'' . $routeName . 'sort\') }}">
                            <thead class="table-light">
                                <tr>
                                <th class="tb-col"><span class="overline-title">{{label("Sn.")}}</span></th>' . PHP_EOL;

        foreach ($columns as $key => $column) {

            if (!in_array($column, $HiddenColumns))
                $listContent .= '<th class="tb-col"><span class="overline-title">{{ label("' . $column . '") }}</span></th>' . PHP_EOL;
        }
        $listContent .= '<th class="tb-col" data-sortable="false"><span
        class="overline-title">{{ label("Action") }}</span>
    </th>
    </tr>
    </thead>
    <tbody>
        @php
        $i = 1;
        @endphp
        @foreach ($data as $item)
        
        <tr data-id="{{$item->' . $columns[0] . '}}" data-display_order="{{$item->display_order}}" class="draggable-row">
            <td class="tb-col">{{ $i++ }}</td>';
        foreach ($columns as $key => $column) {
            if (!in_array($column, $HiddenColumns)) {

                switch ($column) {
                    case (strpos($column, "parent_") !== false):
                        $listContent .= '<td class="tb-col">' . PHP_EOL;
                        $listContent .= '{!! getFieldData("' . $TableName . '", "title", "' . $columns[0] . '", $item->' . $column . ') !!}' . PHP_EOL;
                        $listContent .= '</td>' . PHP_EOL;
                        break;
                    case (strpos($column, "s_id") !== false):  //CASE TO HANDLE FOREIGN TABLE
                        $FTNameRaw = str_replace("s_id", "s", $column);
                        $FTName = "tbl_" . str_replace("s_id", "s", $column);
                        $FTCols = DB::select("describe " . $FTName);
                        $listContent .= '<td class="tb-col">' . PHP_EOL;
                        //function getFieldData($tableName, $returnField, $referenceFieldName, $referenceValue)
                        $listContent .= '{!! getFieldData("' . $FTName . '", "title", "' . $FTCols[0]->Field . '", $item->' . $column . ') !!}' . PHP_EOL;
                        $listContent .= "</td>";
                        break;
                    case 'alias':
                        $listContent .= '<td class="tb-col">
                        <div class="alias-wrapper" data-id="{{$item->' . $columns[0] . '}}">
                            <span class="alias">{{ $item->alias }}</span>
                            <input type="text" class="alias-input d-none" value="{{ $item->alias }}" id="alias_{{$item->' . $columns[0] . '}}" />
                        </div>
                        <span class="badge badge-soft-primary change-alias-badge">change alias</span>
                    </td>' . PHP_EOL;
                        break;
                    case (in_array($column, self::$imageFields)):
                        $listContent .= '<td class="tb-col">{{ showImageThumb($item->' . $column . ') }}</td>' . PHP_EOL;
                        break;
                    case (in_array($column, self::$dateFields)):
                        $listContent .= '<td class="tb-col">{{ myDate($item->' . $column . ') }}</td>' . PHP_EOL;
                        break;
                    case 'status':
                        $listContent .= '<td class="tb-col">{!! $item->status_name !!}</td>' . PHP_EOL;
                        break;
                    default:
                        $listContent .= '<td class="tb-col">{{ $item->' . $column . ' }}</td>' . PHP_EOL;
                }
            }
        }
        $listContent .= '<td class="tb-col">
        <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a href="{{route(' . "'" . $routeName . 'show' . "'" . ',[$item->' . $primaryKey . '])}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> {{label("View")}}</a></li>
                                                            <li><a href="{{route(' . "'" . $routeName . 'edit' . "'" . ',[$item->' . $primaryKey . '])}}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> {{label("Edit")}}</a></li>
                                                            <li>
                                                            <a href="{{route(' . "'" . $routeName . 'destroy' . "'" . ',[$item->' . $primaryKey . '])}}" class="dropdown-item remove-item-btn" onclick="confirmDelete(this.href)">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> {{ label(\'Delete\') }}
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
    $(\'.change-alias-badge\').on(\'click\', function() {
        var aliasWrapper = $(this).prev(\'.alias-wrapper\');
        var aliasSpan = aliasWrapper.find(\'.alias\');
        var aliasInput = aliasWrapper.find(\'.alias-input\');
        var isEditing = $(this).hasClass(\'editing\');
        aliasInput.toggleClass("d-none");
        if (isEditing) {
            // Update alias text and switch to non-editing state
            var newAlias = aliasInput.val();
            aliasSpan.text(newAlias);
            aliasSpan.show();
            aliasInput.hide();
            $(this).removeClass(\'editing\').text(\'Change Alias\');
            var articleId = $(aliasWrapper).data(\'id\');
            var ajaxUrl = "{{ route(\'' . $routeName . 'updatealias\') }}";
            var data = {
                articleId: articleId,
                newAlias: newAlias
            };
            
            $.ajax({
                url: ajaxUrl,
                type: \'POST\',
                headers: {
                    \'X-CSRF-TOKEN\': $(\'meta[name="csrf-token"]\').attr(\'content\')
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
            $(this).addClass(\'editing\').text(\'Save Alias\');
        }
    });
    var mytable = $(".dataTable").DataTable({
        ordering: true,
        rowReorder: {
            //selector: \'tr\'
        },
    });

    var isRowReorderComplete = false;

    mytable.on(\'row-reorder\', function(e, diff, edit) {
        isRowReorderComplete = true;
    });

    mytable.on(\'draw\', function() {
        if (isRowReorderComplete) {
            var url = mytable.table().node().getAttribute(\'data-url\');
            var ids = mytable.rows().nodes().map(function(node) {
                return $(node).data(\'id\');
            }).toArray();

            console.log(ids);
            $.ajax({
                url: url,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $(\'meta[name="csrf-token"]\').attr(\'content\')
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
        title: \'Are you sure?\',
        text: \'You will not be able to recover this item!\',
        icon: \'warning\',
        showCancelButton: true,
        confirmButtonText: \'Delete\',
        cancelButtonText: \'Cancel\',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: \'DELETE\',
                headers: {
                    \'X-CSRF-TOKEN\': $(\'meta[name="csrf-token"]\').attr(\'content\')
                },
                success: function(response) {
                    Swal.fire(\'Deleted!\', \'The item has been deleted.\', \'success\');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    Swal.fire(\'Error!\', \'An error occurred while deleting the item.\', \'error\');
                }
            });
        }
    });
}
</script>


@endpush
    ';

        $path = base_path() . "/resources/views/crud/generated/$folder/";
        $file = $path . "index.blade.php";
        if (!file_exists("$path")) {
            mkdir("$path", 0777, true);
        }
        if (!file_exists($file)) {
            $file = fopen($file, 'w');
            fwrite($file, $listContent);
            fclose($file);
        }
        return $listContent;
    }

    //End of list code content

    //ajax complete List


    public static function modelContent($tableName, $directoryName)
    {
        $tableName = strtolower($tableName);
        $modelPath = '';
        if (!empty($directoryName)) {
            $modelPath .= "\\" . ucfirst($directoryName);
        }

        $modelClass = ucfirst(str_replace("tbl_", "", $tableName));


        $tableFields = DB::select("describe $tableName");
        $pkField = $tableFields[0]->Field;

        $skipPRimaryKey = 1;
        $tableColumns = '';
        foreach ($tableFields as $tableField) :
            if ($skipPRimaryKey == 1) {
                $skipPRimaryKey = 2;
                continue;
            }
            $tableColumns .= "'" . $tableField->Field . "',\n";

        endforeach;

        $contentString = "<?php
        namespace App\Models$modelPath;

        use App\Models\User;
        use Illuminate\Database\Eloquent\Casts\Attribute;
        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        use App\Traits\CreatedUpdatedBy;

        class $modelClass extends Model
        {
            use HasFactory, CreatedUpdatedBy;
          
            protected \$primaryKey = '$pkField';
            public \$timestamps = true;
            protected \$fillable =[
                $tableColumns
            ];

            protected \$appends = ['status_name'];

            protected function getStatusNameAttribute()
            {
                return \$this->status == 1 ? '<span class=\"badge text-bg-success-soft\"> Active </span>' : '<span class=\"badge text-bg-danger-soft\">Inactive</span>';
            }

    protected function createdBy(): Attribute
    {
        return Attribute::make(
            get: fn (\$value) =>  User::find(\$value) ? User::find(\$value)->name : '',
        );
    }

    protected function updatedBy(): Attribute
    {
        return Attribute::make(
            get: fn (\$value) => User::find(\$value) ? User::find(\$value)->name : '',
        );
    }
        }";

        $modelPath = '';
        if (!empty($directoryName)) {
            $modelPath .=  ucfirst($directoryName) . '/';
        }

        if (!file_exists(base_path() . '/app/Models/' . $modelPath)) {
            mkdir(base_path() . '/app/Models/' . $modelPath, 0777, true);
        }
        $filename = $modelClass . ".php";
        if (!file_exists(base_path() . "/app/Models/" . $modelPath . $filename)) {
            $file = fopen(base_path() . "/app/Models/" . $modelPath . $filename, 'w');
            fwrite($file, $contentString);
            fclose($file);
        }
        return $contentString;
    }


    public static function controllerContent($tableName, $directoryName)
    {
        $tableName = strtolower($tableName);
        $tableFields = DB::select("describe $tableName");
        $pkField = $tableFields[0]->Field;
        $controllerName = ucfirst(str_replace("tbl_", "", $tableName)) . "Controller";
        $viewName = '';
        $controllerPath = '';
        $modelName = '';
        if (!empty($directoryName)) {
            $viewName .= strtolower($directoryName) . '.';
            $controllerPath .= "\\" . ucfirst($directoryName);
            $modelName .=  ucfirst($directoryName) . '\\';
        }
        $modelName .= ucfirst(str_replace("tbl_", "", $tableName));
        $viewName .= strtolower(str_replace("tbl_", "", $tableName));
        $modelClass = ucfirst(str_replace("tbl_", "", $tableName));
        $tableAliasColumnName = "title";

        $contentString = "<?php
        namespace App\Http\Controllers$controllerPath;
        use App\Http\Controllers\Controller;
        use Illuminate\Http\Request;
        use App\Models\\$modelName;
        use Illuminate\Support\Facades\DB;
        use Illuminate\Support\Facades\Validator;
        use App\Service\CommonModelService;
        use Log;
        use Exception;

        class $controllerName extends Controller
        {
            protected \$modelService;
            public function __construct($modelClass \$model)
            {
                \$this->modelService = new CommonModelService(\$model);
            }
           public function index(Request \$request)
            {
                createActivityLog($controllerName::class, 'index', '$directoryName $modelClass index');
                \$data = $modelClass::where('status','<>',-1)->orderBy('display_order')->get();
               
                return view(\"crud.generated.$viewName.index\", compact('data'));
            }

            public function create(Request \$request)
            {
                createActivityLog($controllerName::class, 'create', '$directoryName $modelClass create');
                \$TableData = $modelClass::where('status','<>',-1)->orderBy('display_order')->get();
                return view(\"crud.generated.$viewName.create\",compact('TableData'));
            }

            public function store(Request \$request)
            {
                createActivityLog($controllerName::class, 'store', '$directoryName $modelClass store');
                \$validator = Validator::make(\$request->all(), [
                    //ADD REQUIRED FIELDS FOR VALIDATION
                ]);

                if (\$validator->fails()) {
                    return response()->json([
                        'error' => \$validator->errors(),
                    ],500);
                }
                \$request->request->add(['alias' => slugify(\$request->$tableAliasColumnName)]);
                \$request->request->add(['display_order' => getDisplayOrder('" . $tableName . "')]);
                \$requestData=\$request->all();
                array_walk_recursive(\$requestData, function (&\$value) {
                    \$value = str_replace(env('APP_URL').'/', '', \$value);
                });
                array_walk_recursive(\$requestData, function (&\$value) {
                    \$value = str_replace(env('APP_URL'), '', \$value);
                });              
                DB::beginTransaction();
                try {
                    \$operationNumber = getOperationNumber();
                    \$this->modelService->create(\$operationNumber, \$operationNumber, null, \$requestData);
                } catch (\Exception \$e) {
                    DB::rollBack();
                    Log::info(\$e->getMessage());
                    createErrorLog($controllerName::class, 'store', \$e->getMessage());
                    return response()->json(['status' => false, 'message' => \$e->getMessage()], 500);
                }
                DB::commit();
                if (\$request->ajax()) {
                    return response()->json(['status' => true, 'message' => 'The $modelClass Created Successfully.'], 200);
                }
                return redirect()->route('$viewName.index')->with('success','The $modelClass created Successfully.');
            }
          
            public function sort(Request \$request)
            {
                \$idOrder = \$request->input('id_order');
                
                foreach (\$idOrder as \$index => \$id) {
                    \$companyArticle = $modelClass::find(\$id);
                    \$companyArticle->display_order = \$index + 1;
                    \$companyArticle->save();
                }
            
                return response()->json(['status' => true, 'content' => 'The Companyarticles sorted successfully.'], 200);
            }
            public function updatealias(Request \$request)
            {
                
                \$articleId = \$request->input('articleId');
                \$newAlias = \$request->input('newAlias');
                \$companyArticle = $modelClass::find(\$articleId);
                if (!\$companyArticle) {
                    return response()->json(['status' => false, 'content' => 'Company article not found.'], 404);
                }
                \$companyArticle->alias = \$newAlias;
                \$companyArticle->save();
                return response()->json(['status' => true, 'content' => 'Alias updated successfully.'], 200);
            }
        
            
            

            public function show(Request \$request, \$id)
            {
                createActivityLog($controllerName::class, 'show', '$directoryName $modelClass show');
                \$data = $modelClass::findOrFail(\$id);
                
                return view(\"crud.generated.$viewName.show\", compact('data'));
            }


            public function edit(Request \$request, \$id)
            {
                createActivityLog($controllerName::class, 'edit', '$directoryName $modelClass edit');
                \$TableData = $modelClass::where('status','<>',-1)->orderBy('display_order')->get();
                \$data = $modelClass::findOrFail(\$id);
                if (\$request->ajax()) {
                    \$html = view(\"crud.generated.$viewName.ajax.edit\", compact('data'))->render();
                    return response()->json(['status' => true, 'content' => \$html], 200);
                }
                return view(\"crud.generated.$viewName.edit\", compact('data','TableData'));
            }


            public function update(Request \$request, \$id)
            {
                createActivityLog($controllerName::class, 'update', '$directoryName $modelClass update');
                \$validator = Validator::make(\$request->all(), [
                   //ADD VALIDATION FOR REQIRED FIELDS
                ]);

                if (\$validator->fails()) {
                    return response()->json([
                        'error' => \$validator->errors(),
                    ],500);
                }
                \$requestData=\$request->all();
                array_walk_recursive(\$requestData, function (&\$value) {
                    \$value = str_replace(env('APP_URL').'/', '', \$value);
                });
                array_walk_recursive(\$requestData, function (&\$value) {
                    \$value = str_replace(env('APP_URL'), '', \$value);
                });
                DB::beginTransaction();
                try {
                    \$OperationNumber = getOperationNumber();
                    \$this->modelService->update(\$OperationNumber, \$OperationNumber, null, \$requestData, \$request->input('" . $pkField . "'));
                } catch (Exception \$e) {
                    DB::rollBack();
                    Log::info(\$e->getMessage());
                    createErrorLog($controllerName::class, 'update', \$e->getMessage());
                    return response()->json(['status' => false, 'message' => \$e->getMessage()], 500);
                }
                DB::commit();
                if (\$request->ajax()) {
                    return response()->json(['status' => true, 'message' => 'The $modelClass updated Successfully.'], 200);
                }
                // return redirect()->route('$viewName.index')->with('success','The $modelClass updated Successfully.');
                return redirect()->back()->with('success', 'The  $modelClass  updated successfully.');
            }

            public function destroy(Request \$request,\$id)
            {
                createActivityLog($controllerName::class, 'destroy', '$directoryName $modelClass destroy');
                DB::beginTransaction();
                try {
                    \$OperationNumber = getOperationNumber();
                    \$this->modelService->destroy(\$OperationNumber, \$OperationNumber, \$id);
                } catch (Exception \$e) {
                    DB::rollBack();
                    Log::info(\$e->getMessage());
                    createErrorLog($controllerName::class, 'destroy', \$e->getMessage());
                    return response()->json(['status' => false, 'message' => \$e->getMessage()], 500);
                }
                DB::commit();
                return response()->json(['status'=>true,'message'=>'The $modelClass Deleted Successfully.'],200);
            }
         

            
        }
        ";
        // $filename = ($controllerPath != "") ? $controllerPath . "/" : "";
        $controllerDirectory = '';
        if (!empty($controllerPath)) {
            $controllerDirectory = ucfirst($directoryName) . '/';
        }
        $filename = $controllerName . ".php";
        $filePath = base_path() . "/app/Http/Controllers/" . $controllerDirectory . $filename;

        if (!file_exists($filePath)) {
            if (!file_exists(base_path() . '/app/Http/Controllers/' . $controllerDirectory)) {
                mkdir(base_path() . '/app/Http/Controllers/' . $controllerDirectory, 0777, true);
            }
            $file = fopen($filePath, 'w');
            fwrite($file, $contentString);
            fclose($file);
        }

        return $contentString;
    }
}
