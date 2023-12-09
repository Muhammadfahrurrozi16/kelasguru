<form action="{{ route('mapel.destroy', $mapels->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Kamu yakin untuk menghapus {{ $mapels->nama_mapel }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-outline-danger">Ya.hapus</button>
    </div>
</form>
