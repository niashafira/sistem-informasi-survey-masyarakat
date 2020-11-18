
@extends('layouts.index')

@section('title')
    List Data Survey
@endsection

@section('content')
    <h3> Data Survey </h3>
    @if (Session::get('role') == "Surveyor")
        <button id="btnTambah" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Survey</button><br><br>
    @endif
    <table id="tableSurvey" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>Nama</th>
            <th>NIK</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Pendidikan Terakhir</th>
            <th>Pengeluaran (Air dan Listrk)</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data_survey as $survey)
        <tr>
            <td>{{ $survey->nama }}</td>
            <td>{{ $survey->nik }}</td>
            <td>{{ $survey->tanggal_lahir }}</td>
            <td>{{ $survey->jenis_kelamin }}</td>
            <td width="5%">{{ $survey->pendidikan_terakhir }}</td>
            <td width="5%">{{ $survey->pengeluaran }}</td>
            <td width="5%"><span class="badge badge-{{ $survey->status == "Diverifikasi" ? 'success' : 'warning' }}">{{ $survey->status }}</span></td>
            <td>
                @if (Session::get('role') == "Surveyor" && $survey->status != "Diverifikasi")
                    <button class="btn btn-warning btn-edit btn-sm" id="{{$survey->id}}"><i class="fa fa-pencil"></i> Edit</button>
                    <button class="btn btn-danger btn-delete btn-sm" id="{{ $survey->id }}"><i class="fa fa-trash"></i> Delete</button>
                @elseif (Session::get('role') == "Moderator" && $survey->status == "Menunggu Verifikasi")
                    <button class="btn btn-success btn-verifikasi btn-sm" id="{{ $survey->id }}"><i class="fa fa-check"></i> Verifikasi</button>                        
                @endif
            </td>
        </tr>  
        @endforeach
        </tbody>
    </table>

    <div id="sectionModal">
        @include('survey.form')
    </div>

@endsection

@section('script')
    <script>
        var mode = "create";
        $(document).ready(function(){
            $('#tableSurvey').DataTable();
        })

        $("#btnTambah").click(function(){
            $('#formSurvey').trigger("reset");
            var mode = "create";
            $("#ModalForm").modal("show");

        });

        $(document).on("click", ".btn-save", function(){
            var data = $("#formSurvey").serialize();
            var url = "";

            if(mode == "create"){
                url = "/survey/create";
            }
            else {
                url = "/survey/update";
            }
            $.ajax({
                url: url,
                type: 'post',
                data: data,
                dataType: 'json',
                success:function(res){
                    if (res == "success") {
                        alert("Data Berhasil Disimpan");
                        location.reload();
                    }
                }
            })
        });

        $(".btn-edit").click(function(){
            mode = "edit";
            var id = $(this).attr("id");
            $.ajax({
                url: 'survey/edit',
                type: 'post',
                data: {id:id},
                success:function(res){
                    $("#sectionModal").html(res);
                    $("#ModalForm").modal("show");
                }
            })
        });

        $(".btn-delete").click(function(){
            var id = $(this).attr("id");

            if (confirm("Apakah anda yakin ?")) {
                $.ajax({
                    url: 'survey/delete',
                    type: 'post',
                    data: {id:id},
                    dataType: 'json',
                    success:function(res){
                        alert("Data Berhasil Dihapus");
                        location.reload();
                    }
                })
            }
        })

        $(".btn-verifikasi").click(function(){
            var id = $(this).attr("id");
            if (confirm("Apakah anda yakin ?")) {
                $.ajax({
                    url: 'survey/verifikasi',
                    type: 'post',
                    data: {id:id},
                    dataType: 'json',
                    success:function(res){
                        alert("Data Berhasil Diverifikasi");
                        location.reload();
                    }
                })
            }
        });
    </script>
@endsection