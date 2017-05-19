<?php
include_once './bd/DB.php';

$sql = 'select * from Clientes';
$stmt = DB::prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt->execute();
?>

<?php
while ($r = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    ?>
    <tr id="linha<?php echo $r[0] ?>" > 
        <th scope="row"><?php echo $r[0]; ?></th> 
        <td><?php echo $r[1] ?></td>
        <td><?php echo $r[2] ?></td>
        <td><?php echo $r[3] ?></td>
        <td><?php echo $r[4] ?></td>

        <td><input type="button" onClick="apagarCliente(<?php echo $r[0] ?>)" > </td>
        <td><a href="index.php?id=<?php echo $r[0] ?>" > Editar</a></td>
    </tr> 
<?php } ?>

