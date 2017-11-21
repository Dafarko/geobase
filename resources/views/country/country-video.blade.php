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
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Responsive Hover Table</h3>

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
                        <tr>
                            @foreach($countryInfo as $info)
                                <td>{{ $info }}</td>
                            @endforeach
                                <td>{{ $population }}</td>
                                <td>{{ $area }}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div id="map"></div>
    <script>
        function initMap() {
            var uluru = {lat: {{ $lat }}, lng: {{ $lng }}};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQSIzUItqXEdUbpBvp9TUBCMHZLuWU6oI&callback=initMap">
    </script>
@stop