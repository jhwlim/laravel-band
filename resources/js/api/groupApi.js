import axios from 'axios';

const baseUrl = '/groups'

const createGroup = ({ name, intro, imageFile }) => {
    const formData = new FormData();
    formData.append('name', name);
    formData.append('intro', intro);
    formData.append('imageFile', imageFile);

    const config = {
        headers: {
            'Content-Type': 'multipart/form-data',
        }
    }

    return axios.post(baseUrl, formData, config);
};

const getGroupInfo = id => {
    return axios.get(`${baseUrl}/${id}`);
}

const requestJoinGroup = id => {
    return axios.post(`${baseUrl}/${id}/members`);
}

const getGroupMembers = id => {
    return axios.get(`${baseUrl}/${id}/members`);
}

const getAllGroups = () => {
    return axios.get(`${baseUrl}`);
}

export default {
    createGroup,
    getGroupInfo,
    requestJoinGroup,
    getGroupMembers,
    getAllGroups,
}
