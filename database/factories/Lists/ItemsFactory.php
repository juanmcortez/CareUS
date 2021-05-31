<?php

namespace Database\Factories\Lists;

use App\Models\Lists\Items;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Items::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'list_item_type'    => 'parent',
            'list_item_master'  => 'countries',
            'list_item_name'    => 'List of Countries',
            'list_item_value'   => '',
            'list_item_title'   => '',
            'list_item_order'   => 1,
        ];
    }
}
