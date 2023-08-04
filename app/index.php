<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php App</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .hero{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: row;
        }
        .left{
            width: 50%;
            height: 100vh;
            background-color: black;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .myText{
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        h1{
            font-size: 100px;
            color: white;

        }
        h2{
            font-size: 30px;
            letter-spacing: 25px;
            text-transform: uppercase;
            font-weight: lighter;
            color: white;

        }
        .right{
            width: 50%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .box{
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 80%;
            /* background-color: black; */
        }
    </style>
</head>
<body>
   
    <!-- <nav class="navbar navbar-light bg-light d-flex justify-content-center ">
        <form class="form-inline ">
            <button class="btn btn-success" type="button"><a class="text-light" href="views\index_view.php">Join Now</a></button>
            
            <button class="btn btn-secondary" type="button"><a class="text-light" href="views\display_record.php">View Records</a></button>
        </form>
    </nav> -->
    <div class="hero">
        <div class="left">
            <div class="myText">
                <h1>Web-Hive</h1>
                <h2>Technologies</h1>
            </div>
        </div>

        <div class="right">
            <div class="box">
            <button class="btn btn-primary" type="button"><a class="text-light" href="views\index_view.php">Join Now</a></button>
            
            <button class="btn btn-dark" type="button"><a class="text-light" href="views\display_record.php">View Records</a></button>
                

            </div>
        </div>
    </div>   
</body>
</html>