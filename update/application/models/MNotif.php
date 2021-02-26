<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MNotif extends CI_Model
{


  function alertsuccess($value)
  {
    $notif = "<script>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '" . $value . "',
  showConfirmButton: false,
  timer: 1500
})
</script>";
    return $notif;
  }
  function minialert($value)
  {
    $notif = " <script>
   const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
  Toast.fire({
    icon: 'success',
    title: '" . $value . "'
  })
  </script>";
    return $notif;
  }
  function alertfail($value)
  {
    $notif = "<script>
Swal.fire(
  'Gagal!',
  '" . $value . "',
  'error'
)
</script>";
    return $notif;
  }
  function timer($value)
  {
    $notif = "<script>
    function startTimer(duration) {
      var timer = duration, minutes, seconds;
      setInterval(function () {
          minutes = parseInt(timer / 60, 10)
          seconds = parseInt(timer % 60, 10);
    
          minutes = minutes < 10 ? '0' + minutes : minutes;
          seconds = seconds < 10 ? '0' + seconds : seconds;
    
          const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: duration,
            timerProgressBar: false,
          })
          
          // Toast.fire({
          //   // icon: 'success',
          //   title: minutes + ':' + seconds
          // })
          $('.toast').toast('show');
          $('#timernya').text(minutes + ':' + seconds);
          console.log(minutes + ':' + seconds);
          if (--timer < 0) {
              timer = duration;
          }
      }, 1000);
    }
    startTimer($value)
    </script>";
    return $notif;
  }
}


/* End of file Login_model.php */
