<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url('svmhome/')?>"><?= $dashboard?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <button type='button' class='btn btn-light'>
        <a class="nav-link" href="<?= base_url('svmhome/')?>">Home <span class="sr-only">(current)</span></a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-light'>
        <a class="nav-link" href="<?= base_url('svmhome/perjalanan')?>">Perjalanan</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-light'>
        <a class="nav-link" href="<?= base_url('svmhome/history')?>">History Perjalanan</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('svmhome/approval')?>">Approval</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('svmhome/user')?>">Manager</a>
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
            <a href="<?= base_url('svmhome/approval')?>" class='btn btn-outline-warning btn-lg my-3'>Back</a>
        </center>
    </div>
<?php } else{?>
    <div class="container my-3" style="background-color: white;">
        <a href="<?= base_url('svmhome/approval')?>" class='btn btn-outline-warning my-3' role='button'>Back</a>
        
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
        </tr>
        <?php endforeach;?>
    </table>
    <center>

        <table>
            <tr>
                <td>Transportation</td>
                <td>:</td>
                <td><?= "Rp ".number_format($trv['transportation'],2,',','.')?></td>
                
            </tr>
            <tr>
                <td>Toll/Parking</td>
                <td>:</td>
                <td><?= "Rp ".number_format($trv['tollorparking'],2,',','.')?></td>
                
            </tr>
            <tr>
        <td>Meals</td>
        <td>:</td>
        <td><?= "Rp ".number_format($trv['meals'],2,',','.')?></td>
        
    </tr>
    <tr>
            <td>Supplies</td>
            <td>:</td>
            <td><?= "Rp ".number_format($trv['supplies'],2,',','.')?></td>
            
        </tr>
        <tr>
            <td>Voucher</td>
            <td>:</td>
            <td><?= "Rp ".number_format($trv['voucher'],2,',','.')?></td>
            
        </tr>
        <tr>
            <td>Entertain</td>
            <td>:</td>
            <td><?= "Rp ".number_format($trv['entertain'],2,',','.')?></td>
            
        </tr>
        <tr>
            <td>Ticket</td>
            <td>:</td>
            <td><?= "Rp ".number_format($trv['ticket'],2,',','.')?></td>
            
        </tr>
        <tr>
            <td>Hotel</td>
            <td>:</td>
            <td><?= "Rp ".number_format($trv['hotel'],2,',','.')?></td>
            
            <tr>
                <td>Taxi inner jakarta</td>
                <td>:</td>
                <td><?= "Rp ".number_format($trv['taxiinjkt'],2,',','.')?></td>
                
            </tr>
            <tr>
                <td>Airport Train</td>
                <td>:</td>
                <td><?= "Rp ".number_format($trv['airporttrain'],2,',','.')?></td>
                
            </tr>
            <tr>
                <td>Taxi out Jakarta</td>
                <td>:</td>
                <td><?= "Rp ".number_format($trv['taxioutjkt'],2,',','.')?></td>
                
            </tr>
            <tr>
                <td>Lunch</td>
                <td>:</td>
                <td><?= "Rp ".number_format($trv['lunch'],2,',','.')?></td>
                
            </tr>
            <tr>
                <td>Refund</td>
                <td>:</td>
                <td><?= "Rp ".number_format($trv['refund'],2,',','.')?></td>
                
            </tr>
        </table>
        <a class="btn btn-outline-danger my-3 ml-3" href="<?=base_url('svmhome/reject/'.$hist[0]['id_travel'])?>" role="button" >Reject</a>
        <a class="btn btn-outline-primary my-3 ml-3" href="<?=base_url('svmhome/approve/'.$hist[0]['id_travel'])?>" role="button" >Approve</a>
    </center>
    <?php }?>
</div>