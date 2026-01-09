import { mount as authMount } from '@vue-components/Auth/mount.js';
import { AUTH_MODAL_CONTENT_ID } from './constants.js';

const foundButtons = document.querySelectorAll('#auth-manager-status-actions-block-id button');

if (foundButtons?.length) {
    foundButtons.forEach((el) => {
        el.addEventListener('click', () => {
            const context = el.dataset.context;
            axios.post('/get-views/auth', { context })
            .then(({ data }) => {
                const target = document.querySelector(`#${AUTH_MODAL_CONTENT_ID}`);
                if (target) {
                    target.innerHTML = data.html;
                    authMount('target-for-vue-auth-component');
                }
            })
            .catch((err) => {
                console.warn('err', err);
            });
        });
    });
}
