<?php

namespace App\Interfaces;

interface AuthenticationInterface
{
    
    public function login(array $data);
    public function sendPassword($email, $name);
    
    // public function update($email, $name);
    // public function delete($id);

    // public function delete($id);
}
