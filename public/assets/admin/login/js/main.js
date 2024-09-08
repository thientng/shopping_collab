// Xử lí loading trang
window.addEventListener('load', function() {
  const loaderWrapper = document.getElementById('scene');
  loaderWrapper.style.opacity = 0; // Đặt mức độ mờ là 0

  setTimeout(function() {
    loaderWrapper.style.display = 'none';
  }, 1500); // Thời gian 0.5 giây để hoàn thành hiệu ứng mờ dần
});


// Xử lí add list
function actHeart(event) {
  var target = event.currentTarget;
  var productId = target.getAttribute('data-id');

  var lastHeart = event.currentTarget.querySelector(".add-to-cart-button > a i:last-child");
  var firstHeart = event.currentTarget.querySelector(".add-to-cart-button > a i:first-child");

  lastHeart.classList.toggle('d-block');
  firstHeart.classList.toggle('d-none');

  

  if(productId != null) {
    var currentURL = window.location.href;
    console.log(currentURL);
    var startingString = "/Lux_House/";
    var remainingString = currentURL.substring(currentURL.indexOf(startingString) + startingString.length);


    if(lastHeart.classList.contains('d-block')){
      window.location.href = "/Lux_House/Cart/addCart/" + productId + "/" + remainingString;
    }else{
      window.location.href = "/Lux_House/Cart/deleteCart/" + productId + "/" + remainingString;
    }
  }

}

var productCards = document.querySelectorAll(".product-card");
productCards.forEach(function(productCard) {
  var addToCartButton = productCard.querySelector(".add-to-cart-button");
  if(addToCartButton != null){
    addToCartButton.addEventListener("click", actHeart);
  }
})


// Lấy đối tượng biểu tượng load trang
// const loader = document.getElementById('scene');

 // Tạm dừng hiển thị biểu tượng load trang sau 1.5 giây
// setTimeout(() => {
//   loader.style.display = 'none'; // Ẩn biểu tượng load trang
// }, 2000);









