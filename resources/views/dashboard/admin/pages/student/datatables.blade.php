<td>
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Opsi
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('school.students.edit', $data->student->id) }}">Edit</a>
            <a class="dropdown-item" href="{{ route('school.gantiPassword', $data->student->id) }}">Ganti Password</a>
            <a type="button" data-id='{{ $data->student->id }}' class="dropdown-item delete">Hapus</a>
        </div>
    </div>
</td>
