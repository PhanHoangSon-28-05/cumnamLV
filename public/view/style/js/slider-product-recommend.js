// Lấy danh sách các container và nút điều hướng
const productContainers = [...document.querySelectorAll('.product-containers')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

// Debug: Kiểm tra số lượng các phần tử
console.log('Containers:', productContainers.length, 'Next Buttons:', nxtBtn.length, 'Previous Buttons:', preBtn.length);

// Thêm sự kiện cho từng container
productContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    // Kiểm tra xem nút `nxtBtn[i]` và `preBtn[i]` có tồn tại không
    if (nxtBtn[i]) {
        nxtBtn[i].addEventListener('click', () => {
            item.scrollLeft += containerWidth;
        });
    }

    if (preBtn[i]) {
        preBtn[i].addEventListener('click', () => {
            item.scrollLeft -= containerWidth;
        });
    }
});
