<?php
require_once("funx.php");
//sessionを開始
session_start();
//sessionを取得
$cart = null;
if (isset($_SESSION["cart"])){
        $cart = $_SESSION["cart"];
}else {
        $cart = [];
}
// リクレストの取得
$id = -1;
if (isset($_REQUEST["id"])){
        $id = $_REQUEST["id"];
}
//商品を取得
$items = createItems();
$item = $items[$id];

//
$cart[] = $item;

//session に再登録
$_SESSION["cart"] = $cart;


?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ccmc-04 - ショップシステム</title>
	<link rel="stylesheet" href="../../assets/css/style.css" />
	<link rel="stylesheet" href="../../assets/css/ccmc-03.css" />
	<link rel="stylesheet" href="../../assets/css/ccmc-04.css" />	
</head>

<body>
	<h1>ショップシステム</h1>
	<p><a href="shop.html">買い物を続ける</a>　<a href="cart.html?mode=clear">カートをクリアする</a></p>
	<table>
		<tr>
			<th>楽器名</th>
			<th>価格</th>
			<th></th>
		</tr>
		<?php for ($i= 0; $i < count($items); $i++ ){ ?>
		<tr>
			<td><?= $items[$i]->getName() ?></td>
			<td><?= $items[$i]->getPrice() ?>円</td>
		</tr>
        <?php }?>
	</table>
</body>

</html>
