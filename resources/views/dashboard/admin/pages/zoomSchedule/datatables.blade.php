<td>
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Opsi
        </button>
        <div class="dropdown-menu"><a class="dropdown-item"
                                      href="{{ route('admin.zoom-schedules.edit', $data->id) }}">Edit</a><a type="button"
                                                                                                           data-toggle="modal"
                                                                                                           data-target="#kt_modal_delete"
                                                                                                           data-id='{{ $data->id }}'
                                                                                                           class="dropdown-item delete">Hapus</a>
        </div>
    </div>
</td>
