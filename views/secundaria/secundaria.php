<?php

require 'views/header.php';

$url = constant('URL') . "secundaria/datos";

?>

<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Mixed Widget 2-->
        <div class="card">

            <div class="card-body">

                <button onclick="btn()" class="btn btn-success">aceptar</button>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 2-->
    </div>

</div>


<?php require 'views/footer.php'; ?>

<script>
    var url = '<?php echo $url ?>';

    function btn() {

        var data = {
            id: "asd",
            num: 3
        }

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = this.responseText;
                data = JSON.parse(data);
                console.log(data);
            }
        }

        data = JSON.stringify(data);
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);

    }
</script>