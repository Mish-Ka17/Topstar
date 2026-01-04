document.addEventListener('click', (e) => {
    const open = e.target.closest('[data-modal-open]')
    const close = e.target.closest('[data-modal-close]')

    if (open) {
        const name = open.dataset.modalOpen
        document
            .getElementById(`modal-${name}`)
            ?.classList.remove('hidden')
            ?.classList.add('flex')
    }

    if (close) {
        const name = close.dataset.modalClose
        document
            .getElementById(`modal-${name}`)
            ?.classList.add('hidden')
            ?.classList.remove('flex')
    }
})
