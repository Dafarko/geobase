@extends('layouts.wrapper')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue">
                    <div class="widget-user-image">
                        <img class="img-circle" src="../dist/img/placeholder.png" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Ближайщие пункты</h3>
                    <h5 class="widget-user-desc">Вся информация</h5>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ближайщие пункты</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Geo ID</th>
                            <th>Дистанция</th>
                            <th>Название</th>
                            <th>Страна</th>
                            <th>Тип</th>
                            <th>Lat</th>
                            <th>Lng</th>
                            <th>Тип пункта</th>
                        </tr>
                            @foreach($infoPlace as $info)
                            <tr>
                                <td>{{ $info -> geonameId }}</td>
                                <td>{{ $info -> distance }}</td>
                                <td>{{ $info -> name }}</td>
                                <td>{{ $info -> countryName }}</td>
                                <td>{{ $info -> fclName }}</td>
                                <td>{{ $info -> lat }}</td>
                                <td>{{ $info -> lng }}</td>
                                <td>{{ $info -> fcode }}</td>
                            </tr>
                            @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop