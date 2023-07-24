@extends('layouts.layout')

@section('content')

	<!-- a-about -->
	<div class="a-grid">
		<div class="container">
			<div class="w3l-about-heading">
				<h2>About <span>Us</span></h2>
			</div>
			<div class="agileits-a-about-grids">
				<div class="col-md-5 agileits-a-about-left">
					<img src="images/a1.jpg" alt="" />
				</div>
				<div class="col-md-7 agileits-a-about-right">
					<h3>Our Mission:</h3>

					<p>Our mission is to empower mothers by equipping them with the tools and knowledge needed to monitor and nurture their own health as well as their growing baby's well-being. We strive to make pregnancy a joyful and confident experience by offering personalized services and educational resources that promote healthy choices and informed decision-making.
					</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //a-about -->
	<!---728x90--->

	<!-- different -->
	<div class="jarallax different">
		<div class="container">
			<div class="w3-different-heading">
				<h3>Why we are <span>different</span></h3>
				<p>What We Offer</p>
			</div>
			<div class="w3agile-different-info">
				<p>Personalized Health Tracking: Our user-friendly platform allows mothers to track essential health parameters, including weight, blood pressure, nutrition, and symptom patterns. By monitoring these factors, we enable mothers to take an active role in their prenatal care and identify any potential concerns.<br>

Appointment Reminders and Prenatal Care Support: We send timely reminders for prenatal check-ups and screenings, ensuring that mothers stay on track with their healthcare schedule. Our system also offers educational resources to support expectant mothers in understanding the importance of prenatal care and the benefits it provides for both mother and baby.<br>

Fetal Development Tracking: We provide tools to track and record fetal movements, kick counts, and growth patterns. This feature allows mothers to establish a deeper connection with their baby and provides valuable information for healthcare providers to ensure proper development.<br>

Expert Guidance and Educational Resources: Our platform offers a wealth of educational resources curated by healthcare professionals. From articles and videos to expert advice, we cover topics ranging from nutrition and exercise to emotional well-being and postpartum care. Our goal is to empower mothers with evidence-based information and guidance throughout their pregnancy journey.<br>

Community Support and Engagement: Connect with a supportive community of expectant mothers, share experiences, and seek advice in a safe and welcoming environment. Our platform encourages interaction and fosters a sense of camaraderie among mothers who are navigating the same beautiful journey.</p>
				
			</div>
		</div>
	</div>
	<!-- //different -->
	<!---728x90--->

	<!-- team -->
	<div class="team">
		<div class="container">
			<div class="agileinfo-team-heading">
				<h3>Our <span>Team</span></h3>
			</div>
			<div class="team-grids">
				<div class="col-md-3 col-xs-6 agileinfo-team-grid">
					<img src="images/t1.jpg" alt="" />
					<div class="captn">
						<h4>Junior kaskazi</h4>
						<p>Software Engineer</p>
						<div class="w3l-social">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 agileinfo-team-grid">
					<img src="images/t2.jpg" alt="" />
					<div class="captn">
						<h4>Hillarry Adamu</h4>
						<p>Software Engineer</p>
						<div class="w3l-social">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 agileinfo-team-grid">
					<img src="images/t3.jpg" alt="" />
					<div class="captn">
						<h4>George Massam</h4>
						<p>Software Engineer</p>
						<div class="w3l-social">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 agileinfo-team-grid">
					<img src="images/t4.jpg" alt="" />
					<div class="captn">
						<h4>DR Mathew Deogratius</h4>
						<p>Project Supervisor</p>
						<div class="w3l-social">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //team -->
	

	<!-- //here ends scrolling icon -->
	<!-- parallax -->
	<script src="js/jarallax.js"></script>
	<script type="text/javascript">
        /* init Jarallax */
        $('.jarallax').jarallax({
            speed: 0.5,
            imgWidth: 1366,
            imgHeight: 768
        })
    </script>
	<!-- //parallax -->

    @endsection
