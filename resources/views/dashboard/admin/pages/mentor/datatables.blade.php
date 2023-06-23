<td>
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Opsi
        </button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('admin.mentors.edit', $data->id) }}">Edit</a>
        <a class="dropdown-item" href="{{ route('admin.gantiPasswordMentor', $data->id) }}">Ganti Password</a>
        <a type="button" data-toggle="modal" data-target="#kt_modal_delete" data-id='{{ $data->id }}' class="dropdown-item delete">Hapus</a>
        </div>
    </div>
</td>
