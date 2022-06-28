if (document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready(){
    var changeBlockButton = document.getElementById('change-button')
    changeBlockButton.addEventListener('click', showChangeBlock)
}

function showChangeBlock(){
    document.getElementsByClassName('change-block')[0].classList.toggle('show-change-block')
}