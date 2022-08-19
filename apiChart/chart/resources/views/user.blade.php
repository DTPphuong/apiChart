<html>

<head>
    <title>Lấy phần tử đầu tiên trong mảng PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>

<table id="table1">
    <thead>
    <tr>
        <th>ID</th>
        <th align="left">Name</th>
        <th align="left">Age</th>
        <th align="left">Email</th>
        <th align="left">City</th>
        <th align="left">Color</th>
        <th align="left">Date</th>
    </tr>
    </thead>
    <tr>
        <th align="center"></th>
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
    $(document).ready(function () {
        function getData(){
                axios({
                    method : 'get',
                    url : '/user'
                }).then(res =>{
                    user = res.data;
                    console.log(res.data);
                    // console.log(res.data);
                    $('#table1').DataTable({
                        data: user,
                        columns: [
                            { data: 'id' },
                            { data: 'name' },
                            { data: 'age' },
                            { data: 'email' },
                            { data: 'city' },
                            { data: 'color' },
                            { data: 'date' }
                        ]
                    })
                }).catch(err =>{
                    console.log(err);
                });
        }
        getData()
    })

</script>

</html>
