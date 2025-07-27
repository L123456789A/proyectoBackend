<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/sisventas/includes/db.php";

class Venta
{
    private $pdo;

    public function __construct()
    {
        $conexion = new DBConection();
        $this->pdo = $conexion->conectar();
    }

    public function registrarVenta($data, $detalles)
    {
        try {
            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare("
                INSERT INTO facturas (fechaf, idcliente, idusuario, fechareg, idcondicion, valorneto, igv) 
                VALUES (?, ?, ?, NOW(), ?, ?, ?)
            ");
            $stmt->execute([
                $data['fechaf'],
                $data['idcliente'],
                $data['idusuario'],
                $data['idcondicion'],
                $data['valorneto'],
                $data['igv']
            ]);

            $idfactura = $this->pdo->lastInsertId();

            foreach ($detalles as $d) {
                $stmt = $this->pdo->prepare("
                    INSERT INTO detallefactura (idfactura, idproducto, cant, cosuni, preuni) 
                    VALUES (?, ?, ?, ?, ?)
                ");
                $stmt->execute([
                    $idfactura,
                    $d['idproducto'],
                    $d['cant'],
                    $d['cosuni'],
                    $d['preuni']
                ]);

                // Actualizar stock
                $this->pdo->prepare("UPDATE productos SET stock = stock - ? WHERE idproducto = ?")
                    ->execute([$d['cant'], $d['idproducto']]);
            }

            $this->pdo->commit();
            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            // ⚠️ Si estás en producción, puedes comentar esto para no mostrar mensajes sensibles
            echo "🛑 Error al registrar venta: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerClientes()
    {
        $stmt = $this->pdo->query("SELECT idcliente, nomcliente FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProductos()
    {
        $stmt = $this->pdo->query("SELECT idproducto, nomproducto, preuni, cosuni, stock FROM productos WHERE stock > 0");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCondiciones()
    {
        $stmt = $this->pdo->query("SELECT idcondicion, nomcondicion FROM condicionventa");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ventasPorDia()
    {
        $hoy = date('Y-m-d');

        $stmt = $this->pdo->prepare("
            SELECT f.*, c.nomcliente, con.nomcondicion
            FROM facturas f
            INNER JOIN clientes c ON f.idcliente = c.idcliente
            INNER JOIN condicionventa con ON f.idcondicion = con.idcondicion
            WHERE DATE(f.fechaf) = :hoy
            ORDER BY f.fechaf DESC
        ");
        $stmt->execute(['hoy' => $hoy]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ventasPorFechas($fechaini, $fechafin)
    {
        $stmt = $this->pdo->prepare("
        SELECT f.*, c.nomcliente, con.nomcondicion
        FROM facturas f
        INNER JOIN clientes c ON f.idcliente = c.idcliente
        INNER JOIN condicionventa con ON f.idcondicion = con.idcondicion
        WHERE DATE(f.fechaf) BETWEEN :inicio AND :fin
        ORDER BY f.fechaf DESC
    ");
        $stmt->execute([
            'inicio' => $fechaini,
            'fin' => $fechafin
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ventasPorCliente($idcliente)
    {
        $stmt = $this->pdo->prepare("
        SELECT f.*, c.nomcliente, con.nomcondicion
        FROM facturas f
        INNER JOIN clientes c ON f.idcliente = c.idcliente
        INNER JOIN condicionventa con ON f.idcondicion = con.idcondicion
        WHERE f.idcliente = :idcliente
        ORDER BY f.fechaf DESC
    ");
        $stmt->execute(['idcliente' => $idcliente]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ventasPorProducto($idproducto)
    {
        $stmt = $this->pdo->prepare("
        SELECT f.fechaf, c.nomcliente, p.nomproducto, df.cant, df.preuni, con.nomcondicion
        FROM detallefactura df
        INNER JOIN facturas f ON df.idfactura = f.idfactura
        INNER JOIN clientes c ON f.idcliente = c.idcliente
        INNER JOIN productos p ON df.idproducto = p.idproducto
        INNER JOIN condicionventa con ON f.idcondicion = con.idcondicion
        WHERE df.idproducto = :idproducto
        ORDER BY f.fechaf DESC
    ");
        $stmt->execute(['idproducto' => $idproducto]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarProductos()
    {
        $stmt = $this->pdo->query("SELECT idproducto, nomproducto FROM productos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rankingVentas()
    {
        $stmt = $this->pdo->query("
        SELECT 
            p.nomproducto,
            SUM(df.cant) AS total_vendido,
            SUM(df.cant * df.preuni) AS total_recaudado
        FROM detallefactura df
        INNER JOIN productos p ON df.idproducto = p.idproducto
        GROUP BY df.idproducto
        ORDER BY total_vendido DESC
    ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
