// vue object
var appMahasiswa = new Vue({
    el: '#divDataMahasiswa',
    data: {
        kdMahasiswaEdit: ''
    },
    methods : {
        tambahMahasiswaAtc : function ()
        {
            $("#modalTambahMahasiswa").modal("show");
            setTimeout(function(){
                document.querySelector("#txtNim").focus();
            }, 500);
        }
    }
});

function setImg(){
    var citraInput = document.querySelector('#txtFoto');
    var preview = document.querySelector('#txtPreviewUpload');
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
        pesanUmumApp('warning', 'Validasi form !!!', 'Harap isi semua field !!!');
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

    return statusValidasi;
}
