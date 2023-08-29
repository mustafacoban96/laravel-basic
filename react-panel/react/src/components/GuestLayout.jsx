import React from 'react'
import { Outlet } from 'react-router-dom'


// <Outlet/>: An <Outlet> should be used in parent route elements to render their child route elements. This allows nested UI to show up when child routes are rendered. If the parent route matched exactly, it will render a child index route or nothing if there is no index route.
const GuestLayout = () => {
  return (
    <div>
      <Outlet/>
    </div>
  )
}

export default GuestLayout
