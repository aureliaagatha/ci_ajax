<!DOCTYPE html>
<html>
    <head>
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script> -->
        <link href="<?php echo base_url()?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo base_url()?>/assets/jquery/jquery-3.4.1.min.js"></script>
        <script src="<?php echo base_url()?>/assets/bootstrap/js/bootstrap.min.js"></script>
    </head>

    <script type="text/javascript">
        $(document).ajaxStart(function() {
            $("#ajax-wait").css({
                left: ($(window).width() - 32) / 2 + "px", // 32 = lebar gambar
                top: ($(window).height() - 32) / 2 + "px", // 32 = tinggi gambar
                display: "block"
            })
        }).ajaxComplete(function() {
            $("#ajax-wait").fadeOut();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>mahasiswa/tampilMahasiswa",
                cache: false,
                success: function(data) {
                    $("#tampil").html(data);
                }
            });
        });
    </script>

    <body>
        <div class='container'>
            <h2>CRUD AJAX DI CI3</h2>
            <div id="tampil">
                <!-- Data tampil disini -->
            </div>
            <div>
                <div id='ajax-wait'>
                    <img alt='loading...' src='<?php echo base_url()?>/assets/animasi/Rolling-1s-84px.png' />
                </div>
            </div>  
        </div>
    </body>
</html>