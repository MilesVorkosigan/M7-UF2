<?php
class ArmarRegistre{
    public function armarUsuari ($registre){
        $user =[
            "name"=> $registre->getName(),
            "surname"=> $registre->getName(),
            "email"=>$registre->getEmail(),
            "admin"=>1,
            "password"=> Encriptar::hashPassword($registre->getPassword()),

        ];

    }
}