@extends('layouts.index')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-md-9">
            <form id="formFilter" class="form-inline">
                <div class="form-group">
                    <label>Tahun Kelahiran :</label>
                    <input name="tahun" placeholder="Tahun Kelahiran" class="form-control" type="text" id="datepicker" />
                </div>
                <button type="button" style="margin-left:1%" id="btn-submit" class="btn btn-success"><i class="fa fa-search"></i> Filter</button>
            </form>
        </div>
    </div>

    <div class="row" style="margin-top:3%">
        <div class="col-md-12" id="chart">
            {{-- @include('home.chart') --}}
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });

        $("#btn-submit").click(function(){
            var data = $("#formFilter").serialize();

            $.ajax({
                url: "{{url('dashboard/filter')}}",
                type: "post",
                data: data,
                success:function(res){
                    $("#chart").html(res);
                }
            })
        });




        // Highcharts.chart('container', {
        //     chart: {
        //         type: 'bar'
        //     },
        //     title: {
        //         text: 'Persebaran Masyarakat Berdasarkan Tahun Lahir dan Pendidikan'
        //     },
        //     xAxis: {
        //         categories: ['1990'],
        //         title: {
        //         text: null
        //         }
        //     },
        //     yAxis: {
        //         min: 0,
        //         title: {
        //         text: 'Population (millions)',
        //         align: 'high'
        //         },
        //         labels: {
        //         overflow: 'justify'
        //         }
        //     },
        //     tooltip: {
        //         valueSuffix: ' millions'
        //     },
        //     plotOptions: {
        //         bar: {
        //         dataLabels: {
        //             enabled: true
        //         }
        //         }
        //     },
        //     legend: {
        //         layout: 'vertical',
        //         align: 'right',
        //         verticalAlign: 'top',
        //         x: -40,
        //         y: 80,
        //         floating: true,
        //         borderWidth: 1,
        //         backgroundColor:
        //         Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        //         shadow: true
        //     },
        //     credits: {
        //         enabled: false
        //     },
        //     series: [{
        //         name: 'SD',
        //         data: [107]
        //     }, {
        //         name: 'SMP',
        //         data: [133]
        //     }, {
        //         name: 'SMA',
        //         data: [814]
        //     }, {
        //         name: 'Diploma',
        //         data: [1216]
        //     }, {
        //         name: 'Sarjana',
        //         data: [500]
        //     }
        //     ]
        // });
    </script>
@endsection