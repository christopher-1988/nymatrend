<?php 	
//error_reporting(E_ALL ^ E_NOTICE);
header("Content-type:application/json");

sleep(2);

$op=trim($_REQUEST['op']);//$_REQUEST['op'];  
/*------varibles del crud----*/

$set_coll_cod=isset($_POST['cod_nm']) ? $_POST['cod_nm'] : NULL;//trim("");
$set_garm_cod=2;
$set_garm_name=trim("short");//$_REQUEST[''];
$set_garm_name_m= strtolower($set_garm_name);
$set_garm_dscrp=trim("hermosos");//$_REQUEST[''];
$set_garm_std=trim(1);//por defecto no habilitare este campo;
$set_garm_pctr=trim("img/collec/img-prnd-c/DSC04823.jpg");//$_REQUEST[''];

/*  Binds variables to prepared statement

        i    corresponding variable has type integer
        d    corresponding variable has type double
        s    corresponding variable has type string
        b    corresponding variable is a blob and will be sent in packets
    */        
/*---------------------------------------------view-regsitro-on-------------------------------------------*/

      function viewgarmOn($set_coll_cod,$set_garm_std)
      { 
           include("../class_bd/conect.php"); 
           //printf("Conjunto de caracteres inicial: %s\n", $mysqli->character_set_name());
            if (!$mysqli->set_charset("utf8")) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
                exit();
            } else {
               // printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
            }
            
           $set_coll_std_s= $mysqli->real_escape_string($set_coll_cod);
           
          
           $cnslt="SELECT `cod_coll`, `cod_garments`, `name_garments`, `descrip_garments`, `img_garments`, `state_garments` FROM `col_ garments_nymas` WHERE cod_coll=? AND state_garments=?"; 
            /*sentencia preparada*/
           $stmt=$mysqli->prepare($cnslt);
           /*paso los parametros*/
           $stmt->bind_param("ii",$set_coll_cod,$set_garm_std);
           /*ejecuto la consulta*/
           $stmt->execute();
            /* Obtener el resultado */        
           $result= $stmt->get_result();
           /* almacenar el resultado $stmt->store_result() este metodo se usa con fetch*/
           /*cuenta el numero de registro*/
           $num_of_rows = $result->num_rows;
           /*$stmt->bind_result($id, $first_name, $last_name, $username) este metodo se usa con fetch*/
           $json=array();
            
           if ($num_of_rows = $result->num_rows > 0) 
           {
             while ($row = $result->fetch_assoc()) 
              {
                 //$json[]=$row;
                array_push($json,$row);
                //print_r ($json); 
                /* free results */
                $stmt->free_result();               
              }  
                 //escapar de los caracteres especiales UNESCAPED_UNICODE
                 return print json_encode($json,JSON_UNESCAPED_UNICODE);
            } else {
               
              $msj=new stdClass();
              $msj->not_num="std_020";
              $msj->not_emotion=":( ";
              $msj->not_msn="No existen prendas no Activadas";
              return print json_encode($msj);
            }    
      }

/*---------------------------------------------view registro of------------------------------------------*/

      function viewgarmOf($set_coll_cod,$set_garm_std)
      { 
           include("../class_bd/conect.php"); 
           //printf("Conjunto de caracteres inicial: %s\n", $mysqli->character_set_name());
            if (!$mysqli->set_charset("utf8")) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
                exit();
            } else {
               // printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
            }
            
            $set_coll_std_s= $mysqli->real_escape_string($set_coll_cod);
          
           $cnslt="SELECT `cod_coll`, `cod_garments`, `name_garments`, `descrip_garments`, `img_garments`, `state_garments` FROM `col_ garments_nymas` WHERE cod_coll=? AND state_garments=?"; 
            /*sentencia preparada*/
           $stmt=$mysqli->prepare($cnslt);
           /*paso los parametros*/
           $stmt->bind_param("ii",$set_coll_cod,$set_garm_std);
           /*ejecuto la consulta*/
           $stmt->execute();
            /* Obtener el resultado */        
           $result= $stmt->get_result();
           /* almacenar el resultado $stmt->store_result() este metodo se usa con fetch*/
           /*cuenta el numero de registro*/
           $num_of_rows = $result->num_rows;
           /*$stmt->bind_result($id, $first_name, $last_name, $username) este metodo se usa con fetch*/
           $json=array();
            
           if ($num_of_rows = $result->num_rows > 0) 
           {
             while ($row = $result->fetch_assoc()) 
              {
                 //$json[]=$row;
                array_push($json,$row);
                //print_r ($json); 
                /* free results */
                $stmt->free_result();
              }  
                 //escapar de los caracteres especiales UNESCAPED_UNICODE
                 return print json_encode($json,JSON_UNESCAPED_UNICODE);
            } else {
              $msj=new stdClass();
              $msj->not_num="std_020";
              $msj->not_emotion=":( ";
              $msj->not_msn="No existen prendas Desactivada";
              return print json_encode($msj);
            }
                
      }

/*---------------------------------------------agregando registro-----------------------------------*/

      function  cntrladd($set_coll_cod,$set_garm_name,$set_garm_dscrp,$set_garm_std,$set_garm_pctr)
      { 
           include("../class_bd/conect.php"); 
     
          $set_coll_cod_s=$mysqli->real_escape_string($set_coll_cod);
          $set_garm_name_s=$mysqli->real_escape_string($set_garm_name);
          $set_garm_name_s_m= ucwords($set_garm_name_s);
          $set_garm_dscrp_s=$mysqli->real_escape_string($set_garm_dscrp);
          $set_garm_std_s=$mysqli->real_escape_string($set_garm_std);
          $set_garm_pctr_s=$mysqli->real_escape_string($set_garm_pctr); 
      
          if($set_coll_cod_s!="" && $set_garm_name_s_m!="" && $set_garm_dscrp_s!="" && $set_garm_std_s!="" && $set_garm_pctr_s!="")
           {
               //funcion comprobar exitencia 
             
               if($conter=cntrlstd($set_garm_name_s)>0)
               {
                  $msj=new stdClass();
                  $msj->not_num="020";
                  $msj->not_emotion=":( ";
                  $msj->not_msn="Esta prenda ya existe";
                  return print json_encode($msj);
                  
               }else{
                   
                $cnslt="INSERT INTO `col_ garments_nymas`(`cod_coll`, `name_garments`, `descrip_garments`, `img_garments`, `state_garments`) VALUES (?,?,?,?,?)"; 
                /*sentencia preparada*/
                $stmt=$mysqli->prepare($cnslt);
                /*paso los parametros*/
                $stmt->bind_param("isssi",$set_coll_cod_s,$set_garm_name_s_m,$set_garm_dscrp_s,$set_garm_pctr_s,$set_garm_std_s);
                /*ejecuto la consulta*/
                if (!$stmt->execute()) 
                {
                     echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
                }else{
                  $msj=new stdClass();
                  $msj->not_num="060";
                  $msj->not_emotion=": ) ";
                  $msj->not_msn="Prenda agregada con exito";
                  return print json_encode($msj);
                  $newId = $stmt->insert_id;    
                 }   
               }
           }else{
              $msj=new stdClass();
              $msj->not_num="std_020";
              $msj->not_emotion=":( ";
              $msj->not_msn="Por favor llene todo los campos";
              return print json_encode($msj);  
           } 
                
      }
//--------------------------------------------comprueba existencia de registro--------------------------------
 
 function cntrlstd($set_garm_name_s)
      { 
           include("../class_bd/conect.php");
           
           $set_garm_name_ss = $mysqli->real_escape_string($set_garm_name_s);
           $set_garm_name_s_m = ucwords($set_garm_name_ss);
           

           $cnslt="SELECT * FROM `col_ garments_nymas` WHERE name_garments=?"; 
            /*sentencia preparada*/
           $stmt=$mysqli->prepare($cnslt);
           /*paso los parametros*/
           $stmt->bind_param("s",$set_garm_name_s_m);
           /*ejecuto la consulta*/
           $stmt->execute();
            /* Obtener el resultado */        
           $result= $stmt->get_result();
           /*cuenta el numero de registro*/
           $num_of_rows = $result->num_rows;

           if ($num_of_rows = $result->num_rows > 0) 
           {
             $std=1;   
             return $std;
           }else{
             $std=0;
             return $std;
           }
                
      } 
/*---------------------------------------------update coleccion-----------------------------------*/

      function  cntrledit($set_garm_cod,$set_coll_cod,$set_garm_name,$set_garm_dscrp,$set_garm_std,$set_garm_pctr)
      { 
           include("../class_bd/conect.php"); 
     
           $set_garm_cod_s=$mysqli->real_escape_string($set_garm_cod);      
           $set_coll_cod_s=$mysqli->real_escape_string($set_coll_cod);
           $set_garm_name_s=$mysqli->real_escape_string($set_garm_name);
           $set_garm_name_s_m = ucwords($set_garm_name_s);
           $set_garm_dscrp_s=$mysqli->real_escape_string($set_garm_dscrp);
           $set_garm_std_s=$mysqli->real_escape_string($set_garm_std);
           $set_garm_pctr_s=$mysqli->real_escape_string($set_garm_pctr);
           
                                  
            
           if($set_coll_cod_s!="" && $set_garm_name_s_m!="" && $set_garm_dscrp_s!="" && $set_garm_std_s!="" && $set_garm_pctr_s!="")
           {
               
        $cnslt="UPDATE `col_ garments_nymas` SET `cod_coll`=?,`name_garments`=?,`descrip_garments`=?,`img_garments`=?,`state_garments`=? WHERE cod_garments=?"; 
                /*sentencia preparada*/
                $stmt=$mysqli->prepare($cnslt);
                /*paso los parametros*/
    $stmt->bind_param("isssii",$set_coll_cod_s,
                               $set_garm_name_s_m,
                               $set_garm_dscrp_s,
                               $set_garm_pctr_s,
                               $set_garm_std_s,
                               $set_garm_cod_s);
                /*ejecuto la consulta*/
                if (!$stmt->execute()) 
                {
                     echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
                }else{
                  $msj=new stdClass();
                  $msj->not_num="060";
                  $msj->not_emotion=": ) ";
                  $msj->not_msn="la prenda fue Actualizada con exito";
                  return print json_encode($msj);
                 }   
               
           }else{
              $msj=new stdClass();
              $msj->not_num="std_020";
              $msj->not_emotion=":( ";
              $msj->not_msn="Por favor llene todo los campos";
              return print json_encode($msj);  
           } 
                
      }

//-------------------------------eliminar registro------------------------------------------------------
     function  cntrldelet($set_garm_cod)
      { 
           include("../class_bd/conect.php"); 
           $set_garm_cod_s= $mysqli->real_escape_string($set_garm_cod);
           
 
           if($set_garm_cod_s!="" )
           {
                $stmt = $mysqli->prepare("DELETE FROM `col_ garments_nymas` WHERE `cod_garments`=?");
                $stmt->bind_param('i',$set_garm_cod_s);
                $stmt->execute(); 
                //$stmt->close();
                if (!$stmt->execute()) 
                {
                     echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
                }else{
                  $msj=new stdClass();
                  $msj->not_num="060";
                  $msj->not_emotion=": ) ";
                  $msj->not_msn="la prenda fue eliminada con exito";
                  return print json_encode($msj);
                  $newId = $stmt->insert_id;    
                 }   
               
           }else{
              $msj=new stdClass();
              $msj->not_num="std_020";
              $msj->not_emotion=":( ";
              $msj->not_msn="Por favor llene todo los campos";
              return print json_encode($msj);  
           } 
                
      }    

//-------------------------------validadciones de entrada-----------------------------------------------
    
    $reg="/^([a-zA-Z0-9\s])+$/"; //expresion--regular
    if(preg_match($reg,$op) && $op!=""){
            
        $condicion="garm_";
        $std=$condicion.$op;

        switch($std)
        {
    
            case "garm_viewon":
               $set_garm_std=trim(1);
               viewgarmOn($set_coll_cod,$set_garm_std); 
            break;
            case "garm_viewof":
               $set_garm_std=trim(0);
               viewgarmOf($set_coll_cod,$set_garm_std);
            break;
            case "garm_cntrladd":
               cntrladd($set_coll_cod,$set_garm_name_m,$set_garm_dscrp,$set_garm_std,$set_garm_pctr);
            break;
            case "garm_cntrledit":
               cntrledit($set_garm_cod,$set_coll_cod,$set_garm_name_m,$set_garm_dscrp,$set_garm_std,$set_garm_pctr);
            break;
            case "garm_cntrldelet":
               cntrldelet($set_garm_cod);
            break;

        }       
			
    }else{
        $msj=new stdClass();
        $msj->not_titulo="ERROR SERVER";
        $msj->not_emotion=" :( ";
        $msj->not_descripcion=" Disculpa,Error con el Servidor";
        return print json_encode($msj);
    }

//$mysqli->close();		     

?>