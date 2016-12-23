<!-- 2012036901 윤진한 -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>lab9_PHP</title>
    </head>
    <body>
        <form action="lab9_PHP.php" method="post">
            DB Name :
            <div>
                <input type="text" name="dbname" size="24" />
            </div>
            <br>
            SQL QUERY :
            <div>
                <textarea name="sql" rows="8" cols="40"></textarea>
            </div>
            <div>
                <input type="submit" value="SUBMIT" />
            </div>
        </form>
        <br>

        <?php
        if (!isset($_POST["dbname"],$_POST["sql"])){
        ?>
        <h1>Sorry</h1>
        <p>You didn't fill out the form completely. <a href="lab9_PHP.php">Try again?</p>
        <?php
        } elseif (empty($_POST["dbname"]) || empty($_POST["sql"])){
        ?>
        <h1>Sorry</h1>
        <p>You didn't fill out the form completely. <a href="lab9_PHP.php">Try again?</p>
        <?php
        }
        else {
            try {
                $dbname = $_POST["dbname"];
                $db = new PDO("mysql:dbname=$dbname", "root", "0000");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "DB Connection Success.<br><br>";
                $cnt = 0;
                $sql = $_POST["sql"];
                echo "< Query Statement > : $sql<br>";
                echo "=============================================================================================<br>";
                $rows = $db->query($sql);
                foreach ($rows as $row) {
                    ?>
                    <li>
                        <?php
                        for ($i = 0;$i < count($row); $i++){
                            print "$row[$i]&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                        ?>
                    </li>
                    <?php
                    $cnt ++;
                }
                echo "$cnt rows in set<br>";
                echo "=============================================================================================<br>";
            } catch (PDOException $ex){
                if (!$db){
                    echo "DB Connetion Fail.<br><br>";
                }
                ?>
                <p>Sorry, a database error occurred. Please try again later.</p>
                <p>(Error details: <?= $ex->getMessage() ?> )</p>
                <?php
                echo "=============================================================================================<br>";
            }
        }
        ?>
    </body>
</html>
