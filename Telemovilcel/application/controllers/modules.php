<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modules extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct(){
    	parent::__construct();
    	$this->load->model('correspondencia_model');
        $this->load->library('session');
        $this->load->database();
        $this->load->library('Grocery_CRUD');
        $this->load->helper('url');
        $this->load->helper('fecha_en_letras');
        $this->load->helper('miles');
    }
    function CheckSession(){
           if(isset($this->session->userdata['Documento'])) return true;
           else return false;
        
    }
    
    function LoadInformacionComunInicio($data){
        if($this->CheckSession()==false) redirect('/usuarios/index','refresh');
        $sql = $this->correspondencia_model->getParametrosGenerales(1);
        $data['imagen_corporativa'] = $sql->Imagen;
        $data['nombre_empresa'] = $sql->NombreEmpresa;
        $sql = $this->correspondencia_model->getInformacionEmpleado($this->session->userdata['Documento']); 
        if($sql->Foto == "")
            $data['imagen_usuario'] = "nofoto.jpg";
        else
        $data['imagen_usuario'] = $sql->Foto;
        $data['nombre_usuario'] = $sql->Nombre;
        $dataMenu['nombre_usuario']  = $sql->Nombre;
        
        $this->load->view('html_apertura');
    	$this->load->view('header_apertura');
        $this->load->view('header_bootstrap');
        $this->load->view('header_cierre');
        $this->load->view('body_apertura');
        $this->load->view('menu',$dataMenu);
        $this->load->view('container_apertura');
        $this->load->view('banner',$data);
        $this->load->view('contenido');
        $this->load->view('container_cierre');
        $this->load->view('body_cierre');
    	$this->load->view('html_cierre');    
        
    }
    function LoadInformacionComunGrocery($output,$data){
        if($this->CheckSession()==false) redirect('/usuarios/index','refresh');
        $sql = $this->correspondencia_model->getParametrosGenerales(1);
        $data['imagen_corporativa'] = $sql->Imagen;
        $data['nombre_empresa'] = $sql->NombreEmpresa;
        $sql = $this->correspondencia_model->getInformacionEmpleado($this->session->userdata['Documento']); 
         if($sql->Foto == "")
            $data['imagen_usuario'] = "nofoto.jpg";
        else
        $data['imagen_usuario'] = $sql->Foto;
        $data['nombre_usuario'] = $sql->Nombre;
        $dataMenu['nombre_usuario']  = $sql->Nombre;
       
        
        $this->load->view('html_apertura');
        $this->load->view('header_apertura');
        $this->load->view('header_bootstrap');
        $this->load->view('header_grocery',$output);
        $this->load->view('header_cierre');
        $this->load->view('body_apertura');
        $this->load->view('menu',$dataMenu);
        $this->load->view('container_apertura');
        $this->load->view('banner',$data);
        $this->load->view('contenido',$output);
        $this->load->view('container_cierre');
        $this->load->view('body_cierre');
        $this->load->view('html_cierre');
        
    }
	public function index(){
        $data['output'] = '<!-- Main hero unit for a primary marketing message or call to action -->
          <div class="hero-unit">
            <h1>Bienvenido</h1>
            <p>Software de Inventario</p>
           </div>
            <hr>
           <footer>
            <p>'.date("Y").'</p>
          </footer>';
        $data['nombre_modulo'] = 'Inventario';
        $this->LoadInformacionComunInicio($data);
	}


  public function usuarios(){
   
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->unset_print();
        $crud->unset_delete();
        $crud->set_table('usuarios')
        ->set_subject('Usuario')
        ->columns('Documento','Nombre','Foto');
        $crud->required_fields('Documento','Nombre');
        $crud->fields('Documento','Nombre','Foto','Password');
        $crud->set_field_upload('Foto','assets/uploads/files/usuarios');
        $crud->field_type('Password','hidden');
         $crud->callback_before_insert(array($this,'UsuariosPassword'));
        $output = $crud->render();
        $data['nombre_modulo'] = 'Usuarios';
        
        $this->LoadInformacionComunGrocery($output,$data);
       
}
  function UsuariosPassword($post_array){
        $post_array['Password'] = $post_array['Documento'];
        return $post_array;
        
        
    }


        public function mi_cuenta(){
        if($this->CheckSession()==false) redirect('/usuarios/index','refresh');
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->unset_print();
        
        $crud->unset_delete();
        $crud->unset_add();
        $crud->unset_read();
        $crud->where('Documento',$this->session->userdata['Documento']);
        $crud->set_table('usuarios')
        
        ->set_subject('Usuario')
        ->columns('Documento','Nombre','Foto');
        $crud->required_fields('Nombre','Password');
        $crud->fields('Nombre','Foto','Password');
        $crud->set_field_upload('Foto','assets/uploads/files/usuarios');
        $crud->field_type('Password','password');
        $crud->field_type('Documento','readonly');

        $output = $crud->render();
        $data['nombre_modulo'] = 'Usuarios';
        
        $this->LoadInformacionComunGrocery($output,$data);
       
    }
  
      
public function inventario(){
   
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->unset_print();
        //$crud->unset_delete();
       
            $crud->set_table('mercancias')
            ->set_subject('Mercancia')
            ->columns('ID','Nombre','Referencia','IDMarca','IDCategoria','Cantidad','VentasUltimaSemana','FechaUltimoArqueo')
            ->display_as('IDMarca','Marca')   
            ->display_as('IDVitrina','Vitrina')
            ->display_as('IDCategoria','Categoria')
            ->display_as('VentasUltimaSemana','Cantidad Ultimo Arqueo')
            ->display_as('FechaUltimoArqueo','Fecha Ultimo Arqueo');
            
            $crud->callback_before_update(array($this,'Arqueo'));
            
            $crud->required_fields('Nombre','Referencia','IDMarca','IDCategoria','Cantidad','VentasUltimaSemana');
            $crud->fields('Nombre','Referencia','IDMarca','IDCategoria','Cantidad','VentasUltimaSemana','FechaUltimoArqueo');
            $crud->field_type('FechaUltimoArqueo', 'hidden');
            $crud->set_relation('IDMarca','bas_marcas','Nombre'); 
            $crud->set_relation('IDCategoria','bas_categorias','Nombre'); 
            $crud->set_relation('IDVitrina','bas_vitrinas','Nombre'); 
          
          
            
            $crud->set_field_upload('Foto','assets/uploads/files/mercancia');
           // $crud->set_rules('Folios','Cantidad de Folios','integer');
           // $crud->callback_before_insert(array($this,'TestBefore'));
      
            
   
            
            
            $output = $crud->render();
            $data['nombre_modulo'] = 'Inventario';
            $this->LoadInformacionComunGrocery($output,$data);
            
     
}
function Arqueo($post_array){
    $post_array['Cantidad']=$post_array['Cantidad']-$post_array['VentasUltimaSemana'];
    $post_array['FechaUltimoArqueo'] = date("Y-m-d H:i:s");
    return $post_array;
}
public function agotada(){
   
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->unset_print();
        $crud->unset_delete();
        $crud->unset_add();
       
            $crud->set_table('mercancias')
            
            ->set_subject('Mercancia')
            ->columns('ID','Nombre','Referencia','IDMarca','IDCategoria','Cantidad')
            ->display_as('IDMarca','Marca')   
            ->display_as('IDVitrina','Vitrina')
            ->display_as('IDCategoria','Categoria');
             $crud->where('Cantidad <=',2);

            
            $crud->required_fields('Nombre','Referencia','IDMarca','IDCategoria','IDVitrina','Cantidad');
            $crud->fields('Nombre','Referencia','IDMarca','IDCategoria','Cantidad');
           
            $crud->set_relation('IDMarca','bas_marcas','Nombre'); 
            $crud->set_relation('IDCategoria','bas_categorias','Nombre'); 
            $crud->set_relation('IDVitrina','bas_vitrinas','Nombre'); 
          
          
            
            $crud->set_field_upload('Foto','assets/uploads/files/mercancia');
           // $crud->set_rules('Folios','Cantidad de Folios','integer');
           // $crud->callback_before_insert(array($this,'TestBefore'));
      
            
   
            
            
            $output = $crud->render();
            $data['nombre_modulo'] = 'Inventario';
            $this->LoadInformacionComunGrocery($output,$data);
            
     
}
     function TestBefore($post_array){
       
        $sql = $this->correspondencia_model->getEmailFuncionario($post_array['IDFuncionariosDestino']);
        $Email = $sql->Email;
        $Nombre = $sql->Nombre;
        $cantidad = $this->correspondencia_model->getCantidadCorrespondencia($post_array['IDBas_tiposcorrespondencia']);
        $nemonico = $this->correspondencia_model->getCodigoNemonico($post_array['IDBas_tiposcorrespondencia']);
        $codigo = $cantidad + 1;
        $post_array['Codigo'] = $nemonico.str_pad($codigo, 6, '0', STR_PAD_LEFT); 
        $FolioDigital = $post_array['FolioDigital'];
        $UrlFolioDigital = "http://ingera.com.co/Correspondencia/assets/uploads/files/".$FolioDigital;
        $sql = $this->correspondencia_model->getParametrosGenerales(1);
        $PieDePaginaCorreo = $sql->PieDePaginaCorreo;
        
        
        
        $cabeceras = 'MIME-Version: 1.0' . "\r\n"; 
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
        $cabeceras .= 'FROM: Correspondencia Hospital <noresponder@correspondenciahospital.com.co> '."\r\n"; 
        mail($Email,'Hola, Mira tu Correspondencia',"Hola $Nombre <br><br> tienes una  Correspondencia puedes descargarla <a href='$UrlFolioDigital'>Aquí</a><br><br><em>$PieDePaginaCorreo</em>",$cabeceras);
        return $post_array;
     }
 
    public function vitrinas(){
       
            $crud = new grocery_CRUD();
            $crud->set_theme('flexigrid');
            $crud->unset_delete();
            $crud->unset_print();
           
            $crud->set_table('bas_vitrinas')
            ->set_subject('Vitrina')
            ->columns('ID','Nombre');
            $crud->required_fields('Nombre');
            $crud->fields('Nombre');
            $output = $crud->render();
            $data['nombre_modulo'] = 'Vitrinas';
            
            $this->LoadInformacionComunGrocery($output,$data);
            
    }
    public function categorias(){
       
            $crud = new grocery_CRUD();
            $crud->set_theme('flexigrid');
            //$crud->unset_delete();
            $crud->unset_print();
           
            $crud->set_table('bas_categorias')
            ->set_subject('Categoria')
            ->columns('ID','Nombre');
            $crud->required_fields('Nombre');
            $crud->fields('Nombre');
            $output = $crud->render();
            $data['nombre_modulo'] = 'Categoria';
            
            $this->LoadInformacionComunGrocery($output,$data);
            
    }
     public function marcas(){
       
            $crud = new grocery_CRUD();
            $crud->set_theme('flexigrid');
            //$crud->unset_delete();
            $crud->unset_print();
           
            $crud->set_table('bas_marcas')
            ->set_subject('Marca')
            ->columns('ID','Nombre');
            $crud->required_fields('Nombre');
            $crud->fields('Nombre');
            $output = $crud->render();
            $data['nombre_modulo'] = 'Marcas';
            
            $this->LoadInformacionComunGrocery($output,$data);
            
    }
 
 
  

public function parametros_sistema(){
   
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->unset_print();
       
        $crud->set_table('bas_parametrossistema')
        ->set_subject('Patametros del Sistema')
        ->columns('ID','NombreEmpresa','Imagen')
        ->display_as('NombreEmpresa','Nombre Empresa');
        $crud->required_fields('ID','NombreEmpresa','Imagen');
        $crud->fields('ID','NombreEmpresa','Imagen');
         $crud->set_field_upload('Imagen','assets/uploads/files/parametros_generales');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->callback_before_update(array($this,'Imagen'));
        $crud->field_type('PieDePaginaCorreo','text');
        $output = $crud->render();
        $data['nombre_modulo'] = 'Parametros Generales';
        
        $this->LoadInformacionComunGrocery($output,$data);
}   
function Imagen($post_array){
    //$post_array['NombreEmpresa'] = $post_array['Imagen'];
     return $post_array;
    
}

 


}
?>
