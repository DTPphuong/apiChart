<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script></script></script>
</head>
<style>
    input{
        width: 100px;
        height: 30px;
        font-size: 15px;
    }
    select{
        width: 100px;
        height: 30px;
        font-size: 15px;
    }
    button{
        width: 100px;
        height: 35px;
        font-size: 15px;
    }
</style>
<body>
<div class="container">
    <!--        <label>Số A</label>-->
    <form action="cal.php" method="get">

        {{-- Ô input thứ nhất --}}
    <input name="numA" id="numA">
        {{-- Select chọn phép toán --}}
    <select name="cal" id="cal">
        <option value="addition">+</option>
        <option value="subtraction">-</option>
        <option value="multiplication">*</option>
        <option value="division">/</option>
        <option value="superscript">^</option>
    </select>
        {{-- Ô input thứ 2 --}}
    <input name="numB">
        {{-- Nút result --}}
    <button class="equal">=</button>
        {{-- Label hiển thị kết quả--}}
    <label>Kết quả :</label>
    <input name="result">
    </form>

</div>
<?php
    if()
?>
</body>
</html>
