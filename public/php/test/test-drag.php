<!DOCTYPE HTML>
<html>
<head>

    <!-- Bootstrap / jQuery Imports -->
    <?php
    include '../php_version/php/general/links-general.php';
    ?>

    <link rel="stylesheet" type="text/css" href="test-table-calendar.css">

        <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script>
</head>
<body>

<img id="drag1" src="#" draggable="true" ondragstart="drag(event)" style="width: 50px; height: 20px; background: red;">


<table class="table-calendar">
    <tr>
        <th></th>
        <th></th>
        <th>01.01</th>
        <th>02.01</th>
        <th>03.01</th>
        <th>04.01</th>
        <th>05.01</th>
        <th>06.01</th>
        <th>07.01</th>
    </tr>


    <tr>
        <th>Employees</th>
        <th>Time</th>
        <th>Mo</th>
        <th>Tu</th>
        <th>We</th>
        <th>Th</th>
        <th>Fr</th>
        <th>Sa</th>
        <th>Su</th>
    </tr>

    <tr>
        <td>Tim Bohnert</td>
        <td>start</td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
    </tr>

    <tr>
        <td></td>
        <td>end</td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
        <td ondrop="drop(event)" ondragover="allowDrop(event)"></td>
    </tr>

    <tr>
        <td>Maria Schuster</td>
        <td>start</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>end</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td>Michael Ebert</td>
        <td>start</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>end</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td>Trudi Haller</td>
        <td>start</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>end</td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td>Dario Koller</td>
        <td>start</td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>end</td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td>Hirte Stempel</td>
        <td>start</td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>end</td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td>Marco Speicher</td>
        <td>start</td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>end</td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>


</table>

</body>
</html>

