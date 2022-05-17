<?php
include "includes/db.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="styles/Cart.css"/>
    <script id="applicationScript" type="text/javascript" src="js/Cart.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
          border-collapse: collapse;
          border-spacing: 0;
          width: 100%;
          border: 1px solid #ddd;
        }
        th, td {
          text-align: left;
          padding: 20px;
        }
        tr:nth-child(even) {
          background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div id="Cart" class="Cart_Class">
        <div data-type="ScrollableGroup" data-name="滚动组 3" class="n_3_ue_Class">
            <div data-type="Group" data-name="Cart" class="Cart_uf_Class">

            <!--outside-->
                <svg data-type="Rectangle" data-name="Cart BG" class="Cart_BG">
                    <rect class="Cart_BG_Class" rx="0" ry="0" x="0" y="0" width="439" height="683">
                    </rect>
                </svg>



<div class=" col-sm-12  my-5 table-responsive p-4">
<table>
<?php
$sum = 0;
$user_id = $_SESSION['user_id'];
$query = " SELECT service.price AS Price, service.id, service.name AS Name FROM cart JOIN service ON cart.service_id = service.id WHERE cart.user_id='$user_id'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) >= 1) {
    ?>
                        <thead>
                            <tr>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                                <?php
while ($row = mysqli_fetch_array($result)) {
        $sum += $row["Price"];
        $id = $row["id"] . ", ";
        echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Price"] . "</td><td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'> Remove</a></td></tr>";
    }
    $id = rtrim($id, ", ");
    ?>
                            </tbody>
                            <?php
} else {
    echo "<div> <img src='images/emptycart.png' class='image-fluid' height='120' width='150'></div><br/>";
    echo "<div style='font-family: Ubuntu, serif; color: rgba(53,78,87,1)' class='text-bold  h5'>Add items to the cart first!</div> ";

}
?>
                        <?php
?>
                        </tbody>
                    </table>
                </div>




        		</div>

        <div data-type="Group" data-name="Bottom" class="Bottom_Class">

        				<div data-type="Text" data-name="Estimated Total" class="Estimated_Total_Class">
        					<span>Estimated Total</span>
        				</div>

        				<div data-type="Text" data-name="￥200" class="n_00_up_Class">
        					<?php echo $sum ?>
        				</div>
        				<svg data-type="Line" data-name="直线 43" class="n_43" viewBox="0 0 354 1">
        					<path class="n_43_Class" d="M 0 0 L 354 0">
        					</path>
        				</svg>
        				<a href='Check_out.php'>
                            <div data-type="Group" data-name="组 3091" class="n_3091_Class">
                                <svg data-type="Rectangle" data-name="矩形 803" class="n_803">
                                    <rect class="n_803_Class" rx="10" ry="10" x="0" y="0" width="354" height="50">
                                    </rect>
                                </svg>
                                <div data-type="Text" data-name="Checkout" class="Checkout_Class">
                                    <span>Checkout</span>
                                </div>
                            </div>
                        </a>
        			</div>

        			<!--top text-->
                    			<div data-type="Group" data-name="Top" class="Top_Class">
                    				<div data-type="Text" data-name="Your Cart" class="Your_Cart_Class">
                    					<span>Your Cart</span>
                    				</div>
                    				<div data-type="Text" data-name="1 items" class="n__items__Edit_Class">
                    					<?php echo mysqli_num_rows($result)." items"?>
                    				</div>

                    				<svg data-type="Path" data-name="Icon ionic-md-close" class="Icon_ionic-md-close" viewBox="7.523 7.523 14.444 14.444">
                    					<path class="Icon_ionic-md-close_Class" d="M 21.96728515625 8.967723846435547 L 20.52299880981445 7.5234375 L 14.74536037445068 13.30107307434082 L 8.967723846435547 7.5234375 L 7.5234375 8.967723846435547 L 13.30107307434082 14.74536037445068 L 7.5234375 20.52299880981445 L 8.967723846435547 21.96728515625 L 14.74536037445068 16.18965148925781 L 20.52299880981445 21.96728515625 L 21.96728515625 20.52299880981445 L 16.18965148925781 14.74536037445068 L 21.96728515625 8.967723846435547 Z">
                    					</path>
                    				</svg>
                    			</div>
	</div>



	<!--top navigation-->
	<div data-type="Symbol" data-name="Top bar" class="Top_bar Top_bar_u_Class">
		<div data-type="Group" data-name="Top bar" class="Top_bar_va_Class">
			<svg data-type="Rectangle" data-name="矩形 2" class="n_2_u">
				<rect class="n_2_u_Class" rx="0" ry="0" x="0" y="0" width="1366" height="85">
				</rect>
			</svg>
			<div data-type="Group" data-name="组 3062" class="n_3062_u_Class">
				<div data-type="Group" data-name="Navigator" class="Navigator_u_Class">
					<a href="Message.php">
					<div data-type="Text" data-name="Messages" onclick="application.goToTargetView(event)" class="Messages_u_Class">
						<span>Messages</span>
					</div>
					</a>
					
					<a href="Orders.php">
					<div data-type="Text" data-name="Orders" onclick="application.goToTargetView(event)" class="Orders_u_Class">
						<span>Orders</span>
					</div>
					</a>
					
					<div data-type="Text" data-name="Cart" class="Cart_u_Class">
						<span>Cart</span>
					</div>
					
					<a href="Profile.php">
					<svg data-type="Path" data-name="Icon awesome-user-circle" class="Icon_awesome-user-circle_u" viewBox="0 0.563 38.816 38.816">
						<path onclick="application.goToTargetView(event)" class="Icon_awesome-user-circle_u_Class" d="M 19.40787124633789 0.5625 C 8.686587333679199 0.5625 0 9.249087333679199 0 19.97037124633789 C 0 30.6916561126709 8.686587333679199 39.37824249267578 19.40787124633789 39.37824249267578 C 30.1291561126709 39.37824249267578 38.81574249267578 30.6916561126709 38.81574249267578 19.97037124633789 C 38.81574249267578 9.249087333679199 30.1291561126709 0.5625 19.40787124633789 0.5625 Z M 19.40787124633789 8.075224876403809 C 23.2111873626709 8.075224876403809 26.29453659057617 11.15857124328613 26.29453659057617 14.96188926696777 C 26.29453659057617 18.76520538330078 23.2111873626709 21.84855270385742 19.40787124633789 21.84855270385742 C 15.6045560836792 21.84855270385742 12.52120685577393 18.76520538330078 12.52120685577393 14.96188926696777 C 12.52120685577393 11.15857219696045 15.60455417633057 8.075224876403809 19.40787124633789 8.075224876403809 Z M 19.40787124633789 34.99582290649414 C 14.81415367126465 34.99582290649414 10.69780731201172 32.9141731262207 7.943140983581543 29.65865516662598 C 9.414381980895996 26.88833808898926 12.29426097869873 24.97885513305664 15.65150833129883 24.97885513305664 C 15.83932781219482 24.97885513305664 16.02714538574219 25.01015853881836 16.20713806152344 25.0649356842041 C 17.2244873046875 25.39361953735352 18.28878784179688 25.60491371154785 19.40787124633789 25.60491371154785 C 20.52695465087891 25.60491371154785 21.59908294677734 25.39361953735352 22.60860633850098 25.0649356842041 C 22.78859710693359 25.01015663146973 22.97641563415527 24.97885513305664 23.16423416137695 24.97885513305664 C 26.52148246765137 24.97885513305664 29.40135955810547 26.88833808898926 30.87260246276855 29.65865516662598 C 28.11793518066406 32.9141731262207 24.00158882141113 34.99582290649414 19.40787124633789 34.99582290649414 Z">
						</path>
					</svg>
					</a>
				</div>
				
				<a href="Homepage.php">
				<div data-type="Group" data-name="Logo" class="Logo_va_Class">
					<div data-type="Group" data-name="Logo-Text" class="Logo-Text_vb_Class">
						<div data-type="Text" data-name="LOZA" class="LOZA_vc_Class">
							<span>Study Abroad</span>
						</div>
						<div data-type="Group" data-name="Logo" class="Logo_vd_Class">
							<svg data-type="Rectangle" data-name="Container" class="Container_ve">
								<rect class="Container_ve_Class" rx="0" ry="0" x="0" y="0" width="43" height="43">
								</rect>
							</svg>
							<svg data-type="Path" data-name="Icon ionic-md-globe" class="Icon_ionic-md-globe_vf" viewBox="3.375 3.375 35 35">
								<path class="Icon_ionic-md-globe_vf_Class" d="M 20.875 3.375 C 11.20995044708252 3.375 3.375 11.21003437042236 3.375 20.875 C 3.375 30.53996276855469 11.20995044708252 38.375 20.875 38.375 C 30.53996276855469 38.375 38.375 30.53996276855469 38.375 20.875 C 38.375 11.21003437042236 30.53996276855469 3.375 20.875 3.375 Z M 19.06198310852051 35.76674270629883 C 15.74169445037842 35.36912155151367 12.669602394104 33.88279724121094 10.26831722259521 31.48159790039062 C 7.435167789459229 28.6484489440918 5.874975681304932 24.88165664672852 5.874975681304932 20.875 C 5.874975681304932 17.26815032958984 7.140023231506348 13.85615348815918 9.459193229675293 11.14407348632812 C 9.518928527832031 11.86064720153809 9.666417121887207 12.62888050079346 9.628640174865723 13.17802715301514 C 9.490659713745117 15.18000984191895 9.293111801147461 16.43294334411621 10.46493816375732 18.12194442749023 C 10.92145156860352 18.77979278564453 11.03360462188721 19.72285652160645 11.25580310821533 20.48427772521973 C 11.47312164306641 21.22920227050781 12.34130764007568 21.61992645263672 12.94009399414062 22.07888031005859 C 14.1481819152832 23.00511932373047 15.30393981933594 24.08170318603516 16.58497428894043 24.89688301086426 C 17.43044281005859 25.4349250793457 17.95855712890625 25.70255851745605 17.7109489440918 26.73430061340332 C 17.51179885864258 27.56403541564941 17.4561882019043 28.07515525817871 17.02693176269531 28.81436157226562 C 16.89593505859375 29.03992652893066 17.52138900756836 30.49015426635742 17.72953987121582 30.69830322265625 C 18.36038398742676 31.32905960083008 18.98634147644043 31.90773773193359 19.67397689819336 32.47564697265625 C 20.74004745483398 33.35645294189453 19.57040596008301 34.50093460083008 19.06198310852051 35.76674270629883 Z M 31.48159790039062 31.48159790039062 C 29.32497215270996 33.63822174072266 26.62711524963379 35.0561408996582 23.69443321228027 35.61101150512695 C 24.11005973815918 34.58322143554688 24.85010719299316 33.67002487182617 25.53656387329102 33.14064788818359 C 26.1336669921875 32.67992782592773 26.88153839111328 31.79373359680176 27.19342613220215 31.09180068969727 C 27.50506019592285 30.39079093933105 27.91790962219238 29.78309059143066 28.33572006225586 29.13845062255859 C 28.93013191223145 28.22146606445312 26.87018203735352 26.83854484558105 26.20265579223633 26.5487003326416 C 24.70051765441895 25.89657402038574 23.56974792480469 25.0166130065918 22.23478698730469 24.07724761962891 C 21.28364372253418 23.40804290771484 19.35258674621582 24.42674446105957 18.27877616882324 23.95802688598633 C 16.80801963806152 23.31582832336426 15.59631156921387 22.19995307922363 14.31788635253906 21.2371997833252 C 12.99865531921387 20.24365234375 13.06242942810059 19.08537292480469 13.06242942810059 17.61966323852539 C 14.09576988220215 17.65777587890625 15.56577110290527 17.33369064331055 16.25180625915527 18.16468620300293 C 16.46828269958496 18.42693328857422 17.21262168884277 19.5985107421875 17.71086883544922 19.18221092224121 C 18.11791038513184 18.8420581817627 17.40924453735352 17.47857284545898 17.27235984802246 17.15801811218262 C 16.85126304626465 16.1723804473877 18.2318286895752 15.78796863555908 18.93847846984863 15.11960315704346 C 19.86059188842773 14.24763298034668 21.83859443664551 12.88010883331299 21.68227386474609 12.25507259368896 C 21.52595329284668 11.63003730773926 19.70309066772461 9.859171867370605 18.63248062133789 10.13547039031982 C 18.4720344543457 10.17686462402344 17.05941390991211 11.65805435180664 16.78648376464844 11.8904333114624 C 16.7937183380127 11.40699577331543 16.80095291137695 10.92364311218262 16.80835914611816 10.44020462036133 C 16.8129825592041 10.13496398925781 16.23893547058105 9.821647644042969 16.26560592651367 9.624772071838379 C 16.33291244506836 9.127201080322266 17.71793746948242 8.224183082580566 18.06246566772461 7.827908992767334 C 17.82108497619629 7.677055358886719 16.99740791320801 6.96956729888916 16.74811553955078 7.073390007019043 C 16.14453506469727 7.324952125549316 15.46287631988525 7.498269557952881 14.85929393768311 7.749748229980469 C 14.85929393768311 7.540421009063721 14.83388519287109 7.343798637390137 14.80359649658203 7.14961576461792 C 16.01311683654785 6.614099502563477 17.29288673400879 6.241719245910645 18.61573600769043 6.04307746887207 L 19.80069160461426 6.519279956817627 L 20.63732528686523 7.512151718139648 L 21.47227478027344 8.373101234436035 L 22.20214462280273 8.608258247375488 L 23.36143493652344 7.514928340911865 L 23.0625 6.734410285949707 L 23.0625 6.032812118530273 C 25.35516738891602 6.365816593170166 27.52028656005859 7.221129417419434 29.41651344299316 8.540023803710938 C 29.0772819519043 8.570396423339844 28.7044792175293 8.620287895202637 28.28389549255371 8.673796653747559 C 28.11015510559082 8.571152687072754 27.88728141784668 8.524541854858398 27.69789695739746 8.45311164855957 C 28.24737930297852 9.634531021118164 28.82050323486328 10.79962635040283 29.40279769897461 11.9653959274292 C 30.02480506896973 13.21067237854004 31.40461349487305 14.5463924407959 31.64691925048828 15.86091136932373 C 31.93247222900391 17.41033744812012 31.73433876037598 18.81773948669434 31.89057540893555 20.64068603515625 C 32.04100799560547 22.39615440368652 33.86975860595703 24.3907299041748 33.86975860595703 24.3907299041748 C 33.86975860595703 24.3907299041748 34.71421813964844 24.67838859558105 35.4164924621582 24.57818603515625 C 34.7618408203125 27.16810035705566 33.41972351074219 29.54330253601074 31.48159790039062 31.48159790039062 Z">
								</path>
							</svg>
						</div>
					</div>
				</div>
				</a>
				
				<a href="Search_Page.php">
				<div data-type="Symbol" data-name="Search" onclick="application.goToTargetView(event)" class="Search Search_vg_Class">
					<svg data-type="Path" data-name="路径 2878" class="n_2878_vh" viewBox="0 0 526 36">
						<path class="n_2878_vh_Class" d="M 18 0 L 508 0 C 517.9411010742188 0 526 8.058874130249023 526 18 C 526 27.94112586975098 517.9411010742188 36 508 36 L 18 36 C 8.058874130249023 36 0 27.94112586975098 0 18 C 0 8.058874130249023 8.058874130249023 0 18 0 Z">
						</path>
					</svg>
					<div data-type="Group" data-name="组 3065" class="n_3065_vi_Class">
						<div data-type="Text" data-name="Find Services" class="Find_Services_vj_Class">
							<span>Find Services</span>
						</div>
						<svg data-type="Path" data-name="Icon ionic-ios-search" class="Icon_ionic-ios-search_vk" viewBox="4.5 4.493 18.241 18.245">
							<path class="Icon_ionic-ios-search_vk_Class" d="M 22.52659225463867 21.41754150390625 L 17.45349502563477 16.29694366455078 C 18.44626808166504 15.05241966247559 19.04477691650391 13.47538948059082 19.04477691650391 11.76060676574707 C 19.04477691650391 7.746780872344971 15.79096412658691 4.492969989776611 11.77238750457764 4.492969989776611 C 7.753811359405518 4.492969989776611 4.500000476837158 7.75153112411499 4.500000476837158 11.76535701751709 C 4.500000476837158 15.77918338775635 7.753811359405518 19.03299522399902 11.77238750457764 19.03299522399902 C 13.51092147827148 19.03299522399902 15.10220146179199 18.42498397827148 16.35622406005859 17.4084644317627 L 21.39607048034668 22.49581146240234 C 21.54807472229004 22.65731620788574 21.75707817077637 22.73806571960449 21.96133232116699 22.73806571960449 C 22.15608406066895 22.73806571960449 22.35083770751953 22.66681480407715 22.49809074401855 22.52431106567383 C 22.81159782409668 22.22505760192871 22.82109832763672 21.73104667663574 22.52659225463867 21.41754150390625 Z M 11.77238750457764 17.47021484375 C 10.24760913848877 17.47021484375 8.813080787658691 16.8764533996582 7.734810829162598 15.79818248748779 C 6.656541347503662 14.7199125289917 6.062779903411865 13.28538417816162 6.062779903411865 11.76535606384277 C 6.062779903411865 10.24057674407959 6.656541347503662 8.806050300598145 7.734810829162598 7.73253059387207 C 8.813082695007324 6.654259204864502 10.24760913848877 6.060498714447021 11.77238750457764 6.060498714447021 C 13.2971658706665 6.060498714447021 14.7316951751709 6.654259204864502 15.80996417999268 7.73253059387207 C 16.88823509216309 8.810800552368164 17.48199462890625 10.24532794952393 17.48199462890625 11.76535606384277 C 17.48199462890625 13.29013442993164 16.88823509216309 14.72466278076172 15.80996417999268 15.79818248748779 C 14.7316951751709 16.8764533996582 13.2971658706665 17.47021484375 11.77238750457764 17.47021484375 Z">
							</path>
						</svg>
					</div>
				</div>
				</a>
			</div>
			<svg data-type="Line" data-name="直线 38" class="n_38_vl" viewBox="0 0 1366 1">
				<path class="n_38_vl_Class" d="M 0 0 L 1366 0">
				</path>
			</svg>
		</div>
	</div>
</div>
</body>
</html>