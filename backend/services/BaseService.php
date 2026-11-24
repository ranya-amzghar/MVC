<?php

abstract class BaseService
{
    protected function validateNomLength(string $nom): void
    {
        if (mb_strlen($nom) < 4) {

            throw new InvalidArgumentException(
                "Le nom doit contenir au moins 4 caractères"
            );
        }
    }
}