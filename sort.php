<?php
require_once ('db.php');

$work = new Worker();
if(isset($_POST["mesage"])) {
    $text = $_POST["mesage"];

    echo $work->printTable($work->getFio($text));
}

if(isset($_POST["mesage2"])) {
    $text = $_POST["mesage2"];

    echo $work->printTable($work->getOrganization($text));
}

if(isset($_POST["mesage3"])) {
    $text = $_POST["mesage3"];

    echo $work->printTable($work->getObject($text));
}

if(isset($_POST["mesage4"])) {
    $text = $_POST["mesage4"];

    echo $work->printTable($work->getSlection($text));
}

if(isset($_POST["mesage5"])) {
    $text = $_POST["mesage5"];

    echo $work->printTable($work->getDate($text));
}

class Worker{

    public function getFio($mesage)
    {
        if ($mesage != null) {
            $query = mysql_query("SELECT * FROM complaint WHERE fio LIKE '%" . $mesage . "%'") or die (mysql_error());

            return $query;
        }
    }

    public function getOrganization ($mesage){
        if ($mesage != null) {
       $query = mysql_query("SELECT * FROM complaint, organizations WHERE
          complaint.org_name = organizations.id AND organizations.organization_name LIKE '%" . $mesage . "%' ") or die (mysql_error());

        return  $query;
    }
    }

    public function getObject($mesage)
    {
        if ($mesage != null) {
            $query = mysql_query("SELECT * FROM complaint WHERE object = " . $mesage . " ") or die (mysql_error());

            return $query;
        }
    }

    public function getSlection($mesage)
    {
        if ($mesage != null) {
            $query = mysql_query("SELECT * FROM complaint WHERE solution LIKE '%" . $mesage . "%' ") or die (mysql_error());

            return $query;
        }
    }

    public function getDate($mesage)
    {
        if ($mesage != null) {
            $query = mysql_query("SELECT * FROM complaint WHERE c_date= '$mesage'") or die (mysql_error());

            return $query;
        }
    }

    public function printTable($query){

        echo "<table align=center border=2>
<tr>
<th>№</th>
<th>Дата</th>
<th>ФИО</th>
<th>Причина</th>
<th>Организация </th>
<th>Общая информация</th>
<th>Решение
</th>
</tr>";

        $result2 = mysql_query("SELECT * FROM  objects");
        $result3 = mysql_query("SELECT * FROM  organizations");

        if ($query == false) {

            echo "<p align = 'center'В базе нет данных!>";
        }

        else {
            $count = 1;
            while ($sql = mysql_fetch_array($query)) {
                echo "<tr>";
                echo "<td>";
                echo $count;
                echo "</td>";
                echo "<td>" . $sql['c_date'] . "</td>";
                echo "<td>" . $sql['fio'] . "</td>";
                echo "<td>";
                while ($sql2 = mysql_fetch_array($result2)) {
                    if ($sql['object'] == $sql2['id']) {
                        echo $sql2['name'];
                        break;
                    }
                }
                echo "</td>";
                echo "<td>";
                while ($sql3 = mysql_fetch_array($result3)) {
                    if ($sql['org_name'] == $sql3['id']) {
                        echo $sql3['organization_name'];
                        break;
                    }
                }
                echo "</td>";
                echo "<td>" . $sql['text'] . "</td>";
                echo "<td>" . $sql['solution'] . "</td>";
                echo "</tr>";
                $count++;
            }
        }

    }

}

?>
