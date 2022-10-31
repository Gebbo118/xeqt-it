<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="text/css" rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Min sida</title>
</head>
<body>
<a href="index.html" target="_self" id="Loggaut">Logga ut!</a>
    <div class="patientnamn">
    <h1>Min sida</h1>   
<?php
    $pdo = new PDO('mysql:dbname=c21jesba;host=localhost', 'sqllab', 'Hare#2022');
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );


    if(isset($_POST['Pnr'])){
        $querystring='SELECT Fnamn,Lnamn FROM Patient WHERE Pnr=:Pnr';
        $stmt = $pdo->prepare($querystring);
        $stmt->bindParam(':Pnr', $_POST['Pnr']);
        $stmt->execute();

        foreach($stmt as $key => $patient){
            
            echo "<h2>"."välkommen ".$patient['Fnamn']." ".$patient['Lnamn']."</h2>";

        }
    }
    ?>
    </div> 
    <div class="val">
        <div class="Chatt">
            <form action='chatt.php' method='post'>
            <?php
                echo '<input type="hidden" name="Namn" value="'.$patient['Fnamn'].'">';
            ?>
            <input type="submit" value="Chatt">
            </form>
        </div>
        <div class="Journal">
        <form action='Journal.php' method='post'>
            <?php
                echo '<input type="hidden" name="Namn" value="'.$patient['Fnamn'].'">';
            ?>
            <input type="submit" value="Journal">
            </form>
        </div>
        <div class="Recept">
        <form action='Recept.php' method='post'>
            <?php
                echo '<input type="hidden" name="Namn" value="'.$patient['Fnamn'].'">';
            ?>
            <input type="submit" value="Recept">
            </form>
        </div>
        <div class="Provsvar">
        <form action='Provsvar.php' method='post'>
            <?php
                echo '<input type="hidden" name="Namn" value="'.$patient['Fnamn'].'">';
            ?>
            <input type="submit" value="Provsvar">
            </form>
        </div>
        <div class="Tidsbokning">
        <form action='Tidsbokning.php' method='post'>
            <?php
                echo '<input type="hidden" name="Namn" value="'.$patient['Fnamn'].'">';
            ?>
            <input type="submit" value="Tidsbokning">
            </form>
        </div>
        <div class="Formulär">
        <form action='Formulär.php' method='post'>
            <?php
                echo '<input type="hidden" name="Namn" value="'.$patient['Fnamn'].'">';
            ?>
            <input type="submit" value="Formulär">
            </form>
        </div>
    </div>

</body>
</html>
