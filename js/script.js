/* //ambil elemen yang dibutuhkan
var keyword = document.getElementById('keyword');
var tombilCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

//tambahkan event ketika keyword di tulis
keyword.addEventListener('keyup',function () {
    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function () {
    //4 itu ready
        if (xhr.readyState == 4 && xhr.status == 200){
              //  console.log(xhr.responseText);
              container.innerHTML = xhr.responseText;
        }
    }
//eksekusi ajax
xhr.open('GET' ,'ajax/aset.php?keyword=' + keyword.value, true);
xhr.send();
});
 */

$(document).ready(function () {
//hilangkan tombol cari
$('#tombol-cari').hide();

    //event ketika keyword ditulis
    $('#keyword').on('keyup', function () {
        $('.loader').show();
        //ajax menggunakan load
        //$('#container').load('ajax/aset.php?keyword=' + $('#keyword').val());
        $.get('ajax/aset.php?keyword=' + $('#keyword').val(),function(data) {
          $('#container').html(data);
          $('.loader').hide();  
        });
    });
});