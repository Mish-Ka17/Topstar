import { AUTH_MODAL_CONTENT_ID } from './constants.js';

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
        const name = close.dataset.modalClose;
        document
            .getElementById(`modal-${name}`)
            ?.classList.add('hidden');

        const modalContent = document.getElementById(`${AUTH_MODAL_CONTENT_ID}`);
        if (modalContent) {
          console.warn('HEY=', modalContent);

          modalContent.innerHTML = '';
        }
    }
})

document.addEventListener('keyup', (e) => {
  const modal = document.querySelector('#modal-auth');

  if (e.code === 'Escape' && modal && !modal.classList.contains('hidden')) {
        modal.classList.add('hidden');
  }
})
