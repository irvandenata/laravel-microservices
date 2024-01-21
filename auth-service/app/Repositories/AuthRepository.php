<?php
namespace App\Repositories;

use App\Contracts\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    /**
     * @param array<string, mixed> $data
     */
    public function register($data): array
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => 2,
            'password' => Hash::make($data['password']),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token,
        ];
    }
    /**
     * @param array<string, mixed> $data
     */
    public function login($data): array
    {
        $user = User::where('email', $data['email'])->first();
        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw new Exception('The provided credentials are incorrect.');
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token,
        ];
    }
    public function logout(): void
    {
        return auth()->user()->tokens()->delete();
    }
    public function refresh(): array
    {
        $token = auth()->user()->createToken('auth_token')->plainTextToken;
        return [
            'token' => $token,
        ];
    }
    public function me(): array
    {
        return auth()->user();
    }
}
