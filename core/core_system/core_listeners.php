<?php
/*
  LISTENERS
  -------------------------------------------------------------------------
  El proposito de esta clase es generar listados automaticos de cualquier
  tabla en cualquier base de datos. 
  -------------------------------------------------------------------------
  Clase desarrollada por David Armento. 
  Cualquier dudas consultar en d.armento@grupoanelis.com
  
*/

class listado {
	
	var $id = 'first';
	var $sql;
	var $limit = 0;
	var $botones;
	var $data;
	var $search_fields;
	var $filters;
	
	var $default_order_by = '';
	var $default_order_type = '';
	
	var $odd_row = '#fff';
	var $even_row = '#fff';
	var $found_text = 'found';
	var $not_found_text = 'No data';
	var $info_class;
	var $header_css_class;
	var $body_css_class;
	var $search_css_class;
	var $filter_css_class;
	var $paginator_css_class;
	
	//Recogemos valores del controller form
	function controller_values() {
		$val['offset'] = ( isset($_POST[$this->id.'_offset']) && $_POST[$this->id.'_offset'] != '' ) ? clean_post($this->id.'_offset') : 0;
		$val['order_by'] = ( isset($_POST[$this->id.'_order_by']) && $_POST[$this->id.'_order_by'] != '' ) ? clean_post($this->id.'_order_by') : '';
		$val['order_type'] = ( isset($_POST[$this->id.'_order_type']) && $_POST[$this->id.'_order_type'] != '' ) ? clean_post($this->id.'_order_type') : 'ASC';
		$val['search_txt'] = ( isset($_POST[$this->id.'_search_txt']) && $_POST[$this->id.'_search_txt'] != '' ) ? clean_post($this->id.'_search_txt') : '';
		$val['search_field'] = ( isset($_POST[$this->id.'_search_field']) && $_POST[$this->id.'_search_field'] != '' ) ? clean_post($this->id.'_search_field') : '';
		$val['filters'] = ( isset($_POST[$this->id.'_filters']) && $_POST[$this->id.'_filters'] != '' ) ? $_POST[$this->id.'_filters'] : '';
		return $val;	
	}
	
	// Este formulario almacena y controla valores del paginador y orden del listado
	function controller_form() {
		$ctrl = $this->controller_values();
		?>
        <form name="<?=$this->id?>_controller" method="post">
        	<input type="hidden" name="<?=$this->id?>_offset" value="<?=$ctrl['offset']?>" />
        	<input type="hidden" name="<?=$this->id?>_order_by" value="<?=$ctrl['order_by']?>" />
        	<input type="hidden" name="<?=$this->id?>_order_type" value="<?=$ctrl['order_type']?>" />
            <input type="hidden" name="<?=$this->id?>_search_txt" value="<?=$ctrl['search_txt']?>" />
            <input type="hidden" name="<?=$this->id?>_search_field" value="<?=$ctrl['search_field']?>" />
            <input type="hidden" name="<?=$this->id?>_filters" value="<?=$ctrl['filters']?>" />
        </form>
        <?php			
	}
	
	// Esta funcion devuelve el enlace a utilizar por las cabeceras que pueden ordenarse
	function order_config($arr)
	{
		//Configuramos valores en variables separadas porque es demasiado para hacer en una sola linea
		$ctrl = $this->controller_values();
		$class = ( isset($arr['order_by']) && $ctrl['order_by'] == $arr['order_by'] ) ? ' class="selected" ' : '' ; 
		$start = '<a '.$class.' href="javascript:void(0)" onclick="';
		$finish = '">';
		$submit = ' document.'.$this->id.'_controller.submit();';
		$place_order_by = 'document.'.$this->id.'_controller.'.$this->id.'_order_by.value=\''.( isset($arr['order_by']) ? $arr['order_by'] : '' ).'\'; ';	
		$order_type = ( isset($arr['order_by']) && $ctrl['order_by'] == $arr['order_by'] && $ctrl['order_type'] == 'ASC' ) ? 'DESC' : 'ASC';
		$place_order_type = 'document.'.$this->id.'_controller.'.$this->id.'_order_type.value=\''.$order_type.'\'; ';
		
		//Unimos valores del comienzo
		$order[0] = ( isset($arr['order_by']) ) ? $start . $place_order_by . $place_order_type . $submit . $finish : '' ;
		
		//Unimos valores del final
		$order[1]  = ( isset($arr['order_by']) ) ? '</a>' : '';
		
		//Devolvemos
		return $order;
	}
	
	//Genera la consulta
	function sql($nolimit=false) {
		$ctrl = $this->controller_values();
		
		//Busquedas
		$search = ( $ctrl['search_txt'] != '' && $ctrl['search_field'] != '' ) ? ' AND '.$ctrl['search_field'].' LIKE "%'.$ctrl['search_txt'].'%" ' : '' ;
		
		//filtros
		$filters = str_replace('|',' ',$ctrl['filters']);
		
		//Limites
		if ($nolimit) {
			$limit = '';	
		}
		else {
			$limit = ( $this->limit != 0 ) ? ' LIMIT '.$ctrl['offset'].','.$this->limit : '';
		}
		
		//Ordenaciones
		$order = ( $ctrl['order_by'] != '' ) ? ' ORDER BY '.$ctrl['order_by'].' '.$ctrl['order_type'] : '';	
		$order = ( $order == '' && $this->default_order_by != '' && $this->default_order_type != '' ) ? ' ORDER BY '.$this->default_order_by.' '.$this->default_order_type : $order;
		
		//Generamos sql
		
		$where = ( strpos($this->sql,'WHERE') === false ) ? ' WHERE 1 ' : '';
		
		$sql = $this->sql . $where . $search . $filters . $order . $limit;

		//Devolvemos consulta
				
		return $sql;		
	}
	
	//Busca en la base de datos
	function data() {
		return list_object( $this->sql() );	
	}
	
	//Genera la lista
	function listener() {
		$this->controller_form();
		$structure = $this->data;
		$all_list = num_rows( $this->sql(true) );
		echo '<br clear="all" />';
		echo '<div style="float: right; margin-right: 1%; "><div class="'.$this->info_class.'">'.$all_list.' '.$this->found_text.' '.$this->ver_botones().'</div><br clear="all"></div>';
		echo '<br clear="all" />';
		echo '<div class="'.$this->header_css_class.'">';
		foreach ( $structure as $key => $value ) {
			$order = $this->order_config($value);			
			echo '<div style="'.$value['css_header'].'">'.$order[0].$key.$order[1].'</div>';
		}
		echo '</div><br clear="all">';
		$data = $this->data();
		$count = count($data);
		if ( $count == 0 ) {
			echo '<div class="'.$this->body_css_class.'" style="width:98%; text-align:center; margin-left: 1%; margin-right: 1%;"><br/>'.$this->not_found_text.'<br/><br/></div>';
		}
		else {
			for ( $i=0; $i<$count; $i++ ) {
				$c = ( $i%2 == 0 ) ? $this->even_row : $this->odd_row;
				echo '<div class="'.$this->body_css_class.'" style="background-color:'.$c.'">';
				foreach ( $structure as $key => $value ) {
					echo '<div style="'.$value['css'].'">';				
					
					preg_match_all('|{(.*)}|U',$value['data'],$finded);
					$count_finded = count($finded[1]);
					if($count_finded > 0){
						for ($j=0; $j<$count_finded; $j++) {
							$value['data'] = str_replace('{'.$finded[1][$j].'}',$data[$i]->$finded[1][$j],$value['data']);
						}
					}
					
					preg_match_all('|##(.*)##|U',$value['data'],$finded);
					$count_finded = count($finded[1]);
					for ($j=0; $j<$count_finded; $j++) {						
						$data_eval = $this->listener_eval($finded[1][$j]);
						$value['data'] = str_replace('##'.$finded[1][$j].'##',$data_eval,$value['data']);
					}
					
					echo $value['data'];
					echo '</div>';
				}
				echo '</div>';
				echo '<br clear="all">';				
			}
		}
		echo '<br clear="all">';
		echo $this->paginador();
	}
	
	//Devuelve ejecucion de codigo php LIKE EVAL();.
	function listener_eval($codigo){
		ob_start();
		eval($codigo);
		$resultado = ob_get_clean();
		return $resultado;
	}
	
	//Muestra buscador
	function searchBox() {
		if ( $this->search_fields != '' ) {
			$ctrl = $this->controller_values();
			?>
			<div class="<?=$this->search_css_class?>">
            	<div style="padding:8px 20px 20px 20px;">
                    <strong>Buscar:</strong>
                    <div style="height:8px"></div>
					<div class="linea_horizontal"></div>
					<div style="height:26px"></div>
                    <div style="float:left;">
                    	<script>
							function searchIntro(evt, num){
							
								var charCode = (evt.which) ? evt.which : event.keyCode
							
								if(charCode == 13 || num == 1){
									document.<?=$this->id?>_controller.<?=$this->id?>_search_txt.value=document.getElementById('search_txt').value;
                    				document.<?=$this->id?>_controller.<?=$this->id?>_search_field.value=document.getElementById('search_field').value;
									document.<?=$this->id?>_controller.<?=$this->id?>_offset.value=0;
									document.<?=$this->id?>_controller.submit();
								}
							}
						</script>
                        <input type="text" style="width:40%; float: left;" id="search_txt" value="<?=$ctrl['search_txt']?>" onkeypress="searchIntro(event, 0);" class="col-md-12 form-control" placeholder="B&uacute;squeda" />
                        &nbsp;<label class="search_en">en</label>&nbsp;&nbsp;<select id="search_field" class="selectpicker" data-style="btn-default" style="width: 100%; float: left;">
                            <?php
                            foreach ( $this->search_fields as $key => $value ) {
                                $sel = ( $value == $ctrl['search_field'] ) ? 'selected="selected"' : '' ;
                                echo '<option '.$sel.' value="'.$value.'">'.$key.'</option>';	
                            }
                            ?>
                        </select>
                    </div>
                    <a class="btn btn-default btn-icon glyphicons search" href="javascript:void(0);" onclick="searchIntro(event, 1);">Buscar</a>
                    <br clear="all" />
				</div>
            </div>
			<?php
		}
	}
	
	//Muestra filtros
	function filters() {
		if ( $this->filters != '' ) {
			$ctrl = $this->controller_values();
			$filters = explode('|',$ctrl['filters']);
			?>
            <script language="javascript">
				function filters() {
					<?php
					$c = 0;
					echo 'var cadena = \'\';';
					foreach ( $this->filters as $key => $value ) {
						echo 'cadena=cadena+document.getElementById(\'filtro_'.$c.'\').value+\'|\';';
						$c++;
					}
					?>
					document.<?=$this->id?>_controller.<?=$this->id?>_offset.value=0;
					document.<?=$this->id?>_controller.<?=$this->id?>_filters.value=cadena;
					document.<?=$this->id?>_controller.submit();
				}
			</script>
            <div class="<?=$this->filter_css_class?>">
            	<div style="padding:8px 20px 20px 20px;">
					<?php
                    $c = 0;
                    echo '<span>Filtros:</span>
					<div style="height:8px"></div>
					<div class="linea_horizontal"></div>
					<div style="height:26px"></div>
					';
                    foreach ( $this->filters as $key => $value ) {
                        echo '<div style="float:left; margin-right:10px;">';
						echo "<label class='filter_key'>".$key."</label>";
                        echo '&nbsp;<select id="filtro_'.$c.'" onchange="filters();" class="selectpicker" data-style="btn-default" style="width: 100%; float: left;"><option value="">-----</option>';
                        foreach ( $value as $k => $v ) {
                            $sel = ( in_array($v,$filters) ) ? 'selected="selected"' : '';
                            echo '<option value="'.$v.'" '.$sel.'>'.$k.'</option>';
                        }
                        echo '</select></div>';
                        $c++;
                    }
                    ?>
                </div>
            </div>
			<?php
		}
	}
	
	//Crea la paginacion, si es necesaria
	function paginador() {
		if ( $this->limit != 0 ) {
			$ctrl = $this->controller_values();
			$all_list = num_rows( $this->sql(true) );
			$pages = ceil($all_list/$this->limit);
			
			$show_pages = 14;
			$start = ($ctrl['offset']/$this->limit) > ($show_pages/2) ? ($ctrl['offset']/$this->limit)-($show_pages/2) : 0; 
			$finish = $start+$show_pages > $pages ? $pages : $start+$show_pages;
			$start = $finish-$show_pages < 0 ? 0 : $finish-$show_pages;
			
			if ( $pages > 1 ) {
				echo '<div class="'.$this->paginator_css_class.'">';
				echo '<a style="margin-right: 5px;" href="javascript:void(0);" title="Ir a primera p&aacute;gina" onclick="document.'.$this->id.'_controller.'.$this->id.'_offset.value=\'0\'; document.'.$this->id.'_controller.submit();">Primera p&aacute;gina</a>';
				for ($i=$start; $i<$finish; $i++) {
					$this_page = $i+1;
					$this_offset=$i*$this->limit;
					$class = ( $this_offset == $ctrl['offset'] ) ? 'class="selected"' : '' ;
					echo '<a '.$class.' href="javascript:void(0);" title="P&aacute;gina '.$this_page.'" onclick="document.'.$this->id.'_controller.'.$this->id.'_offset.value=\''.$this_offset.'\'; document.'.$this->id.'_controller.submit();">'.$this_page.'</a>';
					
				}
				$this_last_offset = ($pages-1) * $this->limit;
				
				if($pages > 14){
					echo '<a style="margin-left: 5px;" href="javascript:void(0);" title="Ir a &uacute;ltima p&aacute;gina" onclick="document.'.$this->id.'_controller.'.$this->id.'_offset.value=\''.$this_last_offset.'\'; document.'.$this->id.'_controller.submit();">&Uacute;ltima p&aacute;gina</a>';
				}
				echo '</div>';
			}
		}
	}
	
	//Añade otones
	function ver_botones(){
		if ( is_array($this->botones) ) {
			foreach ( $this->botones as $key => $val ) {
				?><a class="boton" style="margin-left:10px; float:right; padding-left:16px; padding-right:16px;" href="<?=$val?>"><?=$key?></a> <?php
			}
		}
	}	
}


?>