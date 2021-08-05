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

export default {
    createGroup,
}
