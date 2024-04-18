<?php

namespace App\Http\Controllers\CMS;

use App\Models\CMS\Logs;
use App\Http\Traits\LogTrait;
use App\Http\Traits\AppTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ILogsRepository;
use App\Repositories\Eloquent\Logs\LogsRepository;

class LogsController extends Controller
{
    use LogTrait, AppTrait;
    public $title, $repository, $table;

    public function __construct(LogsRepository $repository)
    {
        $this->title = 'Logs';
        $this->repository = $repository;
        $this->table = new Logs();
    }

    public function index()
    {
        return view('cms.logs.index', ['title' => $this->title]);
    }

    public function indexAPI()
    {
        $columns = [
            'modulo as Modulo',
            'operacao as Operação',
            DB::raw('SUBSTRING(descricao, 1, 150) as Descrição'),
            DB::raw('to_char(created_at, \'DD/MM/YYYY HH24:MI:SS\') as "Data de Criação"')
        ];

        $formattedColumns = $this->formatColumns($columns);

        return response()->json([
            'content' => $this->table
                ->orderBy('id', 'DESC')
                ->select($formattedColumns)
                ->get(),
            'tableName' => $this->table->getTable()
        ], 200);
    }
}
