<x-app-layout>
    <x-slot name="header">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Expense</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Expense List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Expense List</h3>
                <div class="card-tools">
                    <a href="{{ route('expense.create') }}" class="btn btn-xs btn-info"> <i class="fas fa-plus"></i>  New Expense </a>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($exprnses as $key => $expense)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ ($expense->type == 1) ?'Income': 'Expenses' }}</td>
                                    <td>{{ date('d-m-Y',strtotime($expense->date)) }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->description }}</td>
                                    <td>
                                        <a href="{{ route('expense.edit',$expense->id) }}" class="badge bg-info badge-p-5" title="Edit">
                                            <span>
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <form action="{{ route('expense.destroy', $expense->id) }}" method="POST" style="display:inline-block;" onclick="return confirm('Are you sure you want to delete this expense?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge bg-danger badge-p-5 border border-0">
                                                <span>
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6"><p class="text-center m-0">No data found !!</p></td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $exprnses->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
</x-app-layout>
