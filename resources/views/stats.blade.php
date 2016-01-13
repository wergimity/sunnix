@extends('layout')

@section('content')

    <div class="container">

        <h1>Stats</h1>

        <h2>Numbers</h2>

        <div class="row">

            <div class="col-md-4 text-center">

                <h4>{{ $total }}</h4>

                <p>Total events</p>

            </div>

            <div class="col-md-4 text-center">

                <h4>{{ $upcoming }}</h4>

                <p>Upcoming events</p>

            </div>

            <div class="col-md-4 text-center">

                <h4>{{ $finished }}</h4>

                <p>Past events</p>

            </div>

        </div>

        <h2>Monthly reminders</h2>

        <div class="row">

            <div class="col-md-12 text-center" style="overflow: auto">

                <canvas id="monthly-remindings" width="1000" height="300"></canvas>

            </div>

        </div>

    </div>

@stop

@section('scripts')

    <script>

        (function($) {

            var canvas = $('#monthly-remindings');

//            canvas.attr('width', canvas.closest('.container').width());

            var context = canvas.get(0).getContext('2d');

            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July", 'August', 'September', 'October', 'November', 'December'],
                datasets: [
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: {!! json_encode($data) !!}
                    }
                ]
            };

            var chart = new Chart(context).Bar(data, {});

            $(window).on('resize', function() {

//                canvas.attr('width', canvas.closest('.container').width());

                chart.update();

            });

        })(jQuery);

    </script>

@stop