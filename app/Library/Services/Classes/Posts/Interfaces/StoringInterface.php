<?php

namespace App\Library\Services\Classes\Posts\Interfaces;

interface StoringInterface
{
    public function validate();

    public function prepareStoringParams();

    public function storeSubcategories();

    public function saveImages();

    public function storeSocials();

    public function store();
}
