import './App.css';
import { BrowserRouter,Routes,Route } from 'react-router-dom';

import ShowEscenarioDeportivo from './components/ShowEscenarioDeportivo';
import CreateEscenarioDeportivo from './components/CreateEscenarioDeportivo';
import EditEscenarioDeportivo from './components/EditEscenarioDeportivo';

import ShowFuncionario from './components/ShowFuncionario';
import CreateFuncionario from './components/CreateFuncionario';
import EditFuncionario from './components/EditFuncionario';

function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>

          <Route path='/escenarios_deportivos'element={<ShowEscenarioDeportivo/>}/>
          <Route path='/escenarios_deportivos/create' element={<CreateEscenarioDeportivo/>} />
          <Route path='/escenarios_deportivos/edit/:id_esc' element={<EditEscenarioDeportivo/>} />

          <Route path='/funcionarios' element={<ShowFuncionario/>}/>
          <Route path='/funcionarios/create' element={<CreateFuncionario/>}/>
          <Route path='/funcionarios/edit/:id_fun' element={<EditFuncionario/>} />
          

        </Routes>
      </BrowserRouter>

    </div>
  );
}

export default App;
