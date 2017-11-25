<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * @var string
     */
    protected $table = 'table_user';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'avatar'
    ];

    protected $guarded = [
        'password'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function socialAccount()
    {
        return $this->hasMany('App\Model\SocialAccount', 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Model\Role', 'table_user_roles', 'user_id', 'role_id');
    }

    public function getRoles()
    {
        return $this->roles()->pluck('slug')->toArray();
    }

    public function hasRole($role_slug)
    {
        return in_array($role_slug, $this->roles()->pluck('slug')->toArray());
    }

    public function canAccessAdminDashboard()
    {
        $roles = $this->getRoles();
        return (in_array('admin', $roles) ||
                in_array('super_admin', $roles) ||
                in_array('administrator', $roles) ||
                in_array('editor', $roles) ||
                in_array('contributor', $roles) ||
                in_array('author', $roles) ||
                in_array('store_manager', $roles));
    }
}