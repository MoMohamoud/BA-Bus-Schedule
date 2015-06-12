<?php 

$url153and156West = "http://api.translink.ca/rttiapi/v1/stops/58085/estimates?apikey=CNERL2k7LSBtSK7I83CQ&count=6&timeframe=1440";
$url153and156East = "http://api.translink.ca/rttiapi/v1/stops/53382/estimates?apikey=CNERL2k7LSBtSK7I83CQ&count=6&timeframe=1440";

$xml153and156West = simplexml_load_file($url153and156West);
$xml153and156East = simplexml_load_file($url153and156East);


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


 ?>

 
<section class="bus">
	<div class="row">
		<div class="tab-content">
			<div id="153_Ball" class="tab-pane fade in active">

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