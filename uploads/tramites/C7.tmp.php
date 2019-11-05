<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>RUTICAS</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="../css/creative.min.css" rel="stylesheet">
    <link href="../css/general.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
    <link rel="stylesheet" href="../leaflet-routing-machine-3.2.12\dist\leaflet-routing-machine.css">
    <script type="text/javascript" src="../leaflet-routing-machine-3.2.12\dist\leaflet-routing-machine.js">
    </script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <style>
                #mapid { 
                    height:500px;
                    width: 450px;
                    margin: auto;
                }
                
    </style> 
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" style="background-color:rgba(0, 0, 0, 0.5);" id="mainNav">    
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><span style="color:red;">RU</span><span style="color:white;">TI</span><span style="color:blue;">CAS</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item dropdown">
                        <a class="btn btn-primary btn-block dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mapa
                        </a>
                        <div class="dropdown-menu" style="background-color:transparent;"
                            aria-labelledby="navbarDropdown">
                            <a class="btn btn-primary btn-block" href="#about">Mapa</a>
                            <a class="btn btn-primary btn-block" href="#services">Crear empresa</a>
                            <a class="btn btn-primary btn-block" href="#portfolio">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <section id="contact" class="mt-5">
        <div class="container">
            <div class="section-header">
                <h3 class="section-title">Administrar Empresa</h3>
                <p class="section-description">
                    En esta sección se podrá modificar y eliminar una empresa, a partir de una busqueda de la misma.
                </p>
            </div>
        </div>

        <div class="container mt-1">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="form">
                        <form action="modificarEmpresaFormulario.php" method="POST">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-10">
                                        <select id="empresas" class="browser-default custom-select">
                                            <option value="-1">-- Seleccione un nombre de empresa --</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button id="filterEmpresa" type="button" class="btn btn-primary btn-block"
                                            data-toggle="collapse" href="#collapseFiltroEmpresa"><i class="fa fa-filter"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="collapse multi-collapse" id="collapseFiltroEmpresa">
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" class="form-control" id="filtroNombreE"
                                                placeholder="Nombre" />
                                        </div>
                                        <div class="col">
                                            <button id="loadEmpresa" type="button" class="btn btn-primary btn-block" >Buscar Empresa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseModificarEmpresa">
                                <div class="form-group">
                                    <input id="idEmpresaM" name="c_id" type="hidden" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input id="nombreEmpresaM" name="m_nombre" type="text" class="form-control" placeholder="Nombre"/>
                                </div>
                                <div class="form-group">
                                    <input id="telefonoEmpresaM" name="m_telefono" type="text" class="form-control" placeholder="Teléfono"/>
                                </div>
                                <div class="form-group">
                                    <input id="emailEmpresaM" name="m_email" type="text" class="form-control" placeholder="Email"/>
                                </div>
                                <div class="form-group">
                                    <textarea id="direccionEmpresaM" name="m_direccion" class="form-control" placeholder="Dirección"></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea id="horarioEmpresaM" name="m_horario" class="form-control" placeholder="Ejemplo: L-V 7:00am 9:00pm"></textarea>
                                </div>
                               
                                    
                                
                                <div class="form-group">
                                    <input id="estadoEmpresaM" name="m_estado" type="checkbox"> Empresa activa 
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Modificar Empresa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
                                          <div id="mapid">
                                                <script type="text/javascript">
                                                //muestro el mapa con su respectivo zoom
                                                   
                                                var mymap = L.map('mapid').setView([9.9198 , -84.0527], 15);
                                                //pongo las caracteristicas del mapa que importé
                                                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                                                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a  href="https://www.mapbox.com/">Mapbox</a>',
                                                maxZoom: 18,
                                                id: 'mapbox.streets', //utilizo vista de calles
                                                accessToken: 'pk.eyJ1IjoiYWJlcnRvenppIiwiYSI6ImNrMHBpYjZjdTA2bTgzbm10ODZmZG5wd2gifQ.DHV3hXMsfTP_IqD5kzPMaA'
                                                }).addTo(mymap);


                                                L.Routing.control({
                                                    router: L.Routing.mapbox('pk.eyJ1IjoiYWJlcnRvenppIiwiYSI6ImNrMHBpYjZjdTA2bTgzbm10ODZmZG5wd2gifQ.DHV3hXMsfTP_IqD5kzPMaA')
                                                }).addTo(mymap);
                                                 
                                                $(function () {    
                                                    
                                                $('#loadEmpresa').on('click', function () {
                                                    console.log("RIcardo Ayuda");
                                                    let nombre = $('#filtroNombreE');
                                                    $.ajax({
                                                        url: '../vista/getEmpresas.php',
                                                        method: 'POST',
                                                        data: {
                                                            nombre: nombre.val()
                                                        },
                                                        success: function (empresas) {
                                                            let selectEmpresa = $('#empresas');
                                                            let jEmpresas = $.parseJSON(empresas);

                                                            selectEmpresa.html('');
                                                            if (Object.keys(jEmpresas).length > 0) {
                                                                selectEmpresa.append(`
                                                                    <option value="-1">-- Seleccione un nombre de empresa --</option>
                                                                `);
                                                                jEmpresas.forEach(empresa => {
                                                                    selectEmpresa.append(`
                                                                        <option value="${empresa.idEmpresa}">${empresa.nombre}</option>
                                                                    `);
                                                                });
                                                            }
                                                            else {
                                                                $('#collapseModificarEmpresa').collapse('hide');
                                                                selectEmpresa.append(`
                                                                    <option value="-1">- No se han encontrado períodos -</option>
                                                                `);
                                                            }
                                                        }
                                                    });
                                                });

                                                $('#empresas').on('click', function () {
                                                    
                                                    
                                                    let collapseModificarEmpresa = $('#collapseModificarEmpresa');

                                                    if ($('#empresas').val() == "-1") {
                                                        collapseModificarEmpresa.collapse('hide');
                                                    }
                                                    else {
                                                        collapseModificarEmpresa.collapse('show');
                                                        $.ajax({
                                                            url: '../vista/getUnaEmpresa.php',
                                                            method: 'POST',
                                                            data: {
                                                                idEmpresa: $('#empresas').val()
                                                            },
                                                            success: function (empresa) {
                                                                let jEmpresa = $.parseJSON(empresa);
                                                                $('#idEmpresaM').val(jEmpresa[0].idEmpresa);
                                                                $('#nombreEmpresaM').val(jEmpresa[0].nombre);
                                                                $('#telefonoEmpresaM').val(jEmpresa[0].telefono);
                                                                $('#emailEmpresaM').val(jEmpresa[0].correo);
                                                                $('#direccionEmpresaM').val(jEmpresa[0].direccion);
                                                                $('#horarioEmpresaM').val(jEmpresa[0].horario);
                                                               
                                                                L.marker([jEmpresa[0].latitud,jEmpresa[0].longitud]).bindPopup('this is Zapote').addTo(mymap);
                                                                
                                                                
                                                                if (jEmpresa[0].estado == "1") {
                                                                    $('#estadoEmpresaM').prop( "checked", true );
                                                                }
                                                                else {
                                                                    $('#estadoEmpresaM').prop( "checked", false );
                                                                }
                                                            }
                                                        });
                                                    }
                                                });
                                                    
                                                });

                                                var popup = L.popup();
                                                var PuntosLatLn = [];
                                                var popup = L.popup();

                                                var arregloPuntos = [];

                                                
                                                   
                                                  

                                              


                                        </script>
                                    </div>                                  
    <footer class="bg-light py-5 mt-5">
        <div class="container">
            <div class="small text-center text-muted">
        &copy; Copyright <strong>RUTICAS</strong>. Todos los derechos reservados. 2019</div>
        </div>
    </footer>

    
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="../js/creative.min.js"></script>
   

</body>

</html>