const foundButtons = document.querySelectorAll('#auth-manager-status-actions-block-id button');

if (foundButtons?.length) {
    foundButtons.forEach((el) => {
        el.addEventListener('click', () => {
            const context = el.dataset.context;
            axios.post('/get-views/auth', { context })
            .then(({ data }) => {
                console.warn('data=', data);
                const target = document.querySelector('#auth-login-content');
                if (target) {
                    target.innerHTML = data.html;
                }
            })
            .catch((err) => {
                console.warn('err', err);
            });
        });
    });
}
