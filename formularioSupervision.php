<html lang="es" id="Form-sup">

<?php

include("Includes/Head.php");
include("Includes/nav.php");
include("Includes/logo.php");
;

?>

<body>



    <!-- Contenedor principal -->
    <div class="container mt-4">

        <h3 class="text-center">Supervisión en Motocicletas</h3>
        <form id="form-principal">
            <button type="button" id="guardar">Exportar a PDF</button>
            <div class="form-row">
                <!-- Fecha y Placa -->
                <div class="form-group col-md-3">
                    <label for="fecha">Fecha:</label>
                    <input type="text" class="form-control" id="fecha" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="placa">Placa:</label>
                    <input type="text" class="form-control" id="placa" placeholder="Ingrese la placa">
                </div>
                <!-- Tipo de Supervisión -->
                <div class="form-group col-md-6">
                    <label for="tipoSupervision">Tipo de Supervisión:</label>
                    <select id="tipoSupervision" class="form-control">
                        <option value="Tutela">Trabajo bajo tutela</option>
                        <option value="Inicial">Supervisión inicial</option>
                        <option value="Periodica">Supervisión periódica</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <!-- Inspector de Línea y Supervisor -->
                <div class="form-group col-md-6">
                    <label for="inspector">Inspector de Línea:</label>
                    <input type="text" class="form-control" id="inspector"
                        placeholder="Ingrese el nombre del inspector">
                </div>
                <div class="form-group col-md-6">
                    <label for="supervisor">Supervisor:</label>
                    <input type="text" class="form-control" id="supervisor"
                        placeholder="Ingrese el nombre del supervisor">
                </div>
            </div>

            <!-- Características de la motocicleta -->
            <h6 class="text-center">Características de la Motocicleta</h6>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="servicio">Servicio:</label>

                    <select name="selectServicio" id="selectServicio" class="form-control">

                        <option value="Particular">Particular</option>
                        <option value="Particular">Enseñanza</option>

                    </select>


                </div>
                <div class="form-group col-md-3">
                    <label for="motor">Motor:</label>
                    <select name="selectServicio" id="selectServicio" class="form-control">

                        <option value="Particular">2 Tiempos</option>
                        <option value="Particular">4 Tiempos</option>

                    </select>

                </div>
                <div class="form-group col-md-3">
                    <label for="cilindraje">Cilindraje:</label>

                    <select name="selectServicio" id="selectServicio" class="form-control">

                        <option value="Particular">Menor a 500² cm</option>
                        <option value="Particular"> Mayor a 500² cm</option>

                    </select>

                </div>
                <div class="form-group col-md-3">
                    <label for="transmision">Transmisión:</label>
                    <select name="selectServicio" id="selectServicio" class="form-control">

                        <option value="Particular">Mecánica</option>
                        <option value="Particular">Semi - automática</option>
                        <option value="Particular">Automática</option>

                    </select>
                </div>
            </div>

            <!-- Resultado de la Supervisión -->
            <h6 class="text-center">Resultado de la Supervisión</h6>
            <div class="form-row">
                <!-- Resultados con barras de progreso -->
                <div class="form-group col-md-6">
                    <label for="inspeccionSensorial">1. Inspección Sensorial: NTC 5375:2012, Numeral 7</label>
                    <div class="progress">
                        <div id="progress-bar-sensorial" class="progress-bar bg-success" style="width: 0%;">0%</div>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="sonometria">2. Sonometría</label>
                    <div class="progress">
                        <div id="progress-bar-sonometria" class="progress-bar bg-success" style="width: 0%;">0%</div>
                    </div>
                </div>


                <div class="form-group col-md-6">
                    <label for="analisisGases">3. Análisis de Gases NTC 5365:2012</label>
                    <div class="progress">
                        <div id="progress-bar-gases" class="progress-bar bg-success" style="width: 0%;">0%</div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="luces">4. Luces NTC 5375:2012, Numeral 7.4.2</label>
                    <div class="progress">
                        <div id="progress-bar-luces" class="progress-bar bg-success" style="width: 0%;">0%</div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="frenos">5. Frenos NTC 5375:2012, Numeral 7.6.6</label>
                    <div class="progress">
                        <div id="progress-bar-frenos" class="progress-bar bg-success" style="width: 0%;">0%</div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="criteriosEspecificos">6. Criterios Específicos</label>
                    <div class="progress">
                        <div id="progress-bar-criterios" class="progress-bar bg-success" style="width: 0%;">0%</div>
                    </div>
                </div>



                <div class="form-group col-md-12 text-center">
                    <!-- Agregamos la clase "text-center" para centrar el contenido -->


                    <label for="eficacia">Eficacia</label>
                    <div class="progress">
                        <div id="progress-bar-eficacia-total" class="progress-bar bg-success"
                            style="width: 50%; font-size: 20px;">0%</div>
                        <!-- Modificamos el estilo para hacerlo más grande -->
                    </div>
                </div>

            </div>

            <!-- Tabla de Resultados -->
            <h6 class="text-center">Tabla de Resultados</h6>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Porcentaje %</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>>= 80</td>
                        <td>Aprobado</td>
                    </tr>
                    <tr>
                        <td>61 - 79</td>
                        <td>Capacitación o Reentrenamiento</td>
                    </tr>
                    <tr>
                        <td>
                            <= 60</td>
                        <td>Suspender de la Actividad (Ejecutar plan de Acción)</td>
                    </tr>
                </tbody>
            </table>

            <!-- Aspectos por Mejorar -->
            <h6 class="text-center">Aspectos por Mejorar</h6>
            <div class="form-group">
                <textarea class="form-control" id="aspectosMejorar" rows="5"></textarea>
            </div>

            <!-- Conclusiones de la Supervisión -->
            <h6 class="text-center">Conclusiones de la Supervisión</h6>
            <div class="form-group">
                <textarea class="form-control" id="conclusiones" rows="5"></textarea>
            </div>

            <div class="container mt-5">
                <button id="generarFirma" class="btn btn-primary">Generar firma</button>
                <div id="ventanaFirma" class="mt-3" style="display: none;">
                    <!-- Área para capturar la firma -->
                    <canvas id="canvasFirma" width="300" height="150"></canvas>
                    <!-- Botones para guardar y borrar la firma -->
                    <div class="mt-3">
                        <button id="guardarFirma" class="btn btn-success">Guardar firma</button>
                        <button id="borrarFirma" class="btn btn-danger">Borrar firma</button>
                    </div>
                </div>
            </div>

            <!-- Confirmación de Cumplimiento de Requisitos -->
            <h6 class="text-center">Confirmación de Cumplimiento de Requisitos</h6>
            <div class="text-left">
                <label>Confirme la capacidad que tiene el Inspector de Línea para dar cumplimiento a los requisitos de
                    las NTC para cada
                    una de las pruebas, según el tipo de motocicleta, de forma que se detecte si aplica correctamente
                    los métodos y criterios
                    de la inspección mecanizada y sensorial, teniendo en cuenta la siguiente valoración:</label>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Cumple</th>
                        <th>No Cumple</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>0</td>
                    </tr>

                </tbody>
            </table>

            <div class="text-left">
                <label>Para la inspeccion sensorial, evalue y califique los defectos asociados a las caracteristicas de
                    la motocicleta inspeccionada. Los defectos que no corresponden al item no deberan ser evaluados, por
                    lo tanto se diligenciara "N/A" en la columna Valoracion.</label>
            </div>

            <table class="table table-striped table-bordered" id="sensorial">
                <thead class="thead-dark">
                    <tr>
                        <th>NTC 5375:2012
                            Numeral 7</th>
                        <th>No.</th>
                        <th>1. Inspección Sensorial:
                            El Inspector de Linea, mediante inspeccion sensorial y usando los metodos establecidos por
                            el CDA, verifica: </th>
                        <th>Valoración</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sistema
                            De Direccion</td>
                        <td>1</td>
                        <td>Fijación defectuosa con riesgo de desprendimiento en cualquiera de los elementos de la
                            dirección.</td>
                        <td>
                            <select name="valoracion1-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema De frenos</td>
                        <td>2</td>
                        <td>Con la motocicleta apagada: Carrera o movimiento de los dispositivos de accionamiento del
                            sistema de freno sean excesivos o insuficientes</td>
                        <td>
                            <select name="valoracion2-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema de frenos</td>
                        <td>3</td>
                        <td>Con la motocicleta apagada: Retorno inadecuado del pedal / palanca del freno trasero y/o
                            delantero</td>
                        <td>
                            <select name="valoracion3-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema de frenos</td>
                        <td>4</td>
                        <td>Con la motocicleta apagada: Inoperancia total del freno en alguna de las ruedas</td>
                        <td>
                            <select name="valoracion4-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema de frenos</td>
                        <td>5</td>
                        <td>Cantidad de líquido de frenos por fuera de los niveles indicados</td>
                        <td>
                            <select name="valoracion5-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema de suspensión</td>
                        <td>6</td>
                        <td>Mal estado de las fijaciones al chasis de los elementos de la suspensión</td>
                        <td>
                            <select name="valoracion6-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Exterior y chasis</td>
                        <td>7</td>
                        <td>Roce o interferencia entre las llantas y el guardabarros, chasis o suspensión</td>
                        <td>
                            <select name="valoracion7-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Rines y llantas</td>
                        <td>8</td>
                        <td>Falta alguna de las tuercas, en cualquier rueda de la motocicleta</td>
                        <td>
                            <select name="valoracion8-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Rines y llantas</td>
                        <td>9</td>
                        <td>Deformaciones en cualquiera de los rines</td>
                        <td>
                            <select name="valoracion9-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Rines y llantas</td>
                        <td>10</td>
                        <td>Fisuras en cualquiera de los rines</td>
                        <td>
                            <select name="valoracion10-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Rines y llantas</td>
                        <td>11</td>
                        <td>Despegue o rotura en las bandas laterales de una ó más llantas</td>
                        <td>
                            <select name="valoracion11-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Rines y llantas</td>
                        <td>12</td>
                        <td>Protuberancias, deformaciones, despegue o rotura en la banda de rodamiento de una ó más
                            llantas</td>
                        <td>
                            <select name="valoracion12-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Rines y llantas</td>
                        <td>13</td>
                        <td>Profundidad de labrado en el área de mayor desgaste de cualquiera de las llantas de
                            servicio, menor a 1 mm. ó inferior a las marcas especificadas por los fabricantes</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td>Sistema de frenos</td>
                        <td>14</td>
                        <td>Fundas, cables, Guayas o varillas deterioradas con riesgo de desprendimiento o interferencia
                            con otros elementos</td>
                        <td>
                            <select name="valoracion14-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema de frenos</td>
                        <td>15</td>
                        <td>Cilindro maestro (bomba de freno) deteriorado, con fuga de líquido o con riesgo de
                            desprendimiento</td>
                        <td>
                            <select name="valoracion15-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td>Sistema de frenos</td>
                        <td>16</td>
                        <td>Ausencia de la tapa del depósito de líquido de frenos</td>
                        <td>
                            <select name="valoracion16-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema de frenos</td>
                        <td>17</td>
                        <td>Pérdida de líquido en tubos, mangueras o en las conexiones</td>
                        <td>
                            <select name="valoracion17-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema de frenos</td>
                        <td>18</td>
                        <td>Tubos o mangueras deteriorados, dañados, deformados o excesivamente corroídos o con riesgo
                            de desprendimiento</td>
                        <td>
                            <select name="valoracion18-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema de frenos</td>
                        <td>19</td>
                        <td>Mordazas de freno con fugas visibles o con riesgo de desprendimiento (faltan tornillos)</td>
                        <td>
                            <select name="valoracion19-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Sistema de frenos</td>
                        <td>20</td>
                        <td>Inexistencia o mal funcionamiento del doble mando de freno en las motocicletas autorizadas
                            para impartir enseñanza. Lo anterior de acuerdo al metodo e instrucciones establecidas por
                            el CDA en los instructivos de RTM</td>
                        <td>
                            <select name="valoracion20-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Exterior y chasis</td>
                        <td>21</td>
                        <td>Partes exteriores en mal estado (flojas sueltas), que presenten peligro para los demás
                            usuarios de la vía </td>
                        <td>
                            <select name="valoracion21-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Exterior y chasis</td>
                        <td>22</td>
                        <td>Presencia de aristas o bordes cortantes exteriores en el vehículo</td>
                        <td>
                            <select name="valoracion22-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Exterior y chasis</td>
                        <td>23</td>
                        <td>Corrosión exterior en elementos diferentes al chasis</td>
                        <td>
                            <select name="valoracion23-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Exterior y chasis</td>
                        <td>24</td>
                        <td>Corrosión en chasis</td>
                        <td>
                            <select name="valoracion24-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Exterior y chasis</td>
                        <td>25</td>
                        <td>Roturas, perforaciones, desacople o inexistencia del sistema de escape.
                            NOTA: Algunos diseños de sistemas de escape en motocicletas, tienen un pequeño orificio, el
                            cual no debe considerarse defecto.
                        </td>
                        <td>
                            <select name="valoracion25-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Visual y emisiones</td>
                        <td>26</td>
                        <td>Escape o silenciador en mal estado o salida directa</td>
                        <td>
                            <select name="valoracion26-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Elementos Para
                            Producir Ruido</td>
                        <td>27 </td>
                        <td>Existencia de algún tipo de dispositivo o accesorio diseñado para producir ruido o
                            motocicletas sin silenciador</td>
                        <td>
                            <select name="valoracion27-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Retrovisores+A111:K141</td>
                        <td>28</td>
                        <td>La inexistencia de cualquiera de los dos espejos retrovisores funcionales</td>
                        <td>
                            <select name="valoracion28-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Retrovisores+A111:K141</td>
                        <td>29</td>
                        <td>Mal estado o fijación deficiente del (los) espejo (s) retrovisor (es)</td>
                        <td>
                            <select name="valoracion29-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sillín Y Reposapies</td>
                        <td>30</td>
                        <td>Sillín y/o reposapiés mal anclados o con riesgo de desprendimiento</td>
                        <td>
                            <select name="valoracion30-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Soportes De Estacionamiento</td>
                        <td>31</td>
                        <td>La inexistencia o el mal funcionamiento de(l) los soporte (s) de estacionamiento</td>
                        <td>
                            <select name="valoracion31-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema De Suspensión</td>
                        <td>32</td>
                        <td>Mal estado de las fijaciones al chasis de los elementos de la suspensión</td>
                        <td>
                            <select name="valoracion32-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema De Suspensión</td>
                        <td>33</td>
                        <td>Elementos de la suspensión en mal estado (amortiguadores, rodamientos, bujes de
                            amortiguadores, bujes de tijera, pasador) deformados, con juegos excesivos o corrosión</td>
                        <td>
                            <select name="valoracion33-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema De Suspensión</td>
                        <td>34</td>
                        <td>Inexistencia de alguno de los amortiguadores</td>
                        <td>
                            <select name="valoracion34-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sistema De Suspensión</td>
                        <td>35</td>
                        <td>Fugas visibles en los amortiguadores</td>
                        <td>
                            <select name="valoracion35-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Motor Y Caja</td>
                        <td>36</td>
                        <td>Perdidas de aceite sin goteo continuo</td>
                        <td>
                            <select name="valoracion36-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Motor Y Caja</td>
                        <td>37</td>
                        <td>Perdidas de aceite con goteo continuo</td>
                        <td>
                            <select name="valoracion37-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Motor Y Caja</td>
                        <td>38</td>
                        <td>Mal estado del cableado eléctrico</td>
                        <td>
                            <select name="valoracion38-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Motor Y Caja</td>
                        <td>39</td>
                        <td>Fugas en el sistema de refrigeración cuando aplique</td>
                        <td>
                            <select name="valoracion39-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    <tr>
                        <td>Alumbrado Y Señalización</td>
                        <td>40</td>
                        <td>El no funcionamiento o inexistencia de los comandos que encienden o conmutan las luces</td>
                        <td>
                            <select name="valoracion40-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alumbrado Y Señalización</td>
                        <td>41</td>
                        <td>Mal estado (con riesgo de desprendimiento o ausencia de las pastas o vidrios) o no
                            funcionamiento del sistema o cualquiera de las direccionales</td>
                        <td>
                            <select name="valoracion41-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alumbrado Y Señalización</td>
                        <td>42</td>
                        <td>Mal estado (con riesgo de desprendimiento o ausencia de las pastas o vidrios) o (el) no
                            funcionamiento de cualquiera de la (s) luz (luces) de parada o freno</td>
                        <td>
                            <select name="valoracion42-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alumbrado Y Señalización</td>
                        <td>43</td>
                        <td>Mal estado o el no funcionamiento de las luces de tablero de instrumentos</td>
                        <td>
                            <select name="valoracion43-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alumbrado Y Señalización</td>
                        <td>44</td>
                        <td>Color de luz emitido diferente o en cantidad inferior a la estipulada en las normas técnicas
                            Colombianas o disposiciones legales aplicables vigentes</td>
                        <td>
                            <select name="valoracion44-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Elementos Para Producir Ruido</td>
                        <td>45</td>
                        <td>El no funcionamiento o inexistencia de la bocina, pito o dispositivo acústico</td>
                        <td>
                            <select name="valoracion45-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>46</td>
                        <td>El Inspector de Linea, Utiliza apropiadamente el elevador</td>
                        <td>
                            <select name="valoracion46-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>47</td>
                        <td>El Inspector de Linea, Utiliza los elementos de proteccion personal durante la inspeccion
                            sensorial</td>
                        <td>
                            <select name="valoracion47-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>48</td>
                        <td>El Inspector de Linea, realiza la inspección de la motocicleta utilizando y registrando los
                            defectos encontrados en la lista de chequeo</td>
                        <td>
                            <select name="valoracion48-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>49</td>
                        <td>El Inspector de Linea, verifica la profundidad de labrado de las llantas con la Motocicleta
                            apagada, siguiendo el método establecido en el Instructivo de Inspección sensorial. Utiliza
                            adecuadamente el profundímetro.</td>
                        <td>
                            <select name="valoracion49-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>50</td>
                        <td>El Inspector de Linea, verifica en su totalidad los defectos en la motocicleta, realiza las
                            observaciones pertinentes y registra fielmente la información detectada, en el software,
                            Anexar copia del FUR.</td>
                        <td>
                            <select name="valoracion50-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>51</td>
                        <td>El Inspector de Linea, Identifica de forma clara los componentes en cada uno de los
                            diferentes sistemas que interactúan en el funcionamiento de la motocicleta. Así mismo,
                            relaciona cada uno de estos componentes con los defectos establecidos en la Norma Técnica
                            Colombiana NTC 5375:2012.</td>
                        <td>
                            <select name="valoracion51-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>52</td>
                        <td>El Inspector de Linea, Conoce e identifica que dispositivos tales como sirenas, luces
                            intermitentes o de alta intensidad y aparatos similares se encuentran reservados y de uso
                            exclusivo para vehículos de Bomberos, Ambulancia, Recolectores de Basura, Socorro,
                            Emergencia, Fuerzas Militares, Policía, Autoridades de Tránsito y Transporte, según lo
                            establecido en la Ley 769 de 2002 "Código Nacional de Tránsito, Artículo 104.</td>
                        <td>
                            <select name="valoracion52-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>53</td>
                        <td>El Inspector de Linea, identifica las adaptaciones que deben cumplir los vehículos
                            utilizados para impartir enseñanza automovilística, según lo establecido en el Anexo A de la
                            Norma Técnica Colombiana NTC 5375:2012</td>
                        <td>
                            <select name="valoracion53-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>54</td>
                        <td>El Inspector de Linea posee conocimiento claro y preciso sobre las definiciones establecidas
                            en la NTC 5375:2012. Corrosión, Inspección Sensorial, Resonador, Silenciador entre otras
                        </td>
                        <td>
                            <select name="valoracion54-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>55</td>
                        <td>El Inspector de Linea emite juicios profesionales de acuerdo al análisis realizado durante
                            la inspección de los items, las características y el tipo de motocicleta, así como del
                            resultado de la unificación de criterios realizada por el CDA.</td>
                        <td>
                            <select name="valoracion55-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>56</td>
                        <td>El Inspector de Linea, posee y demuestra conocimiento satisfactorio del funcionamiento y la
                            tecnología empleada para la fabricación del item inspeccionado.</td>
                        <td>
                            <select name="valoracion56-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>57</td>
                        <td>El Inspector de Linea, identifica las desviaciones encontradas durante la inspección de la
                            motocicleta con respecto a lo establecido en la Norma Técnica Colombiana 5375:2012</td>
                        <td>
                            <select name="valoracion57-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Metodos De Inspección</td>
                        <td>58</td>
                        <td>El Inspector de Linea, posee y demuestra conocimiento satisfactorio sobre el control de
                            tracción en motocicletas</td>
                        <td>
                            <select name="valoracion58-t1" class="form-control" id="valoraciont1">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>

            </table>



            <table class="table table-striped table-bordered" id="sonometria">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>2. Sonometria
                            Teniendo en cuenta el procedimiento interno definido por el CDA, El Inspector de Linea:</th>
                        <th>Valoración</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Procedimiento Interno Definido Por El CDA</td>
                        <td>1</td>
                        <td>Verifica que la transmisión esté en neutro para transmisiones manuales o semiautomáticas, o
                            que el
                            vehículo automotor se encuentre sobre el soporte central en el caso de transmisiones
                            automáticas
                        </td>
                        <td>
                            <select name="valoracion1t2" class="form-control" id="valoraciont2">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento Interno Definido Por El CDA</td>
                        <td>2</td>
                        <td>Ubica el sonómetro a una altura mínima de 20 cm</td>
                        <td>
                            <select name="valoracion2t2" class="form-control" id="valoraciont2">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento Interno Definido Por El CDA</td>
                        <td>3</td>
                        <td>Ubica el sonómetro a una distancia no mayor a tres (3) metros del punto de referencia del
                            tubo
                            de escape</td>
                        <td>
                            <select name="valoracion3t2" class="form-control" id="valoraciont2">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento Interno Definido Por El CDA</td>
                        <td>4</td>
                        <td>Realiza una sola medición independientemente de las salidas de escape de la motocicleta</td>
                        <td>
                            <select name="valoracion4t2" class="form-control" id="valoraciont2">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento Interno Definido Por El CDA</td>
                        <td>5</td>
                        <td>Ejecuta la prueba, siguiendo las indicaciones del Software</td>
                        <td>
                            <select name="valoracion5t2" class="form-control" id="valoraciont2">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>



            <table class="table table-striped table-bordered" id="gases">
                <thead class="thead-dark">
                    <tr>
                        <th>NTC 5365:2012+A155:K176</th>
                        <th>No</th>
                        <th>3. Evaluacion de Gases de Escape en Motocicletas
                            Teniendo en cuenta el procedimiento de medicion establecido, el Inspector de Linea:</th>
                        <th>Valoración</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>1</td>
                        <td>Identifica los sensores y periféricos necesarios para la realización de la prueba (Sensor de
                            Temperatura, Sensor de velocidad de giro, Sensor de Temperatura Ambiente y Sensor de Humedad
                            Relativa)</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>2</td>
                        <td>Conoce las condiciones ambientales para la realización de la prueba. Temperatura ambiente
                            entre
                            5 ºC y 55 ºC, HR entre 30% y 90%</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>3</td>
                        <td>Verifica que la transmisión esté en neutro para transmisiones manuales o semiautomáticas, o
                            que
                            el vehículo automotor se encuentre sobre el soporte central en el caso de transmisiones
                            automáticas</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>4</td>
                        <td>Enciende las luces y comprueba que cualquier otro equipo eléctrico esté apagado.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>5</td>
                        <td>Verifica que el control manual de choque (ahogador) debe estar en posición de apagado.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>6</td>
                        <td>Verifica que no se presente existencia de fugas en el tubo, uniones del múltiple y
                            silenciador
                            del sistema de escape del vehículo</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>7</td>
                        <td>Verifica que no se presenten salidas adicionales en el sistema de escape diferentes a las de
                            diseño original del vehículo.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>8</td>
                        <td>Verifica que no se presente ausencia de tapones de aceite o fugas en el mismo.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>9</td>
                        <td>Verifica que no se presenten ausencia de tapas de combustible</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>10</td>
                        <td>Ubica el sensor de temperatura en la tapa del embrague de la motocicleta, así mismo
                            garantiza la
                            temperatura mínima de operación del motor de la motocicleta.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>11</td>
                        <td>Determina el procedimiento para garantizar la temperatura mínima de prueba en motocicletas
                            tipo
                            Scooter, cuando el motor se ha mantenido encendido por al menos 10 minutos. En este caso, el
                            Inspector de Linea usa el cronómetro para garantizar dicha condición</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>12</td>
                        <td>Instala el sensor de velocidad de giro en la motocicleta garantizando una correcta lectura
                            de
                            las RPM. NTC 5365:2012 Numeral 5.1.2.5.2 Se debe seleccionar en el hardware o software el
                            número
                            de cilindros del motor y su sistema de encendido.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>13</td>
                        <td>Antes de colocar el acople y la sonda de muestreo, realiza una aceleración sostenida por
                            diez
                            (10) s entre 2500 r/min y 3000 r/min, con el fin de descargar posibles excesos de gases en
                            el
                            tubo de escape y verifica que en vehículos cuatro tiempos no se presenten emisiones de humo
                            negro o azul.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>14</td>
                        <td>Introduce la (s) punta (s) de sonda en el escape (s) mínimo 300 mm. En caso de no ser
                            posible,
                            se debe Instalar el(los) acople (s) en el (los) tubo (s) de escape.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>15</td>
                        <td>Determina el procedimiento a seguir en la evaluación de gases de escape de motocicletas que
                            cuentan con dos o más salidas independientes o si estas son producto de un punto común del
                            tubo
                            de escape.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento normativo</td>
                        <td>16</td>
                        <td>Realiza la prueba de emisiones según el procedimiento de medición relacionado en el numeral
                            4.2
                            de la Norma Técnica Colombiana NTC 5365 de 2012</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Criterios Y Competencia</td>
                        <td>17</td>
                        <td>El Inspector de Linea, Utiliza los elementos de protección personal durante el procedimiento
                            de
                            evaluación de gases de escape de la motocicleta</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Criterios Y Competencia</td>
                        <td>18</td>
                        <td>Comprende el método de conversión del gas de referencia utilizado por el Analizador de Gases
                            mediante el PEF (Factor de Equivalencia de Propano), según lo establecido en la Norma
                            Técnica
                            Colombiana 5365:2012.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Criterios Y Competencia</td>
                        <td>19</td>
                        <td>Identifica las especificaciones de los gases de referencia usados durante la verificación
                            periódica del Analizador de Gases, así como los intervalos o periodos en los cuales debe
                            realizarse la misma.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Criterios Y Competencia</td>
                        <td>20</td>
                        <td>Identifica las características de los acoples usados para la medición de los gases de escape
                            de
                            la motocicleta, según lo establecido en el Anexo C de la 5365:2012.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Criterios Y Competencia</td>
                        <td>21</td>
                        <td>Identifica el principio de funcionamiento y aplicación de la ecuación de corrección por
                            exceso
                            de oxígeno en la medición de los gases de escape de la motocicleta en motores 2T y 4T, según
                            lo
                            dispuesto en la NTC 5365:2012 y las disposiciones reglamentarias vigentes.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont3">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>




            <table class="table table-striped table-bordered" id="luces">
                <thead class="thead-dark">
                    <tr>
                        <th>NTC 5375:2012, Numeral 7.4.2</th>
                        <th>No</th>
                        <th>4. Prueba de Luces en Motocicletas
                            Teniendo en cuenta las instrucciones del fabricante del luxometro para el posicionamiento
                            del equipo con respecto a la fuente movil, el Inspector de Linea:</th>
                        <th>Valoración</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>1</td>
                        <td>Ubica y asegura la motocicleta en el sistema de apoyo en el área designada para la
                            realización de la prueba de luces de la motocicleta.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>2</td>
                        <td>Garantiza que la motocicleta se encuentre a nivel del piso para la determinación de la
                            intensidad e inclinación en la prueba de luces de la motocicleta.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>3</td>
                        <td>Realiza una verificación previa de la cantidad de luces bajas de la motocicleta. Acciona el
                            mando que enciende y conmuta las luces y confronta con lo reflejado en la farola(s) de la
                            motocicleta.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>4</td>
                        <td>Realiza una verificación y análisis previo de las especificaciones dispuestas por el
                            fabricante de la farola y el bombillo de la motocicleta, buscando detectar la norma de
                            referencia (DOT, EU). Así mismo utiliza dicha información y el haz de luz proyectado al
                            interior del luxómetro para determinar el tipo de haz de luz de la motocicleta.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>5</td>
                        <td>Determina el procedimiento a seguir para la medición de la intensidad e inclinación de las
                            luces de la motocicleta de acuerdo a la cantidad de luces bajas con que cuenta la misma.
                        </td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>6</td>
                        <td>Garantiza que la distancia del luxómetro con respecto a la farola de la motocicleta se
                            encuentre entre 30 y 50 Cm. Condiciones establecidas por el fabricante del luxómetro.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>7</td>
                        <td>Realiza el ajuste de paralelismo, comprobando que la luz del láser superior (o espejo) esté
                            apuntando a dos puntos simétricos, con relación al eje central de la motocicleta.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>8</td>
                        <td>Verifica y/o ajusta el nivel ubicado al interior del luxómetro, de tal forma que este, se
                            encuentre justo en el centro.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>9</td>
                        <td>Ajusta la altura del Luxómetro de forma que la luz del láser central apunte a la marca de
                            referencia de la farola (cuando aplique) o en su defecto al centro del bombillo de luces
                            bajas.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>10</td>
                        <td>Garantiza que la motocicleta se encuentre encendida, así mismo verifica que el mando que
                            enciende las luces se encuentre en posición de luces bajas.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>11</td>
                        <td>Realiza una aceleración de la motocicleta hasta alcanzar la mayor intensidad del haz de luz.
                        </td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>12</td>
                        <td>Identifica el tipo de haz de luz de la motocicleta (Europeo, Americano, Disperso, Etc) y a
                            su vez determina la inclinación de acuerdo al tipo de haz de luz identificado y lo
                            establecido por el Proveedor de Software de RTM.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>13</td>
                        <td>Realiza la medición de la desviación del haz de luz en posición bajas, siguiendo las
                            instrucciones del fabricante del Luxómetro y las indicaciones del software de RTM.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la intensidad e inclinación de las luces en
                            Motocicletas.</td>
                        <td>14</td>
                        <td>Posee conocimiento claro y preciso sobre las definiciones establecidas en la NTC 5375:2012.
                            Luces Altas, Luces Bajas, Inclinación, Intensidad.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont4">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>





            <table class="table table-striped table-bordered" id="frenos">
                <thead class="thead-dark">
                    <tr>
                        <th>NTC 5375:2012, Numeral 7.6.6</th>
                        <th>No</th>
                        <th>5. Medición de la eficacia de frenado en Motocicletas
                            El Inspector de Linea por medio del frenómetro:</th>
                        <th>Valoración</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Procedimiento para la determinación de la eficacia de frenado en Motocicletas</td>
                        <td>1</td>
                        <td>Ubica la motocicleta sobre el Frenómetro de manera cuidadosa y segura.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont5">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la eficacia de frenado en Motocicletas</td>
                        <td>2</td>
                        <td>Ingresa al módulo de frenos, selecciona la placa e indica la información al aplicativo
                            correctamente (Indica si la Profundidad adecuada de las llantas es correcta).</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont5">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la eficacia de frenado en Motocicletas</td>
                        <td>3</td>
                        <td>Realiza la medición de la eficacia de frenado con la motocicleta apagada y siguiendo las
                            indicaciones del software.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont5">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la eficacia de frenado en Motocicletas</td>
                        <td>4</td>
                        <td>Realiza medición de la eficacia de frenado del doble mando de freno en motocicletas
                            dispuestas para impartir enseñanza automovilística, de acuerdo al método descrito en el
                            documento RTM.I.06 Instructivo Prueba De Frenos En Motocicletas, con el fin de establecer su
                            mal funcionamiento.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont5">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la eficacia de frenado en Motocicletas</td>
                        <td>5</td>
                        <td>Para motocicletas que presentan inoperancia de freno de alguno de los dos (2) ejes, el
                            Inspector de Linea conoce y realiza la prueba de acuerdo al método establecido por el CDA.
                        </td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont5">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la eficacia de frenado en Motocicletas</td>
                        <td>6</td>
                        <td>Concluye la prueba de manera satisfactoria y verifica que los resultados fueron enviados
                            satisfactoriamente.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont5">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Procedimiento para la determinación de la eficacia de frenado en Motocicletas</td>
                        <td>7</td>
                        <td>Conoce las condiciones por medir para la prueba de Frenos del vehículo. De igual forma
                            conoce el método a seguir durante la realización de la prueba de frenos, cuando en vehículos
                            dotados de sistema antibloqueo se encienda el testigo de avería del sistema al entrar en
                            funcionamiento los rodillos del Frenómetro.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont5">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>



            <table class="table table-striped table-bordered" id="criterios">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>6. Criterios Específicos</th>
                        <th>Valoración</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Determinacion de Criterios y Emision de Juicios Profesionales en el Inspector de Linea</td>
                        <td>1</td>
                        <td>Conocimiento: El Inspector de Linea, posee conocimiento claro y preciso sobre los temas
                            abordados, presenta argumentos de manera convincente, se encuentra familiarizado con los
                            métodos, procedimientos y demuestra competencia durante las actividades de inspección.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont6">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Determinacion de Criterios y Emision de Juicios Profesionales en el Inspector de Linea</td>
                        <td>2</td>
                        <td>Aportes: El Inspector de Linea, realiza aportes dejando entrever que indaga e investiga.
                        </td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont6">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Determinacion de Criterios y Emision de Juicios Profesionales en el Inspector de Linea</td>
                        <td>3</td>
                        <td>Fundamentos: El Inspector de Linea, enuncia la norma u otros artículos en los cuales apoya
                            sus argumentos.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont6">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Determinacion de Criterios y Emision de Juicios Profesionales en el Inspector de Linea</td>
                        <td>4</td>
                        <td>Dominio: El Inspector de Linea, comprende los temas abordados, utiliza argumentos coherentes
                            y lógicos.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont6">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Determinacion de Criterios y Emision de Juicios Profesionales en el Inspector de Linea</td>
                        <td>5</td>
                        <td>Formulación de Conclusiones Correctas: El Inspector de Linea, formula conclusiones claras y
                            precisas de acuerdo al resultado de unificación de criterios y lo establecido por la
                            normativa técnica aplicable al proceso de RTM.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont6">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Determinacion de Criterios y Emision de Juicios Profesionales en el Inspector de Linea</td>
                        <td>6</td>
                        <td>Claridad y Rigor Sistemático: El Inspector de Linea, es coherente con lo que dice y aplica.
                        </td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont6">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Determinacion de Criterios y Emision de Juicios Profesionales en el Inspector de Linea</td>
                        <td>7</td>
                        <td>Precisión Conceptual: El Inspector de Linea, se expresa utilizando vocabulario técnico, las
                            definiciones empleadas sobre los diferentes conceptos técnicos descritos en la Norma Técnica
                            y Reglamentación Aplicable a la RTM y EC son apropiadas y acorde a lo establecido.</td>
                        <td>
                            <select name="valoracion" class="form-control" id="valoraciont6">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </td>
                    </tr>

                </tbody>
            </table>

        </form>

    </div>

</body>

<footer>

    <script src="JS/scriptFormularioSupervision.js"></script>



</footer>

<!-- Incluye la biblioteca jsPDF desde una CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<!-- Tu código JavaScript -->
<script>
  // Función para generar el PDF
  function generatePDF() {
    // Crea una nueva instancia de jsPDF
    const pdf = new jsPDF();

    // Captura el contenido de tu página HTML
    const content = document.documentElement;

    // Convierte el contenido a una imagen base64
    const imgData = pdf.html(content, {
      callback: function (pdf) {
        // Guarda el PDF con un nombre de archivo
        pdf.save("mi_archivo.pdf");
      },
    });
  }

  // Agrega un controlador de eventos al botón
  const generatePDFButton = document.getElementById("guardar");
  generatePDFButton.addEventListener("click", generatePDF);
</script>

</html>