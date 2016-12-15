<?php
    include_once "header.php";
?>
    <div class="content">
        <p>AllDraws page</p>
        <form method="POST">
            <div class="allDraws">
                <?php
                    DrawAllDraws();
                ?>
            </div>
            <button type="submit" name="action" value="deleteDraws">Удалить</button>
        </form>
    </div>

<?php
    include_once "footer.php";
?>