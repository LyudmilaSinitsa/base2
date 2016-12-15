<?php
    include_once "header.php";
?>
    <script type="text/javascript" src="script/draw.js"></script>
    <div class="content">
        <p>Index page</p>
        <div class="draw">
            <form method="POST">
            <div class="float_l table">
                <?php
                    $drawIds="";
                    if (isset($_POST['drawValue']))
                    {
                        foreach ($_POST['drawValue'] as $drawId) {
                            if (!empty($drawId)) {
                                if ($drawIds == '') {
                                    $drawIds = $drawId;
                                } else {
                                    $drawIds .= "," . $drawId;
                                }
                            }
                        }
                    }
                    DrawField($drawIds);
                ?>
            </div>
            <div class="float_l control">
                <input class="saveDraw" type="button" name="action" value="Сохранить">
            </div>
                <?php
                    echo $message;
                ?>
            </form>
            <div class="cleaner"></div>
        </div>
    </div>

<?php
    include_once "footer.php";
?>