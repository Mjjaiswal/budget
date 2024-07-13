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
                            <li class="breadcrumb-item"><a href="{{ route('exprnseReport') }}">Expense Report</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('exprnseReport') }}">
                    <div class="row">
                        <div class="col-sm-3">
                            <select class="form-control" name="type">
                                <option value="">Select Type</option>
                                <option value="1" {{ (request('type') == 1) ? 'selected' :'' }}>Incomes</option>
                                <option value="2" {{ (request('type') == 2) ? 'selected' :'' }}>Expenses</option>
                            </select>
                        </div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <button class="btn btn-primary float-right ml-2">Filter</button>
                            <a href="{{ route('export') }}" class="btn btn-info float-right ml-2">Export</a>
                            <a href="{{ route('exprnseReport') }}" class="btn btn-danger float-right">Reset</a>
                        </div>
                    </div>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($exprnses) && count($exprnses) > 0)
                            @foreach($exprnses as $key => $expense)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ ($expense->type == 1) ?'Income': 'Expenses' }}</td>
                                    <td>{{ date('d-m-Y',strtotime($expense->date)) }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->description }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6"><p class="text-center m-0">No data found !!</p></td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $exprnses->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
</x-app-layout>
