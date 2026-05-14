<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    //
      protected $table = 'homepage';// Explicitly define the table name

    protected $fillable = [
        'first_slider','id','latest_title','latest_bigtitle','video','latest_slider','second_slider','category_image1','category_image2','image1_link','image2_link','category_image3','image3_link','category_image4','image4_link','category_image5','image5_link','category_video','latest_type','third_slider','fourth_slider','fifth_slider','homecategory1','homecategory2','homecategory3','homecategory4','homecategory5'
      ];  


 
}

