<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Scopes\AgeScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //따로 클래스로 생성해서 scope를 사용하는 경우
    // protected static function booted()
    // {
    //     parent::boot();

    //     // static::addGlobalScope(new AgeScope);
    // }

    //따로 클래스로 하지 않고, 간단한 경우에는 바로 scope를 설정해서 사용 가능
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('remember_token', function (Builder $builder) {
    //         $builder->where('remember_token', 1);
    //     });
    // }

    //로컬 스코프
    //로컬 스코프는 애플리케이션에서 손쉽게, 반복적으로 사용할 수 있는 공통의 범위 제한을 정의할 수 있게 해줍니다. 
    public function scopeRememberToken($query)
    {
        return $query->where('remember_token', 1);
    }

    public function scopeName($query)
    {
        return $query->where('name', '5tV5EVtY4r');
    }

    //다이나믹 스코프
    public function scopeEmail($query, $email)
    {
        return $query->where('email', $email);
    }


    //데이터베이스에서 모델이 존재하고 조회가 되었을때 retrieved 이벤트가 발생합니다. 
    //새로운 모델이 처음으로 저장되었을 때 creating과 created 이벤트가 발생합니다. 
    //updating / updated 이벤트는 기존 모델이 수정되고 save 메소드가 호출 될 때 발생합니다. saving / saved 이벤트는 모델이 생성되거나 업데이트 될 때 발생합니다.

    //Eloquent 모델의 라이프사이클의 다양한 지점을 고유한 이벤트 클래스에 매핑하는 $dispatchesEvents 속성을 Eloquent 모델에 정의하면 됩니다.
    protected $dispatchesEvents = [
        'saved' => UserSaved::class,
        'deleted' => UserDeleted::class,
    ];

    // 주어진 모델을 여러 이벤트들을 수신하고자 하는 경우, 옵저버를 사용하여 모든 리스너를 하나의 클래스로 구성할 수 있습니다. 
    //옵저버 클래스는 수신하고자 하는 Eloquent 이벤트에 대항하는 메소드 이름을 가집니다. 각각의 이 메소드들은 인자로 모델을 전달 받습니다.
    // make:observer 아티즌 명령어는 새로운 옵저버 클래스를 생성하는 가장 쉬운 방법입니다.
    //php artisan make:observer UserObserver --model=User
}
