<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Repositories\BaseRepository;

/**
 * Class MenuRepository
 * @package App\Repositories
 * @version April 8, 2021, 2:05 am UTC
*/

class MenuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image',
        'description',
        'prise'
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
        return Menu::class;
    }
}
