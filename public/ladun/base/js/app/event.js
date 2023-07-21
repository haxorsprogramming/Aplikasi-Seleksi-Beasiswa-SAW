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

    if(namaEvent.length < 5 || kuota === "0" || kuota.length === 0){
        pesanUmumApp('warning', 'Validasi form !!!', 'Harap isi semua field !!!');
    }else{
        let dr = {
            'nama': namaEvent,
            'keterangan': keterangan,
            'kuota': kuota,
            'tglMulai': tglMulai,
            'tglSelesai':tglSelesai
        }
        axios.post(r, dr).then(function (res){
            console.log(res.data);
        });
    }
}
