<!DOCTYPE HTML>

<html>


<head>

    <meta charset="utf-8">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>		
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
    <style>
        body{
            font-weight:500;
            background-color:#CCCCB2;
        }
        .btn.btn-secondary{
            background-color:#333333;
            color:#FFFFFF;
            width:300px;
            font-size:14px;
            border:2px solid #155799;
        }
        .container{
            position:absolute;
            right:-780px;
            top:0;
        }
        .btn.btn-secondary:hover{
            background-color:#FFFFFF;
            color:#333333;
            border:3px solid #decba4;
        }
        ul{
            list-style-type: none;
        }
         /* Add a black background color to the top navigation */
        .topnav {
            background-color: #3a6073;
            overflow: hidden;
            color:#FFFFFF;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            display: block;
            color: #FFFFFF;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #434343;
            color:#FFFFFF;
        }

        /* Add an active class to highlight the current page */
        .active {
            background-color: #1d4350;
            color: white;
        }

        /* Hide the link that should open and close the topnav on small screens */
        .topnav .icon {
            display: none;
        } 
        .row{
            right:15px;
        }
        </style>
</head>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    h = checkTime(h);
    m = checkTime(m);
    document.getElementById('txt').innerHTML =
    h + ":" + m;
    var t = setTimeout(startTime, 500);
}
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10 because I'm fancy
        return i;
    }
</script>
<body onload="startTime();hurryUp()">
<div>
    <?php 
        if(isset($message)){
            echo $message;
        }
    ?>
</div>