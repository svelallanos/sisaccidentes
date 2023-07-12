<?php

class Test extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function test()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(9, true);
        $data['page_id'] = 9;
        $data['page_tag'] = "MDESV - Sistema COBBA";
        $data['page_title'] = ":. Test Accidentes - Sistema COBBA";
        $data['page_name'] = "Test de accidente";
        $data['page_function_js'] = "test/functions_test";
        $data['page_genero'] = $this->model->genero();
        $data['page_academico'] = $this->model->academico();
        $data['page_fisico'] = $this->model->fisico();
        $data['page_cargo'] = $this->model->cargo();
        $data['page_laboral'] = $this->model->laboral();
        $data['page_animo'] = $this->model->animo();
        $data['page_psicologico'] = $this->model->psicologico();
        $this->views->getView($this, "test", $data);
    }
    public function resulttest()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(9, true);
        $data['page_id'] = 9;
        $data['page_tag'] = "MDESV - Sistema COBBA";
        $data['page_title'] = ":. Test Accidentes - Sistema COBBA";
        $data['page_name'] = "Resultado de Test de accidente";
        $data['page_function_js'] = "test/functions_resulttest";
        $this->views->getView($this, "resulttest", $data);
    }
    public function imptest()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(9, true);
        $data['page_id'] = 9;
        $data['page_tag'] = "MDESV - Sistema COBBA";
        $data['page_title'] = ":. Test Accidentes - Sistema COBBA";
        $data['page_name'] = "Resultado de Test de accidente";
        $data['page_function_js'] = "test/functions_imptest";
        $this->views->getView($this, "imptest", $data);
    }
    public function historial()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(9, true);
        $data['page_id'] = 9;
        $data['page_tag'] = "MDESV - Sistema COBBA";
        $data['page_title'] = ":. Historial de test de accidentes - Sistema COBBA";
        $data['page_name'] = "Historial de test de accidentes";
        $data['page_function_js'] = "test/functions_test";
        $this->views->getView($this, "historial", $data);
    }
    public function saveTest()
    {
        if (!$_POST) {
            $return = [
                'status' => false,
                'message' => 'METODO POST NO ENCONTRADO',
                'value' => 'error'
            ];
            json($return);
            die();
        }
        if (
            !isset($_POST["edad"])  ||
            !isset($_POST["academico"]) ||
            !isset($_POST["condicion"]) ||
            !isset($_POST["cargo"]) ||
            !isset($_POST["laboral"]) ||
            !isset($_POST["experiencia"]) ||
            !isset($_POST["estado"]) ||
            !isset($_POST["estadoTrabajo"]) ||
            !isset($_POST["accidenteLaboral"]) || !isset($_POST["entornoLaboral"])
        ) {
            $return = [
                'status' => false,
                'message' => 'LOS CAMPOS SON OBLIGATORIOS, POR FAVOR LLENELOS TODOS',
                'value' => 'error'
            ];
            json($return);
            die();
        }
        $Bajo = array(null);
        $Medio = array(null);
        $Alto = array(null);
        //Pregunta 1
        $edad = $_POST["edad"];
        if ($edad > 17 && $edad < 30) {
            $Bajo[0] = 5;
        } else if ($edad > 29 && $edad < 50) {
            $Medio[0] = 5;
        } else if ($edad > 49 && $edad < 56) {
            $Medio[0] = 5;
        } else if ($edad > 55) {
            $Alto[0] = 5;
        }
        //Pregunta 2
        $sexo = isset($_POST["genero"]) ? $_POST["genero"] : "";
        if ($sexo == "Masculino") {
            $Bajo[1] = 10;
        } else if ($sexo == "Femenino") {
            $Alto[1] = 10;
        } else {
            $Medio[1] = 10;
        }
        //Pregunta 3
        $academico = $_POST["academico"];
        if ($academico == "Primaria") {
            $Alto[2] = 5;
        } else if ($academico == "Secundaria") {
            $Medio[2] = 5;
        } else if ($academico == "Técnica") {
            $Medio[2] = 5;
        } else if ($academico == "Universitaria") {
            $Bajo[2] = 5;
        }
        //Pregunta 4
        $condicion = $_POST["condicion"];
        if ($condicion == "Ninguno") {
            $Bajo[3] = 10;
        } else if ($condicion == "Asma") {
            $Medio[3] = 10;
        } else if ($condicion == "Problemas de audición") {
            $Alto[3] = 10;
        } else if ($condicion == "Problemas de visión") {
            $Alto[3] = 10;
        }
        //Pregunta 5
        $cargo = $_POST["cargo"];
        if ($cargo == "Albañil") {
            $Medio[4] = 10;
        } else if ($cargo == "Gerente") {
            $Bajo[4] = 10;
        } else if ($cargo == "Electrisista") {
            $Medio[4] = 10;
        } else if ($cargo == "Contador") {
            $Bajo[4] = 10;
        }
        //Pregunta 6
        $laboral = $_POST["laboral"];
        if ($laboral == "Excavación") {
            $Alto[5] = 10;
        } else if ($laboral == "Demolición") {
            $Alto[5] = 10;
        } else if ($laboral == "Gasfitería") {
            $Bajo[5] = 10;
        } else if ($laboral == "Encofrado") {
            $Alto[5] = 10;
        }
        //Pregunta 7
        $experiencia = $_POST["experiencia"];
        if ($experiencia == "0") {
            $Alto[6] = 10;
        } else if ($experiencia == "2") {
            $Alto[6] = 10;
        } else if ($experiencia == "6") {
            $Medio[6] = 10;
        } else if ($experiencia == "9") {
            $Bajo[6] = 10;
        }
        //Pregunta 8
        $estado = $_POST["estado"];
        if ($estado == "Feliz") {
            $Bajo[7] = 10;
        } else if ($estado == "Triste") {
            $Medio[7] = 10;
        } else if ($estado == "Enojado") {
            $Alto[7] = 10;
        } else if ($estado == "Preocupado") {
            $Alto[7] = 10;
        }
        //Pregunta 9
        $estadoTrabajo = $_POST["estadoTrabajo"];
        if ($estadoTrabajo == "Ninguno") {
            $Bajo[8] = 10;
        } else if ($estadoTrabajo == "Estresado") {
            $Medio[8] = 10;
        } else if ($estadoTrabajo == "Deprimido") {
            $Alto[8] = 10;
        } else if ($estadoTrabajo == "Ansioso") {
            $Alto[8] = 10;
        }
        //Pregunta 10
        $accidenteLaboral = $_POST["accidenteLaboral"];
        if ($accidenteLaboral == "0") {
            $Bajo[9] = 10;
        } else if ($accidenteLaboral == "1") {
            $Medio[9] = 10;
        } else if ($accidenteLaboral == "4") {
            $Alto[9] = 10;
        } else if ($accidenteLaboral == "9") {
            $Alto[9] = 10;
        }
        //Pregunta 11
        $entornoLaboral = $_POST["entornoLaboral"];
        if ($entornoLaboral == "Nunca") {
            $Alto[10] = 10;
        } else if ($entornoLaboral == "Casi nunca") {
            $Alto[10] = 10;
        } else if ($entornoLaboral == "A veces") {
            $Medio[10] = 10;
        } else if ($entornoLaboral == "Siempre") {
            $Bajo[10] = 10;
        }
        $val = array("Bajo" => $Bajo, "Medio" => $Medio, "Alto" => $Alto);
        $totalBajo = 0;
        foreach ($val["Bajo"] as $key => $value) {
            $totalBajo += $value;
        }
        $totalMedio = 0;
        foreach ($val["Medio"] as $key => $value) {
            $totalMedio += $value;
        }
        $totalAlto = 0;
        foreach ($val["Alto"] as $key => $value) {
            $totalAlto += $value;
        }
        if ($totalBajo > $totalMedio && $totalBajo > $totalAlto) {
            $description = "Usted presenta una tendencia baja del " . $totalBajo . " % que no podria sucederle algun accidente";
            $valResult = array(
                "Bajo" => '<span class="text-pink fw-bold">' . $totalBajo . '%</span>',
                "Medio" =>  $totalMedio . "%",
                "Alto" =>  $totalAlto . "%"
            );
            $recomendaciones = ' <h6>Recomendaciones para alguien con una baja tendencia de sufrir un accidente laboral:</h6>
            <ol>
                <li class="mb-2">Sigue los procedimientos de seguridad: Cumple rigurosamente con todos los procedimientos y protocolos de seguridad establecidos por tu empresa.</li>
                <li class="mb-2">Utiliza correctamente el equipo de protección personal (EPP): Asegúrate de utilizar y mantener adecuadamente todos los equipos de protección personal necesarios para tu trabajo.</li>
                <li class="mb-2">Mantén una actitud de alerta y atención: Permanece consciente de tu entorno laboral y de las posibles situaciones de riesgo.</li>
                <li class="mb-2">Comunica situaciones de riesgo: Reporta cualquier situación o condición insegura que observes en tu lugar de trabajo a tu supervisor o al equipo de seguridad de la empresa.</li>
                <li class="mb-2">Realiza revisiones periódicas de seguridad: Realiza inspecciones regulares de tu área de trabajo para identificar y corregir posibles riesgos o condiciones inseguras.</li>
                <li class="mb-2">Mantén un entorno limpio y ordenado: Organiza y limpia tu área de trabajo regularmente para evitar obstrucciones y minimizar riesgos de tropiezos o caídas.</li>
                <li class="mb-2">Sigue las prácticas de ergonomía: Ajusta tu estación de trabajo y utiliza las posturas correctas para prevenir lesiones musculoesqueléticas y mejorar tu bienestar físico.</li>
                <li class="mb-2">Fomenta una cultura de seguridad: Promueve activamente la seguridad en tu lugar de trabajo alentando a tus compañeros a seguir las mejores prácticas y comunicando cualquier preocupación en relación a la seguridad.</li>
                <li class="mb-2">Mantén una mentalidad proactiva: No te conformes con el status que en términos de seguridad laboral. Busca constantemente oportunidades para mejorar los procesos y prácticas existentes y sugiere medidas preventivas adicionales cuando sea necesario.</li>
            </ol>';
        } else if ($totalMedio > $totalBajo && $totalMedio > $totalAlto) {
            $description = "Usted presenta una tendencia media del " . $totalMedio . " % que probablemente no le suceda algun accidente";
            $valResult = array(
                "Bajo" =>  $totalBajo . "%",
                "Medio" =>  '<span class="text-pink fw-bold">' . $totalMedio . '%</span>',
                "Alto" =>  $totalAlto . "%"
            );
            $recomendaciones = '<h6>Recomendaciones para alguien con una media tendencia de sufrir un accidente laboral:</h6>
            <ol>
                <li class="mb-2">Mantén la atención y concentración: Presta atención a tus tareas y evita distracciones que puedan aumentar el riesgo de accidentes.</li>
                <li class="mb-2">Utiliza el equipo de protección personal (EPP): Asegúrate de utilizar correctamente todos los equipos de protección personal necesarios para tu trabajo.</li>
                <li class="mb-2">Cumple con los procedimientos de seguridad: Sigue los procedimientos y protocolos de seguridad establecidos por tu empresa de manera consistente.</li>
                <li class="mb-2">Toma descansos regulares: Programa descansos breves para evitar la fatiga y mantener la concentración en niveles óptimos.</li>
                <li class="mb-2">Participa en programas de capacitación: Aprovecha las oportunidades de capacitación ofrecidas por tu empresa para mejorar tus habilidades y conocimientos en seguridad laboral.</li>
                <li class="mb-2">Reporta situaciones de riesgo: Comunica cualquier situación o condición insegura que observes en tu lugar de trabajo a tu supervisor o al equipo de seguridad de la empresa.</li>
                <li class="mb-2">Mantén un entorno limpio y ordenado: Organiza y mantiene tu área de trabajo libre de obstrucciones y desorden que puedan aumentar el riesgo de accidentes.</li>
                <li class="mb-2">Sigue las normas de ergonomía: Ajusta tu estación de trabajo y utiliza las posturas correctas para minimizar el riesgo de lesiones musculoesqueléticas.</li>
                <li class="mb-2">Realiza pausas de estiramiento: Realiza ejercicios de estiramiento regularmente para reducir.</li>
            </ol>';
        } else if ($totalAlto > $totalBajo && $totalAlto > $totalMedio) {
            $description = "Usted presenta una tendencia alta del " . $totalAlto . " % que le suceda algun accidente en el trabajo";
            $valResult = array(
                "Bajo" =>  $totalBajo . "%",
                "Medio" =>  $totalMedio . "%",
                "Alto" =>   '<span class="text-pink fw-bold">' . $totalAlto . '%</span>'
            );
            $recomendaciones = '<h6>Recomendaciones para alguien con una alta tendencia de sufrir un accidente laboral:</h6>
            <ol>
                <li class="mb-2">Obtén una evaluación médica: Consulta a un profesional de la salud para evaluar cualquier condición física o de salud que pueda estar aumentando tu riesgo de accidentes laborales.</li>
                <li class="mb-2">Sigue los procedimientos de seguridad: Cumple estrictamente con todos los procedimientos y protocolos de seguridad establecidos por tu empresa.</li>
                <li class="mb-2">Utiliza el equipo de protección personal (EPP): Asegúrate de utilizar y mantener correctamente todos los equipos de protección personal necesarios para tu trabajo.</li>
                <li class="mb-2">Recibe capacitación adicional: Participa en cursos o capacitaciones específicas para mejorar tus habilidades y conocimientos en seguridad laboral.</li>
                <li class="mb-2">Haz pausas regulares: Programa pausas durante tu jornada laboral para descansar y recuperar la concentración, especialmente si tu trabajo implica tareas repetitivas o de alta demanda física.</li>
                <li class="mb-2">Mantén una comunicación efectiva: Comunica cualquier preocupación o situación de riesgo a tu supervisor o equipo de seguridad de la empresa.</li>
                <li class="mb-2">Evita distracciones: Elimina cualquier distracción, como el uso de dispositivos electrónicos, cuando estés realizando tareas que requieran tu total atención y concentración.</li>
                <li class="mb-2">Mantén tu entorno limpio y ordenado: Mantén tu área de trabajo libre de obstrucciones, desorden y sustancias derramadas que puedan aumentar el riesgo de accidentes.</li>
                <li class="mb-2">Cuida tu bienestar emocional: Busca formas de gestionar el estrés y las emociones negativas, ya que pueden afectar tu capacidad para mantener la concentración y tomar decisiones seguras.</li>
                <li class="mb-2">Participa en programas de seguridad laboral: Únete a comités de seguridad o grupos de trabajo dedicados a mejorar la seguridad en el lugar de trabajo y contribuye activamente con ideas y sugerencias.</li>
            </ol>';
        } else if (($totalBajo + $totalMedio) > ($totalAlto + $totalMedio)) {
            $description = "Usted presenta una tendencia baja del " . $totalBajo . " % que no podria sucederle algun accidente";
            $valResult = array(
                "Bajo" => '<span class="text-pink fw-bold">' . $totalBajo . '%</span>',
                "Medio" => '<span class="text-pink fw-bold">' . $totalMedio . "% </span>",
                "Alto" =>  $totalAlto . "%"
            );
            $recomendaciones = ' <h6>Recomendaciones para alguien con una baja tendencia de sufrir un accidente laboral:</h6>
            <ol>
                <li class="mb-2">Sigue los procedimientos de seguridad: Cumple rigurosamente con todos los procedimientos y protocolos de seguridad establecidos por tu empresa.</li>
                <li class="mb-2">Utiliza correctamente el equipo de protección personal (EPP): Asegúrate de utilizar y mantener adecuadamente todos los equipos de protección personal necesarios para tu trabajo.</li>
                <li class="mb-2">Mantén una actitud de alerta y atención: Permanece consciente de tu entorno laboral y de las posibles situaciones de riesgo.</li>
                <li class="mb-2">Comunica situaciones de riesgo: Reporta cualquier situación o condición insegura que observes en tu lugar de trabajo a tu supervisor o al equipo de seguridad de la empresa.</li>
                <li class="mb-2">Realiza revisiones periódicas de seguridad: Realiza inspecciones regulares de tu área de trabajo para identificar y corregir posibles riesgos o condiciones inseguras.</li>
                <li class="mb-2">Mantén un entorno limpio y ordenado: Organiza y limpia tu área de trabajo regularmente para evitar obstrucciones y minimizar riesgos de tropiezos o caídas.</li>
                <li class="mb-2">Sigue las prácticas de ergonomía: Ajusta tu estación de trabajo y utiliza las posturas correctas para prevenir lesiones musculoesqueléticas y mejorar tu bienestar físico.</li>
                <li class="mb-2">Fomenta una cultura de seguridad: Promueve activamente la seguridad en tu lugar de trabajo alentando a tus compañeros a seguir las mejores prácticas y comunicando cualquier preocupación en relación a la seguridad.</li>
                <li class="mb-2">Mantén una mentalidad proactiva: No te conformes con el status que en términos de seguridad laboral. Busca constantemente oportunidades para mejorar los procesos y prácticas existentes y sugiere medidas preventivas adicionales cuando sea necesario.</li>
            </ol>';
        } else if (($totalMedio + $totalAlto) >= ($totalMedio + $totalBajo)) {
            $description = "Usted presenta una tendencia alta del " . $totalAlto . " % que le suceda algun accidente en el trabajo";
            $valResult = array(
                "Bajo" =>  $totalBajo . "%",
                "Medio" => '<span class="text-pink fw-bold">' . $totalMedio . '%</span>',
                "Alto" =>   '<span class="text-pink fw-bold">' . $totalAlto . '%</span>'
            );
            $recomendaciones = '<h6>Recomendaciones para alguien con una alta tendencia de sufrir un accidente laboral:</h6>
            <ol>
                <li class="mb-2">Obtén una evaluación médica: Consulta a un profesional de la salud para evaluar cualquier condición física o de salud que pueda estar aumentando tu riesgo de accidentes laborales.</li>
                <li class="mb-2">Sigue los procedimientos de seguridad: Cumple estrictamente con todos los procedimientos y protocolos de seguridad establecidos por tu empresa.</li>
                <li class="mb-2">Utiliza el equipo de protección personal (EPP): Asegúrate de utilizar y mantener correctamente todos los equipos de protección personal necesarios para tu trabajo.</li>
                <li class="mb-2">Recibe capacitación adicional: Participa en cursos o capacitaciones específicas para mejorar tus habilidades y conocimientos en seguridad laboral.</li>
                <li class="mb-2">Haz pausas regulares: Programa pausas durante tu jornada laboral para descansar y recuperar la concentración, especialmente si tu trabajo implica tareas repetitivas o de alta demanda física.</li>
                <li class="mb-2">Mantén una comunicación efectiva: Comunica cualquier preocupación o situación de riesgo a tu supervisor o equipo de seguridad de la empresa.</li>
                <li class="mb-2">Evita distracciones: Elimina cualquier distracción, como el uso de dispositivos electrónicos, cuando estés realizando tareas que requieran tu total atención y concentración.</li>
                <li class="mb-2">Mantén tu entorno limpio y ordenado: Mantén tu área de trabajo libre de obstrucciones, desorden y sustancias derramadas que puedan aumentar el riesgo de accidentes.</li>
                <li class="mb-2">Cuida tu bienestar emocional: Busca formas de gestionar el estrés y las emociones negativas, ya que pueden afectar tu capacidad para mantener la concentración y tomar decisiones seguras.</li>
                <li class="mb-2">Participa en programas de seguridad laboral: Únete a comités de seguridad o grupos de trabajo dedicados a mejorar la seguridad en el lugar de trabajo y contribuye activamente con ideas y sugerencias.</li>
            </ol>';
        }
        $resultVal = array("Bajo" => $totalBajo, "Medio" => $totalMedio, "Alto" => $totalAlto);

        $id = $_POST["idUser"];
        $request = $this->model->insertTest($id, $description,  $totalBajo,  $totalMedio,  $totalAlto,  $recomendaciones);
        $return = [
            'status' => true,
            'message' => 'TEST REGISTRADO Y GENERADO CORRECTAMENTE.',
            'value' => 'success'
        ];
        $arrData = array(
            "Id" => $request,
            "Descripcion" => $description,
            "dataValores" => $val,
            "resultValores" => $resultVal,
            "valHTML" => $valResult,
            "recomendaciones" => $recomendaciones
        );
        $_SESSION["test"] = $arrData;
        json($return);
    }
    public function getHistorial()
    {
        $id = $_SESSION['portal']['usuario_id'];
        $request = $this->model->selectHistorial($id);
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["acciones"] = "<button class='btn btn-danger' id='btnPrint' data-id='" . $value["test_id"] . "'><i class='feather-printer'></i></button>";
            $request[$key]["numero"] = $cont;
            $cont++;
        }
        json($request);
    }
    public function printTest()
    {
        $id = $_POST["id"];
        $request = $this->model->selectTest($id);

        $alerta = [
            'status' => true,
            'message' => 'TEST REGISTRADO Y GENERADO CORRECTAMENTE.',
            'value' => 'success'
        ];
        $totalBajo = $request[0]["test_bajo"];
        $totalMedio = $request[0]["test_medio"];
        $totalAlto = $request[0]["test_alto"];
        if ($totalBajo > $totalMedio && $totalBajo > $totalAlto) {
            $valResult = array(
                "Bajo" => '<span class="text-pink fw-bold">' . $totalBajo . '%</span>',
                "Medio" =>  $totalMedio . "%",
                "Alto" =>  $totalAlto . "%"
            );
        } else if ($totalMedio > $totalBajo && $totalMedio > $totalAlto) {
            $valResult = array(
                "Bajo" =>  $totalBajo . "%",
                "Medio" =>  '<span class="text-pink fw-bold">' . $totalMedio . '%</span>',
                "Alto" =>  $totalAlto . "%"
            );
        } else if ($totalAlto > $totalBajo && $totalAlto > $totalMedio) {
            $valResult = array(
                "Bajo" =>  $totalBajo . "%",
                "Medio" =>  $totalMedio . "%",
                "Alto" =>   '<span class="text-pink fw-bold">' . $totalAlto . '%</span>'
            );
        } else if (($totalBajo + $totalMedio) > ($totalAlto + $totalMedio)) {
            $valResult = array(
                "Bajo" => '<span class="text-pink fw-bold">' . $totalBajo . '%</span>',
                "Medio" => '<span class="text-pink fw-bold">' . $totalMedio . "% </span>",
                "Alto" =>  $totalAlto . "%"
            );
        } else if (($totalMedio + $totalAlto) >= ($totalMedio + $totalBajo)) {
            $valResult = array(
                "Bajo" =>  $totalBajo . "%",
                "Medio" => '<span class="text-pink fw-bold">' . $totalMedio . '%</span>',
                "Alto" =>   '<span class="text-pink fw-bold">' . $totalAlto . '%</span>'
            );
        }
        $arrData = array(
            "Id" => $request[0]["test_id"],
            "Descripcion" => $request[0]["test_descripcion"],
            "dataValores" => null,
            "resultValores" => array("Bajo" => $request[0]["test_bajo"], "Medio" => $request[0]["test_medio"], "Alto" => $request[0]["test_alto"]),
            "valHTML" => $valResult,
            "recomendaciones" => $request[0]["test_recomendaciones"]
        );
        $_SESSION["test"] = $arrData;
        json($alerta);
    }
}
