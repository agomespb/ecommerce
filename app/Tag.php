<?php namespace AGCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany('AGCommerce\Product');
    }

    /**
     * @return array
     */
    public function scopeOfCheckTags($qualquercoisa, $array_tags)
    {
        $array = [];

        foreach($array_tags as $name_tag){

            $check = $this->where('name', '=', $name_tag)->get();

            if( count($check) ){
                $array[] = $check->first()->id;
            } else {
                $new_tag = $this->create(['name'=>$name_tag]);
                $array[] = $new_tag->id;
            }
        }

        return $array;
    }


}
