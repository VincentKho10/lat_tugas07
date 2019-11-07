<?php


class RoleController
{
    private $roleDao;
    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->roleDao = new RoleDao();
    }

    public function index(){
        $btnAdd = filter_input(0,"btnAdd");
        if(isset($btnAdd)){
            $nme = filter_input(0,"Name");
            addRole($nme);
        }

        $deleted = filter_input(1,"id");
        if(isset($deleted)){
            delRole($deleted);
            header('Location:index.php?nav=rle');
        }

        $roles = $this->roleDao->getAllRole();
        include_once "view/role.php";
    }

    public function update(){

    }
}