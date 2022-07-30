<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['article_no', 'item', 'quantity','shipment_date','revise_date','production_unit','fabric_ref','dye_factory','pp_status','fab_status','acc_status','prod_status'];   

    
}
