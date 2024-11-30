<?php
class ControllerLogoutAdmin
{
    public function handleLogout()
    {
        deleteSession("username");
        deleteSession("email");
        deleteSession("name_user");
        deleteSession("quantityCart");
        deleteSession("id");
        direct("http://localhost/DA_One/");
    }
}
