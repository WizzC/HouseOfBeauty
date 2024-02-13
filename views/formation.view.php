<?php
ob_start();
?>
<div style="height: 100px;"></div>
<div id="intro" class="text-center bg-image shadow-1-strong vh-100">
    <div class="mask text-center">
        <div class="d-flex justify-content-center align-items-center h-75">
            <div class="text-wdark pt-4">
                <h1 class="mb-3">Bientot disponible !</h1>
                <p>Nous travaillons d'arrache-pied pour terminer le développement de cette page web.</p>
            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require "template.php";
?>