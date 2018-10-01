<?php



include 'includes/connection.php';



$query = sprintf('SELECT `email`,`reg_date`,`reg_time` FROM newsletter');

$result = $Q( $link,$query);



header('Content-Type: text/csv');

header('Content-Disposition: attachment;filename=export.csv');



$row = mysqli_fetch_assoc($result);

if ($row) {

    echocsv(array_keys($row));

}



while ($row) {

    echocsv($row);

    $row = mysqli_fetch_assoc($result);

}



function echocsv($fields)

{

    $separator = '';

    foreach ($fields as $field) {

        if (preg_match('/\\r|\\n|,|"/', $field)) {

            $field = '"' . str_replace('"', '""', $field) . '"';

        }

        echo $separator . $field;

        $separator = ',';

    }

    echo "\r\n";

}

?>