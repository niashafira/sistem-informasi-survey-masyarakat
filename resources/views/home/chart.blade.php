   
<figure class="highcharts-figure">
    <div id="container"></div>
</figure>

 <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Persebaran Masyarakat Berdasarkan Tahun Lahir dan Pendidikan'
    },
    xAxis: {
        categories: [{{$tahun}}],
        title: {
        text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
        text: 'Population (millions)',
        align: 'high'
        },
        labels: {
        overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
        dataLabels: {
            enabled: true
        }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'SD',
        data: [{{$count['SD']}}]
    }, {
        name: 'SMP',
        data: [{{$count['SMP']}}]
    }, {
        name: 'SMA',
        data: [{{$count['SMA']}}]
    }, {
        name: 'Diploma',
        data: [{{$count['Diploma']}}]
    }, {
        name: 'Sarjana',
        data: [{{$count['Sarjana']}}]
    }
    ]
});
</script>