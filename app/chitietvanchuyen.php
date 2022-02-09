<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietvanchuyen extends Model
{

    const     CREATED_AT    = 'ctvc_taoMoi';
    const     UPDATED_AT    = 'ctvc_capNhat';

    protected $table        = 'chi_tiet_van_chuyen';
    protected $fillable     = ['ctvc_ma', 'hd_ma','nv_ma','ctvc_taoMoi', 'ctvc_capNhat', 'ctvc_nvDuyet','ctvc_ghichu','ctvc_trangthai','ctvc_tu','ctvc_den','ctvc_hinh','ctvc_dvvc','ctvc_ngayGui'];

    protected $guarded      = ['ctvc_ma'];
    protected $primaryKey   = 'ctvc_ma';

    protected $dates        = ['ctvc_taoMoi', 'ctvc_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
