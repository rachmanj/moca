<div class="card">
    <div class="card-header">
        <a href="{{ route('logistic.inventories.index', ['page' => 'dashboard']) }}"
            class="{{ request()->get('page') == 'dashboard' ? 'active' : '' }}">Dashboard</a>
        | <a href="{{ route('logistic.inventories.index', ['page' => 'list']) }}"
            class="{{ request()->get('page') == 'list' ? 'active' : '' }}">List</a>
    </div>

</div>
