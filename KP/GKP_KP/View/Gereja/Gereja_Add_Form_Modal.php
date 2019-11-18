
<div class="container">
    <fieldset>
        <form method="post" action="" onsubmit="return Kosong()" enctype="multipart/form-data" class="was-validated">

            <div class="form-group">
                <label for="nama">Nama Gereja :</label>
                <input type="text" class="form-control" id="nama" placeholder="e.g. Bambang Kurniawan" name="nama" required maxlength="200"/>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" required placeholder="Jln. Jendral Sudirman no 2-A" class="form-control" style="column-span: 5"/>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="kecamatan">Kecamatan :</label>
                <input type="text" name="kecamatan" id="kecamatan" required class="form-control" style="width: 250px"/>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="kelurahan">Kelurahan :</label>
                <input type="text" name="kelurahan" id="kelurahan" required class="form-control" style="width: 250px"/>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="kelurahan">Kota :</label>
                <input type="text" name="kota" id="kota" required placeholder="Kota Tempat Tinggal" class="form-control" style="width: 250px;"/>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="RT">RT</label>
                <input type="text" name="rt" id="rt" required placeholder="001" style="width: 80px;" class="form-control"/>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="RW">RW</label>
                <input type="text" name="rw" id="rw" required placeholder="002" style="width: 80px" class="form-control"/>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="kodepos">Kode Pos :</label>
                <input type="text" name="kodepos" id="kodepos" required placeholder="40212" class="form-control" style="width: 105px"/>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="alamat">No Telephone :</label>
                <input type="text" name="alamat" id="alamat" required placeholder="(022) 1234567" class="form-control" style="column-span: 20; width: 200px"/>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="alamat">Nama Pemilik :</label>
                <input type="text" name="alamat" id="alamat" required class="form-control" style="column-span: 50"/>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <br/>
            <br/>
            <div>
                <td colspan="3"><button type="submit" name="btnSubmitGereja" class="btn btn-primary">Submit</button></td>
            </div>

        </form>
    </fieldset>
</div>
