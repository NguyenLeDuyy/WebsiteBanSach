window.onload = function () {
    const liArray = featuredProducts.map(sp => {
        const li = document.createElement('li');
        li.className = 'wrapper-slide';
        li.innerHTML = `
            <div class="product__item">
                <div class="product__item-top">
                    <a href="?ctrl=product&view=detail&id=${sp.id}" class="product__item-top--thumb">
                        <img src="public/img/Sach/${sp.cover_image}" alt="${sp.title}">
                    </a>
                    <a href="?ctrl=product&view=detail&id=${sp.id}" class="buy">Mua ngay</a>
                </div>
                <div class="product__info">
                    <a href="?ctrl=product&view=detail&id=${sp.id}" class="product__info-name">${sp.title}</a>
                    <div class="product__info-price">
                        ${sp.discounted_price ? `
                            <p>
                                <del class="product__info-price--root">${number_format(sp.price)}<sup>đ</sup></del>
                                <span>${number_format(sp.discounted_price)}</span><sup>đ</sup>
                            </p>
                            ${sp.discount_percentage ? `
                            <div class="tag-icon">${sp.discount_percentage}%</div>
                            ` : `
                            <div class="tag-icon">-${Math.round(((sp.price - sp.discounted_price) / sp.price) * 100)}%</div>
                            `}
                        ` : `
                            <p>
                                <span>${number_format(sp.price)}</span><sup>đ</sup>
                            </p>
                        `}
                        </div>
                    </div>
            `;
        return li;
    });

    // Append the li elements to the desired container
    const ulElement = document.querySelector('.your-ul-selector'); // Replace with your actual UL selector
    liArray.forEach(li => ulElement.appendChild(li));

    // Helper function to format numbers
    function number_format(number) {
        return new Intl.NumberFormat('vi-VN').format(number);
    }

    let currentIndex = 0; // Chỉ số hiện tại trong mảng
    const productList = document.getElementById('product-list');

    // Hàm cập nhật nội dung của danh sách
    function updateProductList() {
        // Xóa tất cả các phần tử hiện tại trong danh sách
        productList.innerHTML = '';

        // Thêm 4 phần tử <li> mới vào danh sách
        for (let i = 0; i < 4; i++) {
            if (currentIndex + i < liArray.length) {
                productList.appendChild(liArray[currentIndex + i].cloneNode(true));
            }
        }

        // Cập nhật trạng thái của các nút
        document.getElementById('prev-button').disabled = currentIndex === 0;
        document.getElementById('next-button').disabled = currentIndex + 4 >= liArray.length;
    }

    // Hàm điều hướng trái
    function goPrev() {
        if (currentIndex > 0) {
            currentIndex--;
            updateProductList();
        }
    }

    // Hàm điều hướng phải
    function goNext() {
        if (currentIndex + 4 < liArray.length) {
            currentIndex++;
            updateProductList();
        }
    }

    // Cập nhật danh sách ban đầu
    document.getElementById('prev-button').onclick = goPrev;
    document.getElementById('next-button').onclick = goNext;
    updateProductList();
};