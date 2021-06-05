<?php


namespace Modules\ProjectVip\Database\factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\ProjectVip\Entities\ProjectVipTariff;

class ProjectVipTariffFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectVipTariff::class;

    public function definition(): array
    {
        return [
                'amount'            => 0.5,
                'currency_id'       => 1,
                'days'              => 1,
            ];
            /*[
                'amount'            => 1.5,
                'currency_id'       => 1,
                'days'              => 5,
            ],
            [
                'amount'            => 2,
                'currency_id'       => 1,
                'days'              => 10,
            ],
            [
                'amount'            => 5,
                'currency_id'       => 1,
                'days'              => 30,
            ],*/
    }
}
