@extends('layouts.wrapper')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-purple">
                    <div class="widget-user-image">
                        <img class="img-circle" src="../dist/img/placeholder.png" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Поиск по</h3>
                    <h5 class="widget-user-desc">параметрам</h5>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ввыберите параметры</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route' => 'search-params', 'method' => 'post'])  !!}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-7">
                                    <label for="code">Код страны</label>
                                    <input type="text" class="form-control" name="code" id="code" placeholder="Введите код страны">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-3">
                                    <laber for="pfrom"><strong>Население: От</strong></laber>
                                    <input type="text" name="pfrom" class="form-control" placeholder="От">
                                </div>
                                <div class="col-xs-3">
                                    <laber for="pto"><strong>Население: До</strong></laber>
                                    <input type="text" name="pto" class="form-control" placeholder="До">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Подтвердить</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop