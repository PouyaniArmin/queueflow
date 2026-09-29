<?php

namespace Services;

use App\Auth;
use App\Request;
use Models\Role;
use Models\User;

class AuthService
{
    private ?User $user = null;
    private ?Role $role = null;

    public function __construct()
    {
        $this->user = new User;
        $this->role = new Role;
    }

    // Verifies the user's credentials and creates an authenticated session on success.
    public function authenticate(string $email, string $password): bool
    {
        $user = $this->user->findByEmail($email);

        if (!$user || empty($user)) {
            return false;
        }

        $password_hash = $user[0]['password_hash'];

        if (password_verify($password, $password_hash)) {
            Auth::login($user[0]);
            return true;
        }

        return false;
    }

    // Creates a new user account when the email is not already registered.
    public function signup(Request $request)
    {
        $request = $request->all();

        if (!$this->user->findByEmail($request['email'])) {
            $country_code = $request['country_code'];
            $phone = $request['phone'];
            $fullPhoneNumber = $country_code . $phone;

            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'password_hash' => password_hash($request['password'], PASSWORD_DEFAULT),
                'phone' => $fullPhoneNumber,
                'role_id' => 1
            ];

            $this->user->insert($data);

            return "Register User";
        }

        return "Account Exists";
    }

    // Retrieves the role name of the currently authenticated user.
    private function getCurrentRoleName()
    {
        if (!Auth::check()) {
            return null;
        }

        $user = Auth::user();
        $role_id = $user['role_id'];
        $role = $this->role->selectFindOneBy('id', $role_id);

        if (empty($role) || !isset($role[0]['name'])) {
            return null;
        }

        return $role[0]['name'];
    }

    public function isAdmin()
    {
        return $this->getCurrentRoleName() === 'admin';
    }

    public function isCustomer()
    {
        return $this->getCurrentRoleName() === 'customer';
    }

    public function isOwner()
    {
        return $this->getCurrentRoleName() === 'owner';
    }

    public function roleNmae(): string
    {
        return $this->getCurrentRoleName();
    }
}
