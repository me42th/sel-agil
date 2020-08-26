<?php

namespace App\Repositories;

use App\Models\Agility;
use App\Repositories\BaseRepository;

/**
 * Class AgilityRepository
 * @package App\Repositories
 * @version August 25, 2020, 9:23 pm UTC
*/

class AgilityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'costumer',
        'status',
        'remember_token'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Agility::class;
    }
}
