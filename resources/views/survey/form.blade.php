<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="ModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHead">Tambah Data Survey</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formSurvey">


                @if ($mode == "create")
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input required type="text" name="nama"class="form-control" placeholder="Nama">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" name="nik"class="form-control" placeholder="NIK">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir"class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <select name="pendidikan_terakhir" class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Sarjana">Sarjana</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pengeluaran (Listrik dan Air)</label>
                                    <input name="pengeluaran" type="number" name="penulis"class="form-control">
                                </div>
                            </div>
                    </div>
                    <input type="hidden" name="status" value="Menunggu Verifikasi">
                @else

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input value="{{$data->nama}}" required type="text" name="nama"class="form-control" placeholder="Nama">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NIK</label>
                            <input value="{{$data->nik}}" type="text" name="nik"class="form-control" placeholder="NIK">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input value="{{$data->tanggal_lahir}}" type="date" name="tanggal_lahir"class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                <option selected disabled>--Pilih Pendidikan Terakhir--</option>
                                <option {{ $data->jenis_kelamin == "Laki-laki" ? 'selected' : '' }} value="Laki-laki">Laki-laki</option>
                                <option {{ $data->jenis_kelamin == "Perempuan" ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pendidikan Terakhir</label>
                            <select name="pendidikan_terakhir" class="form-control" id="exampleFormControlSelect1">
                                <option selected disabled>--Pilih Pendidikan Terakhir--</option>
                                <option {{ $data->pendidikan_terakhir == "SD" ? 'selected' : '' }} value="SD">SD</option>
                                <option {{ $data->pendidikan_terakhir == "SMP" ? 'selected' : '' }} value="SMP">SMP</option>
                                <option {{ $data->pendidikan_terakhir == "SMA" ? 'selected' : '' }} value="SMA">SMA</option>
                                <option {{ $data->pendidikan_terakhir == "Diploma" ? 'selected' : '' }} value="Diploma">Diploma</option>
                                <option {{ $data->pendidikan_terakhir == "Sarjana" ? 'selected' : '' }} value="Sarjana">Sarjana</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pengeluaran (Listrik dan Air)</label>
                            <input value="{{$data->pengeluaran}}" name="pengeluaran" type="number" name="penulis"class="form-control">
                        </div>
                    </div>
                </div>
                    <input type="hidden" name="status" value="{{$data->status}}">
                    <input type="hidden" name="id" value="{{$data->id}}">
                @endif

            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-save">Save changes</button>
        </div>
      </div>
    </div>
</div>
