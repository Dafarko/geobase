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
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Введите название нас. пункта</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Название нас. пункта</label>
                            <input type="text" class="form-control" id="name" placeholder="Введите название">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-3">
                                    <laber for="radius"><strong>Радиус: </strong></laber>
                                    <input type="text" name="radius" class="form-control" placeholder="Радиус">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Подтвердить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop