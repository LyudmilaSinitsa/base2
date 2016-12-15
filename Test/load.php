<?php
    include_once "header.php";
?>
    <div class="content">
        <p>Load page</p>
        <div class="draw">
            <div class="float_l table">
                <?php
                    $LoadedDraw = GetIds($_GET['id']);
                    DrawField($LoadedDraw['Draw']);
                ?>
            </div>
        </div>
    </div>

<?php
    include_once "footer.php";
?>