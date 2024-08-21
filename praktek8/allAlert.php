<?php
    //CEK DATA_______________________________________________________________________________________________________________

    // successfully
    function alert_check_succesfully($messege, $page){
        echo "<div style='width:95%' class='alert alert-success position-absolute top-10 start-50 translate-middle'>
                <div> 
                    <i class='fa-solid fa-check'></i> 
                    <span>Data Berhasil <b>$messege</b></span>
                </div>
            </div>
                
            <script>
                const alertElement = document.getElementsByClassName('alert')[0];
                
                setTimeout(() => {
                    alertElement.style.display = 'none';
                    document.location.href = '$page'; 
                }, 2000);
            </script>";
    }

    // fail
    function alert_check_fail($massage, $page){
        echo "<div style='width:95%' class='alert alert-warning position-absolute top-10 start-50 translate-middle'>
                    <div> 
                        <i class='fa-solid fa-check'></i> 
                        <span>Data gagal <b>$messege</b></span>
                    </div>
                </div>
                <script>
                    const alertElement = document.getElementsByClassName('alert')[0];

                    setTimeout(() => {
                        alertElement.style.display = 'none';
                        document.location.href = '$page'; 
                    }, 2000);
                </script>";
    }

    // warning
    // information
?>