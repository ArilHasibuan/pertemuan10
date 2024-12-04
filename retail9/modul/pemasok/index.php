<div class="border-bottom d-flex justify-content-between py-3">
    <h4>Data Pemasok</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="bi bi-plus-circle me-1"></i> Tambah Pemasok</button>
    
    <!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pemasok</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="modul/pemasok/proses.php?aksi=tambah" method="post">
          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label" for="namapemasok">Nama Pemasok</label>
                <input class="form-control"type="text" name="namapemasok" placeholder="Masukkan Nama Pemasok" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat">Alamat</label>
                <input class="form-control"type="text" name="alamat" placeholder="Masukkan Alamat Pemasok" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="telepon">Telepon</label>
                <input class="form-control"type="number" name="telepon" placeholder="Masukkan No.telp Pemasok" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status">Status</label>
                <select class="form-select" name="status" id="">
                <option value="" selected disabled>Pilih Status</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
                </select>
            </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<table id="myTable">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Pemasok</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Telepon</th>
            <th class="text-center">Status</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql_pemasok = "SELECT * FROM pemasok ORDER BY id_pemasok ASC";
        $result_pemasok = $mysqli->query($sql_pemasok);
        $no = 0;
        while($row_pemasok = $result_pemasok->fetch_assoc()) {
        $no++;
        ?>
        <tr>
            <td class="text-center"><?= $no; ?></td>
            <td class="text-center"><?= $row_pemasok['nama_pemasok']; ?></td>
            <td class="text-center"><?= $row_pemasok['alamat']; ?></td>
            <td class="text-center"><?= $row_pemasok['telepon']; ?></td>
            <td class="text-center"><span class="badge <?= $row_pemasok['status']== 1?'text-bg-success':'text-bg-danger';?>"><?= $row_pemasok['status'] == 1?'Aktif':'Tidak Aktif'; ?></span></td>
            
            <td class="text-center">
                <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row_pemasok['id_pemasok'];?>" class="text-info"><i class="bi bi-pencil text-warning "></i></a>
                
                <div class="modal fade" id="modalEdit<?=$row_pemasok['id_pemasok']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pemasok</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="modul/pemasok/proses.php?aksi=edit&id=<?=$row_pemasok['id_pemasok'];?>" method="post">
          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label" for="namapemasok">Nama Pemasok</label>
                <input class="form-control"type="text" name="namapemasok" placeholder="Masukkan Nama Pemasok" value="<?=$row_pemasok['nama_pemasok']?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat">Alamat</label>
                <input class="form-control"type="text" name="alamat" placeholder="Masukkan Alamat Pemasok" value="<?=$row_pemasok['alamat']?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="telepon">Telepon</label>
                <input class="form-control"type="number" name="telepon" placeholder="Masukkan No.telp Pemasok" value="<?=$row_pemasok['telepon']?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status">Status</label>
                <select class="form-select" name="status" id="">
                <option value="" selected disabled>Pilih Status</option>
                <option value="1" <?=$row_pemasok['status']==1?'selected':'';?>>Aktif</option>
                <option value="0" <?=$row_pemasok['status']==0?'selected':'';?>>Tidak Aktif</option>
                </select>
            </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-warning">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
        <!--hapus-->

                <a href="" data-bs-toggle="modal" data-bs-target="#modalHapus<?=$row_pemasok['id_pemasok'];?>">
                    <i class="bi bi-trash3 text-danger"></i></a>
                    <!-- Modal -->
                <div class="modal fade" id="modalHapus<?=$row_pemasok['id_pemasok'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Pemasok</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin akan menghapus data pemasok <?=$row_pemasok['nama_pemasok'];?>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="modul/pemasok/proses.php?aksi=hapus&id=<?=$row_pemasok['id_pemasok'];?>" method="post">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                     </form>
                    </div>
                    </div>
                </div>
                </div>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>