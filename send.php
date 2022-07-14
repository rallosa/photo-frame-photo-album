<?
// $name = $_POST['name'];
// $email = $_POST['email'];
// $file = fopen("send.txt","at");
// fwrite($file,"\n $name:$email \n");
// fclose($file);
// mail("hello@hollider.com", "Заказ", "\n $name:$email \n"); 

$json = ["success" => "true"];


$customer_name = trim($_POST['customer_name']);
$customer_phone = trim($_POST['customer_phone']);
$customer_message = trim($_POST['customer_message']);
$product_name = trim($_POST['product_name']);
$product_count = trim($_POST['product_count']);
$product_price = trim($_POST['product_price']);
$all_price = trim($_POST['all_price']);



$mail_subject = "Замовлення фоторамок (".date('d.m.Y H:i').")";


$order_email = "sale@http://photo-frame-photo-album.smart-building.in.ua"; // Звідки
$store_email = "rallo83@gmail.com"; // Куди

//$fast_order_email = "sale@inox-trade.com.ua";


$subject = '=?UTF-8?B?'.base64_encode($mail_subject).'?=';
$headers = "From: <".$order_email.">\r\n";
$headers = $headers."Return-path: <".$order_email.">\r\n";
$headers = $headers."Content-type: text/plain; charset=\"UTF-8\"\r";

if (!mail($store_email, $subject,
	  "Дата замовлення: ".date('d.m.Y H:i')
	. "\nЗамовник: " . $customer_name 
	. "\nТелефон: " . $customer_phone
	. "\nКомментарий: " . $customer_message
	. "\n\nТовар: " . $product_name
	. "\nЦіна за одиницю: " . $product_price
	. "\nЗагальна ціна: " . $all_price
	, $headers) ) {
		$json['success'] = false;
		$json['messages-error'][] = 'The email was not sent!';
}
echo json_encode($json);

