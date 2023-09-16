// vue object
var appMahasiswa = new Vue({
    el: "#divDataMahasiswa",
    data: {
        kdMahasiswaEdit: ""
    },
    methods : {
        tambahMahasiswaAtc : function ()
        {
            $("#modalTambahMahasiswa").modal("show");
            setTimeout(function(){
                document.querySelector("#txtNim").focus();
            }, 500);
        },
        editEventAtc : function (nim){
            appMahasiswa.kdMahasiswaEdit = nim
            let r = server + "app/core/mahasiswa/api/detail";
            let dr = {'nim':nim}
            axios.post(r, dr).then(function (res){
                if(res.data.status === true){
                    let imgPath = server + "file_upload/foto_mahasiswa/"+res.data.data.nim+".jpg"
                    document.querySelector("#txtPreviewUploadEdit").setAttribute("src",imgPath);
                    document.querySelector("#txtNimEdit").value = res.data.data.nim;
                    document.querySelector("#txtNikEdit").value = res.data.data.nik;
                    document.querySelector("#txtNamaEdit").value = res.data.data.nama_lengkap;
                    document.querySelector("#txtTempatLahirEdit").value = res.data.data.tempat_lahir;
                    document.querySelector("#txtTanggalLahirEdit").value = res.data.data.tanggal_lahir;
                    document.querySelector("#txtJurusanEdit").value = res.data.data.jurusan;
                    document.querySelector("#txtHpEdit").value = res.data.data.nomor_handphone;
                    document.querySelector("#txtEmailEdit").value = res.data.data.email;
                    document.querySelector("#txtUsernameEdit").value = res.data.data.username;
                    document.querySelector("#txtAlamatEdit").value = res.data.data.alamat;
                    $("#modalEditMahasiswa").modal("show");

                }
            });
        },
        deleteEventAtc : function (nim){
            confirmQuest("info", "Konfirmasi", "Proses hapus data mahasiswa ...?", function (x) {hapusProses(nim)});
        }
    }
});

function hapusProses(nim)
{
    let r = server + "app/core/mahasiswa/delete";
    let dr = {'nim':nim}
    axios.post(r, dr).then(function (res){
        if(res.data.status === true){
            setTimeout(function(){
                pesanUmumApp("success", "Sukses", "Data mahasiswa berhasil dihapus ..");
                renderPage("app/core/mahasiswa");
            }, 300);
        }else{
            pesanUmumApp("warning", res.data.code, res.data.msg);
        }
    });
}

function setImg(){
    var citraInput = document.querySelector("#txtFoto");
    var preview = document.querySelector("#txtPreviewUpload");
    var fileGambar = new FileReader();
    fileGambar.readAsDataURL(citraInput.files[0]);
    fileGambar.onload = function(e){
        preview.src = e.target.result;
    }
    console.log("image ready to upload");
}
function preTambahMahasiswa()
{
    let nim = document.querySelector("#txtNim").value;
    let nik = document.querySelector("#txtNik").value;
    let nama = document.querySelector("#txtNama").value;
    let tempatLahir = document.querySelector("#txtTempatLahir").value;
    let tanggalLahir = document.querySelector("#txtTanggalLahir").value;
    let jurusan = document.querySelector("#txtJurusan").value;
    let hp = document.querySelector("#txtHp").value;
    let email = document.querySelector("#txtEmail").value;
    let username = document.querySelector("#txtUsername").value;
    let alamat = document.querySelector("#txtAlamat").value;
    let citraData = document.querySelector("#txtPreviewUpload").getAttribute("src");

    let sValidasi = validasiProses(nim, nik, nama, tempatLahir, tanggalLahir, jurusan, hp, email, username, alamat);

    if(sValidasi === false){
        pesanUmumApp("warning", "Validasi form !!!", "Harap isi semua field !!!");
    }else{
        let ds = {
            'nim':nim,
            'nik':nik,
            'nama':nama,
            'tempatLahir':tempatLahir,
            'tanggalLahir':tanggalLahir,
            'jurusan':jurusan,
            'hp':hp,
            'email':email,
            'username':username,
            'alamat':alamat,
            'fotoProfil':citraData
        }

        confirmQuest('info', 'Konfirmasi', 'Proses tambah mahasiswa ...?', function (x) {tambahProses(ds)});
    }

}

function tambahProses(ds)
{
    let r = server + "app/core/mahasiswa/add";
    axios.post(r, ds).then(function (res){
        $("#modalTambahMahasiswa").modal("hide");
        setTimeout(function(){
            pesanUmumApp(res.data.status === true ? 'success' : 'warning', res.data.code, res.data.msg);
            renderPage('app/core/mahasiswa');
        }, 300);
    });
}

function validasiProses(nim, nik, nama, tempatLahir, tanggalLahir, jurusan, hp, email, username, alamat)
{
    let statusValidasi = true;

    let picDefault = server + "/ladun/base/default-user-profile-picture.jpg";
    let picNow = document.querySelector("#txtPreviewUpload").getAttribute("src");

    if(nim.length < 1){
        statusValidasi = false;
    }
    if(nik.length < 1){
        statusValidasi = false;
    }
    if(nama.length < 1){
        statusValidasi = false;
    }
    if(tempatLahir.length < 1){
        statusValidasi = false;
    }
    if(tanggalLahir.length < 1){
        statusValidasi = false;
    }
    if(jurusan === "none"){
        statusValidasi = false;
    }
    if(hp.length < 5){
        statusValidasi = false;
    }
    if(email.length < 4){
        statusValidasi = false;
    }
    if(username.length < 4){
        statusValidasi = false;
    }
    if(alamat.length < 0){
        statusValidasi = false;
    }
    if(picDefault === picNow){
        statusValidasi = false;
    }

    return statusValidasi;
}
