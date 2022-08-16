<!doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>amCharts examples</title>
    <script src="/js/amcharts.js" type="text/javascript"></script>
    <script src="/js/serial.js" type="text/javascript"></script>

    {{--------------------axios---------------}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" ></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<!-- Styles -->
<style>
    *{
        margin: 15px 5px 5px 5px;
    }
    body {
        font-family: Tahoma,Arial,Verdana;
        font-size: 12px;
        color: black;
    }

    a:link {color: #84c4e2;}
    a:visited {color:#84c4e2;}
    a:hover {color: #cd82ad;}
    a:active {color: #84c4e2;}

    #table{
        margin-left: 200px;
        text-align: center;
        width: 600px;
    }
    .header{
        text-align: center;
    }
</style>
<body>
<!-- HTML -->
<div class="header"><h1>Chart API</h1></div>
<div id="chartdiv" style="width: 100%; height: 400px;"></div>

{{-------------test-------------}}
<table class="table" id="table" border="2px">

</table>






<script>
    $(function (){
        getData();
    })

    let user = [];

    function getData(){
        axios({
            method : 'get',
            url : 'https://62e8ab6e93938a545be933c4.mockapi.io/data',
            data: {
                country: "",
                visits: 0
            }
        }).then(res =>{
            user = res.data;
            console.log(user);
            // console.log(res.data);
            renderData();
        }).catch(err =>{
            console.log(err);
        });
    }
    function renderData(){
        let element = `<tr>
        <th>Country</th>
        <th>Visits</th>
</tr>`
        user.map(value =>{
            element +=`<tr>
        <td>${value.country}</td>
        <td>${value.visits}</td>
</tr>`
        });
        document.getElementById("table").innerHTML = element
    }



        var chart;

        var chartData = [
        {
            "country": "USA",
            "visits": 4025
        },
        {
            "country": "China",
            "visits": 1882
        },
        {
            "country": "Japan",
            "visits": 1809
        },
        {
            "country": "Germany",
            "visits": 1322
        },
        {
            "country": "UK",
            "visits": 1122
        },
        {
            "country": "France",
            "visits": 1114
        },
        {
            "country": "India",
            "visits": 984
        },
        {
            "country": "Spain",
            "visits": 711
        },
        {
            "country": "Netherlands",
            "visits": 665
        },
        {
            "country": "Russia",
            "visits": 580
        },
        {
            "country": "South Korea",
            "visits": 443
        },
        {
            "country": "Canada",
            "visits": 441
        },
        {
            "country": "Brazil",
            "visits": 395
        },
        {
            "country": "Italy",
            "visits": 386
        },
        {
            "country": "Australia",
            "visits": 384
        },
        {
            "country": "Taiwan",
            "visits": 338
        },
        {
            "country": "Poland",
            "visits": 328
        }
        ];


        AmCharts.ready(function () {
        // SERIAL CHART
        chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "country";
        chart.startDuration = 1;

        // AXES
        // category
        var categoryAxis = chart.categoryAxis;
        categoryAxis.labelRotation = 90;
        categoryAxis.gridPosition = "start";

        // value
        // in case you don't want to change default settings of value axis,
        // you don't need to create it, as one value axis is created automatically.

        // GRAPH
        var graph = new AmCharts.AmGraph();
        graph.valueField = "visits";
        graph.balloonText = "[[category]]: <b>[[value]]</b>";
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 0.8;
        chart.addGraph(graph);

        // CURSOR
        var chartCursor = new AmCharts.ChartCursor();
        chartCursor.cursorAlpha = 0;
        chartCursor.zoomable = false;
        chartCursor.categoryBalloonEnabled = false;
        chart.addChartCursor(chartCursor);

        chart.creditsPosition = "top-right";

        chart.write("chartdiv");
    });
</script>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
