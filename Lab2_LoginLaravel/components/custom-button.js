class CustomButton extends HTMLElement {
  connectedCallback() {
    const label = this.getAttribute('label')
    const icon = this.getAttribute('icon')
    const bgColor = this.getAttribute('bg-color') || '#007BFF'
    const textColor = this.getAttribute('text-color') || '#FFFFFF'
    const hoverColor = this.getAttribute('hover-color') || '#0056b3'
    const classStyle = this.getAttribute('class-style') || ''
    /*

GUIA: Si quieres que tu componente use colores personalizados por el desarrollador,
puedes definir variables CSS en el estilo del botón y usarlas en el CSS global.
Ejemplo:
--bg-color: ${bgColor}; // --bg-color es una variable CSS que puedes usar en global.css, ${bgColor} es el valor por defecto o el que pase el desarrollador.

*/

    this.innerHTML = `
            <button type="submit" class="custom-button ${classStyle}" 
            style="--bg-color: ${bgColor}; --text-color: ${textColor}; --hover-color: ${hoverColor};">
                <i class="${icon}"></i>
                ${label !== null && label.length > 0 ? label : ''}
            </button>
        `
  }
}

customElements.define('custom-button', CustomButton)