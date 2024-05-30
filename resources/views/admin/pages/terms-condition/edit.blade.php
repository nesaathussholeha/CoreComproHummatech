@extends('admin.layouts.app')

@section('content')
<div class=" p-1">
    <div class="card border-0 shadow-bar p-3 mt-3">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h4 class="m-2">Sarat & Ketentuan</h4>
            </div>
        </div>
    </div>
</div>
<div class="p-1">
    <div class="card border-0 shadow-bar p-3 mt-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-primary" type="button">Edit</button>
                    <button class="btn btn-danger" type="button">Cancel</button>
                </div>
                <div class="m-2">
                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="fw-semibold">Syarat</label>
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control" name="" value="" placeholder="Masukkan syarat" id="">
                                <button style="background-color: #dc354629; color: #DC3545" class="btn btn-sm m-0" type="button"><i class="fa fa-trash-o fw-bold"></i></button>
                            </div>

                            <button class="btn btn-primary btn-sm mt-2" type="button">Tambah Baris</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
