<?php 
    class ControllerLogoutClient {
        public function handleLogout() {
            
            deleteSession("username");
            deleteSession("email");
            direct("http://localhost/DA_One/");
        }
    }
?>