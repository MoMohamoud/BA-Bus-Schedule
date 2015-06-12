<?php 
$url169West = "http://api.translink.ca/rttiapi/v1/stops/53717/estimates?apikey=CNERL2k7LSBtSK7I83CQ&count=6&timeframe=1440";
$url169East = "http://api.translink.ca/rttiapi/v1/stops/58082/estimates?apikey=CNERL2k7LSBtSK7I83CQ&count=6&timeframe=1440";

$xml169West = simplexml_load_file($url169West);
$xml169East = simplexml_load_file($url169East);


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



 ?>

<section class=" bus">
	<div class="row">
		<div class="tab-content">
			<div id="169_Ball" class="tab-pane fade in active">
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
			
			<div id="169_Braid" class="tab-pane fade in">
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