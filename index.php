<?php include dirname(__FILE__)."/header.php"; ?>


<div class="content bus-content">
	<main class="container bus-selection" id="destination1">
		<div class="row">
			<div class="col-sm-4" id="169">
				<h1>169</h1>
			        <a data-toggle="tab" href="#169_Ball"><button class="nav nav-justified active" id="myTab">To Ballistic</button></a>
				    <a data-toggle="tab" href="#169_Braid"><button class="nav nav-justified " id="myTab">To Braid Station</button></a>
				<?php include dirname(__FILE__)."/includes/bus169.php"; ?>
			</div> <!-- 169 -->

			<div class="col-sm-4">
				<h1>153</h1>
		    	<a data-toggle="tab" href="#153_Ball"><button class="nav nav-justified active" id="myTab">To Ballistic</button></a>
				<a data-toggle="tab" href="#153_Braid"><button class="nav nav-justified" id="myTab">To Braid Station</button></a>
				<?php include dirname(__FILE__)."/includes/bus153.php"; ?>
			</div> <!-- 153 col-sm-4 -->


			<div class="col-sm-4">
				<h1>156</h1>
		    	<a data-toggle="tab" href="#156_Ball"><button class="nav nav-justified active" id="myTab">To Ballistic</button></a>
				<a data-toggle="tab" href="#156_Braid"><button class="nav nav-justified " id="myTab">To Braid Station</button></a>
				<?php include dirname(__FILE__)."/includes/bus156.php"; ?>
			</div> <!-- 156 -->	
		</div> <!-- row -->
	</main>
</div> <!-- content --> 

</body>
</html>
