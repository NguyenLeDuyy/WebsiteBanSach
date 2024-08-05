function tru() {
    var quantityElement = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityElement.textContent);
    if (currentQuantity > 1) {
        quantityElement.textContent = currentQuantity - 1;
    };
};

function cong() {
    var quantityElement = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityElement.textContent);
    quantityElement.textContent = currentQuantity + 1;
};
document.addEventListener('DOMContentLoaded', function() {
    const largeImage = document.getElementById('largeImage');
    const smallImages = document.querySelectorAll('.small-image');

    smallImages.forEach(image => {
        image.addEventListener('click', function() {
            largeImage.src = this.src;
        });
    });
});
