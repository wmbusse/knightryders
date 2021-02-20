  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
 
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Views', <?php echo $session->count; ?>],
        ['Comments', <?php echo Comment::count_all(); ?>],
        ['Users', <?php echo User::count_all(); ?>],
        ['Photos', <?php echo Photo::count_all(); ?>],


      ]);

      var options = {
        legend: 'none',
        pieSliceText: 'label',
        backgroundColor: 'transparent',
        title: 'My Daily Activities',
        is3D: true
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>