@extends('layouts.wrapper')

@section('content')
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-purple">
                <div class="widget-user-image">
                    <img class="img-circle" src="../dist/img/placeholder.png" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Результаты</h3>
                <h5 class="widget-user-desc">поиска</h5>
            </div>
        </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Информация о стране</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Название</th>
                        </tr>
                        <tr>
                            @foreach($countryInfo as $info)
                                <td>{{ $info }}</td>
                            @endforeach
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