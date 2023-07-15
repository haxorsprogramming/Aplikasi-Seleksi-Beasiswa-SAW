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
        editAtc : function(idProduk)
        {
            editProduk(idProduk);
        },
        prosesUpdateProdukAtc : function()
        {
            let kdProduk = appProduk.kdProdukEdit;
            let nama = document.querySelector("#txtNamaProdukEdit").value;
            let harga = document.querySelector("#txtHargaEdit").value;
            let kategori = document.querySelector("#txtKategoriEdit").value;
            let ds = {'kdProduk':kdProduk, 'nama':nama, 'harga':harga, 'kategori':kategori}
            axios.post(rProsesUpdateProduk, ds).then(function(res){
                $("#modalEditProduk").modal("hide");
                setTimeout(function(){
                    pesanUmumApp('success', 'Sukses', 'Data produk berhasil diupdate');
                    renderPage('app/produk/data');
                }, 300);
            });
        },
        deleteAtc : function(idProduk)
        {
            confirmQuest('info', 'Konfirmasi', 'Hapus produk ...?', function (x) {deleteConfirm(idProduk)});
        },
        importProdukAtc : function()
        {
            $("#modalImportProduk").modal("show");
        },
        prosesImportProdukAtc : function()
        {
            confirmQuest('info', 'Konfirmasi', 'Import produk... ?', function (x) {konfirmasiImport()});
        }
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

    let dr = {'nama':namaEvent}
    axios.post(r, dr).then(function (res){
       console.log(res.data);
    });

}
