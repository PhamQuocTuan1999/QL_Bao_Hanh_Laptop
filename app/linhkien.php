<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class linhkien extends Model
{
    const     CREATED_AT    = 'lk_taoMoi';
    const     UPDATED_AT    = 'lk_capNhat';

    protected $table        = 'linh_kien';
    protected $fillable     = ['lk_ten' ,'lk_chiTiet','lk_hinh','lk_gia', 'lk_taoMoi', 'lk_capNhat', 'lk_trangThai', 'llk_ma', 'nsx_ma', 'bh_ma'];
    protected $guarded      = ['lk_ma'];

    protected $primaryKey   = 'lk_ma';

    protected $dates        = ['p_taoMoi', 'p_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
     public function loailinhkien()
    {
        return $this->belongsTo('App', 'llk_ma', 'llk_ma');
    }

    // public function hinhanhlienquan()
    // {
    //     return $this->hasMany('App\HinhAnh', 'sp_ma', 'sp_ma');
    // }
}
