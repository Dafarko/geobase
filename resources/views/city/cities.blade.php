@extends('layouts.wrapper')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-red">
                    <div class="widget-user-image">
                        <img class="img-circle" src="../dist/img/population.png" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Населенные пункты</h3>
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
                {!! Form::open(['route' => 'get-cities', 'method' => 'post'])  !!}
                <div class="box-body">
                    <div class="bs-example">
                        <div class="input-group">
                            <label for="name">Введите название нас. пункта</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Начните ввод ..." name="search" id="search">
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

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Информация о населеном пункте</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>GeonameID</th>
                            <th>Название</th>
                            <th>К. страны</th>
                            <th>Lng</th>
                            <th>Lat</th>
                            <th>Тип</th>
                            <th>Топоним</th>
                            <th>FcodeName</th>
                            <th>Wikipedia</th>
                            <th>Население</th>
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
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQSIzUItqXEdUbpBvp9TUBCMHZLuWU6oI&callback=initMap">
    </script>
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
                    for (var key in data.cityInfo) {
                        $("#info").append("<td>"+data.cityInfo[key]+"</td>");
                    }

                    var uluru = {lat: parseFloat(data.lat), lng: parseFloat(data.lng)};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 8,
                        center: uluru
                    });
                    var marker = new google.maps.Marker({
                        position: uluru,
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