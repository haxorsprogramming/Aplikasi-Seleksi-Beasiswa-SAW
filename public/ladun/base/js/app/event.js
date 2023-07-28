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
        editEventAtc : function (kdEvent)
        {
            let r = server + "app/core/event/api/detail";
            let dr = {'kdEvent':kdEvent}
            axios.post(r, dr).then(function (res){
               if(res.data.status === true){
                   document.querySelector("#txtNamaEventEdit").value = res.data.data.nama_event;
                   document.querySelector("#txtKeteranganEdit").value = res.data.data.keterangan;
                   document.querySelector("#txtKuotaEdit").value = res.data.data.kuota;
                   document.querySelector("#txtTanggalMulaiEdit").value = res.data.data.tanggal_mulai;
                   document.querySelector("#txtTanggalSelesaiEdit").value = res.data.data.tanggal_selesai;
                   $("#modalEditEvent").modal("show");
                   setTimeout(function(){
                       document.querySelector("#txtNamaEventEdit").focus();
                   }, 500);

               }else{
                   pesanUmumApp('warning', 'Failed', res.data.error);
               }
            });
        },
        deleteEventAtc : function (kdEvent)
        {
            confirmQuest('info', 'Konfirmasi', 'Proses hapus event ...?', function (x) {hapusProses(kdEvent)});
        }
    }
});

function prosesTambahEvent()
{

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
        confirmQuest('info', 'Konfirmasi', 'Proses tambah event ...?', function (x) {tambahProses(dr)});
    }
}

function prosesEditEvent()
{
    let namaEvent = document.querySelector("#txtNamaEventEdit").value;
    let keterangan = document.querySelector("#txtKeteranganEdit").value;
    let kuota = document.querySelector("#txtKuotaEdit").value;
    let tglMulai = document.querySelector("#txtTanggalMulaiEdit").value;
    let tglSelesai = document.querySelector("#txtTanggalSelesaiEdit").value;
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
        //confirmQuest('info', 'Konfirmasi', 'Proses tambah event ...?', function (x) {tambahProses(dr)});
    }
}

function tambahProses(dr)
{
    let r = server + "app/core/event/add";
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

function hapusProses(kdEvent)
{
    let r = server + "app/core/event/delete";
    let dr = {'kdEvent':kdEvent}
    axios.post(r, dr).then(function (res){
        let status = res.data.status;
        setTimeout(function(){
            pesanUmumApp('success', 'Sukses', 'Data event berhasil dihapus ..');
            renderPage('app/core/event');
        }, 300);
    });
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
