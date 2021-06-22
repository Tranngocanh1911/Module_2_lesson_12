<?php
include_once 'DataProduct.php';
include_once 'product.php';
$result = DataProduct::loadData();
if(isset($_REQUEST['page'])){
    if ($_REQUEST['page'] == 'delete'){
        $id = $_REQUEST['id'];
        array_splice($result,$id,1);
        DataProduct::saveData($result);
        header("location:index.php");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="add-product.php">Add</a>
<a href="sort-product.php">Sort</a>
<table border="1px">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
    </tr>
    <?php
    foreach ($result as $key => $product):
    ?>
    <tr>
        <td><?php echo $product->getId() ?></td>
        <td><?php echo $product->getName() ?></td>
        <td><?php echo $product->getPrice() ?></td>
        <td><a href="edit-product.php?id=<?php echo $product->getId() ?>">Edit</a> </td>
        <td><a href="index.php?page=delete&id=<?php echo $key ?>">Delete</a></td>
    </tr>
    <?php
    endforeach;
    ?>
</table>
</body>
</html>
