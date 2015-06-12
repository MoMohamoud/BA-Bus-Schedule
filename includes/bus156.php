<?php 

$url153and156West = "http://api.translink.ca/rttiapi/v1/stops/58085/estimates?apikey=CNERL2k7LSBtSK7I83CQ&count=6&timeframe=1440";
$url153and156East = "http://api.translink.ca/rttiapi/v1/stops/53382/estimates?apikey=CNERL2k7LSBtSK7I83CQ&count=6&timeframe=1440";

$xml153and156West = simplexml_load_file($url153and156West);
$xml153and156East = simplexml_load_file($url153and156East);

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

 ?>

 <section class=" bus" id="myTab">
	<div class="row">
		<div class="tab-content">
			<div id="156_Ball" class="tab-pane fade in active">
				<div class="col-sm-12 mrg-va ba-brand pad-t-a">
					<h2><?php echo $title156West; ?></h2>

					<h2><h5 class="destination">Destination:</h5> <?php echo substr($destination156West,0,12); ?></h2>


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
					<h2><h5 class="destination">Destination:</h5> <?php echo substr($destination156East,0,9); ?></h2>

					<?php 	$leavetime156East = $xml153and156East->NextBus[1]->Schedules->Schedule ?>
					<?php $upcomingtime156East =$leavetime156East->ExpectedLeaveTime[0] ?>
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