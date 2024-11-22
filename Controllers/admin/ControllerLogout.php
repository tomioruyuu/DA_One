<?php 
    class ControllerLogoutAdmin {
        public function handleLogout() {
            deleteSession("username");
            deleteSession("email");
            direct("?act=/");
        }
    }
?>