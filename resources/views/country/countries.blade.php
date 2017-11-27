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
                        <button type="submit" id="country" class="btn btn-primary">Подтвердить</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Все страны из базы данных</h3>

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
                            <th>ID</th>
                            <th>Код</th>
                            <th>Название</th>
                            <th>Валюта</th>
                            <th>FIPS</th>
                            <th>ISO</th>
                            <th>Север</th>
                            <th>Юг</th>
                            <th>Запад</th>
                            <th>Восток</th>
                            <th>Столица</th>
                            <th>Континент</th>
                            <th>Префикс конт.</th>
                            <th>Языки</th>
                            <th>GEO ID</th>
                            <th>Население</th>
                            <th>Площадь</th>
                        </tr>
                            <tr id="info">
                            </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div id="map"></div>

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
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQSIzUItqXEdUbpBvp9TUBCMHZLuWU6oI">
    </script>
    <script>
        $(function() {
            $('form').submit(function(e) {
                var $form = $(this);
                $.ajax({
                    type: $form.attr('method'),
                    url: $form.attr('action'),
                    data: $form.serialize()
                }).done(function(data) {
                    $("#info").empty();
                    for (var key in data.countryInfo) {
                        $("#info").append("<td>"+data.countryInfo[key]+"</td>");
                    }
                    $("#info").append("<td>"+data.population+"</td>");
                    $("#info").append("<td>"+data.area+"</td>");

                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: data.lat, lng: data.lng},
                        zoom: 8
                    });

                    var marker = new google.maps.Marker({
                        position: {lat: data.lat, lng: data.lng},
                        map: map
                    });

                }).fail(function() {
                    console.log('fail');
                });
                //отмена действия по умолчанию для кнопки submit
                e.preventDefault();
            });
        });
    </script>
@stop