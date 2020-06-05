<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url('managerhome/')?>"><?= $dashboard?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <button type='button' class='btn btn-light'>
        <a class="nav-link" href="<?= base_url('managerhome/')?>">Home <span class="sr-only">(current)</span></a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-light'>
        <a class="nav-link" href="<?= base_url('managerhome/perjalanan')?>">Perjalanan</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-light'>
        <a class="nav-link" href="<?= base_url('managerhome/history')?>">History Perjalanan</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('managerhome/approval')?>">Approval</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('managerhome/user')?>">Tambah Sweeper</a>
      </button>
      </li>
      
    </ul>
    <div class="topnav-right">
        <div class="dropdown">
            <button class="fa fa-gear dropbtn" onclick="myFunction()"></button>
            <div id="myDropdown" class="dropdown-content isidrop">
            <a data-toggle="modal" data-target="#settings">Pengaturan</a>
                <a href="<?= base_url('login/logout')?>">Keluar</a>
            </div>
        </div>
    </div>
  </div>
</nav>
<?php if($hist == NULL){?>
    <div class="container my-3" style="background-color: white;">
        <center>
            <h3>Data Not Found</h3>
            <a href="<?= base_url('managerhome/history')?>" class='btn btn-outline-warning btn-lg my-3'>Back</a>
        </center>
    </div>
<?php } else{?>
    <div class="container my-3" style="background-color: white;">

        <a href="<?= base_url('managerhome/history')?>" class='btn btn-outline-warning my-3' role='button'>Back</a>
        <?php if($trv['end_trip'] === "0000-00-00"):?>
        <a class="btn btn-outline-danger my-3 ml-3" href="<?=base_url('managerhome/end_trip/'.$hist[0]['id_travel'])?>" role="button" >End Trip</a>
        <?php endif;?>
        <table class='table table-hover'>
            <?php foreach($hist as $h):?>
                <tr>
                    <td>Transportation</td>
                    <td>:</td>
                    <td><?= "Rp ".number_format($h['transportation'],2,',','.')?></td>
                    <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_transportation'])?>" alt=""></td>
                </tr>
                <tr>
                    <td>Toll/Parking</td>
                    <td>:</td>
                    <td><?= "Rp ".number_format($h['tollorparking'],2,',','.')?></td>
                    <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_tollorparking'])?>" alt=""></td>
                </tr>
                <tr>
                    <td>Meals</td>
                    <td>:</td>
                    <td><?= "Rp ".number_format($h['meals'],2,',','.')?></td>
                    <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_meals'])?>" alt=""></td>
        </tr>
        <tr>
            <td>Supplies</td>
            <td>:</td>
            <td><?= "Rp ".number_format($h['supplies'],2,',','.')?></td>
            <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_supplies'])?>" alt=""></td>
        </tr>
        <tr>
            <td>Voucher</td>
            <td>:</td>
            <td><?= "Rp ".number_format($h['voucher'],2,',','.')?></td>
            <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_voucher'])?>" alt=""></td>
        </tr>
        <tr>
            <td>Entertain</td>
            <td>:</td>
            <td><?= "Rp ".number_format($h['entertain'],2,',','.')?></td>
            <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_entertain'])?>" alt=""></td>
        </tr>
        <tr>
            <td>Ticket</td>
            <td>:</td>
            <td><?= "Rp ".number_format($h['ticket'],2,',','.')?></td>
            <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_ticket'])?>" alt=""></td>
        </tr>
        <tr>
            <td>Hotel</td>
            <td>:</td>
            <td><?= "Rp ".number_format($h['hotel'],2,',','.')?></td>
            <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_hotel'])?>" alt=""></td>
        </tr>
        <tr>
            <td>Taxi inner jakarta</td>
            <td>:</td>
            <td><?= "Rp ".number_format($h['taxiinjkt'],2,',','.')?></td>
            <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_taxiinjkt'])?>" alt=""></td>
        </tr>
        <tr>
            <td>Airport Train</td>
            <td>:</td>
            <td><?= "Rp ".number_format($h['airporttrain'],2,',','.')?></td>
            <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_airporttrain'])?>" alt=""></td>
        </tr>
        <tr>
            <td>Taxi out Jakarta</td>
            <td>:</td>
            <td><?= "Rp ".number_format($h['taxioutjkt'],2,',','.')?></td>
            <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_taxioutjkt'])?>" alt=""></td>
        </tr>
        <tr>
            <td>Lunch</td>
            <td>:</td>
            <td><?= "Rp ".number_format($h['lunch'],2,',','.')?></td>
            <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_lunch'])?>" alt=""></td>
        </tr>
        <tr>
            <td>Refund</td>
            <td>:</td>
            <td><?= "Rp ".number_format($h['refund'],2,',','.')?></td>
            <td><img src="<?= base_url('assets/show_bukti/'.$h['fp_refund'])?>" alt=""></td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-secondary btn-lg" disabled>Submited <?=date('d-m-yy',strtotime($h['submit_date']))?></button>
            </td>
            <?php if($trv['status'] == 0):?>
            <td>
                <a href="#" class="btn btn-outline-primary btn-lg" style="float: center;" data-toggle="modal" data-target="<?="#exampleModal".$h['id_detail']?>">Edit</a>
            </td>
            <td>
                <a href="<?= base_url('managerhome/hapus_detail/'.$h['id_detail'])?>" class="btn btn-outline-danger btn-lg" style="float: right;">Hapus</a>
            </td>
            <?php endif;?>
        </tr>

        <div class="modal fade" id="exampleModal<?=$h['id_detail']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Expense Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="<?= base_url('managerhome/edit_detail/'.$h['id_detail'])?>" enctype="multipart/form-data" method='post'>
                    <div class="form-group col-md-12">
                    <label for="transportation">Transportation</label>
                    <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="transportation" name="transportation" value="<?=$h['transportation']?>">
                    <label for="upload">Upload bukti</label>
                    <input type="file" class="form-control-file" id="upload" name='files[]'>  
                    </div>
                    <div class="form-group col-md-12">
                        <label for="tollorparking">Toll/Parking</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="tollorparking" name="tollorparking" value="<?=$h['tollorparking']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="meals">Meals</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="meals" name="meals" value="<?=$h['meals']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="supplies">Supplies/Stationary</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="supplies" name="supplies" value="<?=$h['supplies']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="voucher">Voucher</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="voucher" name="voucher" value="<?=$h['voucher']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]' >
                    </div>
                    <div class="form-group col-md-12">
                        <label for="gasoline">Gasoline</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="gasoline" name="gasoline" value="<?=$h['gasoline']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="entertain">Entertain</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="entertain" name="entertain" value="<?=$h['entertain']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="ticket">Ticket</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="ticket" name="ticket" value="<?=$h['ticket']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="hotel">Hotel</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="hotel" name="hotel" value="<?=$h['hotel']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="taxiinjkt">Taxi Inner Jakarta</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="taxiinjkt" name="taxiinjkt" value="<?=$h['taxiinjkt']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="airporttrain">Airport Train</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="airporttrain" name="airporttrain" value="<?=$h['airporttrain']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="taxioutjkt">Taxi Outside Jakarta</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="taxioutjkt" name="taxioutjkt" value="<?=$h['taxioutjkt']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="lunch">Team Meeting/Lunch</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="lunch" name="lunch" value="<?=$h['lunch']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="refund">Ticket Refund</label>
                        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="refund" name="refund" value="<?=$h['refund']?>">
                        <label for="upload">Upload bukti</label>
                        <input type="file" class="form-control-file" id="upload" name='files[]'> 
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
                </form>
                </div>
                </div>
            </div>
            </div>
        <?php endforeach;?>
    </table>
    <center>
    <?php if($trv['status'] == 0):?>
    <a href="<?= base_url('managerhome/save_changes/'.$h['id_travel'])?>" class="btn btn-outline-primary btn-lg my-3" style="font-weight: bold;" >Save Changes</a>
    <?php endif;?>
    </center>
    <?php }?>
</div>