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
                            <li class="breadcrumb-item active">Add Expense</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Expense</h3>
                <div class="card-tools">
                    <a href="{{ route('expense.index') }}" class="btn btn-xs btn-info"> <i class="fas fa-bars"> </i>  expense List </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('expense.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="title">type <span class="text-danger">*</span></label>
                                <select class="form-control" name="type">
                                    <option value="">Select Type</option>
                                    <option value="1">Income</option>
                                    <option value="2">Expense</option>
                                </select>
                                @error('type')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="file">Date <span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" id="date" />
                                @error('date')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="url">Amount</label>
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="amount.." value="{{ old('amount') }}"  pattern="[0-9]+(\.[0-9]+)?" />
                                @error('amount')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Description...">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-sm btn-success float-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            $(document).ready(function() {
                 $('#amount').on('input', function() {
                    var amount = $(this).val();
                    amount = amount.replace(/[^0-9.]/g, '');
                    $(this).val(amount);
                    if (isNaN(amount) || amount.trim() === '') {
                        $(this).val('');
                    }
                });
            });
        </script>
    @endpush

</x-app-layout>
