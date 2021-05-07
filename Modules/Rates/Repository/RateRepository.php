<?php

namespace Modules\Rates\Repository;

use Modules\Rates\Entities\Rate;
use Modules\Rates\Entities\RateDescription;

class RateRepository
{

    /**
     * Store the resource.
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $rate = Rate::create($data);
        foreach ($data['rateDescription'] as $item){
            $rateDescription = new RateDescription($item);
            $rate->rateDescription()->save($rateDescription);
        }

        return $rate;
    }

    /**
     * Update the resource.
     * @param Rate $rate
     * @param $data
     * @return Rate
     */
    public function update(Rate $rate, $data): Rate
    {
        $rate->update($data);
        foreach ($data['rateDescription'] as $item){
            $rateDescription = RateDescription::where('lang_key',$item['lang_key'])->where('rate_id', $rate->id)->first();
            if(!$rateDescription){
                $item['rate_id'] = $rate->id;
                app(RateDescription::class)->create($item)->save();
            }else{
                $rateDescription->update($item);
            }
        }

        return $rate;
    }

    
}
