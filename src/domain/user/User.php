<?php

namespace src\domain\user;

use src\domain\cpf\Cpf;
use src\domain\cpf\CpfInterface;
use src\domain\email\Email;
use src\domain\utilities\UuidTrait;
use src\domain\utilities\ErrorCodes;
use src\infra\exception\UserException;

class User implements UserInterface
{
    use UuidTrait;

    private UserRepositoryInterface $repository;
    private Cpf $cpf;
    private Email $email;

    private string $id;
    private string $name;
    private ?string $password;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setName($name): User
    {
        if (empty($name)) {
            $this->name = $name;
        }

        return $this;
    }

    public function loadByCpf(): User
    {
        if (!$this->repository->findByCpf($this)) {
            throw new UserException("CPF '{$this->cpf->getNumber()}' not found.", ErrorCodes::USER_PASSWORD_OR_LOGIN_INCORRECT);
        }

        return $this;
    }

    public function setCpf(CpfInterface $cpf): User
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getCpf(): CpfInterface
    {
        return $this->cpf;
    }

    public function setPassword(?string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function checkPassword(string $password): User
    {
        if (!password_verify($password, $this->password)) {
            throw new UserException("Incorrect password", ErrorCodes::USER_PASSWORD_OR_LOGIN_INCORRECT);
        }

        return $this;
    }

    public function loadByEmail(): User
    {
        if (!$this->repository->findByEmail($this)) {
            throw new UserException("Email '{$this->cpf->getNumber()}' not found.", ErrorCodes::USER_PASSWORD_OR_LOGIN_INCORRECT);
        }

        return $this;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): UserInterface
    {
        $this->email = $email;
        return $this;
    }
}
