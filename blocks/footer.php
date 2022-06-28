<div class="footer">
    <div class="footer-container">
        <div class="footer-left">
            <div class="footer-left-logo">
                <img src="../img/logo_white.png" alt="Moria's Dresses">
            </div>
            <div class="footer-left-sign">
                Автор: Алексей Куделя 2022
            </div>
        </div>
        <div class="footer-right">
            <a class="footer-right-button" href="../delivery.php">
                Доставка
            </a>
            <a class="footer-right-button" href="../aboutus.php">
                Контакты
            </a>
            <?php
            if($_SESSION['user']['name']) {
                echo '<a class="footer-right-button" href="../php_scripts/logout.php">Выйти</a>';
            }
            ?>
        </div>
    </div>
</div>
