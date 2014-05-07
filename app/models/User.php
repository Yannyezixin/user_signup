<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
    }

    /**
     *  调整器：密码
     *  @param string $value 未处理的密码字符串
     *
     *  @return void
     */
    public function setPasswordAttribute($value)
    {
        //若传入的值已经进行Hash 加密，则不重复处理
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    /**
 	 * Get the token value for the "remember me" session.
 	 *
 	 * @return string
 	 */
 	public function getRememberToken()
 	{
 		return $this->remember_token;
 	}

 	/**
 	 * Set the token value for the "remember me" session.
 	 *
 	 * @param  string  $value
 	 * @return void
 	 */
 	public function setRememberToken($value)
 	{
 		$this->remember_token = $value;
 	}

 	/**
 	 * Get the column name for the "remember me" token.
 	 *
 	 * @return string
 	 */
 	public function getRememberTokenName()
 	{
 		return 'remember_token';
	}
}
