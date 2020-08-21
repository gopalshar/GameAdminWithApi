<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Adomx - Responsive Bootstrap 4 Admin Template
    </title>
   <link rel="stylesheet" href="<?= base_url() ?>assets/css/vendor/bootstrap.min.css">
    <style>

        body {
            background:#f8f5f0;
        }
        .print_box {
    width: 80%;
    margin: auto;
    padding: 53px;
    background:white;   
    margin:67px;
    font-family: sans-serif;
}
h1.main_heading {
    font-weight: 900;
    padding-bottom: 0px;
    margin-left: 7px;

}
.row .heading {
    font-weight: bold;
    /*margin-left: 7px;*/
    background-color:#f8f5f0;
    padding:12px;
}
/*.row .content {
    background-color:#f8f5f0;
    padding:12px;
    border-left:4px solid rgba(0,0,0,0.1);
}*/
#user_details {
    margin:22px 0px;
}
.col-md-12 .row {
    padding:12px;
    font-size: 15px;
}
</style>
  </head>
  <body>
    <div class="container">
        <div class="print_box"> 
            <div class="row">
                
                    
                <div class="col-md-6">
                    <h1 class="main_heading">Invoice</h1>
                </div>
                
            
                
                <!-- <ul>
                    <li>
                        <div class="datalist">
                            <strong>
                        </div>
                    </li>
                </ul> -->
                <div class="col-md-12" id="user_details">
                    <div class="row">
                        <div class="col-sm-12 col-6 heading">Name</div>
                        <div class="col-sm-12 col-6 content"><?= $user->user_name ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-6 heading">Phone Number</div>
                        <div class="col-sm-12 col-6 content"><?= $user->user_contact    ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-6 heading">Address</div>
                        <div class="col-sm-12 col-6 content"><?= $user->user_address ?></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <th>Subscription Name</th>
                            <th>Price</th>
                            <th>Validity</th>
                            <th>Hours</th>
                            <th>Valid Date</th>
                            <th>Expiry Date</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $user->sub_name  ?></td>
                                <td><?= $user->sub_price.' '.$user->sub_price_currency ?></td>
                                <td><?= $user->sub_validity.' Months' ?></td>
                                <td><?= $user->sub_hours ?></td>
                                <td>
                                    <?php $date=date_create($user->subscription_activation_date);
                           ?>

                          <?= (empty($user->subscription_activation_date))?'Not activated':htmlentities(date_format($date,'d  M  yy')); ?>
                                </td>
                                <td>
                                     <?php $d = strtotime("+".$user->sub_validity." months",strtotime($user->subscription_activation_date));  ?>
                          <?= (empty($user->subscription_activation_date))?'Not Activated':

                          (date("d M Y",$d) <= date("d M Y") ?'Plan Expired':date("d M Y",$d))

                          ;?>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>

                </div>
                
            </div>
            <div class="row text-center">
             <input type="button" id="blockme" class="btn btn-success" value="Print Invoice" 
               onclick="window.print()" />
        </div>
        </div>
        
    </div>

  </body>
 
<html>    