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
                {!! Form::open(['route' => 'get-nearby', 'method' => 'post'])  !!}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <label for="name">Введите название нас. пункта</label>
                                <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Начните ввод ..." name="search" id="search">
                            </div>
                            <ul class="list-group" id="result">
                                {{--Тут будет результат поиска--}}
                            </ul>
                            <br>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-5">
                                    <laber for="rows"><strong>Количество строк: </strong></laber>
                                    <input type="text" name="rows" class="form-control" placeholder="Кол-во строк">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-5">
                                    <laber for="radius"><strong>Радиус: до 300км</strong></laber>
                                    <input type="text" name="radius" class="form-control" placeholder="Радиус">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').keyup(function(event) {
                /*$.ajaxSetup({ cache: false });*/
                $('#result').html('');
                var searchField = $('#search').val();
                var expression = new RegExp(searchField, "i");
                $.getJSON('/city-search',function(data) {
                    $.each(data, function(key, value) {
                        if (value.Name.search(expression) != -1)
                        {
                            $('#result').append('<li class="list-group-item link-class">'+value.Name+'</a></li>');
                        }
                    });
                });
            });
        });
    </script>
@stop