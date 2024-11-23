<?php 
    class ControllerLogoutAdmin {
        public function handleLogout() {
            
            deleteSession("username");
            deleteSession("email");
            direct("http://localhost/DA_One/");
        }
    }
?>