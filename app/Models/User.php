<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /**
     *  @use HasFactory<\Database\Factories\UserFactory>
     *  @use HasUuids
     *  @use Notifiable
     */
    use HasFactory, HasUuids, Notifiable;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Generate a tenant ID from the user's email.
     *
     * @return string
     */
    public function getTenantId(): string
    {
        return self::generateTenantIdFromEmail($this->email);
    }

    /**
     * Generate a tenant ID from an email address.
     *
     * @param string $email
     * @return string
     */
    public static function generateTenantIdFromEmail(string $email): string
    {
        return str_replace(['.'], ['-'], explode('@', $email)[0]);
    }
}
