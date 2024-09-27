import React, { useState, useEffect } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import axios from 'axios';

const endpoint = 'http://localhost:8000/api';

const EditEscenarioDeportivo = () => {
  const [nombre, setNombre] = useState('');
  const [fecha, setFecha] = useState('');
  const [funcionarios, setFuncionarios] = useState([]);
  const [selectedFuncionario, setSelectedFuncionario] = useState('');
  const navigate = useNavigate();
  const { id } = useParams();

  // Función para obtener la lista de funcionarios
  const fetchFuncionarios = async () => {
    try {
      const response = await axios.get(`${endpoint}/funcionarios`);
      setFuncionarios(response.data);
    } catch (error) {
      console.error("Error al obtener funcionarios:", error);
    }
  };

  useEffect(() => {
    // Obtener la lista de funcionarios
    fetchFuncionarios();

    const getEscenarioById = async () => {
      const response = await axios.get(`${endpoint}/escenarios_deportivos/${id}`);
      setNombre(response.data.nombre_esc);
      setFecha(response.data.fecha_dis);
      setSelectedFuncionario(response.data.id_fun); // Cambiado a `id_fun`
    };
    getEscenarioById();
  }, [id]);

  const update = async (e) => {
    e.preventDefault();
    await axios.put(`${endpoint}/escenarios_deportivos/${id}`, {
      nombre_esc: nombre,
      fecha_dis: fecha,
      id_fun: selectedFuncionario // Cambiado a `id_fun`
    });
    navigate('/');
  };

  return (
    <div>
      <h3>Edit Escenario Deportivo</h3>
      <form onSubmit={update}>
        <div className='mb-3'>
          <label className='form-label'>Nombre</label>
          <input
            value={nombre}
            onChange={(e) => setNombre(e.target.value)}
            type='text'
            className='form-control'
          />
        </div>
        <div className='mb-3'>
          <label className='form-label'>Fecha de Disponibilidad</label>
          <input
            value={fecha}
            onChange={(e) => setFecha(e.target.value)}
            type='date'
            className='form-control'
          />
        </div>
        <div className='mb-3'>
          <label className='form-label'>Funcionario</label>
          <select
            value={selectedFuncionario}
            onChange={(e) => setSelectedFuncionario(e.target.value)}
            className='form-control'
            required
          >
            <option value=''>Selecciona un funcionario</option>
            {funcionarios.map((funcionario) => (
              <option key={funcionario.id_fun} value={funcionario.id_fun}>
                {funcionario.nombre_fun}
              </option>
            ))}
          </select>
        </div>
        <button type='submit' className='btn btn-primary'>
          Update
        </button>
      </form>
    </div>
  );
};

export default EditEscenarioDeportivo;
