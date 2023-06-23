<td>
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Opsi
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('school.teachers.edit', $data->teacher->id) }}">Edit</a>
            <a class="dropdown-item" href="{{ route('school.gantiPasswordGuru', $data->teacher->id) }}">Ganti Password</a>
            <a type="button" data-toggle="modal" data-target="#kt_modal_delete" data-id='{{ $data->teacher->id }}' class="dropdown-item delete">Hapus</a>
        </div>
    </div>
</td>
