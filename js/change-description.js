if (document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready(){
    var changeBlockButton = document.getElementById('show')
    changeBlockButton.addEventListener('click', showDescBlock)
}

function showDescBlock(){
    document.getElementsByClassName('change-description')[0].classList.toggle('show-change-description-block')
}