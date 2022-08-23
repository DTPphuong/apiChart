<html>

<head>
    <title>Get API data to datatable</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
    td {
        border: 1px solid #000000;
    }
    th {
        border: 1px solid #000000;
    }
    .modal-body {
        display: flex;
        justify-content: space-between;
    }
</style>
<body>

<table id="table1" style="border: 1px solid #000000">
    <thead>
    <tr>
        <th>STT</th>
        <th>Ảnh</th>
        <th>Tên</th>
        <th>Đơn vị</th>
        <th>Danh mục</th>
        <th>Giá bán</th>
        <th>Chi tiết</th>
    </tr>
    </thead>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>

        </th>
    </tr>

</table>

<div class="container">

    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Chi tiết</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="padding-left: 200px;">Chi tiết sản phẩm</h4>
                </div>
                <div class="modal-body">
                    <table class="tblmodal">
                        <div class="modal-product">
                            <tr>
                                <div class="name">df</div>
                                <div class="unit_type">àv</div>
                                <div class="category_name">àv</div>
                                <div class="price">àervgae</div>
                            </tr>
                        </div>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>
</body>

<script>
    let user = [];
    $(function (){
        getData()
    })
    function getData(){
        axios({
            method : 'get',
            url : '/request',
            // Get link Controller"
        }).then(res =>{
            console.log('a:',res.data.data.list);
            showData(res.data.data.list)
        }).catch(err =>{
            console.log(err);
        });
    }
    // Show data
    function showData(data){
        // console.log('2',data)
        $('#table1').DataTable({
            data: data,
            columns: [
                { "data": "id",
                    "render": function (data, type, row, meta){
                    return meta.row+1;
                    }
                },
                { data: 'avatar'},
                { data: 'name'},
                { data: 'unit_type'},
                { data: 'category_name'},
                { data: 'price'},
                { data: ''},
            ]
        })
    }

</script>

</html>
