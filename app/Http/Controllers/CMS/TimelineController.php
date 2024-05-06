<?php

namespace App\Http\Controllers\CMS;

use Exception;
use Illuminate\Http\Request;
use App\Models\CMS\Timeline;
use App\Http\Traits\FileTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\TimelineRequest;
use App\Repositories\Contracts\ITimelineRepository;
use App\Repositories\Eloquent\Timeline\TimelineRepository;

class TimelineController extends Controller
{
    use FileTrait;

    public $title, $repository, $table;

    public function __construct(TimelineRepository $repository)
    {
        $this->title = 'Timeline';
        $this->repository = $repository;
        $this->table = new Timeline();
    }

    public function index()
    {
        return view('cms.timeline.index', ['title' => $this->title]);
    }

    public function indexAPI()
    {
        $user = Auth::user();
        $canEdit = $user ? $user->can('update_timeline') : false;
        $canDelete = $user ? $user->can('delete_timeline') : false;

        return response()->json(
            [
                'content' => $this->table
                    ->orderBy('ordem', "DESC")
                    ->get(
                        [
                            'id',
                            'nome-do-evento as Nome do evento',
                            'ordem as Ordem',
                            'texto as Texto',
                        ]
                    ),
                'tableName' => $this->table->getTable(),
                'perm_edit' => $canEdit,
                'perm_delete' => $canDelete
            ],
            200
        );
    }


    public function create()
    {
        return view('cms.timeline.create', ['title' => $this->title]);
    }

    public function store(TimelineRequest $request)
    {
        try {
            $resultado = $this->repository->upInsert($request);
            if ($resultado) {
                $this->fileSaveDestaque($request, $resultado->id, 'imagem-principal', $this->table->getTable());

                return redirect()
                    ->route('timeline.index', [$resultado])
                    ->with('success', 'Registro cadastro com sucesso');
            }
        } catch (Exception $exception) {
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('cms.timeline.create', [
            'title' => $this->title,
            'data' => $this->table->where('id', $id)->first()
        ]);
    }

    public function update(TimelineRequest $request, $id)
    {
        try {
            if ($this->repository->upInsert($request, $id)) {
                $this->fileSaveDestaque($request, $id, 'imagem-principal', $this->table->getTable());

                return redirect()
                    ->route('timeline.index', [$id])
                    ->with('success', 'Registro cadastro com sucesso');
            }
        } catch (Exception $exception) {
        }
        return redirect()->back();
    }
}