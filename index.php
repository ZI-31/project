<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<form action="form.php" method="POST">
<style type="text/css">
    t1
    {
        font-family: 'Times New Roman', Times, serif;
        font-size: 150%;
    }
</style>
<body>
<a href="serch.php">Поиск</a>
<table align="center" border="1">
    <tr>
        <td>
            <t1 align="center">Данные организации</t1>
            <p>Организация<input type="text" size="20" name="org_name"></p>
            <p>ИНН\ОГРН<input type="text" size="10" name="inn">/<input type="text" size="10" name="ogrn"></p>
            <p>Юридический адрес<input text="text" size="20" name="ur_address"></p>
            <p>Адрес<input text="text" size="20" name="address"></p>
            <p>Телефон<input text="text" size="20" name="telephone"></p>
            <p>ФИО Руководителя<input text="text" size="20" name="d_name"></p>
        </td>
    </tr>
    <tr>
        <td>
        <t1 algin="center">Форма жалобы</t1>
            <table>
                <tr>
                    <td>Дата:</td>
                    <td><input type="date" size="10" name="date"></td>
                    </tr>
                <tr>
                    <td>Фио заявителя:</td>
                    <td><input text="text" size="20" name="fio"></td>
                    </tr>
                <tr>
                    <td>Тема обращения:</td>
                    <td>
                        <?php
                        include_once("db.php");
                        $query = mysql_query("SELECT * FROM objects ");
                        echo "<select name='obj'>";
                        echo "<option></option>";
                        while($mas = mysql_fetch_array($query)){
                        echo "<option>".$mas['name']."</option>";
                        }
                        ?>
                    </td>
                    </tr>
                <tr>
                    <td colspan="2" align="center">
                        Суть обращения:<p><textarea rows="10" cols="45" name="text"></textarea></p>
                        </td>
                    <td></td>
                    </tr>
                <tr>
                    <td align="center">
                        Принятые мер:
                    </td>
                    <td>    <select name="sl">
                                <option></option>
                                <option>Даны разъеснения</option>
                                <option>Принято заявление</option>
                            </select>
                        </td>
                </tr>

                </table>
</td>
    </tr>
    <tr>
        <td align="center">
            <input type="submit" name="submit" value="Сохранить заявление">
        </td>
    </tr>
</table>
</body>
</form>
</html>