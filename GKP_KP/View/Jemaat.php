<script>
    function Kosong(){
        var cnama = document.getElementById("nama").value;

        if(cnama.trim()==""){
            alert("Nama !");
            return false;
        }
        else{
            return true;
        }
    }
</script>


<br/>
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col">Welcome, (Brother......)</div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">
            <button type="button" class="btn btn-primary" name="addv1" data-toggle="modal" data-target="#myModal1">
                Add
            </button>
            <button type="button" class="btn btn-primary" name="addv2" data-toggle="modal" data-target="#myModal2">
                Import
            </button>
        </div>
    </div>
    <br/>
    <br/>
    <?php
    ?>
    <table class ="display" id="jemaat">
        <thead>
        <tr>
            <th>
                Foto
            </th>
            <th>
                Nama
            </th>
            <th>
                Alamat
            </th>
            <th>
                Umur
            </th>
            <th>
                Status Menikah
            </th>
            <th>
                Pekerjaan
            </th>
            <th>
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        while($data = $hasil->fetch()){
            ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><img src="images/<?php echo $data->getJemaatFoto();?>" width="90px" height="120px" </td>
                <td><?php echo $data->getJemaatId();?></td>
                <td><?php echo $data->getJemaatNamaDepan();?></td>
            </tr>
            <?php
            $no=$no+1;
        }
        ?>
        </tbody>
    </table>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Formulir Pendaftaran Jemaat</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php include "Jemaat_Add_Form_Modal.php"; ?>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Import Excel</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php include "Jemaat_Add_Excel_Modal.php" ?>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#jemaat').DataTable();
    });
</script>