<form action="{{ route('user.destroy', $users->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Kamu yakin untuk menghapus {{ $users->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-outline-danger">Ya.hapus</button>
    </div>
</form>
