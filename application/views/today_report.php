
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
              <div class="card rounded-0">
                <div class="card-header bg-gradient-info text-white rounded-0">
                  <h4 class="card-title mb-0 text-white">Laporan Pengeluaran</h4>
                </div>
                <div class="card-body">
                    <form class="form-inline" method="post" action="<?php echo base_url() ?>Home/report">
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                    <div class="input-group-text">Dari</div>
                      </div>
                        <input type="date" class="form-control" name="from"id="inlineFormInputGroupUsername2" placeholder="Username">
                    </div>
                  
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Ke</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                    <div class="input-group-text">Ke</div>
                      </div>
                        <input type="date" name="to" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                    </div>
                    
                  
                    <button type="submit" name="view" class="btn btn-outline-info btn-icon-text mb-2 rounded-0">Liat Laporan</button>
                  </form>
                    <br>
                  <h5 class="text-secondary">Laporan Hari Ini</h5>
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                      <thead>
                        <tr class="bg-gradient-primary text-white">
                          <th class="py-2 text-center ">
                            Nama
                          </th>
                          <th class="py-2 text-center ">
                            Kategori
                          </th>
                          <th class="py-2 text-center ">
                            Status
                          </th>
                          <th class="py-2 text-center ">
                            Jumlah
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php              
                          if($fetch_debit->num_rows() > 0) {  
                          $i=1;
                          foreach($fetch_debit->result() as $row) {  
                          ?> 
                        <tr>
                          <td class="px-3 py-2 align-middle">
                            <img src="<?php echo base_url() ?>assets/images/faces/806962_user_512x512.png" class="mr-2" alt="image">
                           <?php echo $row->name ?>
                          </td>
                          <td class="px-3 py-2 align-middle"> <?php echo $row->category_id ?></td>
                          <td class="px-3 py-2 align-middle text-center">
                              <label class="badge badge-gradient-danger">Pengeluaran</label>
                          </td>
                          <td class="px-3 py-2 align-middle text-right">
                          Rp. <?php echo number_format($row->amount, 2) ?>
                          </td>
                        </tr>
                        <?php } } else { ?> <td>Data tidak ditemukan</td> 
                        <?php } ?> 
                        <?php              
                        if($fetch_credit->num_rows() > 0) {  
                        foreach($fetch_credit->result() as $row) { ?> 
                        <tr>
                          <td  class="px-3 py-2 align-middle">
                            <img src="<?php echo base_url() ?>assets/images/faces/806962_user_512x512.png" class="mr-2" alt="image">
                            <?php echo $row->name ?>
                          </td>
                          <td  class="px-3 py-2 align-middle"><span class="text-muted">N/A</span></td>
                          <td  class="px-3 py-2 align-middle text-center">
                            <label class="badge badge-gradient-success">Jumlah Diterima</label>
                          </td>
                          <td  class="px-3 py-2 align-middle text-right">
                          Rp. <?php echo number_format($row->amount, 2) ?>
                          </td>
                        </tr>
                         <?php } } else { ?>  
                      <td>Data tidak ditemukan</td> <?php } ?> 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>    
            
    <script>
		$(function() {
			$("#example").simplePagination({
				previousButtonClass: "btn btn-gradient-primary btn-sm",
				nextButtonClass: "btn btn-gradient-primary btn-sm"
			});
		});
	</script>
</div>
        <!-- content-wrapper ends -->
