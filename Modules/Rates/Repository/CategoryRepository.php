<?php

namespace Modules\Rates\Repository;

use Modules\Rates\Entities\CategoryRate;
use Modules\Rates\Entities\CategoryRateDecriptions;

class CategoryRepository
{

    /**
     * @var CategoryRate
     */
    protected CategoryRate $model;

    public function __construct(CategoryRate $subject)
    {
        $this->model = $subject;
    }
    /**
     * Store the resource.
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $data['slug'] = \Str::slug($data['categoryDescription'][config('app.locale')]['title']);
        $categoryRate = $this->model->create($data);
        foreach ($data['categoryDescription'] as $item){
            $categoryDescription = new CategoryRateDecriptions($item);
            $categoryRate->categoryDescription()->save($categoryDescription);
        }

        return $categoryRate;
    }

    /**
     * Update the resource.
     * @param CategoryRate $categoryRate
     * @param $data
     * @return CategoryRate
     */
    public function update(CategoryRate $categoryRate, $data): CategoryRate
    {
        $data['slug'] = \Str::slug($data['slug']);
        $categoryRate->update($data);
        foreach ($data['categoryDescription'] as $item){
            $category_description = CategoryRateDecriptions::where('lang_key',$item['lang_key'])->where('category_id', $categoryRate->id)->first();
            if(!$category_description){
                $item['category_id'] = $categoryRate->id;
                app(CategoryRateDecriptions::class)->create($item)->save();
            }else{
                $category_description->update($item);
            }
        }

        return $categoryRate;
    }


    public function getCategoriesAll($not_id = false)
    {
        $categories = false;
        $sql = $this->model->where('active','1')
            ->where('parent_id','0');
        if($not_id){
            $sql->where('id','!=',$not_id);
        }
        $categories = $sql->with([
                'categoryDescription',
                'children.categoryDescription'
            ])
            ->get();
        return $categories;
    }

    public function getListRatesAll($not_id = false)
    {
        $categories = false;
        $sql = $this->model->where('active','1')
            ->where('parent_id','0');
        if($not_id){
            $sql->where('id','!=',$not_id);
        }
        $sql = $sql->with([
                'categoryDescription',
                'children.categoryDescription',
                'rates',
                'rates.rateDescription'
            ])
            ->get();
        return $sql;
    }
}
