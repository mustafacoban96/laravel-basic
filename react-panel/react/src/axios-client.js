import axios from "axios";


const axiosClient = axios.create({
    baseURL: `${import.meta.env.VITE_API_BASE_URL}/api`
});

//interceptors

axiosClient.interceptors.request.use((config) =>{

    const token = localStorage.getItem('ACCESS_TOKEN');
    config.headers.Authorization = `Bearer ${token}`;
    return config;
});

// include two functions as paramter for fulfilled and rejected
axiosClient.interceptors.response.use((response) =>{
    return response
}, (error) =>{
   try
   {
    const {response} = error;
    if(response.status == 401){
        localStorage.removeItem('ACCESS_TOKEN');
    }
    else if (response.status === 404) {
        //Show not found
      }
   } catch(e){
    console.error(e);
    
   }

    throw error;
})

export default axiosClient;