<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Books Information</title>
</head>
<body>

<div id="books">
    <table border="1" style="width: 100%;">
        
        <?php
        $xml = simplexml_load_file("book.xml") or die("Error: Cannot create object");
        $count = 1;
	echo "<tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Price</th>
        </tr>";
        foreach ($xml->children() as $book) {
            echo "<tr>";
            echo "<td>$count </td>";
            echo "<td>$book->title </td>";
            echo "<td>$book->author </td>";
            echo "<td>" . $book->year . "</td>";
            echo "<td>" . $book->price . "</td>";
            echo "</tr>"; 
            $count++;
        }
        ?>
    </table>
</div>

</body>
</html>