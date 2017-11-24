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
                        <div class="bs-example">
                            <div class="input-group">
                                <label for="name_en">Введите название страны</label>
                                <input type="text" class="form-control" name="name_en" autocomplete="off" placeholder="Начните ввод ..." name="search" id="search">
                            </div>
                                <ul class="list-group" id="result">
                                    {{--Тут будет результат поиска--}}
                                </ul>
                            <br>
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
                $.getJSON('/country-search',function(data) {
                    $.each(data, function(key, value) {
                        if (value.CountryName.search(expression) != -1)
                        {
                            $('#result').append('<li class="list-group-item link-class">'+value.CountryName+'</a></li>');
                        }
                    });
                });
            });
        });
    </script>
@stop