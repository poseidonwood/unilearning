var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1]; 

// Geo Location
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
  $('#latitude').val(position.coords.latitude);
  $('#longitude').val(position.coords.longitude);
}
// 
$(document).ready(function () {
    $( ".js-example-basic-single" ).select2({
        theme: "bootstrap",
        placeholder: "Select a State",
        containerCssClass: ':all:',
        // width: 'auto',
		// dropdownAutoWidth: true,
		// allowClear: true,

      });
      $( ".department-select2" ).select2({
        theme: "bootstrap",
        placeholder: "Select a State",
        containerCssClass: ':all:',
        // width: 'auto',
		// dropdownAutoWidth: true,
		// allowClear: true,

      });
      $( ".linemanager-select2" ).select2({
        theme: "bootstrap",
        placeholder: "Select a State",
        containerCssClass: ':all:',
        // width: 'auto',
		// dropdownAutoWidth: true,
		// allowClear: true,

      });


});

// ECertificate
  function deleteData(id,nama) {

    Swal.fire({
      title: 'Hapus '+ nama +' dari list ?',
      text: "Data yang di hapus tidak bisa kembalikan..",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya , Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: base_url+'/database_e_certificate/delete/',
          data: {id:id,nama:nama},
        }).done(function(data) {
          var json = data,
            obj = JSON.parse(json);
            console.log(obj.message);
            if(obj.message === "Delete Success"){
              Swal.fire(
                'Terhapus!',
                'Data berhasil di hapus',
                'success'
              )
            window.location.href= base_url + obj.url;
            }else{
              Swal.fire(
                'Gagal!',
                'Data gagal di hapus',
                'error'
              )
            }
    
            // window.location.href= base_url + '/proses/pembayaran/' + obj.id_transaksi;
          // console(obj.notif);
        });
      }
    })
  }
  function EditEcertificate(id) {
    $.ajax({
      type: 'POST',
      url: base_url+'/database_e_certificate/dataedit/',
      data: {id:id},
    }).done(function(data) {
      var json = data,
        obj = JSON.parse(json);
        // console.log(obj.message);
        // {"kode":"CE013","nip":"22","no_certificate":"tes","no_lisensi":"tes","nama_certificate":"test","pic":"33","provider":"tes","tanggal_terbit":"2021-01-21","tanggal_expired":"2021-02-02","note":"tes\r\n","files":"aa1.jpg"}
        var kode = obj.kode;
        var nip = obj.nip;
        var no_certificate = obj.no_certificate;
        var no_lisensi = obj.no_lisensi;
        var nama_certificate = obj.nama_certificate;
        var pic = obj.pic;
        var provider = obj.provider;
        var tanggal_terbit = obj.tanggal_terbit;
        var tanggal_expired = obj.tanggal_expired;
        var note = obj.note;
        var files = obj.files;

        $('#kode').val(kode);
        $("#nm_karyawan").val(nip).trigger('change');
        $('#no_certificate').val(no_certificate);
        $('#no_lisensi').val(no_lisensi);
        $('#nama_certificate').val(nama_certificate);
        $("#pic").val(pic).trigger('change');
        $('#provider').val(provider);
        $('#tanggal_terbit').val(tanggal_terbit);
        $('#tanggal_expired').val(tanggal_expired);
        $('#note').val(note);
        $('#filenya').text(files);
        $('.bs-example-modal-lg-edit').modal('show');
    });

  }
  // End E Certificate

  // Users
  function searchnip() {
    var nip = $('#nip_users').val();
    if(nip.length === 0){
      $('#result_search').html("<small>Masukkan NIP => Tunggu Status NIP nya</small>");
      $("#email_users").val(''); 
    }else{
    $.ajax({
      type: 'POST',
      url: base_url+'/user/search/',
      data: {nip:nip},
    }).done(function(data) {
      var json = data,
        obj = JSON.parse(json);
        // alert (obj.message);
        if(obj.result == true){
          $('input[id="email_users"]').val(obj.email);
          $('#result_search').html(obj.message);
          $('input[id="role_users"]').removeAttr('disabled');
          $('input[id="email_users"]').removeAttr('disabled');
          $('input[id="password_users"]').removeAttr('disabled');
          $('input[id="password2_users"]').removeAttr('disabled');
          $('input[id="email_users"]').removeAttr('disabled');
          $('input[id="status_users"]').removeAttr('disabled');
          $('button[id="submit_users"]').removeAttr('disabled');

        }else{
          $('#result_search').html(obj.message);
          $('input[id="role_users"]').attr("disabled", 'disabled');
          $('input[id="email_users"]').attr("disabled", 'disabled');
          $('input[id="password_users"]').attr("disabled", 'disabled');
          $('input[id="password2_users"]').attr("disabled", 'disabled');
          $('input[id="email_users"]').attr("disabled", 'disabled');
          $('input[id="status_users"]').attr("disabled", 'disabled');
          $('button[id="submit_users"]').attr("disabled", 'disabled');

        }
    });
  }
  }
  function validasipassword() {
    var password = $('#password_users').val();
    var password2 = $('#password2_users').val();
    if(password !== password2){
      Swal.fire(
        'Gagal!',
        'Pastikan Password dan Confirm Password sama',
        'error'
      )
      password = "";
      password2 = "";
    }
  }
  function deleteUser(id,nama) {

    Swal.fire({
      title: 'Hapus '+ nama +' dari list ?',
      text: "Data yang di hapus tidak bisa kembalikan..",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya , Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: base_url+'/user/delete/',
          data: {id:id,nama:nama},
        }).done(function(data) {
          var json = data,
            obj = JSON.parse(json);
            console.log(obj.message);
            if(obj.message === "Delete Success"){
              Swal.fire(
                'Terhapus!',
                'Data berhasil di hapus',
                'success'
              )
            window.location.href= base_url + obj.url;
            }else{
              Swal.fire(
                'Gagal!',
                'Data gagal di hapus',
                'error'
              )
            }
    
            // window.location.href= base_url + '/proses/pembayaran/' + obj.id_transaksi;
          // console(obj.notif);
        });
      }
    })
  }
  function EditUser(id,nama) {
    $.ajax({
      type: 'POST',
      url: base_url+'/user/dataedit/',
      data: {id:id},
    }).done(function(data) {
      var json = data,
        obj = JSON.parse(json);
        // console.log(obj.message);
        // {"kode":"CE013","nip":"22","no_certificate":"tes","no_lisensi":"tes","nama_certificate":"test","pic":"33","provider":"tes","tanggal_terbit":"2021-01-21","tanggal_expired":"2021-02-02","note":"tes\r\n","files":"aa1.jpg"}
        var id = obj.id;
        var nip = obj.nip;
        var email = obj.email;
        if(obj.role ==="LINE MANAGER"){
          var role = "LINEMANAGER";
        }else{
          var role = obj.role;
        }
        var status = obj.status;
        $('#head_users').text("Edit User " + nama)
        $('#e_id_users').val(id);
        // $('#e_nip_users').val(nip);
        // $('#e_email_users').val(email);
        // $('input[id="role_users"]:checked').val(obj.role);
        $("input[id=role_users1][value=" + role + "]").prop('checked', true);
        $("input[id=status_users1][value=" + status + "]").prop('checked', true);
        $('.bs-example-modal-lg-edit_user').modal('show');
    });

  }
// End User
// Karyawan
function deleteKaryawan(id,nama) {
  Swal.fire({
    title: 'Hapus '+ nama +' dari list ?',
    text: "Data yang di hapus tidak bisa kembalikan..",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya , Hapus!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'POST',
        url: base_url+'/user/deleteKaryawan/',
        data: {
          id:id,nama:nama
        },
      }).done(function(data) {
        var json = data,
          obj = JSON.parse(json);
          console.log(obj.message);
          if(obj.message === "Delete Success"){
            Swal.fire(
              'Terhapus!',
              'Data berhasil di hapus',
              'success'
            )
          window.location.href= base_url + obj.url;
          }else{
            Swal.fire(
              'Gagal!',
              'Data gagal di hapus',
              'error'
            )
          }
  
          // window.location.href= base_url + '/proses/pembayaran/' + obj.id_transaksi;
        // console(obj.notif);
      });
    }
  })
}
function EditKaryawan(id,nama) {
  $.ajax({
    type: 'POST',
    url: base_url+'/user/dataeditKaryawan/',
    data: {id:id},
  }).done(function(data) {
    var json = data,
      obj = JSON.parse(json);
      // console.log(obj.message);
      // {"kode":"CE013","nip":"22","no_certificate":"tes","no_lisensi":"tes","nama_certificate":"test","pic":"33","provider":"tes","tanggal_terbit":"2021-01-21","tanggal_expired":"2021-02-02","note":"tes\r\n","files":"aa1.jpg"}
      var nip = obj.nip;
      var email = obj.email;
      var nama = obj.nama;
      var telepon = obj.telepon;
      var status = obj.status;
      $('#edit_karyawan_title').text("Edit Karyawan " + nama)
      $('#nip_karyawan').val(nip);
      $('#email_karyawan').val(email);
      $('#nama_karyawan').val(nama);
      $('#telepon_karyawan').val(telepon);
      $("#department_karyawan").val(obj.department).trigger('change');     
      $("#linemanager_karyawan").val(obj.linemanager).trigger('change');    
      $("#location_karyawan").val(obj.location).trigger('change');      
      $("input[id=status_karyawan][value=" + status + "]").prop('checked', true);
      $('#filenya_karyawan').html("<img src = '"+base_url+"/assets/img/user/"+obj.photo+"' width='100px'>");
      $('.bs-example-modal-lg-edit_karyawan').modal('show');
  });

}

// End Karyawan

// Soal
function prosesPretest() {
  var a1 = $('input[name="pilihan1"]:checked').val();
  var a2 = $('input[name="pilihan2"]:checked').val();
  var a3 = $('input[name="pilihan3"]:checked').val();
  var a4 = $('input[name="pilihan4"]:checked').val();
  var a5 = $('input[name="pilihan5"]:checked').val();
  var a6 = $('input[name="pilihan6"]:checked').val();
  var materi_id = $('#materi_id').val();
  Swal.fire({
    title: 'Apakah semua soal sudah terisi ?',
    text: "Data yang sudah terkirim tidak bisa di ubah kembali",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya , Lanjut!'
  }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
        type: 'POST',
        url: base_url+'/soal/cekjawaban/',
        data: {
          materi_id:materi_id,
          test:'pretest',
          a1:a1,
          a2:a2,
          a3:a3,
          a4:a4,
          a5:a5,
          a6:a6
        },
      }).done(function(data) {
        var json = data,
          obj = JSON.parse(json);
          console.log(obj.message);
          if(obj.message === "true"){
            Swal.fire(
              'Berhasil!',
              'Jawaban anda sudah masuk ke sistemkami',
              'success'
            )
            $('#row1').css("display","block");
            // $('#row2').removeClass('hidden2');
            $('#row3').css("display","none");
      
          }else{
            Swal.fire(
              'Gagal!',
              'Data ada kendala ',
              'error'
            )
          }
      });
    }
  })
}
function prosesMateri() {
  var materi_id = $('#materi_id').val();
  Swal.fire({
    title: 'Apakah sudah memahami materi ini ?',
    text: "Jika menekan tombol iya maka materi akan di tutup dan dianggap paham.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya , Lanjut!'
  }).then((result) => {
    if (result.isConfirmed) {
 
      $.ajax({
        type: 'POST',
        url: base_url+'/soal/cekjawaban/',
        data: {
          materi_id:materi_id,
          test:'materi'
        },
      }).done(function(data) {
        var json = data,
          obj = JSON.parse(json);
          console.log(obj.message);
          if(obj.message === "true"){
            Swal.fire(
              'Berhasil!',
              'Silahkan lanjut ke posttest',
              'success'
            )
            $('#row1').css("display","none");
            $('#row2').css("display","block");
      
          }else{
            Swal.fire(
              'Gagal!',
              'Data ada kendala ',
              'error'
            )
          }
      });

    }
  })
}
function prosesPosttest() {
  var a1 = $('input[name="pilihanpost1"]:checked').val();
  var a2 = $('input[name="pilihanpost2"]:checked').val();
  var a3 = $('input[name="pilihanpost3"]:checked').val();
  var a4 = $('input[name="pilihanpost4"]:checked').val();
  var a5 = $('input[name="pilihanpost5"]:checked').val();
  var a6 = $('input[name="pilihanpost6"]:checked').val();
  var materi_id = $('#materi_id').val();
  Swal.fire({
    title: 'Apakah semua soal sudah terisi ?',
    text: "Data yang sudah terkirim tidak bisa di ubah kembali",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya , Lanjut!'
  }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
        type: 'POST',
        url: base_url+'/soal/cekjawaban/',
        data: {
          materi_id:materi_id,
          test:'posttest',
          a1:a1,
          a2:a2,
          a3:a3,
          a4:a4,
          a5:a5,
          a6:a6
        },
      }).done(function(data) {
        var json = data,
          obj = JSON.parse(json);
          console.log(obj.message);
          if(obj.message === "true"){
            Swal.fire(
              'Berhasil!',
              'Jawaban anda sudah masuk ke sistemkami, Anda akan di arah kan ke hasil test',
              'success'
            )
          window.location.href= base_url + '/hasil_test';
        }else{
            Swal.fire(
              'Gagal!',
              'Data ada kendala ',
              'error'
            )
          }
      });
    }
  })
}

// End soal

// Start daftar_training_trainer

function getdataRead(id) {
  $.ajax({
    type: 'POST',
    url: base_url+'/daftar_training_trainer/getdataread/',
    data: {id:id},
  }).done(function(data) {
    var json = data,
      obj = JSON.parse(json);
      var isi = obj.isi;
      $('#p_read').text(isi);
      $('.bs-example-modal-center-read').modal('show');
  });


}
function createSoal(id,judul,soalnya) {
  $('#judulsoal').text('Buat Soal ID: ' +id+ ' | '+judul+' | Soal : '+soalnya );
  $('.bs-example-modal-isi_soal').modal('show');
  $('#materi_idnya').val(id);
  $('#category_soalnya').val(soalnya);
}
function tambahMateri(id) {
  $('.bs-example-modal-add_materi').modal('show');
  $('#inimatericatid').val(id);
}

// End daftar_training_trainer

// Start Line manager
function ajukanModal(id,name){
  $('#categoryid').val(id);
  $('#namecategoryid').val(name);
  // alert(name);
  $('.bs-example-modal-ajukan').modal('show');
}
function kirimAjukan() {
 var nip = $('#nm_karyawan_select2').val();
 var id = $('#categoryid').val();
 var name_cat = $('#namecategoryid').val();
 if(nip === "0"){
  Swal.fire(
    'Gagal!',
    'Pilih dulu karyawan yang mau di ajukan materi ini !',
    'error'
  )
 }else{
    $.ajax({
      type: 'POST',
      url: base_url+'/daftar_training_lm/kirimajukan/',
      data: {nip:nip,id:id,name_cat:name_cat},
    }).done(function(data) {
      var json = data,
        obj = JSON.parse(json);
      if(obj.message === "true"){
        Swal.fire(
          'Berhasil!',
          'Anda mengajukan Karyawan : '+nip+ ' dengan materi ' +name_cat,
          'success'
        )
      }else{
        Swal.fire(
          'Gagal!',
          'Mungkin karyawan ini sudah terdaftar di materi ini ',
          'error'
        )
      }

    });
 }

}
// End Line Manager
// Master Factory
function editFactory(id) {
  $.ajax({
    type: 'POST',
    url: base_url+'/master_factory/readupdate/',
    data: {id:id},
  }).done(function(data) {
    var json = data,
      obj = JSON.parse(json);
      var idnya = obj.id;
      var email = obj.email;
      if(obj.message === true){  
        var factory = obj.factory;
        $('#factory_name_edit').val(factory);
        $('#id_factory_name_edit').val(idnya);
        $('#modalEditFactory').modal('show');  
      }else{
        Swal.fire(
          'Gagal!',
          'Data tidak ada',
          'error'
        )
      }
  });

}
function deleteFactory(id,nama) {
  Swal.fire({
    title: 'Hapus '+ nama +' dari list ?',
    text: "Data yang di hapus tidak bisa kembalikan..",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya , Hapus!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'POST',
        url: base_url+'/master_factory/delete/',
        data: {
          id:id,nama:nama
        },
      }).done(function(data) {
        var json = data,
          obj = JSON.parse(json);
          console.log(obj.message);
          if(obj.message === "Delete Success"){
            Swal.fire(
              'Terhapus!',
              'Data berhasil di hapus',
              'success'
            )
          window.location.href= base_url + obj.url;
          }else{
            Swal.fire(
              'Gagal!',
              'Data gagal di hapus',
              'error'
            )
          }
  
          // window.location.href= base_url + '/proses/pembayaran/' + obj.id_transaksi;
        // console(obj.notif);
      });
    }
  })
}


// End Master Factory
$("#tambah").click(function(){
  $("#modalTambah").modal("show");

})

$("#edit").click(function(){
  $("#modalEdit").modal("show");

})

$("#hapus").click(function(){
  $("#modalHapus").modal("show");

})

$("#import").click(function(){
  $("#modalImport").modal("show");

})

$("#ubahpass").click(function(){
  $("#modalUbahpass").modal("show");
  $("#modalUbahdata").modal("hide");
})


$("#read_list_materi_saya").click(function(){
  $("#modalread_list_materi_saya").modal("show");
})

$("#tampil_video_training_saya").click(function(){
  $("#modaltampil_video_training_saya").modal("show");
})

$("#tampil_file_training_saya").click(function(){
  $("#modaltampil_file_training_saya").modal("show");
})