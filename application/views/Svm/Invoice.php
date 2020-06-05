<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .invoice-box{
        font-size: 15px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    .invoice-box table tr.item td:nth-child(2){
        border-bottom: 1px solid;
    }
    .invoice-box table tr.box td:nth-child(1){
        border-bottom: 1px solid;
    }
    .text{
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="invoice-box" >
        <table cellpadding="0" cellspacing="0" border=1 style="margin-left:auto;margin-right:auto;" >
            <div class="head">
                <tr>
                <td rowspan=2>
                <img src="<?= base_url('assets/images/logo_protelindo.png')?>" style="width: 30%">
                </td>
                <td colspan=2 style="text-align: center; padding: 20px; font-weight: bold; font-style: inherit;">PT. PROFESIONAL TELEKOMUNIKASI INDONESIA</td>
                </tr>
                <tr>
                <td style="text-align: center; padding: 20px; font-weight: bold; font-style: italic;">EXPENSE REPORT</td>
                <td style="text-align: center; padding: 20px; font-weight: bold; font-style: inherit;">AP-Form-<?=$inv['id_travel']?></td>
                </tr>
            </div>
        </table>
        <table style="margin-left:35px;">
        <div class="information">
            <tr>
                <td>EMPLOYEE NAME</td>
                <td>:</td>
                <td style="border-bottom: 1px solid;"><?=$inv['fullname']?></td>
            </tr>
                <tr>
                <td>DEPARTMENT NAME</td>
                <td>:</td>
                <td style="border-bottom: 1px solid;"><?=$inv['nama_department']?></td>
            </tr>
            <tr>
                <td>LOCATION</td>
                <td>:</td>
                <td style="border-bottom: 1px solid;"><?=$inv['lokasi']?></td>
            </tr>
            <tr>
                <td>DATE</td>
                <td>:</td>
                <td style="border-bottom: 1px solid;"><?=date('d-m-yy',strtotime($inv['start_trip']))." - ".date('d-m-yy',strtotime($inv['end_trip']))?></td>
            </tr>
            <tr>
                <td>NOMINATIF FORM NUMBER</td>
                <td>:</td>
                <td style="border-bottom: 1px solid;"></td>
            </tr>
            <tr>
                <td>PO NUMBER</td>
                <td>:</td>
                <td style="border-bottom: 1px solid;"></td>
            </tr>
        </div>
    </table>
    <hr style="width: 86%; border:1px solid; margin-left:auto;margin-right:auto;">
    <table style="margin-left:35px;">
        <tr class="item">
            <td style="font-weight: bold;">
            REGULAR ADVANDE OR ROTATIVE RECEIVED (if applicable)
            </td>
            <td>
                Rp 
            </td>
        </tr>
        <tr>
            <td style="font-weight: bold;">COST DETAILS (Please attach receipts)</td>
        </tr>
        <tr class="item">
            <td>
                1. Transportation
            </td>
        
            <td>
                <?="Rp ".number_format($inv['transportation'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
                2. Toll / Parking
            </td>
            
            <td>
            <?="Rp ".number_format($inv['tollorparking'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
                3. Meals
            </td>
            
            <td>
                <?="Rp ".number_format($inv['meals'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
            4. Supplies/Stationary
            </td>
            
            <td>
                <?="Rp ".number_format($inv['supplies'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
            5. Voucher
            </td>
            
            <td>
                <?="Rp ".number_format($inv['voucher'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
            6. Gasoline
            </td>
            
            <td>
                <?="Rp ".number_format($inv['gasoline'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
            7. Entertain
            </td>
            
            <td>
                <?="Rp ".number_format($inv['entertain'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
            8. Ticket
            </td>
            
            <td>
                <?="Rp ".number_format($inv['ticket'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
            9. Hotel
            </td>
            
            <td>
                <?="Rp ".number_format($inv['hotel'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
            10. Taxi Inner Jakarta
            </td>
            
            <td>
                <?="Rp ".number_format($inv['taxiinjkt'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
            11. Aiport Train
            </td>
            
            <td>
                <?="Rp ".number_format($inv['airporttrain'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
            12. Taxi Outside Jakarta
            </td>
            
            <td>
                <?="Rp ".number_format($inv['taxioutjkt'],2,',','.')?>
            </td>
        </tr>
        <tr class="item">
            <td>
            13. Team Meeting/Lunch
            </td>
            
            <td>
                <?="Rp ".number_format($inv['lunch'],2,',','.')?>
            </td>
        </tr>
        <tr class="item last">
            <td>
            14. Ticket Refund
            </td>
            
            <td>
                <?="Rp ".number_format($inv['refund'],2,',','.')?>
            </td>
        </tr>
        <?php $arr = array($inv['transportation'],$inv['tollorparking'],$inv['meals'],$inv['supplies'],
    $inv['voucher'],$inv['gasoline'],$inv['entertain'],$inv['ticket'],$inv['hotel'],$inv['taxiinjkt'],$inv['airporttrain'],$inv['taxioutjkt'],
    $inv['lunch'],$inv['refund']);
    $total = array_sum($arr)?>
        <tr class=item>
            <td style="font-weight: bold;">TOTAL EXPENSES</td>
            <td style="font-weight: bold;"><?="Rp ".number_format($total,2,',','.')?></td>
        </tr>
        <tr class=item>
            <td style="font-weight: bold;">CASH TO BE RETURNED</td>
            <td style="font-weight: bold;">Rp </td>
        </tr>
    </table>
    <table style="margin-top: 10px auto; margin-left: 35px;">
    <tr>
    <td>Transfer To</td>
    <td>:</td>
    <td style="border-bottom: 1px solid; font-style: italic;"><?=$inv['fullname']?></td>
    </tr>
    <tr>
    <td>Bank Account & Number</td>
    <td>:</td>
    <td style="border-bottom: 1px solid; font-style: italic;"><?=$inv['bank_acc']?></td>
    </tr>
    </table>
    <?php $deli = explode(',',$inv['keterangan']);
    $gm = explode(" ",$deli[1]);
    
    ?>
    <table cellpadding="0" cellspacing="0" border=1 style="margin-top: 30px auto; margin-left:auto;margin-right:auto; ">
        <tr class='text'>
            <td>Prepared By</td>
            <td>Reviewed By</td>
        </tr>
        <tr class='text'>
            <td><br><br><?=$inv['fullname']?><br>
                Tanggal <?=date('d-m-yy',strtotime($inv['end_trip']))?>
            </td>
            <td><br><br><?=$gm[2]?> <br>
            <?= "Tanggal"." ".$gm[count($gm)-1]?>
            </td>
            
        </tr>
    </table>
    </div>