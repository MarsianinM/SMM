<?php

namespace Modules\Subjects\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subjects\Entities\Subject;
use Modules\Subjects\Http\Requests\CreateSubjectRequest;
use Modules\Subjects\Http\Requests\EditeSubjectRequest;
use Modules\Subjects\Repository\SubjectRepository;

class SubjectController extends Controller
{

    private SubjectRepository $rep;

    public function __construct(SubjectRepository $rep)
    {
        $this->rep = $rep;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('subjects::admin.index');
    }


    /**
     * Process datatables ajax request.
     * @return JsonResponse
     */
    public function anyData(): JsonResponse
    {
        $model = Subject::select();

        return \DataTables::eloquent($model)
            ->addColumn('title', function (Subject $subject) {
                return $subject->subject_title_current_lang;
            })
            ->editColumn('updated_at', function (Subject $subject) {
                return $subject->created_date;
            })
            ->addColumn('action', function (Subject $subject) {
                return '<div>
                            <label class="c-switch c-switch-label c-switch-opposite-primary"
                                   data-toggle="tooltip" data-html="true"
                                   data-original-title="'.trans('subjects::subject.action_off_on', ['Id' => $subject->id]).'">
                                <input class="c-switch-input" type="checkbox"  '.($subject->active == 1 ? 'checked' : '') .'>
                                <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                            </label>

                            <form id="form_show-id_'.$subject->id.'" action="'. route('admin.subject.hidden', ['subject' => $subject->id]) .'" method="POST">
                                '.csrf_field().'
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" value="'.$subject->active.'" name="active" />
                                <input type="submit" id="sendButton" style="display: none;" />
                            </form>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="'.route('admin.subject.edit', $subject->id).' " class="btn btn-secondary btn-success"
                               data-toggle="tooltip" data-html="true"
                               data-original-title="'.trans('subjects::subject.action_edit', ['Id' => $subject->id]).'">
                                <i class="c-icon c-icon-1xl cil-pen"></i>
                            </a>
                            <button form="form-id_'. $subject->id .'" class="btn btn-secondary btn-danger"
                                    type="submit"
                                    data-toggle="tooltip" data-html="true"
                                    data-original-title="'.trans('subjects::subject.action_delete', ['Id' => $subject->id]).'">
                                <i class="c-icon c-icon-1xl cil-delete"></i>
                            </button>
                            <form id="form-id_'.$subject->id.'" action="'.route('admin.subject.destroy', ['subject' => $subject->id]).'" method="POST">
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
        return view('subjects::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateSubjectRequest $request
     * @return RedirectResponse
     */
    public function store(CreateSubjectRequest $request): RedirectResponse
    {
        $subject = $this->rep->store($request->all());
        return redirect()->route('admin.subject.edit',$subject->id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Subject $subject
     * @return Renderable
     */
    public function edit(Subject $subject): Renderable
    {
        return view('subjects::admin.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     * @param EditeSubjectRequest $request
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function update(EditeSubjectRequest $request, Subject $subject): RedirectResponse
    {
        $this->rep->update($subject, $request->all());
        return redirect()->back();
    }


    public function hidden(Subject $subject, Request $request): RedirectResponse
    {
        $this->rep->update($subject, $request->all());
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function destroy(Subject $subject): RedirectResponse
    {
        $id = $subject->id;
        try {
            $subject->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(trans('subjects::subject.delete_error'));
        }
        return redirect()->back()->with(['success' => trans('subjects::subject.delete', ['ID' => $id])]);
    }
}
