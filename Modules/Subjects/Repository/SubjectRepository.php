<?php

namespace Modules\Subjects\Repository;

use Modules\Rates\Entities\Rate;
use Modules\Rates\Entities\RateDescription;
use Modules\Subjects\Entities\Subject;

class SubjectRepository
{

    /**
     * Store the resource.
     * @param array $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return Subject::create($data);
    }

    /**
     * @param Subject $subject
     * @param $data
     * @return bool
     */
    public function update(Subject $subject, $data): bool
    {
        return $subject->update($data);
    }
}
