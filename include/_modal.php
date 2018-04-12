<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script>
		function modOpen(mode)
		{
				switch(mode) {
						case 'yearbook':
								title = 'Quote fundae'
								body = `
								<div class="row quoteex">
									<img src="img/quotes/1.jpg" class="col-md-6"/>
									<img src="img/quotes/2.jpg" class="col-md-6"/>
									<img src="img/quotes/4.jpg" class="col-md-6"/>
									<img src="img/quotes/5.jpg" class="col-md-6"/>
									<img src="img/quotes/6.jpg" class="col-md-6"/>
									<img src="img/quotes/7.jpg" class="col-md-6"/>
									<img src="img/quotes/8.jpg" class="col-md-6"/>
									<img src="img/quotes/9.jpg" class="col-md-6"/>
									<img src="img/quotes/10.png" class="col-md-6"/>
									<img src="img/quotes/11.jpg" class="col-md-6"/>
									<img src="img/quotes/12.jpg" class="col-md-6"/>
									<img src="img/quotes/3.jpg" class="col-md-6"/>
								</div>
								`
								break;
						case 'img6':
								title = 'YearBook 2016'
								body = '<img src="img/2016.jpg" />'
								break;
						case 'tnc':
								title = 'Terms &amp; Conditions'
								body = `
								<ol>
									<li>The project chosen by most number of students will be taken up as the primary batch project for 2018 graduating batch.</li>
									<li>Any surplus amount generated after completely funding the primary batch project would be allocated to the remaining projects based on the voting done by students.</li>
									<li>Only <b>₹1700</b> will be pledged by default out of the caution deposit of ₹2000. The remaining ₹300 is used for the convocation ceremony(Includes gown etc) by the administration.</li>
									<li>All the issues related to the batch project are to be taken up with the IAR Secretary.</li>
								</ol>
								`
								break;
						case 'bp':
						title = 'Batch Project Details'
						body = `Batch project is an initiative by Alumni Relations Cell and Office of Alumni Affairs wherein students of the graduating batch pledge their academic caution deposit (<b>₹1700</b>) to fund the batch project. From this year onwards, students can also make a donation apart from the caution deposit.
								<br><br>
								Through the batch project, the graduands of the institute get an opportunity to leave an impact. It’s all about giving back to the institute. Every year, a good number of projects are offered to the graduating batch to choose from and a project is finalised on the basis of a consensus reached by the graduating batch.
								<br><br>
								The batches of 2014, 2015 and 2016 batch donated for the construction of a cemented road from Humanities Sciences Block to the Building Sciences Block. Now, this road is being extensively used by students, professors and staff members.
								<br><br>
								A brief description of this year’s batch projects is as follows:-
								<ol>
								<li><b>New Placement Portal</b>: The New Placement Portal is required to be developed and the estimated amount needed for the same is <b>₹15,00,000</b>. Click <a href="https://drive.google.com/file/d/1oqmMWXS-qDmevITUcvu1cc069pJD0Hhl/view" target="_blank">here</a> for more information regarding this batch project.</li>
								<li><b>Sports Scholarship for new students</b>: A Sports scholarship of ₹ 3,00,000 will be offered to one student each, who excels in any of the five sports- Tennis, Table Tennis, Swimming, Athletics and Badminton before joining IIT Madras. This scholarship would attract more top-ranking student to opt IIT Madras as their first choice over other IITs and hence improve the public perception of IIT Madras. For this Scholarship, there is a requirement of  <b>₹15,00,000</b> worth of funding fully or partially for the coming academic year.</li>
								<li><b>Funding of Travel and logistics of CFI Student Teams</b>: The Centre For Innovation (CFI) is the student lab setup with an aim to serve as a launchpad for the ideas of the students of IIT Madras. CFI provides a platform for the students to showcase their project ideas and plans. The funding of Travel and Logistics of CFI Student Teams, CFI requires <b>₹25,00,000</b> of funding. Click <a target="_blank" href="https://drive.google.com/open?id=1jUTjm3utHDYsrQ0cBKzJ_mV_ltB36QRp">here</a> for more information regarding this batch project.</li>
								<li><b>Adopt an athlete</b>: Adopt-An-Athlete Program provides financial assistance to institute’s sports program. This project will cater to fulfilling the sports requirements of athletes in various sports. The amount needed for the program is <b>₹14,12,000</b>. Click <a href="https://drive.google.com/open?id=16PvP2_fFn2o_gstY8zveCqwlXenXEUHc" target="_blank">here</a> for more information regarding this batch project.</li>
								</ol>
								All batch project proposals are official and have been approved by the concerned authorities.
								`
								break;
				}
				modShow(title, body);
		}
		function modShow(title, body)
		{
				$('#title').html(title);
				$('#body').html(body);
				$('#myModal').modal('show');
		}
</script>
<body>
<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="title">Modal Header</h4>
			</div>
			<div class="modal-body">
				<p id="body">Some text in the modal.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div></body>
