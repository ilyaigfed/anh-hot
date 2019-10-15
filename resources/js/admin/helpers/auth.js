const loginHelper = user => new Promise ((resolve, reject) => {
    axios({url: '/user/login', data: user, method: 'POST' })
        .then(response => {
            const token = response.data.access_token;
            localStorage.setItem('token', token);
            resolve(response);
        })
        .catch(error => {
            localStorage.removeItem('token');
            reject(error);
        });
});

export default loginHelper;
