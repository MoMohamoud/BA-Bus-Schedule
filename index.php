<!DOCTYPE html>
<HEAD>
	<meta charset="utf-8">
	<title>Bus Schedule</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Latest compiled and minified CSS -->
  
	<link href="style.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>   
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>



</HEAD>


<div class="content bus-content">
	<?php 

	$url169West = "http://api.translink.ca/rttiapi/v1/stops/53717/estimates?apikey=CNERL2k7LSBtSK7I83CQ&count=6&timeframe=1440";
	$url169East = "http://api.translink.ca/rttiapi/v1/stops/58082/estimates?apikey=CNERL2k7LSBtSK7I83CQ&count=6&timeframe=1440";

	$url153and156West = "http://api.translink.ca/rttiapi/v1/stops/58085/estimates?apikey=CNERL2k7LSBtSK7I83CQ&count=6&timeframe=1440";
	$url153and156East = "http://api.translink.ca/rttiapi/v1/stops/53382/estimates?apikey=CNERL2k7LSBtSK7I83CQ&count=6&timeframe=1440";

	$xml153and156West = simplexml_load_file($url153and156West);
	$xml153and156East = simplexml_load_file($url153and156East);


	$xml169West = simplexml_load_file($url169West);
	$xml169East = simplexml_load_file($url169East);


	// 169

	$title169West = $xml169West->NextBus->RouteNo;
	$dest169West = $xml169West->NextBus->RouteName;
	$Schedules169West = $xml169West->NextBus->Schedules;
	$destination169West = $xml169West->NextBus->Schedules->Schedule->Destination;
	$direction169West = $xml169West->NextBus->Direction;

	$title169East = $xml169East->NextBus->RouteNo;
	$dest169East = $xml169East->NextBus->RouteName;
	$Schedules169East = $xml169East->NextBus->Schedules;

	$destination169East = $xml169East->NextBus->Schedules->Schedule->Destination;
	$direction169East = $xml169East->NextBus->Direction;



	// 153
	$title153East = $xml153and156East->NextBus->RouteNo;
	$dest153East = $xml153and156East->NextBus->RouteName;
	$Schedules153East = $xml153and156East->NextBus->RouteName;
	$destination153East = $xml153and156East->NextBus->Schedules->Schedule->Destination;
	$direction153East = $xml153and156East->NextBus->Direction;


	$title153West = $xml153and156West->NextBus->RouteNo;
	$dest153West = $xml153and156West->NextBus->RouteName;
	$Schedules153West = $xml153and156West->NextBus->Schedules;
	$destination153West = $xml153and156West->NextBus->Schedules->Schedule->Destination;
	$direction153West = $xml153and156West->NextBus->Direction;




	// 156
	$title156East = $xml153and156East->NextBus[1]->RouteNo;
	$dest156East = $xml153and156East->NextBus[1]->RouteName;
	$Schedules156East = $xml153and156East->NextBus[1]->Schedules;
	$direction156East = $xml153and156East->NextBus[1]->Direction;
	$destination156East = $xml153and156East->NextBus->Schedules->Schedule->Destination;


	$title156West = $xml153and156West->NextBus[1]->RouteNo;
	$dest156West = $xml153and156West->NextBus[1]->RouteName;
	$direction156West = $xml153and156West->NextBus[1]->Direction;
	$Schedules156West = $xml153and156West->NextBus[1]->Schedules;
	$destination156West = $xml153and156West->NextBus[1]->Schedules->Schedule->Destination;

// direction and destination
	
		
	?>
	
	<main class="container bus-selection" id="destination1">
		<div class="row">
			<div class="col-sm-4" id="169">
				<h1>169</h1>
				<ul class="nav nav-justified" id="myTab">
			        <li><a data-toggle="tab" href="#169_Braid">To Braid Station</a></li>
			        <li><a data-toggle="tab" href="#169_Ball">To Ballistic</a></li>
		    	</ul>
			    <section class=" bus">


					<div class="row">
						<div class="tab-content">
							<div id="169_Ball" class="tab-pane fade active">
								<div class="col-sm-12 mrg-va ba-brand pad-t-a">
									<h2><?php echo $title169East; ?></h2>
									<h2><h5 class="destination">Destination:</h5> <?php echo $destination169East; ?></h2>

									<?php 	$leavetime169East = $xml169East->NextBus->Schedules->Schedule ?>
									<?php $upcomingtime169East=$leavetime169East->ExpectedLeaveTime[0] ?>
									<h5>Next bus at <span class="bus-arrives"><?php echo substr($upcomingtime169East,0,7); ?></span></h5>

									<?php $arrives_169East= (string) $leavetime169East->ExpectedCountdown;?>
									<h5>Bus arrives in <span class="bus-arrives"><?php echo $arrives_169East; ?></span> minutes</h5>

									<h5>Bus Arrival Times:</h5>

									<?php foreach ($leavetime169East as $east) : ?>
										<?php $time=$east->ExpectedLeaveTime;  ?>
										<h3> <?php echo substr($time,0,7); ?></h3>	
									<?php endforeach ?>
									
								</div>
							</div>
							
							<div id="169_Braid" class="tab-pane fade">
								<div class="col-sm-12 mrg-va home-brand pad-t-a">

									<h2><?php echo $title169West; ?></h2>
									<h2><h5 class="destination">Destination:</h5> <?php echo $destination169West; ?></h2>

									<?php 	$leavetime169West = $xml169West->NextBus->Schedules->Schedule ?>
									<?php $upcomingtime169West=$leavetime169West->ExpectedLeaveTime[0] ?>
									<h5>Next bus at <span class="bus-arrives"><?php echo substr($upcomingtime169West,0,7); ?></span></h5>

									<?php $arrives_169West = (string) $leavetime169West->ExpectedCountdown;?>
									<h5>Bus arrives in <span class="bus-arrives"><?php echo $arrives_169West; ?></span> minutes</h5>
									<?php foreach ($leavetime169West as $west) : ?>
										<?php $time=$west->ExpectedLeaveTime;  ?>
										<h3> <?php echo substr($time,0,7); ?></h3>
									<?php endforeach ?>
									
								</div>
							</div>
						</div>
					</div>
				</section>		
			</div> <!-- 169 -->

			<div class="col-sm-4">
				<h1>153</h1>
				<ul class="nav nav-justified" id="myTab">
			        <li><a data-toggle="tab" href="#153_Braid">To Braid Station</a></li>
			        <li><a data-toggle="tab" href="#153_Ball">To Ballistic</a></li>
		    	</ul>

		    	<section class="bus" id="myTab">
					<div class="row">
						<div class="tab-content">
							<div id="153_Ball" class="tab-pane fade active">

								<div class="col-sm-12 mrg-va ba-brand pad-t-a">
								 	<h2><?php echo $title153West; ?></h2>
										<h2><h5 class="destination">Destination:</h5> <?php echo substr($destination153West,0,8); ?></h2>

										<?php 	$leavetime153West = $xml153and156West->NextBus->Schedules->Schedule ?>
										<?php $upcomingtime153West=$leavetime153West->ExpectedLeaveTime[0] ?>
										<h5>Next bus at <span class="bus-arrives"><?php echo substr($upcomingtime153West, 0, 7); ?></span></h5>

										<?php $arrives_153West = (string) $leavetime153West->ExpectedCountdown;?>
										<h5>Bus arrives in <span class="bus-arrives"><?php echo $arrives_153West; ?></span> minutes</h5>

										<h5>Bus Arrival Times:</h5>

										<?php foreach ($leavetime153West as $west) : ?>
											<?php $time=$west->ExpectedLeaveTime;  ?>
											<h3> <?php echo  substr($time,0,7); ?></h3>	
										<?php endforeach ?>	
								</div>
							</div>

							<div id="153_Braid" class="tab-pane fade">

								<div class="col-sm-12 mrg-va home-brand pad-t-a">
									<h2><?php echo $title153East; ?></h2>
										<h2><h5 class="destination">Destination:</h5> <?php echo substr($destination153East,0,9); ?></h2>

										<?php 	$leavetime153East = $xml153and156East->NextBus->Schedules->Schedule ?>
										<?php $upcomingtime153East =$leavetime153East->ExpectedLeaveTime[0] ?>
										<h5>Next bus at <span class="bus-arrives"><?php echo substr($upcomingtime153East, 0, 7); ?></span></h5>

										<?php $arrives_153East = (string) $leavetime153East->ExpectedCountdown;?>
										<h5>Bus arrives in <span class="bus-arrives"><?php echo $arrives_153East; ?></span> minutes</h5>

										<h5>Bus Arrival Times:</h5>

										<?php foreach ($leavetime153East as $east) : ?>
											<?php $time=$east->ExpectedLeaveTime;  ?>
											<h3> <?php echo substr($time, 0, 7); ?></h3>	
										<?php endforeach ?>	
								</div>	
							</div>
						</div>
					</div>
				</section>
			</div> <!-- 153 col-sm-4 -->


			<div class="col-sm-4">
				<h1>156</h1>

				<ul class="nav nav-justified" id="myTab">
			        <li><a data-toggle="tab" href="#156_Braid">To Braid Station</a></li>
			        <li><a data-toggle="tab" href="#156_Ball">To Ballistic</a></li>
		    	</ul>

				<section class=" bus" id="myTab">
					<div class="row">
						<div class="tab-content">
							<div id="156_Ball" class="tab-pane fade active">
								<div class="col-sm-12 mrg-va ba-brand pad-t-a">
									<h2><?php echo $title156West; ?></h2>
									<h2><h5 class="destination">Destination:</h5> <?php echo $destination156West; ?></h2>

									<?php 	$leavetime156West = $xml153and156West->NextBus[1]->Schedules->Schedule ?>
									<?php $upcomingtime156West=$leavetime156West->ExpectedLeaveTime[0] ?>
									<h5>Next bus at <span class="bus-arrives"><?php echo substr($upcomingtime156West, 0, 7); ?></span></h5>
									

									<?php $arrives_156West = (string) $leavetime156West->ExpectedCountdown;?>

									<h5>Bus arrives in <span class="bus-arrives"><?php echo $arrives_156West; ?></span> minutes</h5>

									<h5>Bus Arrival Times:</h5>

									<?php foreach ($leavetime156West as $west) : ?>
										<?php $time=$west->ExpectedLeaveTime;  ?>
										<h3> <?php echo substr($time,0, 7); ?></h3>	
									<?php endforeach ?>	
								</div>
							</div>

							<div id="156_Braid" class="tab-pane fade">
								<div class="col-sm-12 mrg-va home-brand pad-t-a">
									<h2><?php echo $title156East; ?></h2>
									<h2><h5 class="destination">Destination:</h5> <?php echo $destination156East; ?></h2>

									<?php 	$leavetime156East = $xml153and156East->NextBus->Schedules->Schedule ?>
									<?php $upcomingtime156East =$leavetime153East->ExpectedLeaveTime[0] ?>
									<h5>Next bus at <span class="bus-arrives"><?php echo substr($upcomingtime156East, 0, 7); ?></span></h5>

									<?php $arrives_156East = (string) $leavetime156East->ExpectedCountdown;?>
									<h5>Bus arrives in <span class="bus-arrives"><?php echo $arrives_156East; ?></span> minutes</h5>

									<h5>Bus Arrival Times:</h5>

									<?php foreach ($leavetime156East as $east) : ?>
										<?php $time=$east->ExpectedLeaveTime;  ?>
										<h3> <?php echo substr($time,0, 7); ?></h3>	
									<?php endforeach ?>	
								</div>
							</div>
						</div>	
					</div>
				</section>
			</div> <!-- 156 -->	
		</div> <!-- row -->
	</main>


</div> <!-- content --> 

</body>
</html>
