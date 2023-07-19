@extends('backend.template')
@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">Tables in Database</h1>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card">
                        <div class="accordion" id="accordionTables">
                            <?php $a = 0; ?>

                            @foreach ($allTables as $Table)
                            <?php $a++; ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header"> <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$a}}"> {{$a}}: {{$Table->tablename}} </button> </h2>
                                <div id="collapse{{$a}}" class="accordion-collapse collapse" data-bs-parent="#accordionTables">
                                    <div class="accordion-body">
                                        <table class="datatable-init table" data-nk-container="table-responsive">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th class="tb-col"><span class="overline-title">S.N.</span></th>
                                                    <th class="tb-col"><span class="overline-title">{{__('lang.Column')}}</span></th>
                                                    <th class="tb-col"><span class="overline-title">{{label("Datatype")}}</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sn = 0; ?>
                                                @foreach($Table->tablecolumns as $column)
                                                <tr>
                                                    <?php $sn++; ?>
                                                    <td class="tb-col"><span >{{$sn}}</span></td>
                                                    <td class="tb-col"><span > {{$column->COLUMN_NAME}}</span></td>
                                                    <td class="tb-col"><span > {{$column->COLUMN_TYPE}}</span></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.custom-select2').select2();
    });
</script>
@endpush
