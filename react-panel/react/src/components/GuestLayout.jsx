import React from 'react'
import { Navigate, Outlet } from 'react-router-dom'
import { useStateContext } from '../contexts/ContextProvider'


// <Outlet/>: An <Outlet> should be used in parent route elements to render their child route elements. This allows nested UI to show up when child routes are rendered. If the parent route matched exactly, it will render a child index route or nothing if there is no index route.
const GuestLayout = () => {
  const{token} = useStateContext();

  if(token){
    return <Navigate to='/users' />
  }

  return (
    
    <div>
      <Outlet/>
    </div>
  )
}

export default GuestLayout
