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
        'alamat':alamat
    }


    let citraData = document.querySelector("#txtPreviewUpload").getAttribute("src");
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

    return statusValidasi;
}
