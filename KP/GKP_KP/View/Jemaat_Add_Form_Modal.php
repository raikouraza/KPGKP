
<div class="container">
    <fieldset>
        <form method="post" action="" onsubmit="return Kosong()" enctype="multipart/form-data" class="was-validated">

                <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" class="form-control" id="nama" placeholder="e.g. Bambang Kurniawan" name="nama" required maxlength="200"/>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="jeniskelamin">Jenis Kelamin :</label>
                        <select name="jeniskelamin" class="form-control">
                            <option value="2">--Pilih--</option>
                            <option value="0">
                                Wanita
                            </option>
                            <option value="1">
                                Pria
                            </option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="kotakelahiran">Kota Kelahiran</label>
                    <input type="text" name="kotakelahiran" id="kotakelahiran" required placeholder="Soreang" class="form-control" style="width: 250px" maxlength="27"/>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field. Maximum 27 words</div>
                </div>
                <div class="form-group">
                    <label for="tgllahir">Tanggal Lahir :</label>
                    <input type="date" name="tgllahir" id="tgllahir" required class="form-control" style="width: 200px"/>
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
                    <label for="status">Status Menikah :</label>
                        <select name="status" class="form-control" style="width: 200px">
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Menikah">
                                Menikah
                            </option>
                            <option value="Duda">
                                Duda
                            </option>
                            <option value="Janda">
                                Janda
                            </option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="foto">Foto :</label>
                    <input type="file" name="foto" required class="form-control" style="width: 300px"/>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan :</label>
                        <select name="pekerjaan" class="form-control" style="width: 350px">
                            <option value="1">BELUM/TIDAK BEKERJA</option>
                            <?php
                            while ($data = $hasilPekerjaan->fetch()) {
                                ?>
                                <option value="<?php echo $data->getPekerjaanId(); ?>">
                                    <?php echo $data->getPekerjaanNama(); ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                </div>
                <br/>
                <br/>
                <div>
                    <td colspan="3"><button type="submit" name="btnSubmitJemaat" class="btn btn-primary">Submit</button></td>
                </div>

        </form>
    </fieldset>
</div>









<!---->
<!---->
<!--<div>-->
<!--<fieldset>-->
<!--    <form method="post" action="" onsubmit="return Kosong()" enctype="multipart/form-data">-->
<!--        <table>-->
<!--            <tr>-->
<!--                <td>Nama Jemaat</td>-->
<!--                <td>:</td>-->
<!--                <td><input type="text" name="nama" id="nama" required  style="width: 500px;"/></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Jenis Kelamin</td>-->
<!--                <td>:</td>-->
<!--                <td>-->
<!--                    <select name="jeniskelamin">-->
<!--                        <option value="2">--Pilih--</option>-->
<!--                        <option value="0">-->
<!--                            Wanita-->
<!--                        </option>-->
<!--                        <option value="1">-->
<!--                            Pria-->
<!--                        </option>-->
<!--                    </select>-->
<!--                </td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Kota / Tanggal Lahir</td>-->
<!--                <td>:</td>-->
<!--                <td><input type="text" name="kotakelahiran" id="kotakelahiran" required placeholder="Kota Kelahiran"/> <input type="date" name="tgllahir" id="tgllahir" required/></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Alamat</td>-->
<!--                <td>:</td>-->
<!--                <td><textarea name="alamat" rows="5" cols="67"></textarea></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Kecamatan</td>-->
<!--                <td>:</td>-->
<!--                <td><input type="text" name="kecamatan" id="kecamatan" required /></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Kelurahan</td>-->
<!--                <td>:</td>-->
<!--                <td><input type="text" name="kelurahan" id="kelurahan" required  /></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Kota</td>-->
<!--                <td>:</td>-->
<!--                <td><input type="text" name="kota" id="kota" required placeholder="e.g. Bandung"/></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>RT / RW</td>-->
<!--                <td>:</td>-->
<!--                <td><input type="text" name="rt" id="rt" required placeholder="RT" style="width: 35px;"/> / <input type="text" name="rw" id="rw" required placeholder="RW" style="width: 35px"/></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Kode Pos</td>-->
<!--                <td>:</td>-->
<!--                <td><input type="text" name="kodepos" id="kodepos" required placeholder="40212" style="width: 60px"/></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Status Menikah</td>-->
<!--                <td>:</td>-->
<!--                <td>-->
<!--                    <select name="status">-->
<!--                        <option value="Belum Menikah">Belum Menikah</option>-->
<!--                        <option value="Belum Menikah">-->
<!--                            Belum Menikah-->
<!--                        </option>-->
<!--                        <option value="Menikah">-->
<!--                            Menikah-->
<!--                        </option>-->
<!--                        <option value="Duda">-->
<!--                            Duda-->
<!--                        </option>-->
<!--                        <option value="Janda">-->
<!--                            Janda-->
<!--                        </option>-->
<!--                    </select>-->
<!--                </td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Foto </td>-->
<!--                <td>:</td>-->
<!--                <td><input type="file" name="foto" required /></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Pekerjaan</td>-->
<!--                <td>:</td>-->
<!--                <td>-->
<!--                    <select name="pekerjaan">-->
<!--                        <option value="1">BELUM/TIDAK BEKERJA</option>-->
<!--                        --><?php
//                        while ($data = $hasilPekerjaan->fetch()) {
//                            ?>
<!--                            <option value="--><?php //echo $data->getPekerjaanId(); ?><!--">-->
<!--                                --><?php //echo $data->getPekerjaanNama(); ?>
<!--                            </option>-->
<!--                            --><?php
//                        }
//                        ?>
<!--                    </select>-->
<!--                </td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td colspan="3"><button type="submit" name="btnSubmitJemaat" class="btn btn-primary">Submit</button></td>-->
<!--            </tr>-->
<!--        </table>-->
<!--    </form>-->
<!--</fieldset>-->
<!--</div>-->