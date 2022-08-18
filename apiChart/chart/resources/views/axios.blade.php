<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<script>
    axios({
        method: 'get',
        url: 'https://62e8ab6e93938a545be933c4.mockapi.io/Student',
        data: [{
            // id: 1,
            // name : "",
            // phone : 0
        }]
    })
        .then(function (response) {
            response.data;
            console.log(response.data)
        })
        .catch(function (e){
        console.log(e)
    })
</script>
</body>
</html>

