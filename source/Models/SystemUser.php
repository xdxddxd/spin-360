<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class SystemUser extends DataLayer
{

    public function __construct()
    {
        parent::__construct('system_users', ["name", "cel_phone", "email", "password", "access_level"], 'id', true);
    }

    public function save(): bool
    {
        if (
            !$this->validateCelular()
            || !$this->validateEmail()
            || !$this->validatePassword()
            || !parent::save()
        ) {
            return false;
        }
        return true;
    }

    /**
     * @return bool 
    */
    protected function validateCelular() : bool
    {

        if(empty($this->cel_phone) || strlen($this->cel_phone) < 10)
            {
            $this->fail = new Exception("Informe um celular válido");
            return false;
        }

        $userByCelular = null;
        if (!$this->id){
            $userByCelular = $this->find("cel_phone = :cel_phone", "cel_phone={$this->cel_phone}")->count();
        }else {
            $userByCelular = $this->find("cel_phone = :cel_phone AND id != :id", "cel_phone={$this->cel_phone}&id={$this->id}")->count();
        }

        if($userByCelular) {
            $this->fail = new Exception("O celular informado já está em uso");
            return false;
        }

        return true;
    }

    /**
     * @return bool 
    */
    protected function validateEmail() : bool
    {

        if(
            empty($this->email) 
            || !filter_var($this->email, FILTER_VALIDATE_EMAIL)
            )
            {
            $this->fail = new Exception("Informe um e-mail válido");
            return false;
        }

        $userByEmail = null;
        if (!$this->id){
            $userByEmail = $this->find("email = :email", "email={$this->email}")->count();
        }else {
            $userByEmail = $this->find("email = :email AND id != :id", "email={$this->email}&id={$this->id}")->count();
        }

        if($userByEmail) {
            $this->fail = new Exception("O e-mail informado já está em uso");
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    protected function validatePassword() : bool
    {

        $minChar = 5;

        if(empty($this->password) || strlen($this->password) < $minChar){
            $this->fail = new Exception("Informe uma senha com pelo menos {$minChar} caracteres");
            return false;
        }

        if (password_get_info($this->password)["algo"]){
            return true;
        }

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return true;
    }

    public function Empresa(): SystemUser
    {
        $this->empresa = (new SystemEmpresa())->findById($this->fk_empresa)->data();
        return $this;
    }

}