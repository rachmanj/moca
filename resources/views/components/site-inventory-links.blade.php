<div class="card">
    <div class="card-header">
        <a href="{{ route('site.inventories.index', ['page' => 'dashboard']) }}"
            class="{{ request()->page == 'dashboard' ? 'active' : '' }}">Dashboard</a>
        |
        <a href="{{ route('site.inventories.index', ['page' => 'list']) }}"
            class="{{ request()->page == 'list' ? 'active' : '' }}">List</a>
    </div>
</div>
