<?php

echo "<table border='2'>
        <tr>
            <td>Name:</td>
            <td>Username:</td>
            <td>Gender:</td>
            <td>Address:</td>
            <td>City:</td>
            <td>skills:</td>
            <td>Delete</td>
            <td>Edit</td>
        </tr>";

$data= file("form.txt");
foreach ($data as $line) {
    $info = explode(":", $line);
    echo "<tr>";
    foreach ($info as $key => $value) {
        echo "<td>".$value."</td>";
    }
    echo '<td><a href="delete.php?'.$line.'"'.'>Delete</a></td>';
    echo '<td><a href="Edit.php?info='.$line.'"'.'>Edit</a></td>';
    echo "</tr>";
}
echo "</table>";