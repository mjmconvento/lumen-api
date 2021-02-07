<?php

namespace App\Interfaces;

interface ModelServiceInterface
{
    public function findAll();
    public function find(int $id);
}
