import axios from 'axios';

const login = ({userId, password}) => {
    const data = {
        user_id: userId,
        password,
    };
    return axios.post('/login', data);
}

const logout = () => {
    return axios.post('/logout');
}

const getAuthMember = () => {
    return axios.get('/auth/member');
}

export default {
    login,
    logout,
    getAuthMember,
}
