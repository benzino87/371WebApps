<html>
    <?php
    if(!isset($_GET['number'])){
        $_GET['number'] = 150;
        $_GET['columns'] = 10;
    // header("Location: addprimes.php?number=150&columns=15");
    }
    ?>
    
    <link rel="stylesheet" href="primes.css" type="text/css" />
    
    <body>
        <?php
        function is_prime($n){
            for($i = 2; $i *$i <= $n; $i++){
                if($n % $i == 0){
                    return false;
                }
            }
            return true;
        }
        ?>
        <h1>Add The Primes</h1>
        <h4>Select the primes you want to add</h4>
        
        <form method="POST" action="addprimes.php">
            <table>
            <?php
            $col = $_GET['columns'];
            $n = $_GET['number'];
            
            $count = 0;
            
            echo "<tr>";
            
                for($i = 2; $i <= $n; $i++){
                    if(is_prime($i)){
                        if($count < $col){
                        echo "<td>";
                        echo "<input type=\"checkbox\" name=\"name$i\" value=\"$i\"/>$i";
                        echo "</td>";
                        
                        
                        
                        //end table row
                        $count++;
                        }else{
                        $count = 0;
                        echo "</tr>";
                        echo "<tr>";
                        }
                    }
                }
            ?>
            </table>
            <input type="submit" name="submit"/>
        </form>
        
        <?php
        
        if(isset($_POST['submit'])){
            for($i = 0; $i <= $_GET['number']; $i++){
                if(isset($_POST["name$i"])){
                    $total += $_POST["name$i"];
                }
            }
            echo "The sum is:  $total";
        }
        ?>
    </body>
</html>