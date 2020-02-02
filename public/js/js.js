document.addEventListener('DOMContentLoaded', () => {
    fetch('/api')
        .then((response) => response.json())
        .then((data) => {
            if (data.qty > 0) {
                creatCartQty(data.qty)
            }
        })
        .catch((error) => {
            console.log(error);
        });
});
function creatCartQty(qty) {
    const qtyEl = document.createElement('span');
    qtyEl.innerHTML = `[${qty}]`;
    qtyEl.className = 'cartQty';
    document.querySelector('.menu').lastChild.appendChild(qtyEl);
}
function updateCartQty(qty) {
    if (qty === 0) {
        document.querySelector('.cartQty').remove();
    } else {
        document.querySelector('.cartQty').innerHTML = `[${qty}]`;

    }
}





