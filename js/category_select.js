if (document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready(){
    var categoryButtons = document.getElementsByClassName('category-button')
    for (var i=0; i < categoryButtons.length; i++){
        var categoryButton = categoryButtons[i]
        categoryButton.addEventListener('click', showCategory)
    }
}

function showCategory(event){
    var buttonClicked = event.target
    var category = buttonClicked.id
    var cardCategories = document.getElementsByClassName('card-category')
    // var cardItems = document.getElementsByClassName('card')
    for (var i=0; i < cardCategories.length; i++) {
        var categoryName = cardCategories[i].innerText.trim()
        if (categoryName !== category.trim() && category !== 'all') {
            cardCategories[i].parentElement.parentElement.style.display = 'none'
        } else {
            cardCategories[i].parentElement.parentElement.style.display = 'block'
        }
    }
}