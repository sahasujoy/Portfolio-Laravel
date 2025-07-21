<?php

namespace App\Http\Controllers\V1\Admin\Task;

use App\Contracts\Repositories\DefaultLimitRepository;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\LedgerEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\TaskContract;

class TaskController extends Controller
{
    //
    private $taskService;

    public function __construct(TaskContract $taskService)
    {
        $this->taskService = $taskService;
    }
    public function taskView()
    {
        $breadcrumbs = [
            ['link' => "admin/task", 'name' => "Task-Manage"]
        ];
        $pageConfigs = ['pageHeader' => true, 'title' => 'Tasks'];

        $where = ['type' => DEFAULT_LIMIT_PACKAGE_TYPE__DEFAULT ];// 1 =  default
        $select = ['apps_limit', 'monthly_limit'];
//        $defaultLimit = App::make(DefaultLimitRepository::class)->getDefaultLimit($select, $where);
        $clients = Client::orderBy('name')->get();
        return view('admin.task.task-manage', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'clients' => $clients]);
    }

    public function createTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_name' => 'required',
            'duration' => 'required',
            'status' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->toArray()]);
        }

        $response = $this->taskService->registrationTask($request);

        return response()->json($response);
    }

    public function getTask(Request $request)
    {
        if (!$request->ajax()) {
            return $this->redirectFailure('home', 'Direct access is denied.');
        }

        return $this->taskService->getAllTaskDataTable($request);
    }

    public function deleteTask(Request $request)
    {
        if (!$request->ajax()) {
            return $this->redirectFailure('home', 'Direct access is denied.');
        }

        return response()->json($this->taskService->deleteTask($request));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $clients = Client::where('name', 'LIKE', '%' . $query . '%')
            ->select('id', 'name')
            ->limit(10)
            ->get();

        return response()->json($clients);
    }

    // Controller Method
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:clients,name'
        ]);

        $client = Client::create([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => true,
            'client' => $client
        ]);
    }

    public function ledgerEntry(Request $request)
    {
        $request->validate([
            'entry_date'      => 'required|date',
            'entry_type'            => 'required|in:deposit,expense',
            'category'        => 'required|in:bank,cash,general_expense',
            'currency'        => 'required|in:AED,INR,BDT',
            'amount'          => 'required|numeric|min:0',
            'conversion_rate' => 'required|numeric|min:0',
            'client_id'       => 'nullable|exists:clients,id',
            'note'            => 'nullable|string',
        ]);

        $ledgerEntry = LedgerEntry::create([
            'entry_date'      => $request->entry_date,
            'type'            => $request->entry_type,
            'category'        => $request->category,
            'currency'        => $request->currency,
            'amount'          => $request->amount,
            'conversion_rate' => $request->conversion_rate,
            'bdt_amount'      => $request->bdt_amount,
            'client_id'       => $request->client_id,
            'note'            => $request->note,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Ledger entry added successfully!',
            'data' => $ledgerEntry
        ]);
    }

    public function getAllLedgerEntries(Request $request)
    {
        $date = $request->input('entry_date') ?? now()->toDateString();

        $entries = LedgerEntry::with('client')
            ->whereDate('entry_date', $date)
            ->orderBy('id', 'desc')
            ->get();

        $rows = '';
        $totalDeposit = 0;
        $totalExpense = 0;

        foreach ($entries as $entry) {
            $bdt = $entry->amount * $entry->conversion_rate;

            // 🟢 Categorize amount
            if ($entry->type === 'deposit') {
                $totalDeposit += $bdt;
            } elseif ($entry->type === 'expense') {
                $totalExpense += $bdt;
            }

            $rows .= '<tr>
            <td>' . ($entry->client->name ?? '-') . '</td>
            <td>' . $entry->currency . '</td>
            <td>' . number_format($entry->amount, 2) . '</td>
            <td>' . number_format($entry->conversion_rate, 2) . '</td>
            <td class="bdt-cell">' . number_format($bdt, 2) . '</td>
            <td>' . ucfirst($entry->type) . '</td>
            <td>' . ucfirst(str_replace('_', ' ', $entry->category)) . '</td>
            <td>' . ($entry->note ?? '-') . '</td>
            <td>
                <button class="btn btn-sm btn-danger delete-ledger" data-id="' . encrypt($entry->id) . '"><i class="fa fa-trash"></i></button>
            </td>
        </tr>';
        }

        $totalBdt = $totalDeposit - $totalExpense;

        return response()->json([
            'html' => $rows,
            'total_bdt' => number_format($totalBdt, 2)
        ]);
    }


    public function deleteLedger(Request $request)
    {
        try {
            $id = decrypt($request->id);

            $entry = LedgerEntry::findOrFail($id);
            $entry->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Ledger entry deleted successfully.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong. ' . $e->getMessage()
            ]);
        }
    }


}
