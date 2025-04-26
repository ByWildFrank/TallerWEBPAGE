function showCustomAlert(message, type = 'primary', autoHideTime = 5000) {
    // Verificar si el contenedor existe, si no, crearlo
    let alertContainer = document.getElementById('customAlertContainer');
    if (!alertContainer) {
        alertContainer = document.createElement('div');
        alertContainer.id = 'customAlertContainer';
        alertContainer.style.position = 'fixed';
        alertContainer.style.top = '20px';
        alertContainer.style.left = '50%';
        alertContainer.style.transform = 'translateX(-50%)';
        alertContainer.style.zIndex = '1050';
        alertContainer.style.display = 'none';
        document.body.appendChild(alertContainer);
    }
    
    // Limpiar alertas existentes
    alertContainer.innerHTML = '';
    
    // Crear un nuevo elemento de alerta
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show d-flex align-items-center`;
    alertDiv.setAttribute('role', 'alert');
    

    // Crear el contenido del alert
    alertDiv.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" class="bi flex-shrink-0 me-2" width="24" height="24" viewBox="0 0 16 16" role="img" aria-label="${type}:">
            <path d="${iconPath}"/>
        </svg>
        <div>
            ${message}
        </div>
        <button type="button" class="btn-close custom-close-alert" aria-label="Close"></button>
    `;
    
    // Agregar el alert al contenedor
    alertContainer.appendChild(alertDiv);
    
    // Mostrar el contenedor
    alertContainer.style.display = 'block';
    
    // Agregar manejador para todos los botones de cierre
    const closeButtons = document.querySelectorAll('.custom-close-alert');
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            alertContainer.style.display = 'none';
        });
    });
    
    // Ocultar automáticamente después del tiempo especificado
    if (autoHideTime > 0) {
        setTimeout(function() {
            alertContainer.style.display = 'none';
        }, autoHideTime);
    }
}

// Función para inicializar los botones que mostrarán alertas
function initAlertButtons() {
    // Inicializar botón 'Ver catálogo'
    const btnVerCatalogo = document.getElementById('btnVerCatalogo');
    if (btnVerCatalogo) {
        btnVerCatalogo.addEventListener('click', function(e) {
            e.preventDefault();
            showCustomAlert('¡Revisa nuestro catálogo completo de productos!', 'primary', 5000);
        });
    }
    
    // Se pueden agregar más botones aquí
    // Por ejemplo, si tienes otros botones con el atributo data-alert="true"
    const alertButtons = document.querySelectorAll('[data-alert="true"]');
    alertButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const message = this.getAttribute('data-alert-message') || 'Mensaje de alerta';
            const type = this.getAttribute('data-alert-type') || 'primary';
            const time = parseInt(this.getAttribute('data-alert-time') || '5000');
            showCustomAlert(message, type, time);
        });
    });
}

// Inicializar cuando el DOM esté cargado
document.addEventListener('DOMContentLoaded', function() {
    initAlertButtons();
});