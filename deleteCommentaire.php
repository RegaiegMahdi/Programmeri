

<?php
require_once '../Controller/commentaireC.php';
$commentaireC = new commentaireC();

if (isset($_GET["id"])) {
    $commentaireC->deleteCommentaire($_GET["id"]);
}

header('Location:index-back.php');
exit;
?>
