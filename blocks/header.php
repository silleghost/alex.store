<script src="../js/cart.js" async></script>
<nav id="top">
<div class="header">
    <div class="header-container">
        <div class="header-content">
            <a href="../index.php"><img src="../img/logo.png" alt="Moria's Dresses"></a>
            <a class="button" href="../delivery.php">Доставка</a>
            <a class="button" href="../aboutus.php">Контакты</a>
            <?php
                if($_SESSION['user']['name']){
                    echo '<a class="button login" href="../profile.php">' . $_SESSION['user']['name'] . '</a>';
                } else {
                    echo '<a class="button login" href="../auth.php">Войти</a>';
                }
            ?>
            <div class="cart-window">
                <div onclick="showCart()" class="button shopping-cart">Корзина</div>
                <div id="dropdown" class="cart-dropdown">
                    <div class="cart-content">
                        <div class="empty-cart">Корзина пуста</div>
                        <div class="cart-items">
                        </div>
                        <div class="cart-total" id="totalDiv">
                            <div class="cart-total-label">
                                Итого
                            </div>
                            <div class="cart-total-value">
                                0
                            </div>
                        </div>
                        <div class="cart-buy-button">
                            Купить
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</nav>




