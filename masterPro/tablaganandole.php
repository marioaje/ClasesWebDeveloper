<?php
  session_start();

  if ($_SESSION["Enabled"] != 1){
    header('Location: index.php');
  }

  require 'header.php';

?>
</head>
<body>
<?php 
  require 'menu.php';
?>
<div id="main" class="container">
  <h1>Tabla de Seguimiento</h1>
     <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
                <tr class="table-danger">
                    <td>14</td>
                    <td>69</td>
                    <td>04</td>
                    <td>44</td>
                    <td>G</td>
                </tr>
                <tr class="table-success">
                    <td>18</td>
                    <td>36</td>
                    <td>38</td>
                    <td>13</td>
                    <td>A</td> 
                </tr>
                <tr class="table-primary">
                    <td>35</td>
                    <td>95</td>
                    <td>25</td>
                    <td>50</td>
                    <td>N</td> 
                </tr>
                <tr class="">
                    <td>07</td>
                    <td>20</td>
                    <td>77</td>
                    <td>22</td>
                    <td>A</td> 
                </tr>
                <tr class="table-warning">
                    <td>00</td>
                    <td>55</td>
                    <td>50</td>
                    <td>10</td>
                    <td>N</td> 
                </tr>
                <tr class="table-info">
                    <td>67</td>
                    <td>12</td>
                    <td>71</td>
                    <td>62</td>
                    <td>D</td> 
                </tr>
                <tr class="">
                    <td>44</td>
                    <td>40</td>
                    <td>99</td>
                    <td>14</td>
                    <td>O</td> 
                </tr>
                <tr class="table-secondary">
                    <td>25</td>
                    <td>88</td>
                    <td>33</td>
                    <td>52</td>
                    <td>L</td> 
                </tr>
                <tr class="">
                    <td>60</td>
                    <td>00</td>
                    <td>66</td>
                    <td>09</td>
                    <td>E</td> 
                </tr>                                                                                                                                                    
            </tbody>
        </table>
     </div>
</div>
<?php
  require 'footer.php';
?>