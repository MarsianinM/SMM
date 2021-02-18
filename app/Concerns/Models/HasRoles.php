<?php

namespace App\Concerns\Models;

use App\Models\Role;

trait HasRoles
{
    /**
     * Assign a specific role to a user.
     *
     * @param  string  $name
     */
    public function assignRole(string $name)
    {
        $role = Role::where(compact('name'))->firstOrFail();

        $this->roles()->attach($role);
    }

    /**
     * Revoke a specific role from a user.
     *
     * @param  string  $name
     */
    public function revokeRole(string $name)
    {
        $role = Role::where(compact('name'))->firstOrFail();

        $this->roles()->detach($role);
    }

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->morphToMany(Role::class, 'roleable');
    }

    /**
     * Check if the user has the given role.
     *
     * @param  string  $role
     * @return mixed
     */
    public function hasRole(string $role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
}