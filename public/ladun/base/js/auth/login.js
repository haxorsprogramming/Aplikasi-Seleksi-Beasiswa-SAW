// route
var rProsesLogin = server + "auth/login/process";
var rDashboard = server + "app";
// vue object
var loginApp = new Vue({
    el : '#divLogin',
    data : {},
    methods : {
        loginAtc : function()
        {
            loginProses();
        }
    }
});

// inisialisasi
document.querySelector("#txtUsername").focus();

function loginProses()
{
    let username = document.querySelector("#txtUsername").value;
    let password = document.querySelector("#txtPassword").value;
    let ds = {'username':username, 'password':password}
    axios.post(rProsesLogin, ds).then(function(res){
        let obj = res.data;
        if(obj.status === "NO_USER"){
            pesanUmumApp('warning', 'No User .. !!', 'Tidak ada user terdaftar ..');
        }else if(obj.status === 'WRONG_PASSWORD'){
            pesanUmumApp('warning', 'Fail auth .. !!', 'Username / Password salah ..');
        }else if(obj.status === 'SUCCESS'){
            window.location.assign(rDashboard+"/"+obj.token);
        }else{
            pesanUmumApp('error', 'Fail auth .. !!', 'Kesalahan tidak dikenal ..');
        }
    });
}

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}
