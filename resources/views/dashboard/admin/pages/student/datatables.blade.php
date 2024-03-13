<td>
    <div class="btn-group d-flex justify-content-center flex-column">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Opsi
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('school.students.edit', $student->student->id) }}">Edit</a>
            <a class="dropdown-item" href="{{ route('school.gantiPassword', $student->student->id) }}">Ganti Password</a>
            <a type="button" data-id='{{ $student->student->id }}' class="dropdown-item delete">Hapus</a>
        </div>
    </div>
</td>
