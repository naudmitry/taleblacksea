<div class="btn-group">
    <a
        href="{{ route('admin.salt-cave.modal', '') }}/@{{cave.id}}"
        class="btn btn-primary open-salt-cave-modal"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.salt-cave.delete', '') }}/@{{cave.id}}"
        class="btn btn-primary salt-caves-delete"
    ><i class="fas fa-trash"></i></a>
</div>