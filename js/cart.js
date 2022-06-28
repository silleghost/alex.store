if (document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready(){
    window.onclick = function(event) {
        if (!event.target.closest('.cart-window') && !event.target.matches('.cart-product-remove-button')) {
            var dropdowns = document.getElementsByClassName("cart-dropdown");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show-cart-window')) {
                    openDropdown.classList.remove('show-cart-window');
                }
            }
        }
    }

    var removeFromCartButtons = document.getElementsByClassName('cart-product-remove-button')
    for (var i=0; i< removeFromCartButtons.length; i++){
        var button = removeFromCartButtons[i]
        button.addEventListener('click', removeFromCart)
    }

    var addToCartButtons = document.getElementsByClassName('card-button')
    for (var i=0; i < addToCartButtons.length; i++){
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }

    var buyButton = document.getElementsByClassName('cart-buy-button')[0]
    buyButton.addEventListener('click',purchaseClicked)

}

function purchaseClicked(){
    var cartItems = document.getElementsByClassName('cart-items')[0]
    while (cartItems.hasChildNodes()){
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()
}

function showCart(){

    document.getElementById("dropdown").classList.toggle('show-cart-window');
}

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement
    var title = shopItem.getElementsByClassName('card-label')[0].innerText
    var price = shopItem.getElementsByClassName('card-price')[0].innerText
    var imageSrc = shopItem.getElementsByTagName('input')[1].src
    var quantity = shopItem.getElementsByClassName('card-availability')[0].innerText.trim()
    if (quantity === 'Нет в наличии'){
        postMessage('Товара нет в наличии')
    } else {
        addItemToCart(title, price, imageSrc)
        updateCartTotal()
    }
}

function addItemToCart(title, price, imageSrc){
    var cartItem;
    cartItem = document.createElement('div');
    cartItem.classList.add('cart-product')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemsNames = cartItems.getElementsByClassName('cart-product-head')
    for (var i=0; i < cartItemsNames.length; i++){
        console.log(title,cartItemsNames[i].innerText)
        if (cartItemsNames[i].innerText.trim() === title){
            document.getElementsByClassName('cart-product-quantity')[i].innerText = parseInt(document.getElementsByClassName('cart-product-quantity')[i].innerText)+1
            return
        }
    }
    cartItem.innerHTML = `
            <div class="cart-product-img">
                <img src="${imageSrc}" alt="">
            </div>
            <div class="cart-product-info">
                <div class="cart-product-head">${title}
                </div>
                <div class="cart-product-details">
                    <span class="cart-product-quantity">
                        1
                    </span>
                    <span class="cart-product-price">
                        ${price}
                    </span>
                    <span class="cart-product-remove-button">
                        Убрать
                    </span>
                </div>
            </div>
    `
    cartItems.append(cartItem)
    cartItem.getElementsByClassName('cart-product-remove-button')[0].addEventListener('click', removeFromCart)
}

function removeFromCart(event){
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.parentElement.remove()
    updateCartTotal()
}

function updateCartTotal(){
    var cartItems = document.getElementsByClassName('cart-product')
    var total = 0
    for (var i=0; i < cartItems.length; i++){
        var cartItem = cartItems[i]
        var priceElem = cartItem.getElementsByClassName('cart-product-price')[0]
        var quantityElem = cartItem.getElementsByClassName('cart-product-quantity')[0]
        var price = parseInt(priceElem.innerText.replace(' ₽', ''))
        var quantity = parseInt(quantityElem.innerText.replace(' X ', ''))
        total += (price * quantity)
    }
    if (total === 0){
        emptyCart()
    } else {
        notEmptyCart()
    }
    document.getElementsByClassName('cart-total-value')[0].innerText = total
}

function emptyCart () {
    document.getElementsByClassName('cart-total')[0].classList.remove('show-cart-total')
    document.getElementsByClassName('cart-buy-button')[0].classList.remove('show-cart-buy-button')
    document.getElementsByClassName('empty-cart')[0].classList.remove('hide-empty-cart')
}

function notEmptyCart() {
    document.getElementsByClassName('cart-total')[0].classList.add('show-cart-total')
    document.getElementsByClassName('cart-buy-button')[0].classList.add('show-cart-buy-button')
    document.getElementsByClassName('empty-cart')[0].classList.add('hide-empty-cart')
}


