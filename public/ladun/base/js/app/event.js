// vue object
var appProduk = new Vue({
    el : '#divDataEvent',
    data : {
        kdEventEdit : ''
    },
    methods : {
        tambahEventAtc : function()
        {
            $("#modalTambahEvent").modal("show");
            setTimeout(function(){
                document.querySelector("#txtNamaEvent").focus();
            }, 500);
        },
    }
});

function prosesTambahEvent()
{
    let r = server + "app/core/event/add";
    let namaEvent = document.querySelector("#txtNamaEvent").value;
    let keterangan = document.querySelector("#txtKeterangan").value;
    let kuota = document.querySelector("#txtKuota").value;
    let tglMulai = document.querySelector("#txtTanggalMulai").value;
    let tglSelesai = document.querySelector("#txtTanggalSelesai").value;

    let sValidasi = validasiProses(namaEvent, kuota, tglMulai, tglSelesai);

    if(sValidasi === false){
        pesanUmumApp('warning', 'Validasi form !!!', 'Harap isi semua field !!!');
    }else{

        let dr = {
            'nama': namaEvent,
            'keterangan': keterangan,
            'kuota': kuota,
            'tglMulai': tglMulai,
            'tglSelesai':tglSelesai
        }
        confirmQuest('info', 'Konfirmasi', 'Proses tambah event ...?', function (x) {tambahProses(r, dr)});
    }
}

function tambahProses(r, dr)
{
    document.querySelector("#btnTambahEvent").classList.add("disabled");
    axios.post(r, dr).then(function (res){
        let status = res.data.status;
        if(res.data.status === "DOUBLE_NAME"){
            pesanUmumApp('warning', 'Double data', 'Nama event sudah pernah ditambahkan ..');
            document.querySelector("#btnTambahEvent").classList.remove("disabled");
        }else{
            $("#modalTambahEvent").modal("hide");
            setTimeout(function(){
                pesanUmumApp('success', 'Sukses', 'Data event berhasil ditambahkan ..');
                renderPage('app/core/event');
            }, 300);
        }
    });
}

function dimElement(e){

}

function validasiProses(nama, kuota, tglMulai, tglSelesai)
{
    let statusValidasi = true;
    var date1 = new Date(tglMulai);
    var date2 = new Date(tglSelesai);

    var Difference_In_Time = date2.getTime() - date1.getTime();
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

    if(nama.length < 5){
        statusValidasi = false;
    }
    if(kuota === "0"){
        statusValidasi = false;
    }
    if(kuota.length === 0){
        statusValidasi = false;
    }
    if(tglMulai.length === 0){
        statusValidasi = false;
    }
    if(tglSelesai.length === 0){
        statusValidasi = false;
    }
    if(Difference_In_Days < 1){
        statusValidasi = false;
    }
    return statusValidasi;
}
