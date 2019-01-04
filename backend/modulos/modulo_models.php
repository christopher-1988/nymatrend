<?php 	
//error_reporting(E_ALL ^ E_NOTICE);
header("Content-type:application/json");

sleep(2);

$op="cntrledit";//$_REQUEST['op'];  
/*------varibles del crud----*/

$set_garm_cod=2;//trim("");
$set_mdls_cod=trim("1");
$set_mdls_id=trim("vc001");
$set_mdls_id_m=strtoupper($set_mdls_id);//strtoupper() coloca la cadena en mayuscula
$set_mdls_nm=trim("Vestido");//$_REQUEST[''];
$set_mdls_nm_m= strtolower($set_mdls_nm);// strtolowercolca todo los caracteres en minuscula 
$set_mdls_dtll=trim("Vestido corto grisáceo, manga corta con escote en forma de ojal anterior y posterior.");//$_REQUEST[''];
$set_mdls_tll=trim("sml");//$_REQUEST[''];
$set_mdls_tp=trim("Vestido casual");//$_REQUEST[''];
$set_mdls_mt=trim("tela");//$_REQUEST[''];
$set_mdls_pctr=trim("img/collec/img-prnd-c/DSC04212.jpg");//$_REQUEST[''];

/*$set_garm_cod,$set_mdls_cod,$set_mdls_id,$set_mdls_nm_m,$set_mdls_dtll,$set_mdls_tll,$set_mdls_tp,$set_mdls_mt,$set_mdls_pctr; */

/*  Binds variables to prepared statement

        i    corresponding variable has type integer
        d    corresponding variable has type double
        s    corresponding variable has type string
        b    corresponding variable is a blob and will be sent in packets
    */        
/*---------------------------------------------view-regsitro-on-------------------------------------------*/

      function viewmdls($set_garm_cod)
      { 
           include("../class_bd/conect.php"); 
           //printf("Conjunto de caracteres inicial: %s\n", $mysqli->character_set_name());
            if (!$mysqli->set_charset("utf8")) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
                exit();
            } else {
               // printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
            }
            
           $set_garm_cod_s= $mysqli->real_escape_string($set_garm_cod);
           
           $cnslt="SELECT `cod_models`, `id_models`, `name_models`, `detall_models`, `talla_models`, `tipo_models`, `material_models`, `picture_models` FROM `col_models_nymas` WHERE `cod_garment`=?"; 
            /*sentencia preparada*/
           $stmt=$mysqli->prepare($cnslt);
           /*paso los parametros*/
           $stmt->bind_param("i",$set_garm_cod_s);
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
              $msj->not_msn="No existen Modelos de prendas";
              return print json_encode($msj);
            }    
      }


/*---------------------------------------------agregando registro-----------------------------------*/

      function cntrladd($set_garm_cod,$set_mdls_id_m,$set_mdls_nm_m,$set_mdls_dtll,$set_mdls_tll,$set_mdls_tp,$set_mdls_mt,$set_mdls_pctr)
      { 
          include("../class_bd/conect.php"); 
          
          $set_garm_cod_s=$mysqli->real_escape_string($set_garm_cod);
          //$set_mdls_cod_s=mysqli->real_escape_string();
          $set_mdls_id_s=$mysqli->real_escape_string($set_mdls_id_m);
          $set_mdls_nm_s=$mysqli->real_escape_string($set_mdls_nm_m);
          $set_mdls_nm_m_s=ucwords($set_mdls_nm_s);
          $set_mdls_dtll_s=$mysqli->real_escape_string($set_mdls_dtll);
          $set_mdls_tll_s=$mysqli->real_escape_string($set_mdls_tll);
          $set_mdls_tp_s=$mysqli->real_escape_string($set_mdls_tp);
          $set_mdls_mt_s=$mysqli->real_escape_string($set_mdls_mt);
          $set_mdls_pctr_s=$mysqli->real_escape_string($set_mdls_pctr);
          
          
          if($set_garm_cod_s!="" && $set_mdls_id_s!="" && $set_mdls_nm_m_s!="" && $set_mdls_dtll_s!="" && $set_mdls_tll_s!="" && $set_mdls_tp_s!="" && $set_mdls_mt_s!="" && $set_mdls_pctr_s!="")
           {
               //funcion comprobar exitencia 
              
               if($conter=cntrlstd($set_mdls_id_s)>0)
               {
                  $msj=new stdClass();
                  $msj->not_num="020";
                  $msj->not_emotion=":( ";
                  $msj->not_msn="EL Modelo de esta prenda ya existe";
                  return print json_encode($msj);
                    
               }else{
                   
                $cnslt="INSERT INTO `col_models_nymas`(`cod_garment`, `id_models`, `name_models`, `detall_models`, `talla_models`, `tipo_models`, `material_models`, `picture_models`) VALUES (?,?,?,?,?,?,?,?)"; 
                /*sentencia preparada*/
                $stmt=$mysqli->prepare($cnslt);
                /*paso los parametros*/
                $stmt->bind_param("isssssss",
                                  $set_garm_cod_s,
                                  $set_mdls_id_s,
                                  $set_mdls_nm_m_s,
                                  $set_mdls_dtll_s,
                                  $set_mdls_tll_s,
                                  $set_mdls_tp_s,
                                  $set_mdls_mt_s,
                                  $set_mdls_pctr_s
                                 );
                   
                /*ejecuto la consulta*/
                if (!$stmt->execute()) 
                {
                     echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
                }else{
                  $msj=new stdClass();
                  $msj->not_num="060";
                  $msj->not_emotion=": ) ";
                  $msj->not_msn="Modelo de Prenda agregada con exito";
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
 
 function cntrlstd($set_mdls_id)
      { 
           include("../class_bd/conect.php");
           
           $set_mdls_id_s=$mysqli->real_escape_string($set_mdls_id);

           $cnslt="SELECT * FROM `col_models_nymas` WHERE id_models=?"; 
            /*sentencia preparada*/
           $stmt=$mysqli->prepare($cnslt);
           /*paso los parametros*/
           $stmt->bind_param("s",$set_mdls_id_s);
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

      function  cntrledit($set_garm_cod,$set_mdls_cod,$set_mdls_id_m,$set_mdls_nm_m,$set_mdls_dtll,$set_mdls_tll,$set_mdls_tp,$set_mdls_mt,$set_mdls_pctr)
      { 
           include("../class_bd/conect.php"); 
          
          $set_garm_cod_s=$mysqli->real_escape_string($set_garm_cod);
          $set_mdls_cod_s=$mysqli->real_escape_string($set_mdls_cod);
          $set_mdls_id_s=$mysqli->real_escape_string($set_mdls_id_m);
          $set_mdls_nm_s=$mysqli->real_escape_string($set_mdls_nm_m);
          $set_mdls_nm_m_s=ucwords($set_mdls_nm_s);
          $set_mdls_dtll_s=$mysqli->real_escape_string($set_mdls_dtll);
          $set_mdls_tll_s=$mysqli->real_escape_string($set_mdls_tll);
          $set_mdls_tp_s=$mysqli->real_escape_string($set_mdls_tp);
          $set_mdls_mt_s=$mysqli->real_escape_string($set_mdls_mt);
          $set_mdls_pctr_s=$mysqli->real_escape_string($set_mdls_pctr);
          
            
           if($set_mdls_cod_s!="" && $set_garm_cod_s!="" && $set_mdls_id_s!="" && $set_mdls_nm_m_s!="" && $set_mdls_dtll_s!="" && $set_mdls_tll_s!="" && $set_mdls_tp_s!="" && $set_mdls_mt_s!="" && $set_mdls_pctr_s!="")
           {
               
        $cnslt="UPDATE `col_models_nymas` SET `cod_garment`=?,`id_models`=?,`name_models`=?,`detall_models`=?,`talla_models`=?,`tipo_models`=?,`material_models`=?,`picture_models`=? WHERE `cod_models`=?"; 
                /*sentencia preparada*/
                $stmt=$mysqli->prepare($cnslt);
                /*paso los parametros*/
    $stmt->bind_param("isssssssi",
                            $set_garm_cod_s,
                            $set_mdls_id_s,
                            $set_mdls_nm_m_s,
                            $set_mdls_dtll_s,
                            $set_mdls_tll_s,
                            $set_mdls_tp_s,
                            $set_mdls_mt_s,
                            $set_mdls_pctr_s,
                            $set_mdls_cod_s);
                /*ejecuto la consulta*/
                if (!$stmt->execute()) 
                {
                     echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
                }else{
                  $msj=new stdClass();
                  $msj->not_num="060";
                  $msj->not_emotion=": ) ";
                  $msj->not_msn="El modelo de la prenda fue Actualizada con exito";
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
     function  cntrldelet($set_mdls_cod)
      { 
           include("../class_bd/conect.php"); 
           $set_garm_cod_s= $mysqli->real_escape_string($set_garm_cod);
           
 
           if($set_garm_cod_s!="" )
           {
                $stmt = $mysqli->prepare("DELETE FROM `col_models_nymas` WHERE cod_models=?");
                $stmt->bind_param('i',$set_mdls_cod);
                $stmt->execute(); 
                //$stmt->close();
                if (!$stmt->execute()) 
                {
                     echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
                }else{
                  $msj=new stdClass();
                  $msj->not_num="060";
                  $msj->not_emotion=": ) ";
                  $msj->not_msn="El Modelo de la prenda fue eliminada con exito";
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
            
        $condicion="mdls_";
        $std=$condicion.$op;

        switch($std)
        {
    
            case "mdls_view":
               viewmdls($set_garm_cod); 
            break;
            case "mdls_cntrladd":
                cntrladd($set_garm_cod,$set_mdls_id_m,$set_mdls_nm_m,$set_mdls_dtll,$set_mdls_tll,$set_mdls_tp,$set_mdls_mt,$set_mdls_pctr);
            break;
            case "mdls_cntrledit":
               cntrledit($set_garm_cod,$set_mdls_cod,$set_mdls_id_m,$set_mdls_nm_m,$set_mdls_dtll,$set_mdls_tll,$set_mdls_tp,$set_mdls_mt,$set_mdls_pctr);
            break;
            case "mdls_cntrldelet":
               cntrldelet($set_mdls_cod);
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