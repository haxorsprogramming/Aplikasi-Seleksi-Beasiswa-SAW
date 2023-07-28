// insialisasi
var mainApp = new Vue({
    el : '#mainApp',
    data : {
        judulPage : 'Dashboard'
    },
    methods : {

    }
});

function renderPage(page, judulPage)
{
    let dUtama = $("#divUtama");
    dUtama.html("Memuat ...");
    dUtama.load(server + page);
    mainApp.judulPage = judulPage;
}

renderPage('app/core/beranda', 'Dashboard');

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}

function confirmQuest(icon, title, text, x)
{
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            x();
        }
    });
}
