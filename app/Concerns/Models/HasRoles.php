<?php

namespace App\Concerns\Models;

use App\Models\Role;
use Exception;

trait HasRoles
{
    /**
     * Assign a specific role.
     *
     * @param  string  $name
     */
    public function assignRole(string $name)
    {
        $role = Role::where(compact('name'))->firstOrFail();

        $this->roles()->attach($role);
    }

    /**
     * Revoke a specific role.
     *
     * @param  string  $name
     */
    public function revokeRole(string $name)
    {
        $role = Role::where(compact('name'))->firstOrFail();

        $this->roles()->detach($role);
    }

    /**
     * The roles that belong to the entity.
     */
    public function roles()
    {
        return $this->morphToMany(Role::class, 'roleable')->withPivot('is_active');
    }

    /**
     * Set active role.
     *
     * @param  string  $name
     * @throws \Exception
     */
    public function setActiveRole(string $name)
    {
        $role = $this->roles()->firstWhere(compact('name'));
        if (is_null($role)) {
            throw new Exception("The role '$name' is not assigned to this user, or does not exist");
        }

        $this->roles()->newPivotStatement()->whereRoleableId($this->id)->update(['is_active' => false]);
        $this->roles()->updateExistingPivot($role, ['is_active' => true]);
    }

    /**
     * Get entity's current active role.
     */
    public function activeRole()
    {
        return $this->roles()->wherePivot('is_active', true)->firstOrFail();
    }

    /**
     * Check if the current role is equal to the given one.
     *
     * @param  string  $name
     * @return bool
     */
    public function activeRoleIs(string $name)
    {
        return $this->activeRole()->name === $name;
    }

    /**
     * Check if the entity has the given role.
     *
     * @param  string  $name
     * @return mixed
     */
    public function hasRole(string $name)
    {
        return $this->roles()->whereName($name)->exists();
    }
}