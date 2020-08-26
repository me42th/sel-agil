<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agility
 * @package App\Models
 * @version August 25, 2020, 9:23 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $costumer
 * @property integer $status
 * @property string $remember_token
 */
class Agility extends Model
{
    use SoftDeletes;

    public $table = 'agiliters';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'costumer',
        'status',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'costumer' => 'string',
        'status' => 'integer',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'costumer' => 'required|string|max:255',
        'status' => 'required|integer',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static function refreshData(){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://eagle-backend-staging.somosagility.com.br/postTeste', [
            'headers'  => [
                'content-type'=> 'application/json'
            ],
            'json' => [
                "key" => "@a5rom#MnW10tW"
            ]
        ]);

        $postAgiliters = json_decode($response->getBody()->getContents());

        $response = $client->request('GET', 'https://eagle-backend-staging.somosagility.com.br/getTeste');
        $getAgiliters = json_decode($response->getBody()->getContents());

        \Log::alert("Inicio da Atualização de Dados");
        $cont = 0;
        $cont+=Agility::newAgiliteres($postAgiliters->user->entries);
        $cont+=Agility::newAgiliteres($getAgiliters->user);
        \Log::alert("Fim da Atualização de Dados - $cont Novos Registros");
    }
    private static function newAgiliteres($agiliters){
        $cont = 0;
        foreach($agiliters as $outerAgiliter){
            if(Agility::where('email',$outerAgiliter->email)->count() > 0){
                continue;
            }
            $cont++;
            $innerAgiliter = new Agility;
            $innerAgiliter->name = $outerAgiliter->name;
            $innerAgiliter->email = $outerAgiliter->email;
            $innerAgiliter->costumer = $outerAgiliter->customer;
            $innerAgiliter->status = $outerAgiliter->status;
            $innerAgiliter->save();
        }
        return $cont;
    }
}
