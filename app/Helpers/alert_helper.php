<?php
// app/Helpers/alert_helper.php

if (!function_exists('show_alert')) {
    /**
     * Genera el HTML y los scripts necesarios para mostrar alertas personalizadas
     * 
     * @param string $title Título de la alerta
     * @param string $message Mensaje de la alerta
     * @param string $type Tipo de alerta (success, error, warning, info)
     * @param string $buttonText Texto del botón de cerrar
     * @return string HTML y script para la alerta
     */
    function show_alert($title = null, $message = null, $type = 'info', $buttonText = 'Cerrar')
    {
        // Valores predeterminados si no se proporcionan
        $title = $title ?? '¡Funcionalidad en desarrollo!';
        $message = $message ?? 'Estamos trabajando para habilitar esta sección pronto.';

        // Clases de estilo según el tipo de alerta
        $alertStyles = [
            'success' => 'alert-success',
            'error' => 'alert-error',
            'warning' => 'alert-warning',
            'info' => 'alert-info'
        ];

        $alertClass = $alertStyles[$type] ?? $alertStyles['info'];

        // HTML para la alerta
        $html = '<div id="customAlert" class="custom-alert">
            <div class="custom-alert-content ' . $alertClass . '">
                <h2>' . esc($title) . '</h2>
                <p>' . esc($message) . '</p>
                <button id="closeAlert">' . esc($buttonText) . '</button>
            </div>
        </div>';

        return $html;
    }
}

if (!function_exists('load_alert_assets')) {
    /**
     * Carga los estilos y scripts necesarios para las alertas
     * 
     * @return string HTML con los links a CSS y JS
     */
    function load_alert_assets()
    {
        $css = '<style>
            /* Estilos para las alertas */
            .custom-alert {
                display: none;
                position: fixed;
                z-index: 9999;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
            }
            
            .custom-alert-content {
                background: #f4f0e5;
                color: #5a5a5a;
                border: 2px solid #7a6c5d;
                border-radius: 12px;
                padding: 30px;
                width: 90%;
                max-width: 400px;
                text-align: center;
                margin: 150px auto;
                font-family: "Playfair Display", serif;
                box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            }
            
            .custom-alert-content h2 {
                margin-bottom: 10px;
                font-size: 24px;
            }
            
            .custom-alert-content p {
                margin-bottom: 20px;
                font-size: 16px;
            }
            
            #closeAlert {
                padding: 10px 20px;
                background-color: #7a6c5d;
                border: none;
                color: #fff;
                border-radius: 5px;
                cursor: pointer;
            }
            
            #closeAlert:hover {
                background-color: #5e5247;
            }
            
            /* Estilos según el tipo de alerta */
            .alert-success {
                border-color: #28a745;
            }
            .alert-success h2 {
                color: #28a745;
            }
            .alert-success #closeAlert {
                background-color: #28a745;
            }
            .alert-success #closeAlert:hover {
                background-color: #218838;
            }
            
            .alert-error {
                border-color: #dc3545;
            }
            .alert-error h2 {
                color: #dc3545;
            }
            .alert-error #closeAlert {
                background-color: #dc3545;
            }
            .alert-error #closeAlert:hover {
                background-color: #c82333;
            }
            
            .alert-warning {
                border-color: #ffc107;
            }
            .alert-warning h2 {
                color: #856404;
            }
            .alert-warning #closeAlert {
                background-color: #ffc107;
                color: #212529;
            }
            .alert-warning #closeAlert:hover {
                background-color: #e0a800;
            }
            
            .alert-info {
                border-color: #7a6c5d;
            }
            .alert-info #closeAlert {
                background-color: #7a6c5d;
            }
            .alert-info #closeAlert:hover {
                background-color: #5e5247;
            }
        </style>';

        $js = '<script>
            document.addEventListener("DOMContentLoaded", () => {
                const alertBox = document.getElementById("customAlert");
                const closeBtn = document.getElementById("closeAlert");
            
                // Función para abrir la alerta
                window.openAlert = function() {
                    alertBox.style.display = "block";
                }
            
                // Función para cerrar la alerta
                function closeAlert() {
                    alertBox.style.display = "none";
                }
            
                closeBtn.addEventListener("click", closeAlert);
            
                // Hacer que cualquier botón con la clase \'alert-button\' abra el alert
                const alertButtons = document.querySelectorAll(".alert-button");
            
                alertButtons.forEach((button) => {
                    button.addEventListener("click", (e) => {
                        e.preventDefault();
                        openAlert();
                    });
                });
            });
        </script>';

        return $css . $js;
    }
}
