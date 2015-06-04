<?php
include_once("db.php");

if(isset($_POST['submit'])){
    if(empty($_POST['org_name'])){
        echo "Введите название организации";
    }
    elseif(empty($_POST['inn'])){
        echo "Введите ИНН";
    }
    elseif(empty($_POST['ogrn'])){
        echo"Введите ОГРН";
    }
    elseif(empty($_POST['ur_address'])){
        echo"Введите юридический адрес";
    }
    elseif(empty($_POST['address'])){
        echo"Введите физический адрес";

    }
    elseif(empty($_POST['telephone'])){
        echo "Введите номер телефона";
    }
    elseif(empty($_POST['d_name'])){
        echo "Введите ФИО";
    }
    elseif(empty($_POST['date'])){
        echo"Введите дату";
    }
    elseif(empty($_POST['fio'])) {
        echo "Введите ФИО";
    }
    elseif(empty($_POST['obj'])){
        echo"Выберите суть обращения";
    }
    elseif(empty($_POST['sl'])){
        echo "Выберите решение";
    }
else{
    $org_name = $_POST['org_name'];
    $inn = $_POST['inn'];
    $ogrn = $_POST['ogrn'];
    $ur_address = $_POST['ur_address'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];
    $d_name = $_POST['d_name'];
    $c_date = $_POST['date'];
    $fio = $_POST['fio'];
    $object = $_POST['obj'];
    $org_name = $_POST['org_name'];
    $text = $_POST['text'];
    $solution = $_POST['sl'];

    $query = mysql_query("SELECT * FROM organizations WHERE organization_name='$org_name'");
    $n = mysql_num_rows($query);

    if($n<1) {
        mysql_query("INSERT INTO organizations (organization_name, inn, ogrn, ur_address, address, telephone, d_name)
                    VALUES ('$org_name', '$inn', '$ogrn', '$ur_address', '$address', '$telephone', '$d_name')");

        $query2 = mysql_query("SELECT * FROM organizations WHERE organization_name='$org_name'");
        $mas = mysql_fetch_array($query2);
        $org_id = $mas['id'];
    }
    else {
        $query2 = mysql_query("SELECT * FROM organizations WHERE organization_name='$org_name'");
        $mas = mysql_fetch_array($query2);
        $org_id = $mas['id'];
    }

    $query3 = mysql_query("SELECT * FROM objects WHERE name = '$object'");
    $mas2 = mysql_fetch_array($query3);
    $obj_id = $mas2['id'];

    mysql_query("INSERT INTO complaint (c_date, fio, object, org_name, text, solution)
                VALUES('$c_date', '$fio', '$obj_id', '$org_id', '$text', '$solution') ")or die(mysql_error());

        echo "Жалоба занесена!";
    }
}

?>