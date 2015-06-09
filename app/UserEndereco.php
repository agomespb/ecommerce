<?php namespace AGCommerce;

use Illuminate\Database\Eloquent\Model;

class UserEndereco extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_enderecos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'cep', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'uf'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('AGCommerce\User');
    }

}
