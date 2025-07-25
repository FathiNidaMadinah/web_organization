<?php

namespace App\Models;

use App\Models\Anggota;
use App\Models\Divisi;
use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Users extends Model implements JWTSubject
{
    use HasFactory;

    protected $table = 'users';
    protected $guarded = ['id'];
    protected $hidden = ['password'];
    public function dataAnggota(){
        return $this->belongsTo(Anggota::class,'member_id','id')->select('id','nama','tahun_akt','tanggal_lahir','tempat_lahir','no_telp','gender');
    }
    public function dataDivisi(){
        return $this->belongsTo(divisi::class,'divisi_id','id')->select('id','divisi','leader_id');
    }
    public function dataProgram(){
        return $this->belongsTo(Program::class,'program_id','id')->select('id','program','leader_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
