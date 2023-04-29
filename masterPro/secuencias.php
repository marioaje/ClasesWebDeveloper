<?php
  session_start();

  if ($_SESSION["Enabled"] != 1){
    header('Location: index.php');
  }
  require 'header.php';  
  require 'menu.php';
?>
</head>
<body>
    <div class="container-fluid">
<div id="main" class="container">
  <h1>Secuencias</h1> 

  <div class="row justify-content-center align-items-center g-2">

      <div class="mb-3">
            <label for="" class="form-label">Buscador</label>           
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
      </div>  
      <div class="table-responsive">
        <table class="table table-success">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Numeros</th>
              <th scope="col">Descripcion</th>
            </tr>
          </thead>
          <tbody id="resultadoTabla">
            <tr class="">
              <td scope="row">I</td>
              <td>25~~~57 52~~~75</td>
              <td>Se activa cuando el dia es 5 vibracion o si otras loterias estan 5</td>
            </tr>   
            <tr class="">
              <td scope="row">II</td>
              <td>36~~~31 63~~~13 39~~~93 18~~~68 81~~~86 89~~~98</td>
              <td>Se activa cuando el dia es 8 vibracion o si otras loterias estan 8</td>
            </tr>     
            <tr class="">
              <td scope="row">III</td>
              <td>28~~~08 80~~~82</td>
              <td>Se activa cuando el cuando sale 08 vibracion o si otras loterias estan 8</td>
            </tr>  
            <tr class="">
              <td scope="row">IV</td>
              <td>44~~~04 40~~~99 66~~~11</td>
              <td>Se activa cuando el dia es 4 vibracion o si otras loterias estan 4</td>
            </tr>  
            <tr class="">
              <td scope="row">V</td>
              <td>03~~~63 30~~~36 08~~~31 80~~~13 39~~~93</td>
              <td>Recomendada como las caidas del 08 y 31</td>
            </tr>  
            <tr class="">
              <td scope="row">VI</td>
              <td>49~~~46</td>
              <td>Se activa cuando la linea romantica</td>
            </tr>  
            <tr class="">
              <td scope="row">VII</td>
              <td>68~~~80 86~~~08</td>
              <td>En esta secuencia se toma en cuenta como 31, 03, 28, 13, 30, 82 ver si ya cayo 68, 28 y el unico que falta es 80 68</td>
            </tr>   
            <tr class="">
              <td scope="row">VIII</td>
              <td>13~~~73 31~~~37</td>
              <td>cae 13 sigue 73 pero a veces da 36</td>
            </tr>    
            <tr class="">
              <td scope="row">IX</td>
              <td>11~~~10 01~~~66</td>
              <td>Viene 00, hay que ver si a salido un par.</td>
            </tr>
            <tr class="">
              <td scope="row">X</td>
              <td>29~~~26 92~~~62</td>
              <td>Repiten y lo sigue 24</td>
            </tr>
            <tr class="">
              <td scope="row">XI</td>
              <td>19~~~14 91~~~41 16~~~61</td>
              <td>Sigue 04</td>
            </tr>  
            <tr class="">
              <td scope="row">XII</td>
              <td>00~~~60 06~~~55 09~~~90</td>
              <td>Lo sigue 69 66</td>
            </tr>  
            <tr class="">
              <td scope="row">XIII</td>
              <td>38~~~28 83~~~82</td>
              <td>Lo sigue 08 80</td>
            </tr>  
            <tr class="">
              <td scope="row">XIV</td>
              <td>03~~~08 30~~~80</td>
              <td>Lo sigue 28 82</td>
            </tr>  
            <tr class="">
              <td scope="row">XV</td>
              <td>59~~~45</td>
              <td>Lo sigue 56</td>
            </tr>  
            <tr class="">
              <td scope="row">XVI</td>
              <td>55~~~50 00~~~05</td>
              <td>Lo sigue 85</td>
            </tr>  
            <tr class="">
              <td scope="row">XVII</td>
              <td>35~~~05 53~~~50</td>
              <td>Lo sigue 55</td>
            </tr> 
            <tr class="">
              <td scope="row">XVIII</td>
              <td>15~~~75 51~~~57</td>
              <td>Lo sigue 25</td>
            </tr>         
            <tr class="">
              <td scope="row">XIX</td>
              <td>17~~~21 71~~~12</td>
              <td>Lo sigue 26 62 29 92</td>
            </tr>         
            <tr class="">
              <td scope="row">XX</td>
              <td>67~~~21 76~~~12 79~~~97</td>
              <td>Lo sigue 26 62 29 92</td>
            </tr>
            <tr class="">
              <td scope="row">XXI</td>
              <td>02~~~24 20~~~42</td>
              <td></td>
            </tr> 
            <tr class="">
              <td scope="row">XXII</td>
              <td>73~~~37 47~~~74</td>
              <td></td>
            </tr>  
            <tr class="">
              <td scope="row">XXIII</td>
              <td>88~~~25 33~~~52</td>
              <td></td>
            </tr>  
            <tr class="">
              <td scope="row">XXIV</td>
              <td>82~~~86~~~89 28~~~68~~~98~~~21~~~70~~~12~~~07</td>
              <td></td>
            </tr> 
            <tr class="">
              <td scope="row">XXV</td>
              <td>19~~~03~~~14~~~69 91~~~30~~~41~~~96 16~~~61 </td>
              <td></td>
            </tr>   
            <tr class="">
              <td scope="row">XXVI</td>
              <td>26~~~62 29~~~92</td>
              <td></td>
            </tr> 
            <tr class="">
              <td scope="row">XXVI</td>
              <td>78~~~23 87~~~32</td>
              <td></td>
            </tr> 
            <tr class="">
              <td scope="row">XXVII</td>
              <td>83~~~38</td>
              <td></td>
            </tr>                                                                                                                                                                                                                                                                                        
          </tbody>
        </table>
      </div>
      

  </div>
</div>
<script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
<?php
  require 'footer.php';
?>