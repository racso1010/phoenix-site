const sale_price = document.querySelector('del');
const custom_price = document.querySelector('.custom-price');
const new_price = document.createElement('p');


if(sale_price != null) {
    new_price.classList.add('new-price');
    new_price.innerHTML = sale_price.innerHTML;
    custom_price.appendChild(new_price);
}

