@extends('layouts.wrapper')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <img class="img-circle" src="../dist/img/earth.png" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Страны</h3>
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
                    <h3 class="box-title">Введите название страны</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route' => 'get-country', 'method' => 'post'])  !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name_en">Название страны</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Введите название">
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