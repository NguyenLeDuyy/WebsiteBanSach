// Bước 1: Tạo mảng để lưu các phần tử <li>
window.onload = function () {
    const liArray = [
        // Thêm phần tử <li> vào mảng thủ công
        document.createElement('li'),
        document.createElement('li'),
        document.createElement('li'),
        document.createElement('li'),
        document.createElement('li'),
        document.createElement('li'),
        document.createElement('li'),
        document.createElement('li'),
        document.createElement('li'),
        document.createElement('li'),
        document.createElement('li'),
        document.createElement('li')
    ];

    // Cập nhật nội dung cho từng phần tử <li> trong mảng
    liArray[0].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="/product/product.html" class="product__item-top--thumb">
                <img src="/imgbook/sach1.png" alt="Book 1">
            </a>
            <a href="/product/product.html" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Dầu Và Máu - Mohammed Bin Salman Và Tham Vọng Tái Thiết Kinh Tế Ả-Rập</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">249.000 <sup>đ</sup></del> 199,200<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;
    // Cập nhật nội dung cho các phần tử còn lại (tương tự cho các phần tử khác)
    liArray[1].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/sach2.jpeg" alt="Book 2">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Chính Sách Tiền Tệ Thế Kỷ 21</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">325,000<sup>đ</sup></del> 260,000<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;
    liArray[2].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/sach3.jpeg" alt="Book 3">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Làm Ra Làm, Chơi Ra Chơi - Deep Work</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">159,000<sup>đ</sup></del>127,200<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;
    liArray[3].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/sach4.jpg" alt="Book 4">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Những Kẻ Xuất Chúng - The Outliers (Malcom Gladwell)</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">159,000đ<sup>đ</sup></del> 127,200<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;
    liArray[4].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/sach5.jpeg" alt="Book 5">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Động Lực Chèo Lái Hành Vi - Sự Thật Kinh Ngạc Về Những Động Cơ Thúc Đẩy Hành Động Của Con Người
</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">139,000<sup>đ</sup></del> 111,200<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;
    liArray[5].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/anh6.jpeg" alt="Book 6">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Hành Trình Biến Những Điều Tưởng Như Không Thể Thành Có Thể - Hoàng Hữu Thắng
</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">245,000đ<sup>đ</sup></del> 196,000<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;
    liArray[6].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/anh7.png" alt="Book 7">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Marketing Matters - Marketing Có Quan Trọng Và Xứng Đáng Để Ta Quan Tâm?</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">229,000<sup>đ</sup></del> 183,200<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;
    liArray[7].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/anh8.png" alt="Book 8">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Tiểu Học Vui - Vững Bước Lớp 5 - 101 Câu Đố Rèn Trí Não Luyện Kỹ Năng</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">79,000<sup>đ</sup></del> 63,200<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;
    liArray[8].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/anh9.png" alt="Book 9">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">GNSV: Cao Bá Quát - Danh Nhân Truyện Ký</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">99,000<sup>đ</sup></del> 79,200<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;

    liArray[9].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/anh10.png" alt="Book 10">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Bộ Cơ Thể Người Vui Nhộn: Trái Tim Tươi Vui Và Hệ Tuần Hoàn</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">65,000<sup>đ</sup></del> 52,000<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;

    liArray[10].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/anh11.jpeg" alt="Book 11">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Kỹ Năng Học Đường - Cư Xử Đúng Mực Ư? Chuyện Nhỏ!</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">79,000đ<sup>đ</sup></del> 63,200<sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;

    liArray[11].innerHTML = `
    <div class="product__item">
        <div class="product__item-top">
            <a href="#" class="product__item-top--thumb">
                <img src="/imgbook/anh12.png" alt="Book 12">
            </a>
            <a href="#" class="buy">Mua ngay</a>
        </div>
        <div class="product__info">
            <a href="#" class="product__info-name">Nelson Mandela Là Ai?</a>
            <div class="product__info-price">
                <span><del class="product__info-price--root">59,000<sup>đ</sup></del> 47,200 <sup>đ</sup> </span>
                <div class="tag-icon"> - 20% </div>
            </div>
        </div>
    </div>
`;

    const productList = document.getElementById('product-list');
    let currentIndex = 0; // Chỉ số hiện tại trong mảng

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
    updateProductList();
    document.getElementById('prev-button').onclick = goPrev;
    document.getElementById('next-button').onclick = goNext;
}