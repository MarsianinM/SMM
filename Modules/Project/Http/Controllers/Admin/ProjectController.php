<?php

namespace Modules\Project\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;
use Modules\Project\Repository\ProjectAdminRepository;

class ProjectController extends Controller
{
    private ProjectAdminRepository $rep;

    public function __construct(ProjectAdminRepository $rep)
    {
        $this->rep = $rep;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $projects = Project::with('client')->paginate('5');

        return view('project::admin.index',[
            'projects' => $projects
        ]);
    }
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $model = Project::with('client');

        return \DataTables::eloquent($model)
            ->addColumn('client_name', function (Project $project) {
                return $project->client_name;
            })
            ->addColumn('small_description', function (Project $project) {
                return $project->small_description;
            })
            ->editColumn('updated_at', function (Project $project) {
                return $project->date_start_and_finish;
            })
            ->addColumn('action', function (Project $project) {
                return '<div class="btn-group" role="group" aria-label="Basic example">
                            <a href="'.route('admin.project.edit', $project->id).' " class="btn btn-secondary btn-success"
                               data-toggle="tooltip" data-html="true"
                               data-original-title="'.trans('project::project.action_edit', ['Id' => $project->id]).'">
                                <i class="c-icon c-icon-1xl cil-pen"></i>
                            </a>
                            <button form="form-id_{{ $item->id }}" class="btn btn-secondary btn-danger"
                                    type="submit"
                                    data-toggle="tooltip" data-html="true"
                                    data-original-title="@lang(\'project::project.action_delete\', [\'Id\' => $item->id])">
                                <i class="c-icon c-icon-1xl cil-delete"></i>
                            </button>
                            <form id="form-id_{{ $item->id }}" action="'.route('admin.project.destroy', ['project' => $project->id]).'" method="POST">
                                '.csrf_field().'
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </div>';
            })
            ->escapeColumns([])
            ->toJson();

    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('project::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('project::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('project::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
