<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
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
    #chartdiv {
        width: 100%;
        height: 500px;
    }
    #table{
        margin-left: 200px;
        text-align: center;
        width: 600px;
    }
</style>
<body>
<!-- HTML -->

<div id="chartdiv"></div>

{{-------------test-------------}}
<table class="table" id="table" border="2px">

</table>






<script>
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
    am5.ready(function() {
        getData();
        /*Create root element*/ //tạo 1 root
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        //Root là một phần của core gói của chúng tôi,
        // vì vậy chúng tôi sử dụng am5.* không gian tên để truy cập nó.
        var root = am5.Root.new("chartdiv");
        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        //setThemes()phương pháp của phần tử gốc của nó ,
        // cung cấp các phiên bản của chủ đề, được tạo bằng new()phương pháp của chúng :
        root.setThemes([
            am5themes_Animated.new(root)
        ]);
        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        //biểu đồ XY về cơ bản được sử dụng để biểu diễn bất kỳ dữ liệu tuyến tính
        // hoặc phân tán nào trong hai chiều. Hướng dẫn này sẽ giúp bạn bắt đầu tạo các biểu đồ này.
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            layout: root.verticalLayout
        }));
        var colors = chart.get("colors");
        var data = [{
            country: "US",
            visits: 500
        }, {
            country: "UK",
            visits: 325
        }, {
            country: "China",
            visits: 602
        }, {
            country: "Japan",
            visits: 259
        }, {
            country: "Germany",
            visits: 322
        }, {
            country: "France",
            visits: 214
        }, {
            country: "India",
            visits: 204
        }, {
            country: "Spain",
            visits: 198
        }, {
            country: "Netherlands",
            visits: 165
        }, {
            country: "Russia",
            visits: 130
        }, {
            country: "South Korea",
            visits: 93
        }, {
            country: "Canada",
            visits: 41
        }];
        prepareParetoData();
        //Duyệt qua mảng lấy ra visits
        function prepareParetoData() {
            var total = 0;
            for (var i = 0; i < data.length; i++) {
                var value = data[i].visits;
                total += value;
            }
            var sum = 0;
            for (var i = 0; i < data.length; i++) {
                var value = data[i].visits;
                sum += value;
                data[i].pareto = sum / total * 100;
            }
        }
        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "country",
            renderer: am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            })
        }));
        xAxis.get("renderer").labels.template.setAll({
            paddingTop: 20
        });
        xAxis.data.setAll(data);
        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {})
        }));
        var paretoAxisRenderer = am5xy.AxisRendererY.new(root, {opposite:true});
        var paretoAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: paretoAxisRenderer,
            min:0,
            max:100,
            strictMinMax:true
        }));
        paretoAxisRenderer.grid.template.set("forceHidden", true);
        paretoAxis.set("numberFormat", "#'%");
        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "visits",
            categoryXField: "country"
        }));
        series.columns.template.setAll({
            tooltipText: "{categoryX}: {valueY}",
            tooltipY: 0,
            strokeOpacity: 0,
            cornerRadiusTL: 6,
            cornerRadiusTR: 6
        });
        series.columns.template.adapters.add("fill", function(fill, target) {
            return chart.get("colors").getIndex(series.dataItems.indexOf(target.dataItem));
        })
        // pareto series
        var paretoSeries = chart.series.push(am5xy.LineSeries.new(root, {
            xAxis: xAxis,
            yAxis: paretoAxis,
            valueYField: "pareto",
            categoryXField: "country",
            stroke: root.interfaceColors.get("alternativeBackground"),
            maskBullets:false
        }));
        paretoSeries.bullets.push(function() {
            return am5.Bullet.new(root, {
                locationY: 1,
                sprite: am5.Circle.new(root, {
                    radius: 5,
                    fill: series.get("fill"),
                    stroke:root.interfaceColors.get("alternativeBackground")
                })
            })
        })
        series.data.setAll(data);
        paretoSeries.data.setAll(data);
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();
        chart.appear(1000, 100);
    }); // end am5.ready()
</script>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
