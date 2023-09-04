import React, { useEffect, useState } from 'react'
import { useNavigate, useParams } from 'react-router-dom'
import axiosClient from '../axios-client';

//The useParams() hook returns an object that contains the parameters of the current URL
const UserForm = () => {
    const {id} = useParams();
    const navigate = useNavigate();
    const [loading,setLoading] = useState(false);
    const [errors,setErrors] = useState(null);
    const [user,setUser] = useState({
        id: null,
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
    })

    if(id){
        useEffect(()=>{
            setLoading(true);
            axiosClient.get(`/users/${id}`)
            .then(({data}) =>{

                setLoading(false);
                setUser(data)
            })
            .catch(() =>{
                setLoading(false)
            })
        },[]);
    }
    const onSubmit = (e) =>{
       e.preventDefault(e);

       if(user.id){
        axiosClient.put(`/users/${user.id}`,user)
        .then(() =>{
            // todo show notification
            navigate('/users')
        })
        .catch(err =>{
            const response = err.response;
            if(response && response.status == 422){
                setErrors(response.data.errors)
            }
        })
       }
       else{
        axiosClient.post(`/users`,user)
        .then(() =>{
            // todo show notification
            navigate('/users')
        })
        .catch(err =>{
            const response = err.response;
            if(response && response.status == 422){
                setErrors(response.data.errors)
            }
        })
       }
    }
  return (
    <>
    {user.id && <h1>Update User: {user.name}</h1>}
    {!user.id && <h1>New User</h1>}
    <div class="card animated fadeInDown">
        {loading && (
            <div className='text-center'>Loading....</div>
        )}
        {errors && <div className='alert'>
            {Object.keys(errors).map(key =>(
                <p key={key}>{errors[key[0]]}</p>
            ))}
        </div>
        }
       { !loading && 
        <form onSubmit={onSubmit}>
            <input value={user.name} onChange={e => setUser({...user, name:e.target.value})} placeholder='Name'/>
            <input type='email' value={user.email} onChange={e => setUser({...user, email:e.target.value})} placeholder='Email'/>
            <input type='password' onChange={e => setUser({...user, password:e.target.value})} placeholder='Password'/>
            <input type='password' onChange={e => setUser({...user, password_confirmation:e.target.value})} placeholder='Password Confirmation'/>
            <button className='btn'>Save</button>
        </form>
        }
    </div>
    </>
  )
}

export default UserForm
