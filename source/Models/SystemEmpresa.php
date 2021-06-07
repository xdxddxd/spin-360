<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class SystemEmpresa extends DataLayer
{

    public function __construct()
    {
        parent::__construct('empresa', ["razao_social",  "cnpj", "cep", "logradouro", "nr_local", "bairro", "cidade", "uf", "cel_phone", "email"], 'id', true);
    }

    public function save(): bool
    {
        if (
            !$this->validateCNPJ()
            || !$this->validateCelular()
            || !$this->validateEmail()
            || !parent::save()
        ) {
            return false;
        }
        return true;
    }

    /**
     * @return bool 
    */
    protected function validateCNPJ() : bool
    {

        if(empty($this->cnpj) || strlen($this->cnpj) < 18)
            {
            $this->fail = new Exception("Informe um CNPJ válido");
            return false;
        }

        $userByCNPJ = null;
        if (!$this->id){
            $userByCNPJ = $this->find("cnpj = :cnpj", "cnpj={$this->cnpj}")->count();
        }else {
            $userByCNPJ = $this->find("cnpj = :cnpj AND id != :id", "cnpj={$this->cnpj}&id={$this->id}")->count();
        }

        if($userByCNPJ) {
            $this->fail = new Exception("O CNPJ informado já está em uso");
            return false;
        }

        return true;
    }

    /**
     * @return bool 
    */
    protected function validateCelular() : bool
    {

        if(empty($this->cel_phone) || strlen($this->cel_phone) < 15)
            {
            $this->fail = new Exception("Informe um celular válido");
            return false;
        }

        $userByCelPhone = null;
        if (!$this->id){
            $userByCelPhone = $this->find("cel_phone = :cel_phone", "cel_phone={$this->cel_phone}")->count();
        }else {
            $userByCelPhone = $this->find("cel_phone = :cel_phone AND id != :id", "cel_phone={$this->cel_phone}&id={$this->id}")->count();
        }

        if($userByCelPhone) {
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

}