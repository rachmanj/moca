<div class="card">
    <div class="card-header">
        <a href="{{ route('master.ito.index', ['page' => 'dashboard']) }}"
            class={{ request()->get('page') == 'dashboard' ? 'active' : '' }}>Dashboard</a>
        |
        <a href="{{ route('master.ito.index', ['page' => 'upload']) }}"
            class={{ request()->get('page') == 'upload' ? 'active' : '' }}>Upload</a>
    </div>
</div>
