<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="css/home1.css">
    <link rel="stylesheet" href="css/createContest.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
    <style>
    </style>
</head>
<body>
    <div class="container">
        <form id="create-contest" onsubmit="return false;">
            <div class="group">
                <div class="label">Contest Name *</div>
                <input type="text" name="contest_name">
            </div>
            <div class="group">
                <div class="label">Start time *</div>
                <input type="datetime-local" name="start_time">
            </div>
            <div class="group">
                <div class="label">End time *</div>
                <input type="datetime-local" name="end_time">
            </div>
            <div class="group">
                <div class="label"></div>
                <input type="checkbox" class="checkbox" name="no_end_time"> This contest has no end time
            </div>
            <div class="group">
                <div class="label">Organization Name</div>
                <input type="text" name="organization">
            </div>
            <button class="body__role-button btn--medium bg-success text-white" id="button">Get Started</button>
        </form>
        <div id="result"></div>
    </div>
</body>
<script>
    $("#button").click(function(){
        console.log($('#create-contest').serialize());
        $.post("test.php",
        $('#create-contest').serialize(),
        function(data, status){
            $("#result").html(data);
        });
    });
</script>
