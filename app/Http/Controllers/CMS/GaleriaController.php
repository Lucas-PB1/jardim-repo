<?php

namespace App\Http\Controllers\CMS;

use Exception;
use App\Models\CMS\Galeria;
use Illuminate\Http\Request;
use App\Http\Traits\AppTrait;
use App\Http\Traits\FileTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\GaleriaRequest;
use App\Repositories\Contracts\IGaleriaRepository;
use App\Repositories\Eloquent\Galeria\GaleriaRepository;

class GaleriaController extends Controller
{
    use AppTrait, FileTrait;

    public $title, $repository, $table;

    public function __construct(GaleriaRepository $repository)
    {
        $this->title = 'Galeria';
        $this->repository = $repository;
        $this->table = new Galeria();
    }

    public function index()
    {
        return view('cms.galeria.index', ['title' => $this->title]);
    }

    public function indexAPI()
    {
        $user = Auth::user();
        $canEdit = $user ? $user->can('update_galeria') : false;
        $canDelete = $user ? $user->can('delete_galeria') : false;

        $columns = [
            'id',
            'nome-da-galeria as Nome da Galeria'
        ];

        $formattedColumns = $this->formatColumns($columns);

        return response()->json([
            'content' => $this->table
                ->orderBy('id', 'DESC')
                ->select($formattedColumns)
                ->get(),
            'tableName' => $this->table->getTable(),
            'perm_edit' => $canEdit,
            'perm_delete' => $canDelete
        ], 200);
    }

    public function create()
    {
        return view('cms.galeria.create', ['title' => $this->title]);
    }

    public function store(GaleriaRequest $request)
    {
        try {
            $request->merge(['slug' => slug_fix($request->{'nome-da-galeria'})]);

            $resultado = $this->repository->upInsert($request);
            if ($resultado) {
                $this->fileSaveDestaque($request, $resultado->id, 'imagem-principal', $this->table->getTable());

                return redirect()
                    ->route('galeria.edit', $resultado->id)
                    ->with('success', 'Registro cadastro com sucesso');
            }
        } catch (Exception $exception) {
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('cms.galeria.create', [
            'title' => $this->title,
            'data' => $this->table->where('id', $id)->first()
        ]);
    }

    public function update(GaleriaRequest $request, $id)
    {
        try {
            if ($this->repository->upInsert($request, $id)) {
                $this->fileSaveDestaque($request, $id, 'imagem-principal', $this->table->getTable());

                return redirect()
                    ->route('galeria.index')
                    ->with('success', 'Registro cadastro com sucesso');
            }
        } catch (Exception $exception) {
        }
        return redirect()->back();
    }
}