import React from 'react'
import ReactDOM from 'react-dom/client'
//import App from './App.jsx'
import './index.css'
import { RouterProvider } from 'react-router-dom'
import router from './router.jsx'

ReactDOM.createRoot(document.getElementById('root')).render(
  // <React.StrictMode>
  //   <App />
  // </React.StrictMode>,
  // the lines that is above were deleted on the project

  <React.StrictMode>
    <RouterProvider router={router}/>
  </React.StrictMode>
)
