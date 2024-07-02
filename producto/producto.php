<?php
include_once "../login/verificar_sesion.php";
require_once("../conexion.php");

class Producto {
    private $id_producto;
    private $nombre;
    private $referencia;
    private $marca;
    private $descripcion;
    private $alto;
    private $ancho;
    private $profundo;
    private $tipo;
    private $cliente;
    private $id_usuarioFK;

    public function __construct($id_producto, $nombre, $referencia, $marca, $descripcion, $alto, $ancho, $profundo, $tipo, $cliente, $id_usuarioFK) {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->referencia = $referencia;
        $this->marca = $marca;
        $this->descripcion = $descripcion;
        $this->alto = $alto;
        $this->ancho = $ancho;
        $this->profundo = $profundo;
        $this->tipo = $tipo;
        $this->cliente = $cliente;
        $this->id_usuarioFK = $id_usuarioFK;
    }

    // Métodos getter y setter para todos los atributos
    public function getIdProducto() {
        return $this->id_producto;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getReferencia() {
        return $this->referencia;
    }

    public function setReferencia($referencia) {
        $this->referencia = $referencia;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getAlto() {
        return $this->alto;
    }

    public function setAlto($alto) {
        $this->alto = $alto;
    }

    public function getAncho() {
        return $this->ancho;
    }

    public function setAncho($ancho) {
        $this->ancho = $ancho;
    }

    public function getProfundo() {
        return $this->profundo;
    }

    public function setProfundo($profundo) {
        $this->profundo = $profundo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getIdUsuarioFK() {
        return $this->id_usuarioFK;
    }

    public function setIdUsuarioFK($id_usuarioFK) {
        $this->id_usuarioFK = $id_usuarioFK;
    }

    // Método para guardar un nuevo producto en la base de datos
    public function guardar() {
        $conexion = new Conexion();
        
        try {
            $consulta = $conexion->prepare(
                "INSERT INTO producto (id_producto, nombre, referencia, marca, descripcion, alto, ancho, profundo, tipo, cliente, fecha, id_usuarioFK) 
                 VALUES(:id_producto, :nombre, :referencia, :marca, :descripcion, :alto, :ancho, :profundo, :tipo, :cliente, NOW(), :id_usuarioFK)"
            );
            
            $consulta->bindParam(':id_producto', $this->id_producto);
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':referencia', $this->referencia);
            $consulta->bindParam(':marca', $this->marca);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':alto', $this->alto);
            $consulta->bindParam(':ancho', $this->ancho);
            $consulta->bindParam(':profundo', $this->profundo);
            $consulta->bindParam(':tipo', $this->tipo);
            $consulta->bindParam(':cliente', $this->cliente);
            $consulta->bindParam(':id_usuarioFK', $this->id_usuarioFK);
            
            $consulta->execute();
            
            echo "Producto guardado con éxito";
            
            return true;
            
        } catch (PDOException $e) {
            echo "Hay un error: " . $e->getMessage();
            return false;
        }
    }

    public static function obtenerProductoPorId($idProducto) {
        $conexion = new Conexion();
        $sql = "SELECT * FROM producto WHERE id_producto = :id";
        $consulta = $conexion->prepare($sql);
        
        try {
            $consulta->bindParam(':id', $idProducto);
            $consulta->execute();
            $producto = $consulta->fetch(PDO::FETCH_ASSOC);
            return $producto;
        } catch (PDOException $e) {
            echo "Error al obtener el producto: " . $e->getMessage();
            return null;
        }
    }

    public static function obtenerTodosLosProductos() {
        $conexion = new Conexion();
        $sql = "SELECT id_producto, nombre, referencia, marca, descripcion, alto, ancho, profundo, tipo, cliente, fecha, id_usuarioFK FROM producto";
        $consulta = $conexion->prepare($sql);
        
        try {
            $consulta->execute();
            $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $productos;
        } catch (PDOException $e) {
            echo "Error al obtener los productos: " . $e->getMessage();
            return [];
        }
    }
}
?>
