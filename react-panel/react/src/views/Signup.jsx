import React, { useRef } from 'react';
import { Link } from 'react-router-dom';
import axiosClient from '../axios-client';


const Signup = ()=> {

  const nameRef = useRef();
  const emailRef = useRef();
  const passwordRef = useRef();
  const confirmPasswordRef = useRef();
  

    const onSubmit = (e) =>{
      e.preventDefault();

      const payload = {
        name: nameRef.current.value,
        email: emailRef.current.value,
        password: passwordRef.current.value,
        confirm_password: confirmPasswordRef.current.value
      }
      
      axiosClient.post('/signup', payload)
      .then(({data}) =>{
        setUser(data.user)
        setToken(data.token)
      })
      .catch(err =>{
        const response = err.response;
        // 422 validation error
        if(response && response.status == 422){
            console.log( response.data.errors);
        }
      })
    }
    
    
    return (
      <div className='login-signup-form animated fadeInDown'>
        <div className='form'>
            <form onSubmit={onSubmit}>
                <h1 className='title'>Signup for free</h1>
                <input ref={nameRef} type='text' placeholder='Fullname'/>
                <input ref={emailRef} type='email' placeholder='Email Address'/>
                <input ref={passwordRef} type='password' placeholder='Password'/>
                <input ref={confirmPasswordRef} type='password' placeholder='Password Confirmation'/>
                <button className='btn btn-block'>Signup</button>
                <p className='message'>
                  Already Registered? <Link to='/login'>Sign in</Link>
                </p>
            </form>
        </div>
      </div>
    )
  

}

export default Signup  