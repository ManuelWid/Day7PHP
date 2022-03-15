<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- ==================== exercise one ==================== -->
    <h2>°F to °C</h2>
    <form action="day7-adv.php" method= "POST">
        °Fahrenheit: <input type="number"  name="fahr" />
       <input  type="submit" name="submit" value="Calc."/>
    </form>
    <form action="day7-adv.php" method= "POST">
        °Celsius: <input type="number"  name="cels" />
       <input  type="submit" name="submit1" value="Calc."/>
    </form>
    <?php
        function ftoc($fahr){
            $cel = ($fahr - 32) * (5/9);
            return $cel;
        }
        function ctof($cel){
            $fahr = ($cel * 9/5) + 32;
            return $fahr;
        }
        if(isset($_POST["submit"])){
            if($_POST["fahr"]){
                $val = number_format(ftoc($_POST["fahr"]),2);
                echo "{$_POST['fahr']}°F are {$val}°C <br />";
                if($val < 6){echo "<img src='cold1.jpeg' width='1000px'>";}
                elseif($val < 11){echo "<img src='cold2.jpg' width='1000px'>";}
                elseif($val < 16){echo "<img src='autumn.jpg' width='1000px'>";}
                elseif($val < 25){echo "<img src='spring.webp' width='1000px'>";}
                else{echo "<img src='toohot.jpg' width='1000px'>";}
            }
            else{
                echo "Please enter a number.";
            }
        }

        if(isset($_POST["submit1"])){
            if($_POST["cels"]){
                $val = number_format(ctof($_POST["cels"]),2);
                echo "{$_POST['cels']}°C are {$val}°F <br />";
                if($val < 42){echo "<img src='cold1.jpeg' width='1000px'>";}
                elseif($val < 53){echo "<img src='cold2.jpg' width='1000px'>";}
                elseif($val < 62){echo "<img src='autumn.jpg' width='1000px'>";}
                elseif($val < 78){echo "<img src='spring.webp' width='1000px'>";}
                else{echo "<img src='toohot.jpg' width='1000px'>";}
            }
            else{
                echo "Please enter a number.";
            }
        }

    ?>
</body>
</html>