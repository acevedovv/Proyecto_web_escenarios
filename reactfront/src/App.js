import './App.css';
import { BrowserRouter,Routes,Route } from 'react-router-dom';

import ShowEscenarioDeportivo from './components/ShowEscenarioDeportivo';
import CreateEscenarioDeportivo from './components/CreateEscenarioDeportivo';
import EditEscenarioDeportivo from './components/EditEscenarioDeportivo';


function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>

          <Route path='/'element={<ShowEscenarioDeportivo/>}/>
          <Route path='/create' element={<CreateEscenarioDeportivo/>} />
          <Route path='/edit/:id' element={<EditEscenarioDeportivo/>} />

        </Routes>
      </BrowserRouter>

    </div>
  );
}

export default App;
