<?php

namespace domain\user;

interface UserInterface
{
    public function setId(string $id);
    public function getId(): string;
    public function setName($name): UserInterface;
    public function load(): UserInterface;
}
