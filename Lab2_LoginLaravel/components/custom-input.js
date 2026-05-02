class CustomInput extends HTMLElement {
  connectedCallback() {
    const id = this.getAttribute('id')
    const iconClass = this.getAttribute('icon')
    const toggleId = this.getAttribute('toggle-id')
    const type = this.getAttribute('type') || 'text'

    if (!id) {
      throw new Error('The "id" attribute is required for custom-input component.')
    }

    const componentSpecificAttrs = ['icon', 'toggle-id']
    const inputAttrs = []
    for (let i = 0; i < this.attributes.length; i++) {
      const attr = this.attributes[i]
      if (!componentSpecificAttrs.includes(attr.name)) {
        inputAttrs.push(`${attr.name}="${attr.value}"`)
      }
    }

    this.innerHTML = `
            <div class="custom-input">
                <i class="${iconClass} icon"></i>
                <input ${inputAttrs.join(' ')} />
            </div>
        `

    if (type === 'password' && toggleId) {
      const toggleIcon = document.createElement('i')
      toggleIcon.id = toggleId
      toggleIcon.className = 'fa-solid fa-eye toggle-password'
      this.querySelector('.custom-input').appendChild(toggleIcon)
    }

    this.querySelectorAll('.toggle-password')[0]?.addEventListener('click', () => {
      const input = this.querySelector('input')
      const toggle = this.querySelectorAll('.toggle-password')[0]
      if (input.type === 'password') {
        input.type = 'text'
        toggle.classList.replace('fa-eye', 'fa-eye-slash')
      } else {
        input.type = 'password'
        toggle.classList.replace('fa-eye-slash', 'fa-eye')
      }
    })
  }
}

customElements.define('custom-input', CustomInput)