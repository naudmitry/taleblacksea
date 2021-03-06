<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DiagnosisRequest;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DiagnosisController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $diagnosisQuery = Diagnosis::with('author')->get();

        $counters =
            [
                'count' => (clone $diagnosisQuery)->count(),
                'enabled_count' => (clone $diagnosisQuery)->where('is_enabled', true)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($diagnosisQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.diagnoses.index', compact('counters'));
    }

    /**
     * @param Diagnosis $diagnosis
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Diagnosis $diagnosis)
    {
        $diagnosis->delete();

        return response()->json([
            'message' => 'Диагноз удален.'
        ]);
    }

    /**
     * @param DiagnosisRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(DiagnosisRequest $request)
    {
        $diagnosis = new Diagnosis();
        $diagnosis->author_id = \Auth::guard('admin')->user()->id;
        $diagnosis->title = $request->get('title');
        $diagnosis->count_visits = $request->filled('count_visits') ? $request->get('count_visits') : null;
        $diagnosis->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create()
    {
        $diagnosis = null;

        return response()->json([
            'view' => view('main_admin.diagnoses.modals.edit', compact(
                'diagnosis'
            ))->render(),
        ]);
    }

    /**
     * @param Diagnosis $diagnosis
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(Diagnosis $diagnosis)
    {
        return response()->json([
            'view' => view('main_admin.diagnoses.modals.edit', compact(
                'diagnosis'
            ))->render(),
        ]);
    }

    /**
     * @param Diagnosis $diagnosis
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Diagnosis $diagnosis)
    {
        $diagnosis->is_enabled = !$diagnosis->is_enabled;
        $diagnosis->update();

        return response()->json([
            'message' => 'Доступность успешно изменена.',
        ]);
    }

    /**
     * @param Request $request
     * @param Diagnosis $diagnosis
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Diagnosis $diagnosis)
    {
        $diagnosis->title = $request->get('title');
        $diagnosis->count_visits = $request->filled('count_visits') ? $request->get('count_visits') : null;
        $diagnosis->update();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }
}
