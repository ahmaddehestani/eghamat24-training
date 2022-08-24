import React from 'react';
// import './App.css';
import Adds from './components/new-task.jsx'
import List from './components/task.jsx'
import {  Routes, Route, Link } from 'react-router-dom';


const App = ()=> {
  return (<>
   
    <Routes>
    <Route path="/newTask" element={<Adds />} />
    <Route path="/list" element={<List />} />
  </Routes>

 {/* <div>
    <Adds />
    </div> */}
    </>
  );
  
}

  

export default App;
