<?php 	
//error_reporting(E_ALL ^ E_NOTICE);
header("Content-type:application/json");
header("Content-type:text/html;charset=\"utf-8\"");
sleep(2);

$op=trim($_REQUEST['op']);  
/*------varibles del crud----*/
$set_coll_cod=isset($_POST['cod_nm']) ? $_POST['cod_nm'] : NULL;
$set_coll_name=trim("Saliendo");//$_REQUEST[''];
$set_coll_dscrp=trim("EN nuestra colecion encontras,una seleccion denuestro mejores vestidos,blusas,bragas");//$_REQUEST[''];
$set_coll_std=trim(1);//por defecto no habilitare este campo;
$set_coll_pctr=trim("img/collec/img-prnd-c/DSC04212.jpg");//$_REQUEST[''];
$set_coll_new=trim(1);
/*  Binds variables to prepared statement

        i    corresponding variable has type integer
        d    corresponding variable has type double
        s    corresponding variable has type string
        b    corresponding variable is a blob and will be sent in packets
    */        

/*---------------------------------------------view registro nueva coleccion------------------------------------------*/

      function viewCollnew($set_coll_std)
      { 
           include_once("../class_bd/conect.php"); 
           //printf("Conjunto de caracteres inicial: %s\n", $mysqli->character_set_name());
            if (!$mysqli->set_charset("utf8")) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
                exit();
            } else {
               // printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
            }
            
           $set_coll_std_s= $mysqli->real_escape_string($set_coll_std);
           $set_coll_new=1;
          
           $cnslt="SELECT cod_col,name_col, pctr_col, dscrp_col FROM col_collection_nymas WHERE std_col=? and new_col=?"; 
            /*sentencia preparada*/
           $stmt=$mysqli->prepare($cnslt);
           /*paso los parametros*/
           $stmt->bind_param("ii",$set_coll_std_s,$set_coll_new);
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
              $msj->not_msn="No existen coleciones, Recuerda habilitar tus new colecciones";
              return print json_encode($msj);
            }
                
      }

/*---------------------------------------------view-regristros vieja coleccion ------------------------------------------*/

     function viewCollold( $set_coll_std)
      { 
           include_once("../class_bd/conect.php"); 
           //printf("Conjunto de caracteres inicial: %s\n", $mysqli->character_set_name());
            if (!$mysqli->set_charset("utf8")) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
                exit();
            } else {
               // printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
            }
            
           $set_coll_std_s= $mysqli->real_escape_string($set_coll_std);
           $set_coll_new=0;
          
           $cnslt="SELECT name_col, pctr_col, dscrp_col FROM col_collection_nymas WHERE std_col=? and new_col=?"; 
            /*sentencia preparada*/
           $stmt=$mysqli->prepare($cnslt);
           /*paso los parametros*/
           $stmt->bind_param("ii",$set_coll_std_s,$set_coll_new);
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
              $msj->not_msn="No existen nuevas coleciones";
              return print json_encode($msj);
            }
                
      }

/*---------------------------------------------agregando registro-----------------------------------*/

      function  cntrladd($set_coll_name,$set_coll_dscrp,$set_coll_std,$set_coll_pctr,$set_coll_new)
      { 
           include("../class_bd/conect.php"); 
     
           
           $set_name_coll_s = $mysqli->real_escape_string($set_coll_name);
           $set_dscrp_coll_s = $mysqli->real_escape_string($set_coll_dscrp);
           $set_std_coll_s = $mysqli->real_escape_string($set_coll_std);
           $set_pctr_coll_s = $set_coll_pctr;
           $set_coll_new_s = $mysqli->real_escape_string($set_coll_new);
            
           if($set_name_coll_s!="" && $set_dscrp_coll_s!="" && $set_std_coll_s!="" && $set_pctr_coll_s && $set_coll_new_s!="" )
           {
               //funcion comprobar exitencia 
             
               if($conter=cntrlstd( $set_coll_name)>0)
               {
                  $msj=new stdClass();
                  $msj->not_num="020";
                  $msj->not_emotion=":( ";
                  $msj->not_msn="Esta Coleccion ya existe";
                  return print json_encode($msj);
                  
               }else{
                   
                $cnslt="INSERT INTO `col_collection_nymas` (`name_col`, `dscrp_col`, `std_col`, `pctr_col`,`new_col`) VALUES (?,?,?,?,?)"; 
                /*sentencia preparada*/
                $stmt=$mysqli->prepare($cnslt);
                /*paso los parametros*/
                $stmt->bind_param("ssisi",$set_name_coll_s,$set_dscrp_coll_s,$set_coll_std,$set_pctr_coll_s, $set_coll_new_s );
                /*ejecuto la consulta*/
                if (!$stmt->execute()) 
                {
                     echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
                }else{
                  $msj=new stdClass();
                  $msj->not_num="060";
                  $msj->not_emotion=": ) ";
                  $msj->not_msn="Coleccion agregada con exito";
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
 
 function cntrlstd( $set_coll_name)
      { 
           include("../class_bd/conect.php"); 
           $set_name_coll_s = $mysqli->real_escape_string($set_coll_name);
      
           $cnslt="SELECT * FROM col_collection_nymas WHERE name_col=?"; 
            /*sentencia preparada*/
           $stmt=$mysqli->prepare($cnslt);
           /*paso los parametros*/
           $stmt->bind_param("s",$set_name_coll_s);
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

      function  cntrledit($set_coll_name,$set_coll_dscrp,$set_coll_std,$set_coll_pctr,$set_coll_cod,$set_coll_new)
      { 
           include("../class_bd/conect.php"); 

          
           $set_cod_coll_s = $mysqli->real_escape_string($set_coll_cod);
           $set_name_coll_s = $mysqli->real_escape_string($set_coll_name);
           $set_dscrp_coll_s = $mysqli->real_escape_string($set_coll_dscrp);
           $set_std_coll_s = $mysqli->real_escape_string($set_coll_std);
           $set_pctr_coll_s = $set_coll_pctr;
           $set_coll_new_s = $mysqli->real_escape_string($set_coll_new);                       
            
           if($set_coll_name!="" && $set_coll_dscrp!="" && $set_coll_std!="" && $set_coll_pctr!="" && $set_coll_cod!="" && $set_coll_new!="")
           {
                       
                $cnslt="UPDATE col_collection_nymas SET name_col=?, dscrp_col=?,std_col=?,pctr_col=?, new_col=? WHERE cod_col= ?"; 
                /*sentencia preparada*/
                $stmt=$mysqli->prepare($cnslt);
                /*paso los parametros*/
                $stmt->bind_param("ssisii",$set_name_coll_s,$set_dscrp_coll_s,$set_coll_std,$set_pctr_coll_s,$set_coll_new,$set_cod_coll_s);
                /*ejecuto la consulta*/
                if (!$stmt->execute()) 
                {
                     echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
                }else{
                  $msj=new stdClass();
                  $msj->not_num="060";
                  $msj->not_emotion=": ) ";
                  $msj->not_msn="Coleccion Actualizada con exito";
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
     function  cntrldelet($set_coll_cod)
      { 
           include("../class_bd/conect.php"); 
           $set_cod_coll_s = $mysqli->real_escape_string($set_coll_cod);
           
 
           if($set_cod_coll_s!="" )
           {
                $stmt = $mysqli->prepare("DELETE FROM col_collection_nymas WHERE cod_Col= ?");
                $stmt->bind_param('i',$set_cod_coll_s );
                $stmt->execute(); 
                //$stmt->close();
                if (!$stmt->execute()) 
                {
                     echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
                }else{
                  $msj=new stdClass();
                  $msj->not_num="060";
                  $msj->not_emotion=": ) ";
                  $msj->not_msn="Coleccion eliminada con exito";
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
            
        $condicion="coll_";
        $std=$condicion.$op;

        switch($std)
        {
            
            case "coll_viewnew":
               $set_coll_std=trim(1);
               viewCollnew($set_coll_std); 
            break;
            case "coll_viewold":
               $set_coll_std=trim(0);
               viewCollold($set_coll_std);
            break;
            case "coll_cntrladd":
               cntrladd($set_coll_name,$set_coll_dscrp,$set_coll_std,$set_coll_pctr,$set_coll_new);
            break;
            case "coll_cntrledit":            
               cntrledit($set_coll_name,$set_coll_dscrp,$set_coll_std,$set_coll_pctr,$set_coll_cod,$set_coll_new);
            break;
            case "coll_cntrldelet":
               cntrldelet($set_coll_cod);
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