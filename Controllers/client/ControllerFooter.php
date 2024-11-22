<?php 
    class ControllerFooter {
        public function renderFooter() {
            $mFooter = new Footer();
            $listCate = $mFooter->getCategory();
            require_once("./modules/templates/footer.php");
        }
    }
?>