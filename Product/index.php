<?php
include_once 'DataProduct.php';
include_once 'product.php';
$result = DataProduct::loadData();
if (isset($_REQUEST['sort'])){
    if ($_REQUEST['sort'] == 'up'){
        $result = DataProduct::sortProduct('up');
    } else {
        $result = DataProduct::sortProduct('down');
    }
}
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
    <style>
        #product {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #product td, #product th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #product tr:nth-child(even){background-color: #f2f2f2;}

        #product tr:hover {background-color: #ddd;}

        #product th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1 {
            color: #CD214F;
            background-color: white;
            border: 2px solid #4CAF50;
            text-decoration: none;
        }

        .button1:hover {
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
        }

        .button2 {
            background-color: white;
            color: black;
            border: 2px solid #008CBA;
            text-decoration: none;
        }

        .button2:hover {
            background-color: #008CBA;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
<a href="add-product.php">Add</a>
<a href="index.php?sort=up">Up</a>
<a href="index.php?sort=down">Down</a>
<table id="product">
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
        <td><button class="button button1"><a href="edit-product.php?id=<?php echo $product->getId() ?>">Edit</a></button> </td>
        <td><button class="button button2" ><a href="index.php?page=delete&id=<?php echo $key ?>">Delete</a></button></td>
    </tr>
    <?php
    endforeach;
    ?>
</table>
</body>
</html>
