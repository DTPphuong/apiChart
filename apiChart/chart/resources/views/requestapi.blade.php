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
</head>

<style>
    td {
        border: 1px solid #000000;
    }
    th {
        border: 1px solid #000000;
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
    </tr>
    </thead>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>

</table>


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
            console.log('2',data)
            $('#table1').DataTable({
                data: data,
                columns: [
                    { data: 'id'},
                    { data: 'avatar'},
                    { data: 'name'},
                    { data: 'unit_type'},
                    { data: 'category_name'},
                    { data: 'price'},
                ]
            })
        }

</script>

</html>
