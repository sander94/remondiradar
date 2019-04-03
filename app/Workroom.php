<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Image;



class Workroom extends Model
{


    protected $table = 'wr';
    protected $fillable = ['company_id', 'brand_name', 'brand_logo', 'cars_serviced', 'full_address', 'google_maps', 'region', 'email', 'phone', 'email', 'website_url', 'facebook_url', 'instagram_url', 'additional_info', 'short_description', 'is_active'];



        public function setCarsServicedAttribute($value) {
    	$carsarray = request()->cars_serviced;
    	$cars = implode('|', $carsarray);
    	$this -> attributes['cars_serviced'] = $cars;
		}

  	

		public function getCarsServicedAttribute($value) {
    	$carsarray = explode('|', $value);
    	return $carsarray;
		}


		public function setBrandLogoAttribute($value) {

	    if (request()->hasFile('brand_logo')) {
     
        // get posted images attributes
        $image = request()->file('brand_logo');
        // generate random string for file name
        $renamed = time().'_'.substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10).'.'.$image->getClientOriginalExtension(); 

        // give destinations names
        $imgdest = public_path('images/logos');
        $thumbdest = public_path('images/t_logos');

        // read image from temporary file
        $img = Image::make($_FILES['brand_logo']['tmp_name']);

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($imgdest.'/'.$renamed);

        // make small image
        $img->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // save image
        $img->save($thumbdest.'/'.$renamed);


        // store name to database
       $this -> attributes['brand_logo'] = $renamed;
        }


		
		}






}	
