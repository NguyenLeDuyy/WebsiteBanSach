function tru() {
    var quantityElement = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityElement.textContent);
    if (currentQuantity > 1) {
        quantityElement.textContent = currentQuantity - 1;
    }
}

function cong() {
    var quantityElement = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityElement.textContent);
    quantityElement.textContent = currentQuantity + 1;
}

document.addEventListener('DOMContentLoaded', function () {
    const largeImage = document.getElementById('largeImage');
    const smallImages = document.querySelectorAll('.small-image');

    smallImages.forEach(image => {
        image.addEventListener('click', function () {
            largeImage.src = this.src;
        });
    });
});

function addToCart(productId) {
    var quantityElement = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityElement.textContent);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '?ctrl=cart&view=addToCart', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert('Sản phẩm đã được thêm vào giỏ hàng!');
        }
    };
    xhr.send('id=' + productId + '&quantity=' + currentQuantity);
}