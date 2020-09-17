const sale_price = document.querySelector('del');
const custom_price = document.querySelector('.custom-price');
const new_price = document.createElement('p');
let custom_price_variations;


if(sale_price != null) {
    new_price.classList.add('new-price');
    new_price.innerHTML = sale_price.innerHTML;
    custom_price.appendChild(new_price);
}
else {
    // setTimeout(function(){ 
    //     custom_price_variations = document.querySelector('del');         
    //     new_price.classList.add('new-price');
    //     new_price.innerHTML = custom_price_variations.innerHTML;
    //     custom_price.appendChild(new_price);
    // }, 500);

    custom_price.remove();
}
