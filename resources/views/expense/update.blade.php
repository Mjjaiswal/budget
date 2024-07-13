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
                            <li class="breadcrumb-item active">Update Expense</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update Expense</h3>
                <div class="card-tools">
                    <a href="{{ route('expense.index') }}" class="btn btn-xs btn-info"> <i class="fas fa-bars"> </i>  expense List </a>
                    <a href="{{ route('expense.index') }}" class="btn btn-xs btn-secondary"> <i class="fas fa-plus"> </i> Add Slider </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('expense.update',$expense->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="title">type <span class="text-danger">*</span></label>
                                <select class="form-control" name="type">
                                    <option value="">Select Type</option>
                                    <option value="1" {{ ($expense->type == 1)?'selected': ''}}>Income</option>
                                    <option value="2" {{ ($expense->type == 2)?'selected': '' }}>Expense</option>
                                </select>
                                @error('type')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="file">Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" id="date" value="{{ $expense->date }}" />
                                @error('date')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="url">Amount</label>
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="amount.." value="{{ $expense->amount }}" pattern="[0-9]+(\.[0-9]+)?" />
                                @error('amount')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Description...">{{ $expense->description }}</textarea>
                                @error('description')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-sm btn-success float-right">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
