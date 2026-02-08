import { mount as mountMobileMenu } from '@vue-components/MobileMenu/mount.js';
import { MOBILE_MENU_CONTAINER_ID, MOBILE_MENU_MOUNT_POINT_ID } from './constants.js';

const container = document.querySelector(`#${MOBILE_MENU_CONTAINER_ID}`);
if (container) {
    axios.post('/get-views/menu')
        .then(({ data }) => {
            container.innerHTML = data.html;
            mountMobileMenu(MOBILE_MENU_MOUNT_POINT_ID);
        })
        .catch((err) => {
            console.warn('MobileMenu: не удалось загрузить меню', err);
        });
}
