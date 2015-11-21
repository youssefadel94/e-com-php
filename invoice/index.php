<?php
 require("../core/db_connect.php"); 
//get order-no

$user_id = $_SESSION['siuser'];

if (isset($_GET['view'])&& !empty($_GET['view'])) {
    $u_ID = $_SESSION['siuser'];
   $order_no = (int)$_GET['view'] ;
   
}

else{
    $sql="SELECT MAX(order_no) FROM `cart` WHERE user_id = '$user_id'"; 
    $query=mysql_query($sql); 
     
    $lastorder = mysql_fetch_assoc($query);
$order_no = (int) $lastorder['MAX(order_no)'];
$order_no = $order_no + 1 ;
   // echo $order_no;

    
    //decrement stock
    
     $sql="SELECT * FROM `products` JOIN `cart` ON `cart`.`p_id` = `products`.`ID_Int` WHERE user_id = '$user_id' AND order_no = '0'"; 
    $query=mysql_query($sql); 
    $pid = (int)0;
    $new_a = (int)0;
    
    while ($row=mysql_fetch_array($query)) {
       $pid = $row['p_id'];
        $a=(int) $row['available'];
         $b=(int) $row['quantity'];
        $new_a = $a - $b;
         $sql1="UPDATE `e-commerce`.`products` SET `available` = '$new_a' WHERE `products`.`ID_INT` = '$pid' "; 
    $query1=mysql_query($sql1);
        
    }
    
    
//confirm purchase


         $sql="UPDATE `e-commerce`.`cart` SET `order_no` = '$order_no' WHERE `cart`.`user_id` = '$user_id' AND order_no = '0'"; 
    $query=mysql_query($sql);
    
     
    
}

  
     
   



?>
<style>
  .btn:hover, .btn:focus {
    color: #333;
    text-decoration: none;
}
.btn-main-sm {
    background-color: yellowgreen;
   
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.428571429;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
}
</style>
<a href="/e-com" class="btn btn-main-sm" ><i class="fa fa-arrow-left"></i> Go Back </a>

<html class="en"><head>
		
		
            


        
		
        
		

		<style>
		.divWithCustomizationLinkTable  { width:100%;margin:0px; margin-top:10px; padding:0px;background-color:#FFFADC;border-top:2px solid #FCF5CD; border-bottom:2px solid #FCF5CD;padding:5px;padding-left:12px; }		
		.divWithCustomizationLinkIMG	{ margin:0px;padding:0px;}
		.topRowTax_class				{ }
		.invoiceDataHeadRow 			{ height:33px;}
		.invoiceDataDelete				{ padding-left:4px; border-left:1px solid #eaedee;border-bottom:1px solid #eaedee;width:14px;height:14px; cursor:pointer; vertical-align:top; padding-top:7px;}
		.invoiceDataItem 				{ border-bottom:1px solid #eaedee; vertical-align:top;padding-left:4px; }
		.inputInvoiceDataItem			{ outline:none;border:0px solid white; padding:5px; padding-top:5px;padding-left:1px; width:86px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c;}
		.invoiceDataDescription 		{ border-bottom:1px solid #eaedee;border-left:1px solid #eaedee;vertical-align:top; }
		.inputInvoiceDataDescription 	{ outline:none; overflow:hidden;border:0px solid white; padding:5px; width:304px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c; }

        html.en .inputInvoiceDataDescription_wTAX 	{ outline:none; overflow:hidden;border:0px solid white; padding:5px; width:303px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c; }
        html.fr .inputInvoiceDataDescription_wTAX 	{ outline:none; overflow:hidden;border:0px solid white; padding:5px; width:295px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c; }

        html.en .inputInvoiceDataDescription_wTAX2 	{ outline:none; overflow:hidden;border:0px solid white; padding:5px; width:219px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c; }
        html.fr .inputInvoiceDataDescription_wTAX2 	{ outline:none; overflow:hidden;border:0px solid white; padding:5px; width:211px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c; }


        .inputInvoiceDataPriceOrQty 	{ outline:none;border:0px solid white;text-align:right;width:100px; padding:5px; font-family:verdana;font-size:13px; color:silver;}

		.invoiceDataPriceOrQty			{ vertical-align:top;text-align:right;border-bottom:1px solid #eaedee;border-left:1px solid #eaedee;}

        html.en .inputInvoiceDataPriceOrQty_wTAX 	{ width:72px;outline:none;border:0px solid white;text-align:right; padding:5px; font-family:verdana;font-size:13px; color:silver;}
        html.fr .inputInvoiceDataPriceOrQty_wTAX 	{ width:68px;outline:none;border:0px solid white;text-align:right; padding:5px; font-family:verdana;font-size:13px; color:silver;}

		.invoiceDataTax_hidden			{ display:none;vertical-align:top;text-align:right;border-bottom:1px solid #eaedee;border-left:1px solid #eaedee;}
		.invoiceDataTax_visible			{ vertical-align:top;text-align:right;border-bottom:1px solid #eaedee;border-left:1px solid #eaedee;}
		.invoiceDataTax_percentage		{ border:0px solid red; float:right;padding-right:5px;padding-top:6px;width:15px;color:silver;font-family:verdana;font-size:12px;font-weight:normal;}
		.inputInvoiceDataTax		 	{ width:45px;outline:none;border:0px solid white;text-align:right; padding:5px; font-family:verdana;font-size:13px; color:silver;}
		
		.invoiceDataAmount				{ background-color:#eaedee;background-image:url(images/grey.png);background-repeat:repeat-x repeat-y;vertical-align:top;text-align:right;padding-right:4px;border-right:1px solid #eaedee;border-bottom:1px solid #eaedee;border-left:1px solid #eaedee;}
		.inputInvoiceDataAmount_wTAX 		{ width:72px; background-image:url(images/grey.png);background-repeat:repeat-x repeat-y;background-color:#eaedee;border:0px solid white;text-align:right; padding:5px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c;}
		.inputInvoiceDataAmount 		{ background-image:url(images/grey.png);background-repeat:repeat-x repeat-y;background-color:#eaedee;border:0px solid white;text-align:right; width:100px; padding:5px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c;}
		.invoice_notes_onFocus			{ background-color:#FFFADC; border:1px solid #54A0E7;}
		.send_button					{ margin-top:0px;}
		.toggleCustomizationLink		{ text-decoration:underline;font-family:arial; font-size:14px; color:#1869B8; cursor:pointer; }
		.divWithCustomization			{ width:100%;position:relative;background-color:white; border:1px solid #D1D1D1; margin:0px;margin-top:5px; margin-bottom:25px;padding-bottom:20px;}		
		.customization_itemsRow			{ height:18px;}
		.customization_itemsCellDelete  { width:17px;padding-left:0px; padding-top:0px;border-bottom:0px solid #d1d1d1;}
		.customization_itemsCellText	{ width:160px;border-bottom:0px solid #d1d1d1}
		.invoiceForm_fromNameTD			{ border-top:1px solid #ABADB3;border-left:1px solid #ABADB3; border-bottom:1px solid #E3E9EF;border-right:1px solid #DBDFE6;}
		.invoiceForm_fromNameTD:hover	{ border-top:1px solid #3D7BAD;border-left:1px solid #B5CFE7; border-bottom:1px solid #B7D9ED;border-right:1px solid #A4C9E3;}
		.invoiceForm_fromNameTD_onFocus	{ border:1px solid #54A0E7; background-color:#FFFADC;}
		.invoiceForm_logoBrowse 		{ 
		 font-size: 45px;
		 position: absolute;
		 right: -3px;
		 top: -3px;
		 opacity: 0;
		 filter: 
		 alpha(opacity=0);
		 -ms-filter: "alpha(opacity=0)";
		 -khtml-opacity: 0;
		 -moz-opacity: 0; 
		 }
		.invoiceForm_uploadArea 		{position:relative; margin-top:-14px; margin-right:0px;float:right; text-align:right; width:321px; align:right; height:125px; border:1px dashed #d1d1d1;background-color:#FFFADC;}
		.invoiceForm_uploadAreaNoBg		{position:relative; margin-top:-14px; margin-right:0px;float:right; text-align:right; width:300px; align:right; height:125px; border:1px dashed #d1d1d1;}
		.invoiceForm_uploadArea_done	{position:relative; margin-top:-16px; margin-right:0px;float:right; text-align:right; width:300px; align:right; }
		.invoiceForm_uploadArea_hidden	{display:none; }
		.invoiceForm_uploadField		{float:right;margin-right:0px; margin-bottom:0px; margin-top:3px; position: relative;width: 73px;height: 22px;overflow: hidden;}
		.invoiceForm_uploadField_hidden	{display:none;}

		 .saveButton { height:36px;width:139px;background-image:url(images/graph_button.png);background-repeat:no-repeat;border:0px;font-family:verdana;font-size:12px;color:#616161;padding-bottom:5px;font-weight:bold;}
		 .saveButton:hover { height:36px;width:139px;background-image:url(images/graph_button.png);background-repeat:no-repeat;border:0px;font-family:verdana;font-size:12px;color:black;padding-bottom:5px;font-weight:bold;cursor:pointer;}

		 .firstSaveButton { height:32px;width:120px;background-image:url(images/red-empty-button.gif);background-repeat:no-repeat;border:0px;font-family:verdana;font-size:14px;color:white;letter-spacing:1px; cursor:pointer; padding-bottom:0px;font-weight:bold;}
        .invoiceDataHeadlineEmpty { width:30px; border-top:1px solid #ccc; border-bottom:1px solid #ccc;padding-left:5px;text-align:left;font-weight:bold;}


		@media screen and (-webkit-min-device-pixel-ratio:0) {
    	/* Webkit-specific CSS here */
		.invoiceDataTax_percentage { border:0px solid red; float:right;padding-right:5px;padding-top:8px;width:15px;color:silver;font-family:verdana;font-size:12px;font-weight:normal;}		
		}

        p.spacing {
            text-align: justify;
            font-size: 13px;
            font-family: verdana;
            color: #3c3c3c;
            margin: 18px 0px 20px 0px;
        }

        h1.headline {
            font-size: 21px;
            font-weight: bold;
            font-family: verdana;
            color: #3c3c3c;
            margin: 0px;
            padding: 0px 0px 0px 0px;
        }

        .slide-out-div {
            padding: 20px 20px 0 20px;
            width: 410px;
            background: #ccc;
            border: 1px solid #29216d;
            text-align: left;
            -webkit-box-shadow: 4px 4px 10px 5px rgba(0, 0, 0, .1);
            box-shadow: 4px 4px 10px 5px rgba(0, 0, 0, .1);
            background-color: #f6f6f6;
            border: solid 1px #cccccc;
            font-family: Verdana, Geneva, sans-serif;
            font-size: 12px;
            line-height: 1.5 m;
            z-index: 100;
        }

        #feedbackMessageContainer{
            display: none;
            position: absolute;
            top:0;
            left:0;
            z-index: 999;
            background: #fff;
            width: 400px;
            height:100px;
            text-align: center;
        }
            /* Vertical alignment */
        #feedbackMessageContainer span{
            position: relative;
            top: 80px;
        }

        .placeholderC{
            color: #B2B2BD;
            font-family: Verdana
            font-size: 12px;
        }
		</style>
		
   	   
 	   
  	   	
	   	
	   	
	   	

 	   
 	   	
				

				
        
		
	    
	    			
		
		
        
        

        
        

		
		
		  
		
		
		
		


		</head>
		
	
    


        

		<body style="text-align: center; height:100%;width:100%;margin: 0 auto !important;">

		    

        

            
            
            
             

            

        
            
            

    <br>

        		<table id="main_table_wrapper" cellpadding="0" cellspacing="0" style="position: relative; top: 0px; width: 800px; text-align: left; margin: 0px auto !important;" border="0"><tbody><tr><td>

	 

		
		<!-- TB 1 -->
		<table style="width:100%; margin-left:0px;">
		<tbody><tr>
		<td style="text-align:left;padding-top:15px;">
		
		
		
			 
			
		

		<form id="invoice_form" name="invoice_form" action="" method="post" enctype="multipart/form-data" style="margin:0px;padding:0px;">

        
        

		
			 		
	 
	 
	
		

		
		
		

						
			

	
			

			
		
						



				

	     <!-- TB 2 -->
		 <table cellpadding="0" cellspacing="0" style="width:100%;margin:0px;padding:0px;margin-top:10px;">
	     
	      <tbody>
	     
	     <tr>
	      <td style="height:10px;"></td>
	     </tr>
	     <tr>
	     
	      <td colspan="100" width="100%" style="background-color:white;text-align:left;border-left:1px solid silver;border-top:1px solid silver;border-right:2px solid silver;border-bottom:2px solid silver;padding-left:20px;padding-right:20px; padding-top:15px; padding-bottom:15px;">
		   <!-- TB 3 -->
		   <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding:0px; margin:0px;text-align:left;">
	     
	     <tbody><tr>
	     <td><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tbody><tr style="vertical-align:bottom;">
	     <td style="padding:0px; margin:0px;">
	     <font style="font-size:18px;font-family:verdana;color:#3c3c3c;"></font>
	     </td>
	     
	     <td style="padding:0px; margin:0px;text-align:right;">
	     <font style="font-size:28px;font-weight:bold; letter-spacing:5px; font-family:arial;color:#808080;">
	     
		 		 <div id="invoiceHeadlineNoLogo" style="position:relative; z-index:100; margin-bottom:-14px;">
		<h4 id="invoice_heading" onchange="document.getElementById('invoice_heading_copy').value=this.value" style="text-align:right; padding-top:3px; padding-bottom:3px; padding-right:8px; width:250px; font-weight:bold; letter-spacing:5px; font-family:arial;font-size:28px;color:#808080;" class="invoiceForm_fromNameTD" onfocus="this.className='invoiceForm_fromNameTD_onFocus';" onblur="this.className='invoiceForm_fromNameTD';" type="text" name="invoice_heading" value="INVOICE">e-commerce</h4>
		 </div>
		 </font>
	     </td>
	     
	     </tr>
	     </tbody></table>
	     </td>
	     </tr>
	     
	     
	     <tr>
	     <td>
	     <!-- TB 4 -->
		 <table border="0" cellspacing="0" cellpadding="0" style="
    float: right;
"><tbody style="
">
		   <tr>
		   <td style="vertical-align:bottom;">

		   <!-- TB 5 -->
			<table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:100%; vertical-align:bottom;border:1px solid white;"> <tbody><tr><td style="width:155px;"></td><td></td><td></td></tr>

		<tr><td colspan="3">
		   		   		   
		   <div id="invoiceHeadlineWhenLogo" style="display:none; float:right; vertical-align:top;margin-top:5px;margin-bottom:20px;text-align:right;letter-spacing:3px;font-size:22px;color:#3c3c3c;font-weight:normal;font-family:arial;">
		   <br>
		   <input id="invoice_heading_copy" onchange="document.getElementById('invoice_heading').value=this.value" style="text-align:right; padding-top:3px; padding-bottom:3px; padding-right:8px; width:200px; font-weight:normal; letter-spacing:3px; font-family:arial;font-size:22px;color:#3c3c3c;" class="invoiceForm_fromNameTD" onfocus="this.className='invoiceForm_fromNameTD_onFocus';" onblur="this.className='invoiceForm_fromNameTD';" type="text" value="INVOICE">
		   </div>
		
		</td>
		</tr>


					
	    <tr style="height:25px;">
	    <td></td>
		<td style="width:146px; padding-right:8px;text-align:right;font-weight:bold;font-family:verdana;font-size:13px;color:#3c3c3c;">
            Invoice #		</td>	
			
		<td class="invoiceForm_fromNameTD" id="invoice_numberTD">
		<h4 id="invoice_number" style="outline:none;border:0px solid white; width:141px; padding-left:7px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c;" type="text" name="invoice_number" onfocus="document.getElementById('invoice_numberTD').className='invoiceForm_fromNameTD_onFocus';document.getElementById('invoice_number').style.backgroundColor='#FFFADC';" onkeyup="onlyNumbersLettersOrDashes(this)" onblur="document.getElementById('invoice_numberTD').className='invoiceForm_fromNameTD';document.getElementById('invoice_number').style.backgroundColor='#FFFFFF'; " value=""><?php echo $order_no?><h4>
		</td>
		</tr>
			
		<tr><td style="height:5px;"></td></tr>

					
		
		<tr id="po_numberTR" style="height:25px;display:none;">
	    <td></td>		
		<td style="width:126px; padding-right:8px;text-align:right;font-weight:bold;font-family:verdana;font-size:13px;color:#3c3c3c;">
            P.O. #		</td>	

		<td class="invoiceForm_fromNameTD" id="po_numberTD">
		<input id="po_number" style="outline:none;border:0px solid white; width:141px; padding-left:7px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c;" type="text" name="po_number" onfocus="document.getElementById('po_numberTD').className='invoiceForm_fromNameTD_onFocus';document.getElementById('po_number').style.backgroundColor='#FFFADC';" onkeyup="onlyNumbersLettersOrDashes(this)" onblur="document.getElementById('po_numberTD').className='invoiceForm_fromNameTD';document.getElementById('po_number').style.backgroundColor='#FFFFFF';" value="">
		</td>
		</tr>

		<tr id="po_numberBlankTR" style="display:none;"><td style="height:5px;"></td></tr> 

		<input type="hidden" name="customization_date_format_before conversion" value="mm/dd/yy"><input type="hidden" name="formatstr_before conversion" value="%m/%d/%Y"><input type="hidden" name="invoice_date_before_conversion" value=""><input type="hidden" name="invoice_date_after_conversion" value="">

                		
							
	    

		<tr><td style="height:5px;"></td></tr>

			 	


			
			<!-- TB 5 -->
			</tbody></table>	   


		   
		   
		   
		   </td>
		   </tr>
	   
		   
		   <!-- TB 4 -->
		   </tbody></table>
		   
		   </td>
		   

		   
		   
		   </tr>

		   <tr><td colspan="100" style="width:100%;vertical-align:top;padding-top:35px;">
		   
		   <!-- TB 4 -->
		   <table id="dataTable" border="0" cellpadding="0" cellspacing="0" width="100%" style="vertical-align:top;">
		   <tbody>
		   <tr id="topRow" style="background-color:#54A0E7;height:30px;">
		   <th style="width:14px;height:30px;"></th>
		   <th style="color:#FFFFFD;font-family:arial;font-size:14px;font-weight:400;padding-left:8px;text-align:left;">name</th>
		   <th style="color:#FFFFFD;font-family:arial;font-size:14px;font-weight:400;padding-left:5px;text-align:left;">Description</th>
		   <th style="color:#FFFFFD;font-family:arial;font-size:14px;font-weight:400;padding-left:0px;text-align:right;padding-right:4px;">Unit Price</th>
		   <th style="color:#FFFFFD;font-family:arial;font-size:14px;font-weight:400;padding-left:0px;text-align:right;padding-right:4px;">Quantity</th>
		   		   <th id="topRowTax" style="display:none;color:#FFFFFD;font-family:arial;font-size:14px;font-weight:400;padding-left:0px;text-align:right;padding-right:26px;padding-left:35px;">Tax </th>
		   		   <th id="topRowTax2" style="display:none;color:#FFFFFD;font-family:arial;font-size:14px;font-weight:400;padding-left:0px;text-align:right;padding-right:26px;padding-left:35px;">Tax </th>
		   <th style="color:#FFFFFD;font-family:arial;font-size:14px;font-weight:400;padding-left:0px;text-align:right;padding-right:10px;">total</th>
		   </tr>
		   
   <?php 
     $sql="SELECT * FROM `products` JOIN `cart` ON `cart`.`p_id` = `products`.`ID_Int` WHERE user_id = '$user_id' AND order_no = '$order_no'"; 
    $query=mysql_query($sql); 
     $ttotal = (int) 0 ;
    while ($row=mysql_fetch_array($query)) {
               
               ?>
		   		   
			   <tr class="invoiceDataHeadRow">

			   <td class="invoiceDataDelete">
			   
		   	   </td>	
		   		
		   	   <!--[if IE]>
			   <![endif]-->
			   
			   <!--[if !IE]-->
			   <!--[endif]-->

			    <td class="invoiceDataItem">

                				
				<p onfocus="invoiceForm_changeBackground(this,'#FFFADC');" onfocusin="invoiceForm_changeBackground(this,'#FFFADC');" onblur="invoiceForm_changeBackground(this,'#FFFFFF');" name="item[]" class="inputInvoiceDataItem">
				       		<?php echo $row['Name']?></p>		    
		   
		   		</td>
		   
		   				   		<td class="invoiceDataDescription">
										   		<p name="description[]" id="description[]" rows="1" cols="40" class="inputInvoiceDataDescription" onfocus="invoiceForm_changeBackground(this,'#FFFADC');" onblur="invoiceForm_changeBackground(this,'#FFFFFF');" onkeyup="sz(this,1);"><?php echo $row['description']?></p>	   		</td>  

			    			    <td class="invoiceDataPriceOrQty">
							                            <p name="unit_price[]" id="unit_price[]" type="text" autocomplete="off" class="inputInvoiceDataPriceOrQty" style="color:silver;" onkeyup="sanitizeInvoiceLineValues(this);" onblur="invoiceForm_changeBackground(this,'#FFFFFF');checkIfEmpty(this);reCalculate(this, 'dataTable', this.value);" onfocus="invoiceForm_changeBackground(this,'#FFFADC');if (this.value=='0.00') {this.value = '';this.style.color = '#3c3c3c';}" value="0.00"><?php echo $row['price']?></p>
		   	    </td>
		   
			     
			    <td class="invoiceDataPriceOrQty">
							                            <p name="qty[]" id="qty[]" type="text" autocomplete="off" class="inputInvoiceDataPriceOrQty" style="color:silver;" onkeyup="sanitizeInvoiceLineValues(this);" onblur="invoiceForm_changeBackground(this,'#FFFFFF');checkIfEmpty(this);reCalculate(this, 'dataTable', this.value);" onfocus="invoiceForm_changeBackground(this,'#FFFADC');if (this.value=='0.00') {this.value = '';this.style.color = '#3c3c3c';}" value="0.00"><?php echo $row['quantity']?></p>
		   	    </td>

			     
							    <td class="invoiceDataTax_hidden">
			                           
			    							    <td class="invoiceDataAmount">
			    <p name="total[]" id="total[]" type="text" autocomplete="off" readonly="" class="inputInvoiceDataAmount" value="0.00"><?php
                   $price=(int)$row['price'];
           $q=(int)$row['quantity'];
           $total=(int)$price * $q;
                   echo $total;?></p>
			    </td>
			    
		   	    </tr>
		   
		    		   
			   <?php $ttotal = $ttotal + $total;
    }?>
		   
		    
		   </tbody>
		   
		   <!-- TB 4 -->
		   </table>
		   
		   </td></tr>


		    
			
			
			<tr><td>&nbsp;</td></tr>
			
			<tr>
			<td>
			<!-- TB 4 -->
			<table border="0" cellpadding="0" cellspacing="0">
			
			<tbody><tr>
			<td style="width:500px;vertical-align:top;">
			
			<!-- TB 5 -->
			
		   </td>
		   <td style="width:1px;">
		   &nbsp;
		   </td>
		    
			<td style="vertical-align:top;">
			<!-- TB 5 -->
			<table id="table_sums" border="0" cellpadding="0" cellspacing="0">
			
			<tbody><tr><td>&nbsp;</td></tr>

					
			

									 
			
			<tr id="sum_blankSubtotalTR" style="height:3px;display:none;"><td></td></tr>
			
			<tr id="sum_discountTR" style="display:none;">
			<td style="width:0px;">&nbsp;</td>
			<td style="width:200px; font-family:verdana; font-size:11px; color:#3c3c3c; padding-left:10px;padding-bottom:1px;">
			- Discount			</td>
			<td align="right">
			<table border="0" cellpadding="0" cellspacing="0" style="width:70px;">
			<tbody><tr>
			<td>&nbsp;</td>
		   <td class="invoiceForm_fromNameTD" id="sum_discountTD" style="text-align:right;padding-right:4px;padding-bottom:1px;">
		                                                    <input id="sum_discount" autocomplete="off" style="outline:none; border:0px solid white;text-align:right; width:70px; padding-right:5px; font-family:verdana;font-size:13px;color:silver;" type="text" name="sum_discount" onkeyup="sanitizeInvoiceLineValues(this);" onfocus="field_onfocus(this,'0.00');" onblur="field_onblur(this,'');checkIfEmpty(this);reCalculate(this, 'dataTable', this.value);" value="0.00">
		   </td>
			</tr>
			</tbody></table>
			</td>
			</tr>
						
				
			<tr id="sum_blankAfterDiscountOrTaxTR" style="height:7px;"><td></td></tr>
			
						<tr>
			<td style="width:15px; border-top:2px solid #eaedee;">&nbsp;</td>
			<td style="border-top:2px solid #eaedee;font-family:verdana; font-size:13px; color:#3c3c3c; font-weight:bold;padding-top:7px;">
                Total			</td>
		   <td style="padding-top:7px; text-align:right;padding-right:4px;border-right:1px solid white;border-top:2px solid #eaedee;border-left:1px solid white;">
		   <p style="border:0px solid white;text-align:right; width:100px; padding-right:5px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c;" readonly="" type="text" name="sum_total" id="sum_total" value="0.00"><?php
                   
echo $ttotal;?></p>
		   </td>
			</tr>

			<!-- amount paid -->
			<tr>
			<td style="width:15px; border-top:0px solid #eaedee;">&nbsp;</td>
			<td style="border-top:0px solid #eaedee;font-family:verdana; font-size:13px; color:#3c3c3c; font-weight:bold;">
                Amount Paid			</td>
		   <td style="padding-bottom:7px;text-align:right;padding-right:4px;border-right:1px solid white;border-top:0px solid #eaedee;border-left:1px solid white;">
		   <input style="border:0px solid white;text-align:right; width:100px; padding-right:5px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c;" readonly="" type="text" name="amount_paid" id="amount_paid" value="0.00">
		   </td>
			</tr>

			<!-- balance due -->			
			<tr style="background-color:#FBFF9E;">
			<td style="background-color:#FBFF9E;width:15px; border-top:2px solid #eaedee;">&nbsp;</td>
			<td style="background-color:#FBFF9E;width:200px; border-top:2px solid #eaedee;font-family:verdana; font-size:13px; color:#3c3c3c; font-weight:bold;padding-top:7px;padding-bottom:7px;">
                Balance Due&nbsp;<span id="currency_code_output" style="font-family:verdana; font-size:13px; color:#3c3c3c; font-weight:normal;"></span>
			</td>
		   <td style="background-color:#FBFF9E;text-align:right;padding-right:4px;border-right:1px solid white;border-top:2px solid #eaedee;border-left:1px solid #FBFF9E;">
               <p style="background-color:#FBFF9E;border:0px solid white;text-align:right; width:100px; padding-right:5px; font-weight:normal; font-family:verdana;font-size:13px;color:#3c3c3c;" readonly="" type="text" name="balance_due" id="balance_due" value="$0.00"><?php
                   
                   echo $ttotal;?></p>
		   </td>
			</tr>
			
			
			<!-- TB 5 -->		   
			</tbody></table>
			</td>
			</tr>
			
			<tr><td>&nbsp;</td></tr>
			
			<!-- TB 4 -->		   
			</tbody></table>
			</td>
			
			
						
			
			</tr>
		   
		
		   
		   <!-- TB 3 -->
		   </tbody></table>
		   </td>
		   
		  </tr> 
		  <!-- TB 2 -->
		 </tbody></table>

 	    </form></td>
   		</tr>
   		<!-- TB 1 -->


   		</tbody></table>





        
         
        


        

   		
        
        



	
						
		
        		
		</td></tr></tbody></table>
        		
        
        		
		
        	</body></html>