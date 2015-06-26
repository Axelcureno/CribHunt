<?php 

/*
DETECCIÓN DE AMBIENTE DE DESARROLLO

Pequeño script que detecta el ambiente de desarrollo basandose en
la dirección IP externa, el VPS tiene la dirección fija de 45.55.90.36
El ambiente de desarrollo local debe estar configurado con la dirección
http://cribhunt.dev utilizando el servidor web nginx con PHP-FPM

Nota: NUNCA se debe de trabajar directamente sobre lo archivos del servidor.
Para hacer un deploy al servidor remoto, se debe configurar el repositorio
remoto de Git y a través de Web Hooks hacer el deploy.
 */
$externalIp = file_get_contents('http://phihag.de/ip/');

if ($externalIp == '45.55.90.36') {

	define("URL", "https://cribhunt.co/");

} else {

	define("URL", "http://cribhunt.dev/");

}

/* 
CONFIGURACIÓN MySQL 

Siempre es la misma configuración en el servidor remoto
y debe ser igual en el servidor local, para hacer una copia
de la base de datos con el fin de trabajar localmente
simplemente se debe exportar la base de datos a través de 
un cliente de MySQL con las mismas credenciales usando SSH.
*/
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

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
  throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
}
if (!mysqli_set_charset($con, "utf8")) {
} else {
}

/*
DETECCIÓN DE LA SESIÓN DEL USUARIO

Todas las páginas que necesiten estar protegidas, osea
que necesite haber una sesión creada para poder acceder
a ellas deberán invocar esta función.
Lo que hace la función es iniciar una sesión en la página
PHP, detectar si existe una sesión del usuario y en el caso
de que no exista la sesión, redireccione a la página de 
inicio de sesión.
 */
function startpage() {
	session_start();
	if(!isset($_SESSION['usersicam']))
	{
	   header("location:login.php");
	}
}


/* 
DETECCIÓN DE LA EXISTENCIA DE UN DATO

Funcion que verifica si existe una propiedad en la base de datos
Si existe, entonces despliega el valor en el formulario para 
hacerlo sticky y el usuario solo tenga que actualizar el campo.
Esta función puede ser util cuando se vayan a modificar valores o
mostrar valores que ya están definidos en la base de datos.
*/
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

/*
CREACIÓN DE URL's

Funcion que genera URIs a partir del titulo de los cribs.
Cuando el usuario registra un nuevo Crib, al momento de dar de alta
el titulo, a través de esta función se extraen caractéres especiales y 
espacios para crear una URL bonita.
*/
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


/*
DEFINICIÓN DE CLASE CRIB

En un futuro se planea utilizar programación
orientada a objetos para el registro de Cribs,
De momento no se utiliza de esta manera sino
es por medio de programación estructurada.
 */
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