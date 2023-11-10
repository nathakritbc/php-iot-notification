<?php
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

function alertSuccess($title,$locationRedirect){
    echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{$title}',
                showConfirmButton: false,
                timer: 1500
            }).then(()=>  window.location='{$locationRedirect}');
         </script>";
}


function alertError($title,$text,$locationRedirect){
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: '{$title}',
                text: '{$text}!' 
            }).then(()=>  window.location='{$locationRedirect}');
         </script>";
}

 

function alertConfirm($title,$text,$titleIsConfirm,$textIsConfirm,$locationRedirect,$id){
    echo "<script>
            Swal.fire({
                title: '{$title}?',
                text: '{$text}!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='./{$locationRedirect}?confirmDelete=1&id=$id'
                    }else{
                        window.location='{$locationRedirect}'
                    }
            })
         </script>";
}