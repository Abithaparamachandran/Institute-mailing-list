<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DateTimePicker Example</title>

   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>
</head>
<body>

<input type="text" id="datetimepicker">

<script>
  $(document).ready(function() {
	      $('#datetimepicker').datetimepicker({
	            format: 'MM.DD YYYY hh:mm A', // Date and time format with AM/PM
			          minDate: moment(), // Set the minimum date to the current date and time
				        stepping: 15, // Set the minute interval to 15 minutes
					      icons: {
					              time: 'fas fa-clock',
							              date: 'fas fa-calendar',
								              up: 'fas fa-arrow-up',
									              down: 'fas fa-arrow-down',
										              previous: 'fas fa-chevron-left',
											              next: 'fas fa-chevron-right',
												              today: 'fas fa-calendar-day',
													              clear: 'fas fa-trash',
														              close: 'fas fa-times'
															            }
		        });
	        });
  </script>

</body>
</html>

