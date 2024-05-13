<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
        <div class="page-header">
            <h3 class="page-title text-primary">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">

                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 stretch-card grid-margin rounded-0 shadow-md">
                <div class="card bg-gradient-primary card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?php echo base_url() ?>assets/images/dashboard/circle.svg" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Pengeluaran
                            <i class="mdi mdi-cash-multiple mdi-24px float-right"></i>
                        </h4>
                        <?php
                        foreach($expense->result() as $row) {  
                        ?>
                        <?php  if($row->E===NULL){ ?>
                        <h1 class="mb-5">Tidak ada pengeluaran hari ini</h1>
                        <?php }    
                        else{ ?>
                        <h1 class="mb-5">Rp. <?php echo  number_format($row->E,2) ?></h1>
                        <?php }?>
                        <?php  
                 } 
           ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin rounded-0 shadow-md">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?php echo base_url() ?>assets/images/dashboard/circle.svg" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3"> Pemasukan
                            <i class="mdi mdi-keyboard-return mdi-24px float-right"></i>
                        </h4>
                        <?php
                        foreach($income->result() as $row) {  
                        ?>
                        <?php  if($row->I===NULL){ ?>
                        <h1 class="mb-5">Tidak ada uang masuk hari ini</h1>
                        <?php }    
                        else{ ?>
                        <h1 class="mb-5">Rp. <?php echo  number_format($row->I,2) ?></h1>
                        <?php }?>
                        <?php  
                        } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card shadow rounded-0 card-primary">
                    <div class="card-body">
                        <h4 class="card-title text-primary">Riwayat Pengeluaran</h4>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-gradient-info text-white">
                                        <th class="p- text-center">
                                            #
                                        </th>
                                        <th class="p- text-center">
                                            Nama
                                        </th>
                                        <th class="p- text-center">
                                            Kategori
                                        </th>

                                        <th class="p- text-center">
                                            Jumlah
                                        </th>
                                        <th class="p- text-center">
                                            Status
                                        </th>
                                        <th class="p- text-center">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php              
                                if($fetch_debit->num_rows() > 0)  
                                { $j=1;
                                $i=1;
                                foreach($fetch_debit->result() as $row) {  
                                ?>
                                    <tr>
                                        <td class="px-3 py-2 align-middle text-center"><?php echo $i++ ?></td>
                                        <td class="px-3 py-2 align-middle">
                                            <img src="<?php echo base_url() ?>assets/images/faces/avatar.jpg"
                                                class="mr-2" alt="image">
                                            <?php echo $row->name ?>
                                        </td>
                                        <td class="px-3 py-2 align-middle"> <?php echo $row->category_id ?></td>

                                        <td class="px-3 py-2 align-middle text-right">
                                          Rp. <?php echo number_format($row->amount, 2) ?>
                                        </td>
                                        <td class="px-3 py-2 align-middle text-center">

                                            <label class="badge badge-gradient-warning text-dark">Pengeluaran</label>
                                        </td>
                                        <td class="px-3 py-2 align-middle text-center">

                                            <a class="btn btn-info bg-gradient-info btn-xs rounded-0 p-2"
                                                onclick="document.getElementById('id06<?php echo $j; ?>').style.display='block'"
                                                aria-label="Skip to main navigation">
                                                <i class="fa fa-pencil-square-o fa-xs" style="color:white;"
                                                    aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-danger bg-gradient-danger btn-xs rounded-0 p-2"
                                                href="<?php echo base_url() ?>/Home/add_debit?del=<?php echo $row->deb_id ?>"
                                                aria-label="Delete"
                                                onclick="return confirm('Are you sure you want to delete this?');">
                                                <i class="fa fa-trash-o fa-xs" aria-hidden="true"></i>
                                            </a>


                                        </td>
                                    </tr>
                                    <div id="id06<?php echo $j; ?>" class="w3-modal">
                                        <div class="w3-modal-content">
                                            <header class="w3-container w3-sand">
                                                <span
                                                    onclick="document.getElementById('id06<?php echo $j; ?>').style.display='none'"
                                                    class="w3-button w3-display-topright">&times;</span>
                                                <br>
                                                <h4>Edit Data</h4>
                                            </header>
                                            <div class="w3-container">
                                                <form class="forms-sample" method="post"
                                                    action="<?php echo base_url() ?>/Home/add_debit?id=<?php echo $row->deb_id ?>&del_id=<?php echo $row->id ?> ">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect3">Nama</label>
                                                        <input name="" readonly="" type="text"
                                                            class="form-control form-control-sm"
                                                            value="<?php echo $row->name  ?>" placeholder=""
                                                            aria-label="Name">
                                                        <input type="hidden" name="name"
                                                            value="<?php echo $row->cus_id ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Pembayaran</label>
                                                        <input name="date" type="date" required=""
                                                            class="form-control form-control-sm" placeholder="Username"
                                                            aria-label="Date">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Deskripsi</label>
                                                        <input name="discription"
                                                            value="<?php echo $row->discription ?>" type="text"
                                                            class="form-control form-control-sm"
                                                            id="exampleInputPassword1" placeholder="Deskripsi">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah Uang</label>
                                                        <input name="amount" onkeypress="return isNumber(event)"
                                                            value="<?php echo $row->amount ?>" type="text"
                                                            class="form-control form-control-sm"
                                                            placeholder="Jumlah Uang" aria-label="Debit Amount">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect3">Kategori</label>
                                                        <select required="" name="item"
                                                            class="form-control form-control-sm"
                                                            id="exampleFormControlSelect3">
                                                            <option disabled selected>Pilih...</option>
                                                            <option value="Sewa">Sewa</option>
                                                            <option value="Rumah Tangga">Rumah Tangga</option>
                                                            <option value="Utilitas">Utilitas</option>
                                                            <option value="Peralatan">Peralatan</option>
                                                            <option value="Gaji">Gaji</option>
                                                            <option value="Pinjaman">Pinjaman</option>
                                                            <option value="Peralatan Kantor">Peralatan Kantor</option>
                                                            <option value="Hiburan">Hiburan<option>
                                                            <option value="Liburan">Liburan</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" name="update_debit"
                                                        class="btn btn-gradient-primary mr-2 btn-sm ">Perbarui</button>
                                                    <button type="reset" class="btn btn-sm btn-light">Bersihkan</button>
                                                </form>
                                            </div>
                                            <footer class="w3-container w3-sand">
                                                <br>
                                            </footer>
                                        </div>
                                    </div>
                                    <?php 
                                        $j++;
                                            }  
                                            }
                                            else  
                                            {  
                                            ?>
                                                <tr>
                                                    <td class="px-3 py-2 align-middle" colspan="12">
                                                        <div class="alert alert-danger" role="alert">Tidak ada data pengeluaran</div>
                                                    </td>
                                                </tr>
                                            <?php  
                                            }  
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-primary">Riwayat Pemasukan</h4>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-gradient-info text-white">
                                        <th class="p- text-center">
                                            #
                                        </th>
                                        <th class="p- text-center">
                                            Nama
                                        </th>
                                        <th class="p- text-center">
                                            Deskripsi
                                        </th>

                                        <th class="p- text-center">
                                            Jumlah
                                        </th>
                                        <th class="p- text-center">
                                            Status
                                        </th>
                                        <th class="p- text-center">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                            <?php    
                              $i=1;
                              $j=1;
                                if($fetch_credit->num_rows() > 0) {  
                                    foreach($fetch_credit->result() as $row) {  
                            ?>
                                    <tr>
                                        <td class="px-3 py-2 align-middle text-center"><?php echo $i++ ?></td>
                                        <td class="px-3 py-2 align-middle">
                                            <img src="<?php echo base_url() ?>assets/images/faces/avatar.jpg"
                                                class="mr-2" alt="image">
                                            <?php echo $row->name ?>
                                        </td>
                                        <td class="px-3 py-2 align-middle"><?php echo $row->discription ?></td>

                                        <td class="px-3 py-2 align-middle text-right">
                                          Rp. <?php echo number_format($row->amount,2 ) ?>
                                        </td>
                                        <td class="px-3 py-2 align-middle text-center">
                                            <label class="badge badge-gradient-primary">Pemasukan</label>
                                        </td>
                                        <td class="px-3 py-2 align-middle text-center">
                                            <a class="btn btn-info bg-gradient-info btn-xs p-2 rounded-0"
                                                onclick="document.getElementById('id07<?php echo $j; ?>').style.display='block'"
                                                aria-label="Skip to main navigation">
                                                <i class="fa fa-pencil-square-o fa-xs" style="color:white;"
                                                    aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-danger bg-gradient-danger btn-xs p-2 rounded-0"
                                                href="<?php echo base_url() ?>Home/add_credit?del=<?php echo $row->cre_id ?>"
                                                onclick="return confirm('Yakin mau hapus?');"
                                                aria-label="Delete">
                                                <i class="fa fa-trash-o fa-xs" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <div id="id07<?php echo $j; ?>" class="w3-modal">
                                            <div class="w3-modal-content">
                                                <header class="w3-container w3-sand">
                                                    <span
                                                        onclick="document.getElementById('id07<?php echo $j; ?>').style.display='none'"
                                                        class="w3-button w3-display-topright">&times;</span>
                                                    <br>
                                                    <h4>Edit Pemasukan</h4>
                                                </header>
                                                <div class="w3-container">
                                                    <form class="forms-sample" method="post"
                                                        action="<?php echo base_url() ?>/Home/add_credit?id=<?php echo $row->cre_id ?>&del_id=<?php echo $row->id ?> ">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect3">Nama</label>
                                                            <input name="" readonly="" type="text"
                                                                class="form-control form-control-sm"
                                                                value="<?php echo $row->name  ?>" placeholder=""
                                                                aria-label="Name">
                                                            <input type="hidden" name="name"
                                                                value="<?php echo $row->cus_id ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal Pembayaran</label>
                                                            <input name="date" readonly="" type="text"
                                                                value="<?php echo $row->date ?>" required=""
                                                                class="form-control form-control-sm"
                                                                placeholder="Username" aria-label="Date">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Deskripsi</label>
                                                            <input name="discription"
                                                                value="<?php echo $row->discription ?>" type="text"
                                                                class="form-control form-control-sm"
                                                                id="exampleInputPassword1" placeholder="Deskripsi">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah</label>
                                                            <input name="amount" onkeypress="return isNumber(event)"
                                                                value="<?php echo $row->amount ?>" type="text"
                                                                class="form-control form-control-sm"
                                                                placeholder="Jumlah" aria-label="Debit Amount">
                                                        </div>
                                                        <button type="submit" name="update_credit"
                                                            class="btn btn-gradient-primary mr-2 btn-sm ">Perbarui</button>
                                                        <button type="reset" class="btn btn-sm btn-light">Bersihkan</button>
                                                    </form>
                                                </div>
                                                <footer class="w3-container w3-sand">
                                                    <br>
                                                </footer>
                                            </div>
                                        </div>
                                    </tr>
                                    <?php   
                                    $j++;
                                        }  
                                    } else{  
                                    ?>
                                    <tr>
                                        <td class="px-3 py-2 align-middle" colspan="12">
                                            <div class="alert alert-danger" role="alert">
                                                Tidak ada data pemasukan</div>
                                        </td>
                                    </tr>
                                    <?php  
                                    }  
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
        .w3-modal {
            z-index: 1101;
        }
        </style>
        <!-- content-wrapper ends -->