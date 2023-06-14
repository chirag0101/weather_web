<?php
    if(array_key_exists("submit",$_GET)){
        $city=$_GET["txt"];
        if($_GET["txt"]){
        $op= file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=7e66d0d878cf9668ac9bfc74d8cff95b");
        $weatherArray=json_decode($op,true);
        $celcius=$weatherArray['main']['temp']-273.15;
        $weather="<b>".$weatherArray['name'].": ";
        $weather.=$celcius."&deg;C";
        $weather.="<b><br> Weather Condition:</b> ".$weatherArray['weather']['0']['description'];
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <style>

        body{
            margin: 0;
            padding: 250px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-family: 'Courier New', Courier, monospace;
        }

        .page input{
            font-size: 20px;
            border-radius: 9px;
            height: 30px;
            width: 250px;
            font-family: 'Courier New', Courier, monospace;
        }

        #btn{
            background-image: linear-gradient(to bottom right, green, yellow);
            width: 100px;
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
        }

        #btn:hover{
            background-image: linear-gradient(to bottom right, yellow, green);
        }
        
    </style>

</head>

<body background="w.jpg">

    <form method="GET">
        <div class="page">
            <b>What's The Weather?</b>
            <p>Enter the name of the city.</p>
            <p><input type="text" name="txt" placeholder="ex:Mumbai" required></p>
            <p><input type="submit" name="submit" id="btn"></p>
            <p>
                <?php
                    if($weather){
                        echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
                    }else{
                        echo '<div class="alert alert-danger" role="alert">'.$weather.'</div>';
                    }
                ?>
            </p>
        </div>
    </form>

</body>
</html>