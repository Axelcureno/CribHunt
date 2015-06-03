<?php 

define("URL", "http://localhost/cribhunt/");

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cribhunt');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'donfrijol13');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

$con = mysqli_connect('localhost','root','donfrijol13','cribhunt');
if (mysqli_connect_errno()) {
  throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
}

function startpage() {
	session_start();
	if(!isset($_SESSION['usersicam']))
	{
	   header("location:login.php");
	}
}
//Funcion que verifica si existe una propiedad en la base de datos
//Si existe, entonces despliega el valor en el formulario para 
//hacerlo sticky y el usuario solo tenga que actualizar el campo.
function dataexists($property) {
    if (isset($property)) {
        echo 'value="'.$property.'"';
    }
}


function dataisempty($property) {
    if (!empty($property)) {
        echo 'value="'.$property.'"';
    }
}

//Funcion que genera URIs a partir del titulo de los cribs.
function slugify($text)
{ 
  // replace non letter or digits by -
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // trim
  $text = trim($text, '-');

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // lowercase
  $text = strtolower($text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  if (empty($text))
  {
    return 'n-a';
  }

  return $text;
}



class Crib {

	public $titulo;
	public $categoria;
	public $ubicacion;
	public $precio;
	public $telefono;
	public $ciudad;
	public $caracteristicas;
	public $estado;
	public $colonia;
	public $cp;
	public $direccio;

	public function __construct($titulo, 
								$categoria, 
								$ubicacion,
								$precio, 
								$telefono,
								$ciudad, 
								$ubicacion, 
								$caracteristicas,
								$ciudad,
								$estado,
								$colonia,
								$cp,
								$direccion) {

		$this->_titulo = $titulo;
		$this->_categoria = $categoria;
		$this->_ubicacion = $ubicacion;
		$this->_precio = $precio;
		$this->_telefono = $telefono;
		$this->_ciudad = $ciudad;
		$this->_ubicacion = $ubicacion;
		$this->_caracteristicas = $caracteristicas;
		$this->_ciudad = $ciudad;
		$this->_estado = $estado;
		$this->_colonia = $colonia;
		$this->cp = $cp;
		$this->direccion = $direccion;

	}
}

?>