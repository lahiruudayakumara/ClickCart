var addToCartLink = document.getElementById("addToCartLink");
addToCartLink.addEventListener("click", function(event) {
  event.preventDefault();

  var quantityInput = document.getElementById("quantityInput");
  var quantity = quantityInput.value;

  var pId = addToCartLink.getAttribute("data-pid");
  var price = addToCartLink.getAttribute("data-price");

  var link = "add_item_to_cart.php?pId=" + pId + "&quantity=" + quantity + "&price=" + price;
  addToCartLink.href = link;

  window.location.href = link;
});
