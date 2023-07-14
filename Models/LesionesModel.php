<?php

class LesionesModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }

    // Select All

    function selectAllAccidentes()
    {
        $sql = 'SELECT * FROM accidentes ORDER BY accidentes_fechacreacion DESC';
        $result = $this->select_all($sql, array(), DB_ACCIDENTES);

        return $result;
    }

    function selectAllLesiones()
    {
        $sql = 'SELECT * FROM lesiones ORDER BY lesiones_fechacreacion DESC';
        $result = $this->select_all($sql, array(), DB_ACCIDENTES);

        return $result;
    }

    // Select
    // Insert

    function insertLesiones(int $accidentes_id, string $lesiones_nombre, string $lesiones_descripcion, int $lesiones_peso)
    {
        $sql = 'INSERT INTO lesiones (accidentes_id, lesiones_nombre, lesiones_descripcion, lesiones_peso) VALUES(:accidentes_id, :lesiones_nombre, :lesiones_descripcion, :lesiones_peso)';
        $arrData = [
            'accidentes_id' => $accidentes_id,
            'lesiones_nombre' => $lesiones_nombre,
            'lesiones_descripcion' => $lesiones_descripcion,
            'lesiones_peso' => $lesiones_peso,
        ];
        $request = $this->insert($sql, $arrData, DB_ACCIDENTES);

        return $request;
    }

    // Update
    function updateLesiones(int $lesiones_id, int $accidentes_id, string $lesiones_nombre, string $lesiones_descripcion, int $lesiones_peso)
    {
        $sql = 'UPDATE lesiones SET accidentes_id = :accidentes_id, lesiones_nombre = :lesiones_nombre, lesiones_descripcion = :lesiones_descripcion, lesiones_peso = :lesiones_peso 
        WHERE lesiones_id = :lesiones_id';

        $arrData = [
            'accidentes_id' => $accidentes_id,
            'lesiones_nombre' => $lesiones_nombre,
            'lesiones_descripcion' => $lesiones_descripcion,
            'lesiones_peso' => $lesiones_peso,
            'lesiones_id' => $lesiones_id
        ];

        $request = $this->update($sql, $arrData, DB_ACCIDENTES);

        return $request;
    }

    // Delete
    function deleteLesiones(int $lesiones_id)
    {
        $sql = "DELETE FROM lesiones 
        WHERE lesiones_id = :lesiones_id";
        $request = $this->delete($sql, ['lesiones_id' => $lesiones_id], DB_ACCIDENTES);

        return $request;
    }
    function deleteHLesion(int $lesiones_id)
    {
        $sql = "DELETE FROM `historial_lesiones` WHERE  `hlesiones_id`=?;";
        $request = $this->delete($sql, [$lesiones_id], DB_ACCIDENTES);
        return $request;
    }
    public function selectHLesiones()
    {
        $query = "select*from historial_lesiones as hl
        inner join usuarios as u on u.usuarios_id=hl.user_id
        inner join lesiones as l on l.lesiones_id=hl.lesiones_id
        inner join accidentes as a on a.accidentes_id=l.accidentes_id;";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function selectUser()
    {
        $query = "SELECT * FROM `usuarios`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function selectLesion(int $id)
    {
        $query = "SELECT * FROM lesiones AS l WHERE l.accidentes_id={$id}";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function insertHLesion(int $idLesion, int $idUsuario)
    {
        $query = "INSERT INTO `historial_lesiones` (`lesiones_id`, `user_id`) VALUES (?, ?);";
        $request = $this->insert($query, [$idLesion, $idUsuario], DB_ACCIDENTES);
        return $request;
    }
}
