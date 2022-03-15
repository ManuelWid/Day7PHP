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
    <h2>Welcome</h2>
    <form action="day7-ex.php" method= "POST">
        First Name: <input type="text"  name="name" />
        Surname: <input type= "text" name="surname" />
       <input  type="submit" name="submit" value="Submit"/>
    </form>
    <?php
        if(isset($_POST[ 'submit'])){
            if($_POST["name"] && $_POST["surname"]){
                echo "Welcome {$_POST['name']} {$_POST['surname']}!";
            }
            elseif(empty($_POST["name"])){
                echo "Please enter a name.";
            }
            elseif(empty($_POST["surname"])){
                echo "Please enter a surname.";
            }
        }
       ?>

    <!-- ==================== exercise two ==================== -->
    <h2>Division</h2>
    <form action="day7-ex.php" method= "POST">
        Number1: <input type="number"  name="num1" />
        Number2: <input type= "number" name="num2" />
        <input  type="submit" name="divide" value="Divide"/>
    </form>
    
    <?php
        function div_num($num1, $num2){
            $result = $num1 / $num2;
            return $result;
        }
        if(isset($_POST["divide"])){
            if($_POST["num1"] && $_POST["num2"]){
                echo div_num($_POST["num1"], $_POST["num2"]);
            }
            else{
                echo "Please enter 2 numbers.";
            }
        }
    ?>

    <!-- ==================== exercise three ==================== -->
    <h2>Grades</h2>
    <form action="day7-ex.php" method= "POST">
        Math: <input type="number"  name="grade1" />
        Physics: <input type= "number" name="grade2" />
        English: <input type= "number" name="grade3" />
        <input  type="submit" name="grade" value="Calc."/>
    </form>
    
    <?php
        function grades($g1, $g2, $g3){
            $sum = $g1 + $g2 + $g3;
            $avg = ($g1 + $g2 + $g3) / 3;
            echo "The sum of your grades is: {$sum}.<br/>";
            echo "The average is: {$avg}.";
        }
        if(isset($_POST["grade"])){
            if($_POST["grade1"] && $_POST["grade2"] && $_POST["grade3"]){
                grades($_POST["grade1"], $_POST["grade2"], $_POST["grade3"]);
            }
            else{
                echo "Please enter all your grades.";
            }
        }
    ?>

    <!-- ==================== exercise four ==================== -->
    <h2>Box</h2>
    <form action="day7-ex.php" method= "POST">
        Width: <input type="number"  name="dim1" />
        Height: <input type= "number" name="dim2" />
        Depth: <input type= "number" name="dim3" value="0"/>
        <input  type="submit" name="calculate" value="Calc."/>
    </form>
    
    <?php
        function box_dim($d1, $d2, $d3 = 0){
            $area = $d1 * $d2;
            $volume = $d1 * $d2 * $d3;
            return [$area, $volume];
        }
        if(isset($_POST["calculate"])){
            if($_POST["dim1"] && $_POST["dim2"]){
                echo "The area of the box is: ".box_dim($_POST["dim1"], $_POST["dim2"], $_POST["dim3"])[0]." m² <br />";
                echo "The volume of the box is: ".box_dim($_POST["dim1"], $_POST["dim2"], $_POST["dim3"])[1]." m³";
            }
            else{
                echo "Please enter all dimensions.";
            }
        }
    ?>

    <!-- ==================== exercise five ==================== -->
    <h2>How many hours?</h2>
    <form action="day7-ex.php" method= "POST">
        Minutes: <input type="number"  name="mins" />
        <input  type="submit" name="calculate1" value="Calc." />
    </form>
    
    <?php
        function mintoh($m1){
            if($m1 > 59){
                $hours = floor($m1 / 60);
                $mins = $m1 % 60;
                return [$hours,$mins];
            }
            else{
                $mins = $m1;
                return [0, $mins];
            }
        }
        if(isset($_POST["calculate1"])){
            if($_POST["mins"]){
                echo mintoh($_POST["mins"])[0]." hours and ".mintoh($_POST["mins"])[1]." minutes.";
            }
            else{
                echo "Please enter a number.";
            }
        }
    ?>

    <!-- ==================== exercise six ==================== -->
    <h2>Form</h2>
    <form action="day7-ex.php" method= "POST">
        First name: <input type="text"  name="fname" />
        Last name: <input type="text"  name="lname" />
        Age: <input type="number"  name="age" />
        <input  type="submit" name="submit1" value="Submit"/>
    </form>
    <form action="day7-ex.php" method= "GET">
        Hobbies: <input type="text"  name="hobbies" />
        <input  type="submit" name="submit1" value="Submit"/>
    </form>

    <?php
        if(isset($_POST["submit1"])){
            if($_POST["fname"] && $_POST["lname"] && $_POST["age"]){
                if(strlen($_POST["fname"]) > 5){
                    echo "<div style='color:green'><p>{$_POST['fname']}</p></div>";
                }
                else{
                    echo "<div style='color:red'><p>{$_POST['fname']}</p></div>";
                }
                echo "<div><p>{$_POST['lname']}</p></div>";
                echo "<div><p>{$_POST['age']}</p></div>";
            }
        }
        if(isset($_GET["submit1"])){
            if($_GET["hobbies"]){
                $hobbieparts = explode(",", $_GET["hobbies"]);
                foreach($hobbieparts as $key => $val){
                    echo $hobbieparts[$key]."<br/>";
                }
            }
        }
    ?>
</body>
</html>