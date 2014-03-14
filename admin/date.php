<link rel="stylesheet" href="../stylesheets/calendarview.css">
    <style>

      div.dateField {
        width: 140px;
        padding: 6px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        color: #555;
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
      }
      div#popupDateField:hover {
        background-color: #cde;
        cursor: pointer;
      }
    </style>
    <script src="../javascripts/prototype.js"></script>
    <script src="../javascripts/calendarview.js"></script>
    <script>
      function setupCalendars() {

        // Popup Calendar
        Calendar.setup(
          {
             dateField: 'dates',
            triggerElement: 'dates'
          }
        )
           
        
      }

      Event.observe(window, 'load', function() { setupCalendars() })
    </script>
	
	
	<input type="text" class="dateField" id="dates" name="event_date">