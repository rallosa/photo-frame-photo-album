
function popup_close() {
	document.getElementById("shadow").classList.remove("show");
	document.getElementById("popup-order").classList.remove("show");

}

function popup_show() {

	document.getElementById("shadow").classList.add("show");
	document.getElementById("popup-order").classList.add("show");

}

function send_order() {
	//alert('send_order');
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "send.php");

	xhr.setRequestHeader("Accept", "application/json");
	xhr.setRequestHeader("Content-Type", "application/json");

	xhr.onload = () => console.log(xhr.success);

	let customer_name = document.getElementById('customer_name').value;
	let customer_phone = document.getElementById('customer_phone').value;
	let product_count = document.getElementById('product_count').value;

	let data = `{
			"customer_name": ` + customer_name + `,
			"customer_phone": ` + customer_phone + `,
			"product_count": ` + product_count + `,
		}`;

	xhr.send(data);
}
