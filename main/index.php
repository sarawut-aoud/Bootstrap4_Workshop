<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>

    <style>
        #example_length {
            float: left;
        }
    </style>
</head>
<body>

<table border="1" align="center"  style="width: 100%; height: 150px">
    <tbody>
    <tr>
        <td align="center">
            <div style="width: 80%; text-align: right; margin-top: 10px;">
                <a  href="frm_add_location.php" >
                     Add Location
                </a>
                <?php
                if(isset($_SESSION['alert_message'])) {
                    $msg = $_SESSION['alert_message'];
                    echo "<h1>$msg</h1>";
                    unset($_SESSION['alert_message']);
                }
                ?>
            </div>
            <!--            Inner Table-->
            <div align="center" style="width: 80%">
                <table border="1" width="100%" style="margin-top: 10px; margin-bottom: 10px">
                    <thead>
                    <tr bgcolor="#fbff16">
                        <th width="15%">Image</th>
                        <th width="30%">Name</th>
                        <th width="15%">Province</th>
                        <th width="15%">Rating</th>
                        <th width="25%">Manage</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    include "conn.php";

                    $sql = "select t.id, t.name as location_name,t.rating, p.name as province_name, t.url from travel_location as t left join provinces p on p.id = t.province_id;";
                    $result = mysql_query( $sql,$link);

                    while ($row = mysql_fetch_object($result)) {

                        ?>

                        <tr>
                            <td align="center">
                                <img src="<?php echo $row->url?>" alt="" height="60px" width="120px">
                            </td>
                            <td><?php echo $row->location_name;?></td>
                            <td><?php echo $row->province_name;?></td>
                            <td align="center">
                                <?php
                                $rating = intval($row->rating);
                                echo str_repeat('⭐', $rating);
                                ?>
                            </td>
                            <td align="center">
                                <a  href="#">
                                     Edit
                                </a>
                                <br>
                                <a  href="delete_location.php?id=<?php echo $row->id;?>">
                                     Delete
                                </a>
                            </td>
                        </tr>


                        <?php
                    }
                    ?>
                    </tbody>





                </table>
            </div>

            <!--            Inner Table-->
        </td>
    </tr>
    <tr>
        <td align="center">
            <h3> Awesome Footer </h3>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>

<?php
mysql_close($link);
