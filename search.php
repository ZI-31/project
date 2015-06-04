<html>
<body>
<form action="sort.php"method="post">

    <table align="center" border="1">
        <tr><td>Сортировать по:</td>
            <td>
                Дата<input type='date' id='date' onchange="serch_date()">
            </td>
            <td>
                ФИО<input type='text' id='text' onkeyup='serch_fio()'>

            </td>
            <td>
                Организация<input type='text' id='text2' onkeyup='serch_organization()'>
            </td>
            <td>
                Причина<select id='obj' onchange='serch_object()'>
                <?php
                require_once ('db.php');
                $query = mysql_query('SELECT * FROM objects ');
                    echo "<option></option>";
                    while ($mas = mysql_fetch_array($query)) {
                    echo "<option value=' ". $mas['id']." '> ".$mas['name']." </option>";
                    }
                ?>
                </td>
            <td>
                Решение <select id='sl' onchange="serch_solution()">
                    <option></option>
                    <option value="Даны разъеснения">Даны разъеснения</option>
                    <option value="Принято заявление">Принято заявление</option>
                </select>
            </td>
        </tr>
    </table>
    <div id='div'></div>

    <script>
        function serch_organization()
        {
            var mesage2 = 'mesage2=' + document.getElementById('text2').value;


            var REQ = new XMLHttpRequest();
            REQ.onreadystatechange = function()
            {
                if(REQ.readyState==4)
                {

                    document.getElementById('div').innerHTML = REQ.responseText;
                }
            }
            REQ.open('POST','sort2.php', true);

            REQ.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            REQ.setRequestHeader('Content-Length', mesage2.length);


            REQ.send(mesage2);
        }
        function serch_fio()
        {
            var mesage = 'mesage=' + document.getElementById('text').value;


            var REQ = new XMLHttpRequest();
            REQ.onreadystatechange = function()
            {
                if(REQ.readyState==4)
                {

                    document.getElementById('div').innerHTML = REQ.responseText;
                }
            }
            REQ.open('POST','sort2.php', true);

            REQ.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            REQ.setRequestHeader('Content-Length', mesage.length);




            REQ.send(mesage);
        }
        function serch_object()
        {


           var mesage3 = 'mesage3=' + document.getElementById('obj').value;


           var REQ = new XMLHttpRequest();
           REQ.onreadystatechange = function()
           {
               if(REQ.readyState==4)
               {

                  document.getElementById('div').innerHTML = REQ.responseText;
               }
           }
           REQ.open('POST','sort2.php', true);

           REQ.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           REQ.setRequestHeader('Content-Length', mesage3.length);


           REQ.send(mesage3);
         }
        function serch_solution()
        {


            var mesage4 = 'mesage4=' + document.getElementById('sl').value;


            var REQ = new XMLHttpRequest();
            REQ.onreadystatechange = function()
            {
                if(REQ.readyState==4)
                {

                    document.getElementById('div').innerHTML = REQ.responseText;
                }
            }
            REQ.open('POST','sort2.php', true);

            REQ.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            REQ.setRequestHeader('Content-Length', mesage4.length);


            REQ.send(mesage4);
        }
        function serch_date()
        {


            var mesage5 = 'mesage5=' + document.getElementById('date').value;


            var REQ = new XMLHttpRequest();
            REQ.onreadystatechange = function()
            {
                if(REQ.readyState==4)
                {

                    document.getElementById('div').innerHTML = REQ.responseText;
                }
            }
            REQ.open('POST','sort2.php', true);

            REQ.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            REQ.setRequestHeader('Content-Length', mesage5.length);


            REQ.send(mesage5);
        }
    </script>

</body>
</html>
