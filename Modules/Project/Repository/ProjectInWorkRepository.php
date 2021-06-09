<?php


namespace Modules\Project\Repository;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Balance\Entities\Balance;
use Modules\Balance\Repository\BalanceFrontRepository;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\ProjectCountBay;
use Modules\Project\Entities\ProjectInWork;

class ProjectInWorkRepository
{
    /**
     * @var ProjectInWork
     */
    protected ProjectInWork $model;

    public function __construct(ProjectInWork $project)
    {
        $this->model = $project;
    }

    /**
     * @return ProjectInWork
     */
    public function model(): ProjectInWork
    {
        return $this->model;
    }

    public function add(Request $request)
    {
        $project = ProjectCountBay::where('project_id',$request->get('project_id'))->first();

        if(empty($project->count) or $project->count < 1) return ['error' => trans('project::author.error_project_count')];

        $project->count -= 1;
        if(!$project->update()) return ['error' => trans('project::author.error_project_update')];

        return $this->model->create($request->all());
    }

    public function deleted(Project $project)
    {
        $project_in_work = ProjectInWork::where('project_id',$project->id)
            ->where('status', 'in_work')
            ->where('created_at', '<=', Carbon::now()->addMinutes(-25)->toDateTimeString())
            ->get();
        foreach ($project_in_work as $item){
            $item->delete();
        }
        $projectbay = ProjectCountBay::where('project_id',$project->id)->whereStatus('1')->first();

        foreach ($project_in_work as $item){
            $projectbay->count += 1;
        }
        $projectbay->save();
    }

    /**
     * canceled project in user
     *
     */
    public function refused(Project $project)
    {
        $project_in_work = ProjectInWork::where('project_id',$project->id)
            ->where('status', 'in_work')
            ->where('author_id', auth()->id())
            ->first();
        $project_in_work->update(['status'=>'refused']);
        $projectbay = ProjectCountBay::where('project_id',$project->id)->whereStatus('1')->first();

        $projectbay->count += 1;

        $projectbay->save();
    }

    /**
     * @param array $data
     * @return array
     */
    public function setInCheckProject(array $data)
    {
        $project_in_work = $this->model->where('project_id',$data['project_id'])
            ->where('status', 'in_work')
            ->where('author_id', $data['user_id'])
            ->where('created_at', '>=', Carbon::now()->addMinutes(-25)->toDateTimeString()) //TEST
            ->first();
        if(!$project_in_work) return ['error' => trans('project::author.error_project_update')];
        $data['status'] = 'in_check';
        return $project_in_work->update($data);
    }

    /**
     * @param $project_id
     * @return mixed
     */
    public function getInCheckProject($project_id): mixed
    {
        return $this->model
            ->with([
                'project',
                'project.client',
                'author'
            ])
            ->where('project_id',$project_id)
            ->where('status', 'in_check')
            ->where('client_id', auth()->id())
            ->paginate();
    }

    public function verified($project_id)
    {
        $ptojectInWork = $this->model->where('id', $project_id)->with(['project','project.projectCount','author','author.balances'])->first();
        if(!$ptojectInWork) return false;
        $balance = [
              'amount'          => $ptojectInWork->project->price,
              'user_id'         => $ptojectInWork->author_id,
              'currency_id'     => $ptojectInWork->project->currency_id,
        ];
        if(count($ptojectInWork->author->balances)){
            $balance_results = $ptojectInWork->author->balances;/*Balance::where('user_id',$balance['user_id'])
                                        ->where('currency_id',$balance['currency_id'])
                                        ->update($balance);*/
            $active = false;
            foreach ($balance_results as $item){
                if($item->currency_id == $balance['currency_id']){
                    $active = true;
                    $item->amount += $balance['amount'];
                    $item->save();
                }
            }

            if(!$active){
                $balance_result = Balance::create($balance);
            }else{
                $balance_result = $active;
            }
        }else{
          $balance_result = Balance::create($balance);
        }
        if(!$balance_result) return false;


        return $ptojectInWork->update(['status' => 'verified']);
    }

    public function rejected($project_id)
    {
        $ptojectInWork = $this->model->where('id', $project_id)->with(['project','project.projectCount'])->first();

        if(!$ptojectInWork) return false;
        if(!empty($ptojectInWork->project->projectCount)){
            $ptojectInWork->project->projectCount->count += 1;
            $ptojectInWork->project->projectCount->status = 1;

            $projectCount = $ptojectInWork->project->projectCount->save();
        }else{
            return false; //ERROR
        }

        if(!$projectCount) return false;

        return $ptojectInWork->delete()/*update(['status' => 'verified'])*/;
    }
}
