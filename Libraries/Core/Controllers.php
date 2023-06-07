<?php
require_once(PATH_MODELS . "UsuariosModel.php");
require_once(PATH_MODELS . "PermisosModel.php");
require_once(PATH_MODELS . "RolesModel.php");
require_once(PATH_MODELS . "LoginModel.php");

class Controllers
{
  public function __construct($session = true)
  {
    if ($session) {
      session_start();
    }

    $this->views = new Views();
    $this->loadModel();
    $this->isLogin();

    $this->datosUserPortal = $this->defineDatosUserPortal();
    $this->validarUpdatePassword();
    $this->validarUltimoLoad();

    $this->permisosUser = $this->getPermisos();
  }

  public function loadModel()
  {
    $model = get_class($this) . "Model";
    $routClass = "Models/" . $model . ".php";
    if (file_exists($routClass)) {
      require_once($routClass);
      $this->model = new $model();
    }
  }

  public function verificarPermiso(int $idPermiso, bool $redirigir = false)
  {
    if (isset($this->permisosUser[$idPermiso])) {
      return true;
    } else {
      if ($redirigir) {
        location();
      } else {
        return false;
      }
    }
  }

  public function validarUltimoLoad()
  {
    if ($this->isLogin) {
      if (isset($_SESSION['portal']['last_load'])) {
        $now = new DateTime('NOW');
        $lastLoad = $_SESSION['portal']['last_load'];

        $lastLoad->add(new DateInterval('PT' . TIME_SESSION['horas'] . 'H' . TIME_SESSION['minutos'] . 'M'));

        if ($now > $lastLoad) {
          unset($_SESSION['portal']);
          location('login');
        } else {
          $_SESSION['portal']['last_load'] = new DateTime('NOW');
        }
      } else {
        $_SESSION['portal']['last_load'] = new DateTime('NOW');
      }
    }
  }

  public function isLogin()
  {
    if (isset($_SESSION['portal']['login_portal']) && $_SESSION['portal']['login_portal'] == true) {
      $this->isLogin = true;
    } else {
      $this->isLogin = false;

      if (isset($_SESSION)) {
        unset($_SESSION['portal']);
      }
    }
  }

  public function defineDatosUserPortal()
  {
    $datosUserPortal = array(
      'usuarios_nombres' => 'Invitado #2022',
      'usuarios_materno' => '',
      // 'usuarios_dni' => '0',
      'usuarios_paterno' => ''
    );

    if ($this->isLogin) {

      $usuarios = new UsuariosModel();
      $datosUserPortal = $usuarios->selectUsuarioLogin($_SESSION['portal']['usuario_login']);

      if ($datosUserPortal) {
        // Validar si el usuarios esta bloqueado

        $bloqueado = $usuarios->selectMotivoUsuarioById($datosUserPortal['usuarios_id']);

        if (!empty($bloqueado) || $datosUserPortal['usuarios_estado'] != 1) {
          $this->isLogin = false;
          unset($_SESSION['portal']);
        }
      } else {
        $this->isLogin = false;
        unset($_SESSION['portal']);
      }
    }

    return $datosUserPortal;
  }
  public function validarUpdatePassword()
  {
    if ($this->isLogin) {
      $sessionDate = $_SESSION['portal']['update_pass'];
      $dbDate = $this->datosUserPortal['usuarios_updatepassword'];

      if ($sessionDate != $dbDate) {
        unset($_SESSION['portal']);
        location('login');
      }
    }
  }

  public function getPermisos()
  {
    if (!$this->isLogin) {
      return array();
    } else {
      $permisosModel = new PermisosModel();
      $array = array();

      $permisos = $permisosModel->getPermisos($this->datosUserPortal['usuarios_id']);
      $permisosUsuario = $permisosModel->getPermisosUsuario($this->datosUserPortal['usuarios_id']);

      foreach ($permisos as $key => $value) {
        $array[$value['permiso_id']] = true;
      }

      foreach ($permisosUsuario as $key => $value) {
        $array[$value['permiso_id']] = true;
      }

      return $array;
    }
  }

  public function verificarLogin(bool $redirigir = false)
  {
    if ($this->isLogin) {
      return true;
    } else {
      unset($_SESSION['portal']);
      if ($redirigir) {
        location('login');
      } else {
        return false;
      }
    }
  }
}
