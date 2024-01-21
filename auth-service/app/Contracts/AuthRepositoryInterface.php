<?php
namespace App\Contracts;

interface AuthRepositoryInterface
{
    /**
     * @param array<string, mixed> $data
     */
    public function register(array $data): array;

    /**
     * @param array<string, mixed> $data
     */
    public function login(array $data): array;

    public function logout(): void;

    public function refresh(): array;

    public function me(): array;
}
