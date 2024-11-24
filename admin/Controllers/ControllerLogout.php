<?php 
    class ControllerLogoutAdmin {
        public function handleLogout() {
            deleteSession("username");
            deleteSession("email");
            deleteSession("name_user");
            direct("http://localhost/DA_One/");
        }
    }
?>