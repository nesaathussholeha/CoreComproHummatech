<button class="btn btn-primary m-0" type="button" data-bs-toggle="modal" data-bs-target="#tambah">
    <i class="fa fa-plus"></i> Buat Testimoni
</button>

<!-- Add Modal -->
<div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="exampleModalLabel">Buat Testimoni</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-bookmark needs-validation" action="#" method="POST" id="bookmark-form" novalidate=""
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="mb-3 mt-0 col-md-12">
                            <label for="bm-title">Foto</label>
                            <input class="form-control" id="formFile" type="file">
                        </div>
                        <div class="mb-3 mt-0 col-md-12">
                            <label for="bm-title">Nama Lengkap</label>
                            <input class="form-control" type="text" required="" autocomplete="name">
                        </div>
                    </div>
                    <div class="mb-3 mt-0 col-md-12">
                        <label for="bm-title">Nama Lengkap</label>
                        <input class="form-control" type="text" required="" autocomplete="name">
                    </div>
                    <div class="mb-3 mt-0 col-md-12">
                        <label for="bm-title">Deskripsi</label>
                        <input class="form-control" type="text" required="" autocomplete="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batalkan</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
