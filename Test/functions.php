<?php
    function DrawField($Draw) {
        $AllIds = explode(",", $Draw);
        $countArray = count($AllIds);
        $tempCount=0;


        $COUNT_ROW = 20;
        $COUNT_COL = 20;
        echo "<table id='display' data-row='$COUNT_ROW ' data-col='$COUNT_COL'>";

        for ($i = 0; $i < $COUNT_ROW; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $COUNT_COL; $j++) {
                echo "<td id='pixel_" . $i . "_" . $j . "'>";
                if ($tempCount<$countArray) {
                    if ($AllIds[$tempCount]==($i . "_" . $j)) {
                        $tempCount++;
                        echo "<input class='draw-button' type='button' cordx='$i' cordy='$j' color-data='black'>";
                        echo "<input type='hidden' name='drawValue[]' class='draw-value' value='".$i."_".$j."'>";
                    }
                    else {
                        echo "<input class='draw-button' type='button' cordx='$i' cordy='$j' color-data='white'>";
                        echo "<input type='hidden' name='drawValue[]' class='draw-value'>";
                    }
                }
                else
                {
                    echo "<input class='draw-button' type='button' cordx='$i' cordy='$j' color-data='white'>";
                    echo "<input type='hidden' name='drawValue[]' class='draw-value'>";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    function SaveDraw() {
        if (isset($_POST['drawValue']))
        {
            $drawIds="";
            foreach($_POST['drawValue'] as $drawId) {
                if (!empty($drawId)) {
                    if ($drawIds == '') {
                        $drawIds = $drawId;
                    } else {
                        $drawIds .= "," . $drawId;
                    }
                }
            }
            $result="";
            try
            {
                $host = 'localhost';
                $dbname = 'TestDraw';
                $user = 'root';
                $pass = '';
                $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

                $sql = '
					INSERT INTO AllDraws
						SET
						drawName = :drawName,
						Draw = :drawIds		
				';

                $query = $DBH->prepare($sql);

                $query->bindParam(":drawName", 	$_POST['drawName'], 	PDO::PARAM_STR);
                $query->bindParam(":drawIds", 	$drawIds, 	PDO::PARAM_STR);

                $query->execute();
                $result="Новый рисонок был добавлен";
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }

            return $result;
            //$message=DBAccessLayout::NewCollection($_POST['collectionName'], $cardsIds);
            //$added=true;
        }
    }
    function GetIds($Id) {
        $result="";

        try
        {
            $host = 'localhost';
            $dbname = 'testDraw';
            $user = 'root';
            $pass = '';
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            $sql = '
                SELECT * 
                FROM allDraws
                WHERE
                    Id = :Id
            ';
            $query = $DBH->prepare($sql);
            $query->bindParam(":Id", 	$Id, 	PDO::PARAM_INT);

            $query->execute();
            $result = $query->fetch();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            $result="";
        }

        return $result;
    }
    function FindDraw($drawName) {
        $result="";

        try
        {
            $host = 'localhost';
            $dbname = 'testDraw';
            $user = 'root';
            $pass = '';
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            $sql = '
                SELECT * 
                FROM allDraws
                WHERE
                    drawName = :drawName
            ';
            $query = $DBH->prepare($sql);
            $query->bindParam(":drawName", 	$drawName, 	PDO::PARAM_STR);

            $query->execute();
            $result = $query->fetch();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            $result="";
        }

        return $result;
    }
    function DeleteDraws($Id){
        $result="";
        try
        {
            $host = 'localhost';
            $dbname = 'testDraw';
            $user = 'root';
            $pass = '';
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            $sql = '
					DELETE FROM allDraws
					WHERE Id = :Id
				';

            $query = $DBH->prepare($sql);

            $query->bindParam(":Id", 	$Id, 	PDO::PARAM_INT);

            $query->execute();
        }
        catch(PDOException $e)
        {
            $result = $e->getMessage();
        }
        return $result;
    }
    function DrawAllDraws(){
        try {
            # MySQL через PDO_MYSQL
            //$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            $host = 'localhost';
            $dbname = 'testDraw';
            $user = 'root';
            $pass = '';

            # MySQL через PDO_MYSQL

            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            $sql = '
				SELECT * 
				FROM AllDraws
			';

            $query = $DBH->prepare($sql);

            $query->execute();
            $allDraws = $query->fetchAll();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }

        echo "<table class='allDraws'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>Name</th>";
        echo "<th>Draw</th>";
        echo "<th>Load</th>";
        echo "<th>Select</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($allDraws as $draw)
        {
            echo "<tr>";
            echo "<td>".$draw['Id']."</td>";
            echo "<td>".$draw['drawName']."</td>";
            echo "<td>".$draw['Draw']."</td>";
            echo "<td><a href='load.php?id=".$draw['Id']."'>Load</a></td>";
            echo "<td class='checkBox'><label><input type='checkbox' name='drawid[]' value=".$draw['Id']."></label></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }


    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case "saveDraw":
                if (isset($_POST['drawName'])) {
                    if (!empty($_POST['drawName'])) {
                        $drawFromBase = FindDraw($_POST['drawName']);
                        if (empty($drawFromBase)) {
                            $message = SaveDraw();
                        }
                        else {
                            $message = "<span class='error'>Есть такой в базе</span><br/>";
                        }
                    }
                    else {
                        $message = "<span class='error'>Введите имя рисунка</span><br/>";
                    }
                }
                break;
            case "deleteDraws":
                if (isset($_POST['drawid']))
                {
                    foreach ($_POST['drawid'] as $id)
                    {
                        $message=DeleteDraws($id);
                    }
                }
                else
                {
                    $message="Не выбраны картины";
                }
                break;
        }
    }
?>